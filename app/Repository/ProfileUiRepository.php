<?php
namespace App\Repository;
use App\Http\Requests\ProfileUiStoreRequest;
use App\Models\ProfileUi;
use Exception;
use Illuminate\Support\Facades\File;

class ProfileUiRepository {

    private $fileUploader;

    public function __construct()
    {
        $this->fileUploader = new FileUploadRepository;
    }

    public function handleProfileUiView()
    {
        try{

            $data['allData'] = ProfileUi::all();
            $data['paths'] = array();
            array_push( $data['paths'] , array("image_path" => "public/uploads/profile_ui_image/"));

            $error = "No Image";

            $respMsg = "Profile Ui Succesfully Viewed";
            $respCode = 200;
            $respData = $data;


        }catch(\Exception $e){

            $respMsg = "Profile Ui Viewing Failed";
            $respCode = 400;
            $respData = $data;
        }
        return array($respMsg,$respCode, $respData, $error);

    }


    public function handleProfileUiEdit($id)
    {
        try{
            $editData = ProfileUi::find($id);
            $error = "No Image";

            $respMsg = "Edit Succesfully Done!";
            $respCode = 200;
            $respData = $editData;

        }catch(\Exception $e){
            $respMsg = "Editing Failed";
            $respCode = 400;
            $respData = $editData;

        }
        return array($respMsg,$respCode,$respData,$error);
    }

    public function handleProfileUiUpdate(ProfileUiStoreRequest $request,$id)
    {

        try {
                // Will return only validated data
                $request->validated();

                $profileUiUp = ProfileUi::find($id);

                if ($request->hasFile('background_image')) {
                    File::delete('public/uploads/profile_ui_image/'.$profileUiUp->background_image);

                    $fileName = $this->fileUploader->handleFileUpload('profile_ui_image',$request->file('background_image'));
                    $profileUiUp->background_image = $fileName;

                }
                if ($request->hasFile('back_button_image')) {
                    File::delete('public/uploads/profile_ui_image/'.$profileUiUp->back_button_image);

                    $fileName = $this->fileUploader->handleFileUpload('profile_ui_image',$request->file('back_button_image'));
                    $profileUiUp->back_button_image = $fileName;

                }
                if ($request->hasFile('logout_button_image')) {
                    File::delete('public/uploads/profile_ui_image/'.$profileUiUp->logout_button_image);

                    $fileName = $this->fileUploader->handleFileUpload('profile_ui_image',$request->file('logout_button_image'));
                    $profileUiUp->logout_button_image = $fileName;

                }
                $profileUiUp->save();

                $respMsg = "Profile Ui Succesfully Updated!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';
            }catch(\Exception $e){

                $respMsg = "Profile Ui  Updation Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }
}

?>
