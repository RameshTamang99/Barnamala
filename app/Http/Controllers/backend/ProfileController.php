<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordUpdateRequest;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Repository\ProfileRepository;

class ProfileController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new ProfileRepository;
    }

    public function updateProfile(ProfileUpdateRequest $request)
    {
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleProfileUpdate($request);
        return response()->json([
            'message' => $respMsg,
            'user' => $respData,
        ], $respCode);
    }

    public function profileView(){
        list($respMsg,$respCode,$respDataUser) = $this->repo->handleProfileView();
        return view('backend.user.view_profile',compact('respDataUser'));
    }

    public function profileEdit(){
        list($respMsg,$respCode,$respDataUser) = $this->repo->handleProfileView();
        return view('backend.user.edit_profile',compact('respDataUser'));
    }


    public function profileStore(ProfileUpdateRequest $request){
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleProfileUpdate($request);

        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
    return redirect()->route('profile.view')->with($notification);
    }

    public function passwordView(){
        return view('backend.user.edit_password');
    }

    public function passwordUpdate(PasswordUpdateRequest $request){

        $this->repo->handlePasswordUpdate($request);
        $hashedPassword = Auth::user()->password;

         if(Hash::check($request->oldpassword,$hashedPassword)){

             $user = User::find(Auth::id());
             $user->password = Hash::make($request->password);
             $user->save();
             Auth::logout();
             return redirect()->route('login')->with('message','Password changed Successfully');
         }
         else{
             return redirect()->back()->with('message','Error in changing password!!');
         }
    }

    public function changeUserPassword(PasswordUpdateRequest $request)
    {
        $this->repo->handlePasswordUpdate($request);
        $hashedPassword = Auth::user()->password;

         if(Hash::check($request->oldpassword,$hashedPassword)){

             $user = User::find(Auth::id());
             $user->password = Hash::make($request->password);
             $user->save();
             return response()->json([
                'message' => 'User Password Changed Successfully!!',
            ], 200);
         }
         else{
            return response()->json([
                'message' => 'Error in changing password!!',
            ], 400);
         }
    }

}
