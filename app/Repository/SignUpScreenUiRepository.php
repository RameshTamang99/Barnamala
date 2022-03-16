<?php
namespace App\Repository;
use App\Http\Requests\SignUpScreenUiStoreRequest;
use App\Models\SignUpScreenUi;
use Exception;
use Illuminate\Support\Facades\File;

class SignUpScreenUiRepository {

    private $fileUploader;

    public function __construct()
    {
        $this->fileUploader = new FileUploadRepository;
    }

    public function handleSignUpScreenUiView()
    {
        try{

            $data['allData'] = SignUpScreenUi::all();
            $error = "No Image";

            $data['paths'] = array();
            array_push( $data['paths'] , array("image_path" => "public/uploads/sign_up_screen_ui_image/"));

            $respMsg = "Sign Up Screen Ui Succesfully Viewed";
            $respCode = 200;
            $respData = $data;


        }catch(\Exception $e){

            $respMsg = "Sign Up Screen Ui Viewing Failed";
            $respCode = 400;
            $respData = $data;
        }
        return array($respMsg,$respCode, $respData, $error);

    }

    public function handleSignUpScreenUiEdit($id)
    {
        try{
            $editData = SignUpScreenUi::find($id);
            $error  = "No Image";

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

    public function handleSignUpScreenUiUpdate(SignUpScreenUiStoreRequest $request,$id)
    {

        try {
                // Will return only validated data
                $request->validated();

                $SignUpScreenUiUp = SignUpScreenUi::find($id);

                if ($request->hasFile('background_image')) {
                    File::delete('public/uploads/sign_up_screen_ui_image/'.$SignUpScreenUiUp->background_image);

                    $fileName = $this->fileUploader->handleFileUpload('sign_up_screen_ui_image',$request->file('background_image'));
                    $SignUpScreenUiUp->background_image = $fileName;

                }

                if ($request->hasFile('header_text_image')) {
                    File::delete('public/uploads/sign_up_screen_ui_image/'.$SignUpScreenUiUp->header_text_image);

                    $fileName = $this->fileUploader->handleFileUpload('sign_up_screen_ui_image',$request->file('header_text_image'));
                    $SignUpScreenUiUp->header_text_image = $fileName;

                }
                if ($request->hasFile('sign_up_button_image')) {
                    File::delete('public/uploads/sign_up_screen_ui_image/'.$SignUpScreenUiUp->sign_up_button_image);

                    $fileName = $this->fileUploader->handleFileUpload('sign_up_screen_ui_image',$request->file('sign_up_button_image'));
                    $SignUpScreenUiUp->sign_up_button_image = $fileName;

                }
                if ($request->hasFile('login_button_image')) {
                    File::delete('public/uploads/sign_up_screen_ui_image/'.$SignUpScreenUiUp->login_button_image);

                    $fileName = $this->fileUploader->handleFileUpload('sign_up_screen_ui_image',$request->file('login_button_image'));
                    $SignUpScreenUiUp->login_button_image = $fileName;

                }
                $SignUpScreenUiUp->save();

                $respMsg = "Sign Up Screen Ui Succesfully Updated!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';
            }catch(\Exception $e){

                $respMsg = "Sign Up Screen Ui  Updation Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }
}

?>
