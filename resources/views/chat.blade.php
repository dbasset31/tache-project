@extends('layouts/layout')

@section('page')
<div>
    <div class="row">
        <div class="col-sm-4 col-lg-3">
            <div class="card">
                <div class="card-header"><b>Utilisateurs</b></div>
                <div class="card-body" id="user_list">

                </div>
            </div>
        </div>
        <div id="discussion" class="col-sm-8 col-lg-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col col-md-6" id="chat_header"><b>Discussion</b></div>
                        <div class="col col-md-6" id="close_chat_area"></div>
                    </div>
                </div>
                <div class="card-body" id="chat_area">

                </div>
            </div>
        </div>
        <div class="col-sm-4 col-lg-3">

        </div>
    </div>
</div>


    <style>

        #chat_area {
            min-height: 500px;
            /*overflow-y: scroll*/;
        }

        #chat_history {
            min-height: 500px;
            max-height: 500px;
            overflow-y: scroll;
            margin-bottom: 16px;
            background-color: #ece5dd;
            padding: 16px;
        }

        #user_list {
            min-height: 500px;
            max-height: 500px;
            overflow-y: scroll;
        }
    </style>

@endsection('content')

<script>

    var conn = new WebSocket('ws://127.0.0.1:8090/?token={{ auth()->user()->token }}');

    var from_user_id = "{{ Auth::user()->id }}";

    var to_user_id = "";

    var connection_id = "{{ Auth::user()->connection_id }}";
    conn.onopen = function (e) {
        console.log("Connection established!");
        load_connected_chat_user(from_user_id);
    };

    conn.onmessage = function (e) {
        var data = JSON.parse(e.data);
        if (data.logout || data.login) {
            load_connected_chat_user(from_user_id);
        }

        if (data.response_load_unconnected_user || data.response_search_user) {
            var html = '';
            if (data.data.length > 0) {
                html += '<ul class="list-group">';
                for (var count = 0; count < data.data.length; count++) {
                    html += `
				<li class="list-group-item">
					<div class="row">
						<div class="col col-9">` + data.data[count].name + `</div>
						<div class="col col-3">
							<button type="button" name="send_request" class="btn btn-primary btn-sm float-end" onclick="send_request(this, ` + from_user_id + `, ` + data.data[count].id + `)"><i class="fas fa-paper-plane"></i></button>
						</div>
					</div>
				</li>
				`;
                }

                html += '</ul>';
            } else {
                html = 'No User Found';
            }

            document.getElementById('search_people_area').innerHTML = html;
        }

        if (data.response_load_notification) {
            var html = '';
            for (var count = 0; count < data.data.length; count++) {
                html += `
			<li class="list-group-item">
				<div class="row">
					<div class="col col-8">` + data.data[count].name + `</div>
					<div class="col col-4">
			`;
                if (data.data[count].notification_type == 'Send Request') {
                    if (data.data[count].status == 'Pending') {
                        html += '<button type="button" name="send_request" class="btn btn-warning btn-sm float-end">Request Send</button>';
                    } else {
                        html += '<button type="button" name="send_request" class="btn btn-danger btn-sm float-end">Request Rejected</button>';
                    }
                } else {
                    if (data.data[count].status == 'Pending') {
                        html += '<button type="button" class="btn btn-danger btn-sm float-end" onclick="process_chat_request(' + data.data[count].id + ', ' + data.data[count].from_user_id + ', ' + data.data[count].to_user_id + ', `Reject`)"><i class="fas fa-times"></i></button>&nbsp;';
                        html += '<button type="button" class="btn btn-success btn-sm float-end" onclick="process_chat_request(' + data.data[count].id + ', ' + data.data[count].from_user_id + ', ' + data.data[count].to_user_id + ', `Approve`)"><i class="fas fa-check"></i></button>';
                    } else {
                        html += '<button type="button" name="send_request" class="btn btn-danger btn-sm float-end">Request Rejected</button>';
                    }
                }

                html += `
					</div>
				</div>
			</li>
			`;
            }
            document.getElementById('notification_area').innerHTML = html;
        }

        if (data.response_process_chat_request) {
            load_connected_chat_user(data.user_id);
        }

        if (data.response_connected_chat_user) {
            var html = '<div class="list-group">';
            if (data.data.length > 0) {
                for (var count = 0; count < data.data.length; count++) {
                    html += `
				<a href="#" class="list-group-item d-flex justify-content-between align-items-start" onclick="make_chat_area(` + data.data[count].id + `, '` + data.data[count].name + `'); load_chat_data(` + from_user_id + `, ` + data.data[count].id + `); ">
					<div class="ms-2 me-auto">
				`;
                    html += `
						<b><span id="` + data.data[count].connection_id + `">` + data.data[count].icon_connection + "</span>&nbsp;" + data.data[count].name + `</b>
					</div>
				</a>
				`;
                }
            } else {
                html += 'No User Found';
            }
            html += '</div>';
            document.getElementById('user_list').innerHTML = html;
        }

        if (data.message) {
            var html = '';
            if (data.from_user_id == from_user_id) {
                var icon_style = '';
                if (data.message_status == 'Not Send') {
                    icon_style = '<span id="chat_status_' + data.chat_message_id + '" class="float-end"><i class="fas fa-check text-muted"></i></span>';
                }
                if (data.message_status == 'Send') {
                    icon_style = '<span id="chat_status_' + data.chat_message_id + '" class="float-end"><i class="fas fa-check-double text-muted"></i></span>';
                }

                if (data.message_status == 'Read') {
                    icon_style = '<span class="text-primary float-end" id="chat_status_' + data.chat_message_id + '"><i class="fas fa-check-double"></i></span>';
                }

                html += `
			<div class="row">
				<div class="col col-3">&nbsp;</div>
				<div class="col col-9 alert alert-success text-dark shadow-sm">
					` + data.message + icon_style + `
				</div>
			</div>
			`;
            } else {
                if (to_user_id != '' && to_user_id == data.from_user_id) {
                    html += `
				<div class="row">
					<div class="col col-9 alert alert-light text-dark shadow-sm">
					` + data.message + `
					</div>
				</div>
				`;
                    update_message_status(data.chat_message_id, from_user_id, to_user_id, 'Read');
                } else {
                    update_message_status(data.chat_message_id, from_user_id, to_user_id, 'Send');
                }
            }

            if (html != '') {
                var previous_chat_element = document.querySelector('#chat_history');
                var chat_history_element = document.querySelector('#chat_history');
                chat_history_element.innerHTML = previous_chat_element.innerHTML + html;
            }
            scroll_top();
        }

        if (data.chat_history) {
            var html = '';
            for (var count = 0; count < data.chat_history.length; count++) {
                if (data.chat_history[count].from_user_id == from_user_id) {
                    var icon_style = '';
                    if (data.chat_history[count].message_status == 'Not Send') {
                        icon_style = '<span id="chat_status_' + data.chat_history[count].id + '" class="float-end"><i class="fas fa-check text-muted"></i></span>';
                    }
                    if (data.chat_history[count].message_status == 'Send') {
                        icon_style = '<span id="chat_status_' + data.chat_history[count].id + '" class="float-end"><i class="fas fa-check-double text-muted"></i></span>';
                    }
                    if (data.chat_history[count].message_status == 'Read') {
                        icon_style = '<span class="text-primary float-end" id="chat_status_' + data.chat_history[count].id + '"><i class="fas fa-check-double"></i></span>';
                    }
                    html += `
				<div class="row">
					<div class="col col-3">&nbsp;</div>
					<div class="col col-9 alert alert-success text-dark shadow-sm">
					` + data.chat_history[count].chat_message + icon_style + `
					</div>
				</div>
				`;
                } else {
                    if (data.chat_history[count].message_status != 'Read') {
                        update_message_status(data.chat_history[count].id, data.chat_history[count].from_user_id, data.chat_history[count].to_user_id, 'Read');
                    }
                    html += `
				<div class="row">
					<div class="col col-9 alert alert-light text-dark shadow-sm">
					` + data.chat_history[count].chat_message + `
					</div>
				</div>
				`;
                }
            }
            document.querySelector('#chat_history').innerHTML = html;
            scroll_top();
        }

        if (data.update_message_status != "") {
            if(from_user_id == data.to_user_id){
                var chat_status_element = document.querySelector('#chat_status_' + data.chat_message_id + '');
                if (chat_status_element) {
                    if (data.update_message_status == 'Read') {
                        chat_status_element.innerHTML = '<i class="fas fa-check-double text-primary"></i>';
                    }
                    if (data.update_message_status == 'Send') {
                        chat_status_element.innerHTML = '<i class="fas fa-check-double text-muted"></i>';
                    }
                }
            }
        }

        if (data.make_connect) {
            $('#statut_' + data.connection_id).html("<img src=\"{{ asset('vendor/img/online.png') }}\">")
        }

        if(data.update_message_status_change){
            $('#chat_status_'+data.chat_message_id).addClass('text-primary').html('<i class="fas fa-check-double"></i>');
        }
    };

    conn.onclose = function (e) {
        var data = JSON.parse(e.data);
        if (data.logout) {
            $('#' + data.connection_id).html("<img class='state_user' src='{{ asset('vendor/img/offline.png')}}'>")
        }
    };

    function scroll_top() {
        document.querySelector('#chat_history').scrollTop = document.querySelector('#chat_history').scrollHeight;
    }

    function search_user(from_user_id, search_query) {
        if (search_query.length > 0) {
            var data = {
                from_user_id: from_user_id,
                search_query: search_query,
                type: 'request_search_user'
            };

            conn.send(JSON.stringify(data));
        }
    }

    function send_request(element, from_user_id, to_user_id) {
        var data = {
            from_user_id: from_user_id,
            to_user_id: to_user_id,
            type: 'request_chat_user'
        };
        element.disabled = true;
        conn.send(JSON.stringify(data));
    }

    function load_connected_chat_user(from_user_id) {
        var data = {
            from_user_id: from_user_id,
            companie_id: "{{ Auth::user()->companie_id }}",
            type: 'request_connected_chat_user'
        };
        conn.send(JSON.stringify(data));
        if (to_user_id == "") {
            $('#discussion').hide();
        }
    }

    function make_chat_area(user_id, to_user_name) {
        var html = `
	<div id="chat_history"></div>
	<div class="input-group mb-3">
		<textarea id="message_area" class="form-control" aria-describedby="send_button"></textarea>
		<button type="button" class="btn btn-success" id="send_button" onclick="send_chat_message()"><i class="fas fa-paper-plane"></i></button>
	</div>
	`;
        document.getElementById('chat_area').innerHTML = html;
        document.getElementById('chat_header').innerHTML = 'Discussion avec <b>' + to_user_name + '</b>';
        document.getElementById('close_chat_area').innerHTML = '<button type="button" id="close_chat" class="btn btn-danger btn-sm float-end" onclick="close_chat();"><i class="fas fa-times"></i></button>';
        to_user_id = user_id;
        $('#discussion').show();
    }

    function close_chat() {
        document.getElementById('chat_header').innerHTML = 'Discussion';
        document.getElementById('close_chat_area').innerHTML = '';
        document.getElementById('chat_area').innerHTML = '';
        to_user_id = '';
        $('#discussion').hide();
    }

    function send_chat_message() {
        document.querySelector('#send_button').disabled = true;
        var message = document.getElementById('message_area').value.trim();
        var data = {
            message: message,
            from_user_id: from_user_id,
            to_user_id: to_user_id,
            type: 'request_send_message'
        };
        conn.send(JSON.stringify(data));
        document.querySelector('#message_area').value = '';
        document.querySelector('#send_button').disabled = false;
    }

    function load_chat_data(from_user_id, to_user_id) {
        var data = {
            from_user_id: from_user_id,
            to_user_id: to_user_id,
            type: 'request_chat_history'
        };

        conn.send(JSON.stringify(data));
    }

    function update_message_status(chat_message_id, from_user_id, to_user_id, chat_message_status) {
        var data = {
            chat_message_id: chat_message_id,
            from_user_id: from_user_id,
            to_user_id: to_user_id,
            chat_message_status: chat_message_status,
            type: 'update_chat_status'
        };
        conn.send(JSON.stringify(data));
    }

    function make_connect(connection_id) {
        var data = {
            connection_id: connection_id,
            status: true,
            type: 'make_connect'
        }
        conn.send(JSON.stringify(data));
    }
</script>

