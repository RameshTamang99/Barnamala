<?php
namespace App\Repository;
use App\Http\Requests\LoginScreenUiStoreRequest;
use App\Models\LoginScreenUi;
use Exception;
use Illuminate\Support\Facades\File;

class LoginScreenUiRepository {

    private $fileUploader;

    public function __construct()
    {
        $this->fileUploader = new FileUploadRepository;
    }

    public function handleLoginScreenUiView()
    {
        try{

            $data['allData'] = LoginScreenUi::all();
            $data['paths'] = array();
            array_push( $data['paths'] , array("image_path" => "public/uploads/login_screen_ui_image/"));
            $error = "No Image";

            $respMsg = "Login Screen Ui Succesfully Viewed";
            $respCode = 200;
            $respData = $data;


        }catch(\Exception $e){

            $respMsg = "Login Screen Ui Viewing Failed";
            $respCode = 400;
            $respData = $data;
        }
        return array($respMsg,$respCode, $respData,$error);

    }

    public function handleLoginScreenUiEdit($id)
    {
        try{
            $editData = LoginScreenUi::find($id);
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

    public function handleLoginScreenUiUpdate(LoginScreenUiStoreRequest $request,$id)
    {

        try {
                // Will return only validated data
                $request->validated();

                $LoginScreenUiUp = LoginScreenUi::find($id);

                if ($request->hasFile('background_image')) {
                    File::delete('public/uploads/login_screen_ui_image/'.$LoginScreenUiUp->background_image);

                    $fileName = $this->fileUploader->handleFileUpload('login_screen_ui_image',$request->file('background_image'));
                    $LoginScreenUiUp->background_image = $fileName;

                }

                if ($request->hasFile('header_text_image')) {
                    File::delete('public/uploads/login_screen_ui_image/'.$LoginScreenUiUp->header_text_image);

                    $fileName = $this->fileUploader->handleFileUpload('login_screen_ui_image',$request->file('header_text_image'));
                    $LoginScreenUiUp->header_text_image = $fileName;

                }
                if ($request->hasFile('login_button_image')) {
                    File::delete('public/uploads/login_screen_ui_image/'.$LoginScreenUiUp->login_button_image);

                    $fileName = $this->fileUploader->handleFileUpload('login_screen_ui_image',$request->file('login_button_image'));
                    $LoginScreenUiUp->login_button_image = $fileName;

                }
                if ($request->hasFile('fb_button_image')) {
                    File::delete('public/uploads/login_screen_ui_image/'.$LoginScreenUiUp->fb_button_image);

                    $fileName = $this->fileUploader->handleFileUpload('login_screen_ui_image',$request->file('fb_button_image'));
                    $LoginScreenUiUp->fb_button_image = $fileName;

                }
                if ($request->hasFile('google_button_image')) {
                    File::delete('public/uploads/login_screen_ui_image/'.$LoginScreenUiUp->google_button_image);

                    $fileName = $this->fileUploader->handleFileUpload('login_screen_ui_image',$request->file('google_button_image'));
                    $LoginScreenUiUp->google_button_image = $fileName;

                }
                if ($request->hasFile('password_forget_button_image')) {
                    File::delete('public/uploads/login_screen_ui_image/'.$LoginScreenUiUp->password_forget_button_image);

                    $fileName = $this->fileUploader->handleFileUpload('login_screen_ui_image',$request->file('password_forget_button_image'));
                    $LoginScreenUiUp->password_forget_button_image = $fileName;

                }
                if ($request->hasFile('new_account_button_image')) {
                    File::delete('public/uploads/login_screen_ui_image/'.$LoginScreenUiUp->new_account_button_image);

                    $fileName = $this->fileUploader->handleFileUpload('login_screen_ui_image',$request->file('new_account_button_image'));
                    $LoginScreenUiUp->new_account_button_image = $fileName;

                }
                $LoginScreenUiUp->save();

                $respMsg = "login Screen Ui Succesfully Updated!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';
            }catch(\Exception $e){

                $respMsg = "login Screen Ui  Updation Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }
}

?>
