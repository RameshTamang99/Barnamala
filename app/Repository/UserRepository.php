<?php
namespace App\Repository;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserLogoutRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\LoginHistory;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;

class UserRepository {

    public function handleUserLogin(UserLoginRequest $request)
    {
        // Will return only validated data
        $request->validated();
    }

    public function handleUserView()
    {
        try{
            $data['allData'] = User::all();

            $data['paths'] = array();
            array_push( $data['paths'] , array("image_path" => "public/upload/user_images/"));

            $respMsg = "Users Succesfully Listed!";
            $respCode = 200;
            $respData = $data;

        }catch(\Exception $e){
            $respMsg = "Users Listing Failed";
            $respCode = 400;
            $respData = $data;

        }
        return array($respMsg,$respCode,$respData);
    }

    public function handleLogedInUserView()
    {
        try{

            $data['allData'] = Auth::user();

            $data['paths'] = array();
            array_push( $data['paths'] , array("image_path" => "public/upload/user_images/"));

            $respMsg = "Loged in users Succesfully Listed!";
            $respCode = 200;
            $respData = $data;

        }catch(\Exception $e){
            $respMsg = "Loged in users Listing Failed";
            $respCode = 400;
            $respData = $data;

        }
        return array($respMsg,$respCode,$respData);
    }

    public function handleUserStore(UserStoreRequest $request,$userType)
    {

        try {
                // Will return only validated data
                $request->validated();

                $data = new User();
                $data->usertype = $userType;
                $data->role = $userType;
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

    public function handleUserLogout(UserLogoutRequest $request)
    {
        try
        {
            $userId=Auth::user()->id;
            $bearerToken = $request->bearerToken();
            $loginAccessToken = LoginHistory::where('user_id',"=",$userId)->where('access_token',"=",$bearerToken);
            $loginAccessToken->delete();
            $request->user()->currentAccessToken()->delete();

            $respMsg = "User Succesfully Logout!";
            $respCode = 200;
        }
        catch(\Exception $e)
        {
            $respMsg = "User Logout Failed!";
            $respCode = 400;
        }
        return array($respMsg,$respCode);
    }



    public function handleUserEdit($id)
    {
        try{
            $editData = User::find($id);

            $respMsg = "Edit Succesfully Done!";
            $respCode = 200;
            $respData = $editData;

        }catch(\Exception $e){
            $respMsg = "Editing Failed";
            $respCode = 400;
            $respData = $editData;

        }
        return array($respMsg,$respCode,$respData);
    }

    public function handleUserUpdate(UserStoreRequest $request,$id)
    {
        try {
                // Will return only validated data
                $request->validated();

                $data = User::find($id);
                $data->role = $request->role;
                $data->name = $request->name;
                $data->email = $request->email;
                $data->save();


                $respMsg = "User Succesfully Updated!";
                $respCode = 200;
                $respData = $data;
                $respType = 'info';
            }catch(\Exception $e){

                $respMsg = "User Updation Failed";
                $respCode = 400;
                $respData = $data;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }


    public function handleUserDelete($id)
    {
        try{

            User::find($id)->delete();

            $respMsg = "User Succesfully Deleted!";
            $respCode = 200;
            $respType = 'info';
            $respData = NULL;

        }catch(\Exception $e){
            $respMsg = "User Deletion Failed";
            $respCode = 400;
            $respType = 'danger';
            $respData = NULL;

        }
        return array($respMsg,$respCode,$respType,$respData);
    }

    public function handleUserRestore($id)
    {
        try{
            User::withTrashed()->find($id)->restore();

            $respMsg = "User Succesfully Restored!";
            $respCode = 200;
            $respType = 'info';

        }catch(\Exception $e){
            $respMsg = "User Restoration Failed";
            $respCode = 400;
            $respType = 'danger';

        }
        return array($respMsg,$respCode,$respType);
    }

    public function handleUserTrashView()
    {
        try{
            $data['allData'] = User::onlyTrashed()->get();

            $respMsg = "User Trash Succesfully Viewed!";
            $respCode = 200;
            $respData = $data;

        }catch(\Exception $e){
            $respMsg = "User View Failed";
            $respCode = 400;
            $respData = $data;

        }
        return array($respMsg,$respCode,$respData);
    }

    public function handleUserForceDelete($id)
    {
        try{
            User::withTrashed()->find($id)->forceDelete();

            $respMsg = "User Deleted Permanently!";
            $respCode = 200;
            $respType = 'info';

        }catch(\Exception $e){
            $respMsg = "User Deletion Failed";
            $respCode = 400;
            $respType = 'danger';
        }
        return array($respMsg,$respCode,$respType);
    }



}

?>
