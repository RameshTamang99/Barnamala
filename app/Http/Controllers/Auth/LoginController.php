<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\LoginHistory;
use App\Models\User;
use App\Providers\RouteServiceProvider;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



    public function generateRandomString($length = 25) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function socialLogin(Request $request, Response $response)
    {

        $accessToken = $request->id_token;
        if($request->from == "google")
        {
            $googleApi =  Http::get('https://oauth2.googleapis.com/tokeninfo?id_token='.$accessToken);
            if($googleApi->status() == '200' && isset($googleApi['email']))
            {

                $user = User::where('email', '=', $googleApi['email'])->first();
                if($user == NULL)
                {
                    $pass = $this->generateRandomString(5);
                    $data = new User();
                    $data->usertype = 'Student';
                    $data->role = 'Student';
                    $data->name = $googleApi['name'];
                    $data->email = $googleApi['email'];
                    $data->password = bcrypt($pass);
                    $data->save();
                }

                $user1 = User::where('email', '=',$googleApi['email'])->first();
                $tokenResult = $user1->createToken('authToken')->plainTextToken;
                
                $LoginHistory = new LoginHistory();
                $LoginHistory->user_id = $user1->id;
                $LoginHistory->access_token = $tokenResult;
                $LoginHistory->expo_tokens = $request->expo_token;
                $LoginHistory->save();

                return response()->json(['message' => 'User Login successfull',
                'user' => $user1,'Token'=>$tokenResult], 200);
            }
            elseif( $googleApi['error']==TRUE){
                return response()->json(['message' => 'Invalid Token Id!!']);
            }


        }
        elseif ($request->from == 'facebook') {

            $facebookApi =  Http::get('https://graph.facebook.com/me?fields=id,name,email,first_name,last_name&access_token='.$accessToken);

            if($facebookApi->status() == '200' && isset($facebookApi['email']))
            {

                $user = User::where('email', '=', $facebookApi['email'])->first();

                if($user == NULL)
                {
                    $pass = $this->generateRandomString(5);
                    $data = new User();
                    $data->usertype = 'Student';
                    $data->role = 'Student';
                    $data->name = $facebookApi['name'];
                    $data->email = $facebookApi['email'];
                    $data->password = bcrypt($pass);
                    $data->save();
                }

                $user2 = User::where('email', '=',$facebookApi['email'])->first();
                $tokenResult = $user2->createToken('authToken')->plainTextToken;

                $LoginHistory = new LoginHistory();
                $LoginHistory->user_id = $user2->id;
                $LoginHistory->access_token = $tokenResult;
                $LoginHistory->expo_tokens = $request->expo_token;
                $LoginHistory->save();

                return response()->json(['message' => 'User Login successfull',
                'user' => $user2,'Token'=>$tokenResult], 200);

            }
            elseif( $facebookApi['error']==TRUE){
                return response()->json(['message' => 'Invalid Token Id!!']);
            }

        }
    }
}
