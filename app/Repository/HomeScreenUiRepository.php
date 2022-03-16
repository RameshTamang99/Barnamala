<?php
namespace App\Repository;
use App\Http\Requests\HomeScreenUiStoreRequest;
use App\Models\HomeScreenUi;
use Exception;
use Illuminate\Support\Facades\File;
use App\Models\Settings;
use App\Models\JinglesUi;

class HomeScreenUiRepository {

    private $fileUploader;

    public function __construct()
    {
        $this->fileUploader = new FileUploadRepository;
    }

    public function handleHomeScreenUiView()
    {
        try{

            $data['allData'] = HomeScreenUi::all();
            $data['paths'] = array();
            array_push( $data['paths'] , array("image_path" => "public/uploads/home_screen_ui_image/"));

            $error = "No Image";

            $respMsg = "Home Screen Ui Succesfully Viewed";
            $respCode = 200;
            $respData = $data;


        }catch(\Exception $e){

            $respMsg = "Home Screen Ui Viewing Failed";
            $respCode = 400;
            $respData = $data;
        }
        return array($respMsg,$respCode, $respData,$error);

    }

    public function handleHomeScreenUiViewCombined()
    {
        try{

            $data['allDataHomeScreen'] = HomeScreenUi::all();
            $data['pathsHomeScreen'] = array();
            array_push( $data['pathsHomeScreen'] , array("image_path" => "public/uploads/home_screen_ui_image/"));

            $data['allDataSettings'] = Settings::all();
     
            $data['allDatajingles'] = JinglesUi::all();
            $data['pathsjingles'] = array();
            array_push( $data['pathsjingles'] , array("audio_path" => "public/uploads/jingles_ui_audio/"));



            $error = "No Image";

            $respMsg = "Home Screen Ui Succesfully Viewed";
            $respCode = 200;
            $respData = $data;


        }catch(\Exception $e){

            $respMsg = "Home Screen Ui Viewing Failed";
            $respCode = 400;
            $respData = $data;
        }
        return $data;

    }


    public function handleHomeScreenUiEdit($id)
    {
        try{
            $editData = HomeScreenUi::find($id);
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

    public function handleHomeScreenUiUpdate(HomeScreenUiStoreRequest $request,$id)
    {

        try {
                // Will return only validated data
                $request->validated();

                $HomeScreenUiUp = HomeScreenUi::find($id);

                if ($request->hasFile('background_image')) {
                    File::delete('public/uploads/home_screen_ui_image/'.$HomeScreenUiUp->background_image);

                    $fileName = $this->fileUploader->handleFileUpload('home_screen_ui_image',$request->file('background_image'));
                    $HomeScreenUiUp->background_image = $fileName;

                }

                if ($request->hasFile('quiz_icon_image')) {
                    File::delete('public/uploads/home_screen_ui_image/'.$HomeScreenUiUp->quiz_icon_image);

                    $fileName = $this->fileUploader->handleFileUpload('home_screen_ui_image',$request->file('quiz_icon_image'));
                    $HomeScreenUiUp->quiz_icon_image = $fileName;

                }
                if ($request->hasFile('literature_icon_image')) {
                    File::delete('public/uploads/home_screen_ui_image/'.$HomeScreenUiUp->literature_icon_image);

                    $fileName = $this->fileUploader->handleFileUpload('home_screen_ui_image',$request->file('literature_icon_image'));
                    $HomeScreenUiUp->literature_icon_image = $fileName;

                }
                if ($request->hasFile('barnamaala_icon_image')) {
                    File::delete('public/uploads/home_screen_ui_image/'.$HomeScreenUiUp->barnamaala_icon_image);

                    $fileName = $this->fileUploader->handleFileUpload('home_screen_ui_image',$request->file('barnamaala_icon_image'));
                    $HomeScreenUiUp->barnamaala_icon_image = $fileName;

                }
                if ($request->hasFile('informatives_icon_image')) {
                    File::delete('public/uploads/home_screen_ui_image/'.$HomeScreenUiUp->informatives_icon_image);

                    $fileName = $this->fileUploader->handleFileUpload('home_screen_ui_image',$request->file('informatives_icon_image'));
                    $HomeScreenUiUp->informatives_icon_image = $fileName;

                }
                if ($request->hasFile('profile_icon_image')) {
                    File::delete('public/uploads/home_screen_ui_image/'.$HomeScreenUiUp->profile_icon_image);

                    $fileName = $this->fileUploader->handleFileUpload('home_screen_ui_image',$request->file('profile_icon_image'));
                    $HomeScreenUiUp->profile_icon_image = $fileName;

                }
                if ($request->hasFile('sound_on_icon_image')) {
                    File::delete('public/uploads/home_screen_ui_image/'.$HomeScreenUiUp->sound_on_icon_image);

                    $fileName = $this->fileUploader->handleFileUpload('home_screen_ui_image',$request->file('sound_on_icon_image'));
                    $HomeScreenUiUp->sound_on_icon_image = $fileName;

                }
                if ($request->hasFile('sound_off_icon_image')) {
                    File::delete('public/uploads/home_screen_ui_image/'.$HomeScreenUiUp->sound_off_icon_image);

                    $fileName = $this->fileUploader->handleFileUpload('home_screen_ui_image',$request->file('sound_off_icon_image'));
                    $HomeScreenUiUp->sound_off_icon_image = $fileName;

                }
                if ($request->hasFile('close_icon_image')) {
                    File::delete('public/uploads/home_screen_ui_image/'.$HomeScreenUiUp->close_icon_image);

                    $fileName = $this->fileUploader->handleFileUpload('home_screen_ui_image',$request->file('close_icon_image'));
                    $HomeScreenUiUp->close_icon_image = $fileName;

                }
                if ($request->hasFile('close_model_image')) {
                    File::delete('public/uploads/home_screen_ui_image/'.$HomeScreenUiUp->close_model_image);

                    $fileName = $this->fileUploader->handleFileUpload('home_screen_ui_image',$request->file('close_model_image'));
                    $HomeScreenUiUp->close_model_image = $fileName;

                }
                if ($request->hasFile('close_button_image')) {
                    File::delete('public/uploads/home_screen_ui_image/'.$HomeScreenUiUp->close_button_image);

                    $fileName = $this->fileUploader->handleFileUpload('home_screen_ui_image',$request->file('close_button_image'));
                    $HomeScreenUiUp->close_button_image = $fileName;

                }
                if ($request->hasFile('dont_close_button_image')) {
                    File::delete('public/uploads/home_screen_ui_image/'.$HomeScreenUiUp->dont_close_button_image);

                    $fileName = $this->fileUploader->handleFileUpload('home_screen_ui_image',$request->file('dont_close_button_image'));
                    $HomeScreenUiUp->dont_close_button_image = $fileName;

                }

                $HomeScreenUiUp->save();

                $respMsg = "Home Screen Ui Succesfully Updated!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';
            }catch(\Exception $e){

                $respMsg = "Home Screen Ui  Updation Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }
}

?>
