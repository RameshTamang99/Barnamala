<?php

namespace App\Http\Controllers\backend;

use App\Repository\UserRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExpoTokenStoreRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserLogoutRequest;
use App\Models\LoginHistory;
use App\Models\NoOfDevice;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Prophecy\Util\ExportUtil;

class UserController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->middleware('auth:sanctum', ['except' => ['login', 'registerUser']]);
        $this->repo = new UserRepository;
    }

    public function userLogin(Request $request)
    {
        $data = $request->input();
        $request->session()->put('user',$data['email']);

        return redirect()->route('dashboard');
    }

    public function viewUsers()
    {
        list($respMsg,$respCode,$respData) = $this->repo->handleUserView();
        return response()->json([
            'message' => $respMsg,
            'user' => $respData,
        ], $respCode);
    }

    public function viewLogedInUsers()
    {
        list($respMsg,$respCode,$respData) = $this->repo->handleLogedInUserView();
        return response()->json([
            'message' => $respMsg,
            'user' => $respData,
        ], $respCode);
    }


    public function registerUser(UserStoreRequest $request,$userType)
    {
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleUserStore($request,$userType);
        return response()->json([
            'message' => $respMsg,
            'user' => $respData,
        ], $respCode);
    }
    public function logoutUser(UserLogoutRequest $request)
    {
        list($respMsg,$respCode)=$this->repo->handleUserLogout($request);
        return response()->json([
            'message' => $respMsg,
        ], $respCode);
    }


    public function editUser(UserStoreRequest $request,$id)
    {
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleUserUpdate($request,$id);
        return response()->json([
            'message' => $respMsg,
            'user' => $respData,
        ], $respCode);
    }

    public function restoreUser($id)
    {
        list($respMsg,$respCode,$respType) = $this->repo->handleUserRestore($id);
        return response()->json([
            'message' => $respMsg,
        ], $respCode);
    }

    public function permanentDeleteUser($id)
    {
        list($respMsg,$respCode,$respType) = $this->repo->handleUserForceDelete($id);
        return response()->json([
            'message' => $respMsg,
        ], $respCode);
    }

    //api Login
    function login(UserLoginRequest $request)
    {
        $this->repo->handleUserLogin($request);
        $credentials = request(['email','password']);

        if(!Auth::attempt( $credentials)){
            return response()->json(['Error'=>'Invalid Username or Password!!'], 500);
        }

         $user = User::where('email',$request->email)->first();
         $tokenResult = $user->createToken('authToken')->plainTextToken;

         $userId = Auth::id();
         $loginHistory = new LoginHistory();
         $count = $loginHistory->where('user_id',"=",$userId)->count();
         $noOfDevice = NoOfDevice::pluck('no_of_device')->first();


        //  if($count == 0)
        //  {
        //         $loginHistory->user_id = $userId;
        //         $loginHistory->access_token = $tokenResult;
        //         // $loginHistory->expo_tokens = $request->expo_token;
        //         $loginHistory->expo_tokens = 'null';

        //         $loginHistory->save();

        //         return response()->json(['message' => 'User Login successfull',
        //         'user' => $user,'Token'=>$tokenResult], 200);

        //  }elseif($count == $noOfDevice)
        //  {
        //     return response()->json(['message' => 'Login device exceeds the allowed number'], 400);
        //  }else{

        //     $loginHistory->user_id = $userId;
        //     $loginHistory->access_token = $tokenResult;
        //     // $loginHistory->expo_tokens = $request->expo_token;
        //     $loginHistory->expo_tokens = 'null';
        //     $loginHistory->save();

        //     return response()->json(['message' => 'User Login successfull',
        //     'user' => $user,'Token'=>$tokenResult], 200);
        //  }

                $loginHistory->user_id = $userId;
                $loginHistory->access_token = $tokenResult;
                $loginHistory->expo_tokens = $request->expo_token;
                // $loginHistory->expo_tokens = rand(1111,999999);

                $loginHistory->save();

                return response()->json(['message' => 'User Login successfull',
                'user' => $user,'Token'=>$tokenResult], 200);









    }


    public function userView(){
        list($respMsg,$respCode,$respData) = $this->repo->handleUserView();
        return view('backend.user.view_user',$respData);
    }

    public function userAdd(){
        return view('backend.user.add_user');
    }

    public function userStore(UserStoreRequest $request, $userType){

        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleUserStore($request, $userType);
        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );

        return redirect()->route('user.view')->with($notification);

    }

    public function userEdit($id)
    {
        list($respMsg,$respCode,$respData) = $this->repo->handleUserEdit($id);
        return view('backend.user.edit_user',compact('respData'));

    }

    public function userUpdate(UserStoreRequest $request,$id)
    {
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleUserUpdate($request,$id);

        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
    return redirect()->route('user.view')->with($notification);
    }

    public function deleteUser($id){

        list($respMsg,$respCode,$respType,$respData) = $this->repo->handleUserDelete($id);
        return response()->json([
            'message' => $respMsg,
        ], $respCode);
    }

    public function userDelete($id){

        list($respMsg,$respCode,$respType) = $this->repo->handleUserDelete($id);

        $notification = array(
            'message' =>$respMsg,
            'alert-type' =>$respType,
    );
    return redirect()->route('user.view')->with($notification);
    }

    public function userRestore($id){
        list($respMsg,$respCode,$respType) = $this->repo->handleUserRestore($id);

        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
    return redirect()->route('user.view')->with($notification);
    }

    public function userTrashView(){
        list($respMsg,$respCode,$respData) = $this->repo->handleUserTrashView();
         return view('backend.user.view_user_trash',$respData);
     }

     public function userForceDelete($id){
        list($respMsg,$respCode,$respType) = $this->repo->handleUserForceDelete($id);

        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
    return redirect()->route('user.trashView')->with($notification);
    }


}
