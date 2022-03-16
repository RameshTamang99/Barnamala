<?php
namespace App\Repository;
use App\Http\Requests\QuizLevelUiStoreRequest;
use App\Models\QuizLevelUi;
use Exception;
use Illuminate\Support\Facades\File;

class QuizLevelUiRepository {

    private $fileUploader;

    public function __construct()
    {
        $this->fileUploader = new FileUploadRepository;
    }

    public function handleQuizLevelUiView()
    {
        try{

            $data['allData'] = QuizLevelUi::all();
            $data['paths'] = array();
            array_push( $data['paths'] , array("image_path" => "public/uploads/quiz_level_ui_image/"));
            $error = "No Image";

            $respMsg = "Quiz Level Ui Succesfully Viewed";
            $respCode = 200;
            $respData = $data;


        }catch(\Exception $e){

            $respMsg = "Quiz Level Ui Viewing Failed";
            $respCode = 400;
            $respData = $data;
        }
        return array($respMsg,$respCode, $respData, $error);

    }

    public function handleQuizLevelUiEdit($id)
    {
        try{
            $editData = QuizLevelUi::find($id);
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

    public function handleQuizLevelUiUpdate(QuizLevelUiStoreRequest $request,$id)
    {

        try {
                // Will return only validated data
                $request->validated();

                $QuizLevelUiUp = QuizLevelUi::find($id);

                if ($request->hasFile('background_image')) {
                    File::delete('public/uploads/quiz_level_ui_image/'.$QuizLevelUiUp->background_image);

                    $fileName = $this->fileUploader->handleFileUpload('quiz_level_ui_image',$request->file('background_image'));
                    $QuizLevelUiUp->background_image = $fileName;

                }

                if ($request->hasFile('back_button_image')) {
                    File::delete('public/uploads/quiz_level_ui_image/'.$QuizLevelUiUp->back_button_image);

                    $fileName = $this->fileUploader->handleFileUpload('quiz_level_ui_image',$request->file('back_button_image'));
                    $QuizLevelUiUp->back_button_image = $fileName;

                }
                if ($request->hasFile('sajilo_level_button_image')) {
                    File::delete('public/uploads/quiz_level_ui_image/'.$QuizLevelUiUp->sajilo_level_button_image);

                    $fileName = $this->fileUploader->handleFileUpload('quiz_level_ui_image',$request->file('sajilo_level_button_image'));
                    $QuizLevelUiUp->sajilo_level_button_image = $fileName;

                }
                if ($request->hasFile('madhyama_level_button_image')) {
                    File::delete('public/uploads/quiz_level_ui_image/'.$QuizLevelUiUp->madhyama_level_button_image);

                    $fileName = $this->fileUploader->handleFileUpload('quiz_level_ui_image',$request->file('madhyama_level_button_image'));
                    $QuizLevelUiUp->madhyama_level_button_image = $fileName;

                }
                if ($request->hasFile('gaaro_level_button_image')) {
                    File::delete('public/uploads/quiz_level_ui_image/'.$QuizLevelUiUp->gaaro_level_button_image);

                    $fileName = $this->fileUploader->handleFileUpload('quiz_level_ui_image',$request->file('gaaro_level_button_image'));
                    $QuizLevelUiUp->gaaro_level_button_image = $fileName;

                }
                if ($request->hasFile('avatar_image')) {
                    File::delete('public/uploads/quiz_level_ui_image/'.$QuizLevelUiUp->avatar_image);

                    $fileName = $this->fileUploader->handleFileUpload('quiz_level_ui_image',$request->file('avatar_image'));
                    $QuizLevelUiUp->avatar_image = $fileName;

                }
                $QuizLevelUiUp->save();

                $respMsg = "Quiz Level Ui Succesfully Updated!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';
            }catch(\Exception $e){

                $respMsg = "Quiz Level Ui  Updation Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }
}

?>
