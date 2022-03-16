<?php
namespace App\Repository;

use App\Http\Requests\PasswordUpdateRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileRepository {

    public function handleProfileUpdate(ProfileUpdateRequest $request)
    {
        // Will return only validated data
        $request->validated();

        try
        {
            $data = User::find(Auth::user()->id);
            $data->name = $request->name;
            $data->email = $request->email;
            $data->mobile = $request->mobile;
            $data->address = $request->address;
            $data->gender = $request->gender;

            if($request->file('image')){
                $file = $request->file('image');
                @unlink(public_path('upload/user_images/'.$data->image));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/user_images'),$filename);
                $data['image'] = $filename;
            }
            $data->save();

            $respMsg = "Profile Succesfully Updated!";
            $respCode = 200;
            $respData = $data;
            $respType = 'success';

        }catch(\Exception $e)
        {
            $respMsg = "Profile Updation Failed!";
            $respCode = 200;
            $respData = $data;
            $respType = 'danger';
        }
        return array($respMsg,$respCode,$respData,$respType);
    }

    public function handleProfileView()
    {
        try{
            $data = User::find(Auth::user()->id);

            $respMsg = "Profile Succesfully Viewed!";
            $respCode = 200;
            $respDataUser = $data;

        }catch(\Exception $e){
            $respMsg = "Profile View Failed";
            $respCode = 400;
            $respDataUser = $data;

        }
        return array($respMsg,$respCode,$respDataUser);
    }

    public function handleUserStore(UserStoreRequest $request)
    {

        try {
                // Will return only validated data
                $request->validated();


                $data = new User();
                $data->usertype = 'Admin';
                $data->role = $request->role;
                $data->name = $request->name;
                $data->email = $request->email;
                $data->password = bcrypt($request->password);
                $data->save();

                $respMsg = "User Succesfully Added!";
                $respCode = 200;
                $respData = $data;
                $respType = 'info';


            }catch(\Exception $e){

                $respMsg = "User Adding Failed";
                $respCode = 400;
                $respData = $data;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }

    public function handlePasswordUpdate(PasswordUpdateRequest $request)
    {
         // Will return only validated data
         $request->validated();

    }
}

?>
