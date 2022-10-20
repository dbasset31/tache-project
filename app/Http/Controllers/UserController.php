<?php

namespace App\Http\Controllers;

use App\Models\Civility;
use App\Models\Companie;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function formRegister()
    {
        $packages = Package::all();
        $civilites = Civility::all();

        return view('users/register', ['civilities' => $civilites, 'packages' => $packages]);
    }

    public function saveRegister(Request $request)
    {
        $request->validate([
            'email' => 'required|max:255|email|unique:users,email',
            'businessName' => 'required|max:20|unique:companies,name',
            'password' => 'required|min:8|regex:/^(?=.*[A-Z])(?=.*[\W])(?=.*[0-9])(?=.*[a-z]).{8,128}$/',
            'passwordConf' => 'required|same:password|min:8',
            'package_id' => 'required|exists:packages,id',
            'civilite_id' => 'required|exists:civilities,id',
            'telBusiness' => 'required|regex:/^0[1,2,3,4,5,6,7,9]{1}\d{8}$/',
            'telDirect' => 'nullable|regex:/^0[1,2,3,4,5,6,7,9]{1}\d{8}$/',
            'lastName' => 'required|alpha',
            'firstName' => 'required|alpha',
            'color' => 'required',
            'businessLogo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $user = new User();
        $user->lastname = $request->lastName;
        $user->firstname = $request->firstName;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->color = $request->color;
        $user->active = 1;
        $user->remember_token = \Illuminate\Support\Str::random(32);
        $user->civility_id = $request->civilite_id;
        $user->quality = $request->qualite;
        $user->tel = $request->telDirect;
        $user->created_at = date('Y-m-d H:i:s');
        $user->save();

        $companie = new Companie();
        $companie->name = $request->businessName;
        if ($request->file('businessLogo') == null) {
            $companie->logo = 'img/default-logo.svg';
        } else {
            $time = time();
            $companie->logo = 'img/'.$user->id.'/avatar/'.$time.'.'.$request->businessLogo->extension();
            if (! is_dir(public_path('img/'.$user->id.'/avatar'))) {
                mkdir(public_path('img/'.$user->id.'/avatar'), 0777, true);
            }
            $request->businessLogo->move(public_path('img/'.$user->id.'/avatar/'), $time.'.'.$request->businessLogo->extension());
        }
        $companie->user_id = $user->id;
        $companie->package_id = $request->package_id;
        $companie->tel = $request->telBusiness;
        $companie->created_at = $user->created_at;

        $companie->save();
        $user->companie_id = $companie->id;
        $user->update();
//        $mail = new \App\Mail\register($user->token, $user->pseudo);
//        $mailjet = Mailjet::getClient();
//        $response = $mailjet->get(Resources::$Contact);
//        $view = (string)View::make('mails/confirmEmail',['pseudo' => $user->pseudo, 'token' => $user->token]);

//        if ($response->success()){
//            $body = [
//                'FromEmail' => env('MAIL_FROM_ADDRESS'),
//                'FromName' => env('MAIL_FROM_NAME'),
//                'Subject' => $mail->build()->subject,
//                'Text-part' => $view,
//                'Html-part' => $view,
//                'Recipients' => [['Email' => $user->email]]
//            ];
//
//            $response = $mailjet->post(Resources::$Email, ['body' => $body]);
//            if($response->success()){

        session()->flash('success', 'Veuillez confirmez votre adresse e-mail avant de pouvoir vous connecter.');

        return redirect()->to('/connexion');
//            } else {
//                session()->flash('error', 'Échec de la création du compte. Veuillez réessayer.');
//                return redirect()->to('/inscription');
//            }

//        } else {
//            session()->flash('error', 'Échec de la création du compte. Veuillez réessayer.');
//            return redirect()->to('/inscription');
//        }
    }

    public function login(Request $request)
    {
        $creditentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($creditentials)) {
//            if (Auth::user()->email_verified_at == "") {
//                $request->session()->invalidate();
//                return redirect()->to('/connexion')->withErrors([
//                    'email' => "L'adresse email n'est pas confirmée."
//                ]);
//            } else {
            $token = md5(uniqid());
            User::where('id', Auth::id())->update(['token' => $token]);

            $request->session()->regenerate();

            return redirect('/');
//            }
        }

        return back()->withErrors([
            'email' => 'Email ou mot de passe invalide',
        ]);
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }
}
