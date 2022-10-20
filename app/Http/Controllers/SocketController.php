<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

class SocketController extends Controller implements MessageComponentInterface
{
    protected $clients;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);
        $querystring = $conn->httpRequest->getUri()->getQuery();
        parse_str($querystring, $queryarray);
        if (isset($queryarray['token'])) {
            User::where('token', $queryarray['token'])->update(['connection_id' => $conn->resourceId,'user_status' => 'Online']);
        }
        foreach ($this->clients as $client) {
            $send_data = [];
            $send_data['login'] = true;
            $client->send(json_encode($send_data));
        }
    }

    public function onMessage(ConnectionInterface $conn, $msg)
    {
        $data = json_decode($msg);
        if (isset($data->type)) {
            switch ($data->type){
                case "request_connected_chat_user":
                    $user_id_data = User::select('id')
                        ->where('id', '!=', $data->from_user_id)->where('companie_id', $data->companie_id)
                        ->get();
                    $sub_data = [];
                    foreach ($user_id_data as $user_id_row) {
                        $user_id = '';
                        if ($user_id_row->from_user_id != $data->from_user_id) {
                            $user_id = $user_id_row->id;
                        } else {
                            $user_id = $user_id_row->to_user_id;
                        }
                        $user_data = User::select('id', 'lastname', 'firstname', 'connection_id')->where('id', $user_id)->first();
                        $sub_data[] = [
                            'id' => $user_data->id,
                            'name' => $user_data->lastname.' '.$user_data->firstname,
                            'connection_id' => $user_data->connection_id,
                            'icon_connection' => ($user_data->connection_id > 0 && $user_data->connection_id != '') ? "<img class='state_user' src='".asset('vendor/img/online.png')."'>" : "<img class='state_user' src='".asset('vendor/img/offline.png')."'>",
                        ];
                    }
                    $sender_connection_id = User::select('connection_id')->where('id', $data->from_user_id)->get();
                    foreach ($this->clients as $client) {
                        if ($client->resourceId == $sender_connection_id[0]->connection_id) {
                            $send_data['response_connected_chat_user'] = true;
                            $send_data['data'] = $sub_data;
                            $client->send(json_encode($send_data));
                        }
                    }
                break;
                case "request_chat_history":
                    $chat_data = Chat::select('id', 'from_user_id', 'to_user_id', 'chat_message', 'message_status')
                        ->where(function ($query) use ($data) {
                            $query->where('from_user_id', $data->from_user_id)->where('to_user_id', $data->to_user_id);
                        })
                        ->orWhere(function ($query) use ($data) {
                            $query->where('from_user_id', $data->to_user_id)->where('to_user_id', $data->from_user_id);
                        })->orderBy('id', 'ASC')->get();
                    $send_data['chat_history'] = $chat_data;
                    $receiver_connection_id = User::select('connection_id')->where('id', $data->from_user_id)->get();
                    foreach ($this->clients as $client) {
                        if ($client->resourceId == $receiver_connection_id[0]->connection_id) {
                            $client->send(json_encode($send_data));
                        }
                    }
                break;
                case "request_send_message":
                    //save chat message in mysql
                    $chat = new Chat;
                    $chat->from_user_id = $data->from_user_id;
                    $chat->to_user_id = $data->to_user_id;
                    $chat->chat_message = $data->message;
                    $chat->message_status = 'Not Send';
                    $chat->save();
                    $chat_message_id = $chat->id;
                    $receiver_connection_id = User::select('connection_id')->where('id', $data->to_user_id)->get();
                    $sender_connection_id = User::select('connection_id')->where('id', $data->from_user_id)->get();
                    foreach ($this->clients as $client) {
                        if ($client->resourceId == $receiver_connection_id[0]->connection_id || $client->resourceId == $sender_connection_id[0]->connection_id) {
                            $send_data['chat_message_id'] = $chat_message_id;
                            $send_data['message'] = $data->message;
                            $send_data['from_user_id'] = $data->from_user_id;
                            $send_data['to_user_id'] = $data->to_user_id;
                            if ($client->resourceId == $receiver_connection_id[0]->connection_id) {
                                Chat::where('id', $chat_message_id)->update(['message_status' => 'Send']);
                                $send_data['message_status'] = 'Send';
                                $send_data['messsage_send'] = true;
                                $send_data['sender_connection_id'] = $sender_connection_id[0]->connection_id;
                            } else {
                                $send_data['message_status'] = 'Not Send';
                            }
                            $client->send(json_encode($send_data));
                        }
                    }
                break;
                case "update_chat_status":
                    Chat::where('id', $data->chat_message_id)->update(['message_status' => $data->chat_message_status]);
                    $sender_connection_id = User::select('connection_id')->where('id', $data->to_user_id)->get();
                    foreach ($this->clients as $client) {
                        if ($client->resourceId == $sender_connection_id[0]->connection_id) {
                            $send_data['update_message_status'] = $data->chat_message_status;
                            $send_data['update_message_status_change'] = true;
                            $send_data['chat_message_id'] = $data->chat_message_id;
                            $client->send(json_encode($send_data));
                        }
                    }
                break;
            }
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        foreach ($this->clients as $client) {
            $send_data = [];
            $send_data['logout'] = true;
            $client->send(json_encode($send_data));
        }
        $this->clients->detach($conn);
        $querystring = $conn->httpRequest->getUri()->getQuery();
        parse_str($querystring, $queryarray);
        if (isset($queryarray['token'])) {
            User::where('token', $queryarray['token'])->update(['connection_id' => 0, 'user_status' => 'Offline']);
        }
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()} \n";
        $conn->close();
    }
}
