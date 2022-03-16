<?php
namespace App\Repository;
use App\Http\Requests\QuizQuestionUiStoreRequest;
use App\Models\QuizQuestionUi;
use Exception;
use Illuminate\Support\Facades\File;

class QuizQuestionUiRepository {

    private $fileUploader;

    public function __construct()
    {
        $this->fileUploader = new FileUploadRepository;
    }

    public function handleQuizQuestionUiView()
    {
        try{

            $data['allData'] = QuizQuestionUi::all();
            $data['paths'] = array();
            array_push( $data['paths'] , array("image_path" => "public/uploads/quiz_question_ui_image/"));
            $error = "No Image";

            $respMsg = "Quiz Question Ui Succesfully Viewed";
            $respCode = 200;
            $respData = $data;


        }catch(\Exception $e){

            $respMsg = "Quiz Question Ui Viewing Failed";
            $respCode = 400;
            $respData = $data;
        }
        return array($respMsg,$respCode, $respData, $error);

    }

    public function handleQuizQuestionUiEdit($id)
    {
        try{
            $editData = QuizQuestionUi::find($id);
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

    public function handleQuizQuestionUiUpdate(QuizQuestionUiStoreRequest $request,$id)
    {

        try {
                // Will return only validated data
                $request->validated();

                $QuizQuestionUiUp = QuizQuestionUi::find($id);

                if ($request->hasFile('background_image')) {
                    File::delete('public/uploads/quiz_question_ui_image/'.$QuizQuestionUiUp->background_image);

                    $fileName = $this->fileUploader->handleFileUpload('quiz_question_ui_image',$request->file('background_image'));
                    $QuizQuestionUiUp->background_image = $fileName;

                }

                if ($request->hasFile('header_image')) {
                    File::delete('public/uploads/quiz_question_ui_image/'.$QuizQuestionUiUp->header_image);

                    $fileName = $this->fileUploader->handleFileUpload('quiz_question_ui_image',$request->file('header_image'));
                    $QuizQuestionUiUp->header_image = $fileName;

                }
                if ($request->hasFile('score_card_image')) {
                    File::delete('public/uploads/quiz_question_ui_image/'.$QuizQuestionUiUp->score_card_image);

                    $fileName = $this->fileUploader->handleFileUpload('quiz_question_ui_image',$request->file('score_card_image'));
                    $QuizQuestionUiUp->score_card_image = $fileName;

                }
                if ($request->hasFile('time_card_image')) {
                    File::delete('public/uploads/quiz_question_ui_image/'.$QuizQuestionUiUp->time_card_image);

                    $fileName = $this->fileUploader->handleFileUpload('quiz_question_ui_image',$request->file('time_card_image'));
                    $QuizQuestionUiUp->time_card_image = $fileName;

                }
                if ($request->hasFile('question_card_image')) {
                    File::delete('public/uploads/quiz_question_ui_image/'.$QuizQuestionUiUp->question_card_image);

                    $fileName = $this->fileUploader->handleFileUpload('quiz_question_ui_image',$request->file('question_card_image'));
                    $QuizQuestionUiUp->question_card_image = $fileName;

                }
                if ($request->hasFile('answer_card_image')) {
                    File::delete('public/uploads/quiz_question_ui_image/'.$QuizQuestionUiUp->answer_card_image);

                    $fileName = $this->fileUploader->handleFileUpload('quiz_question_ui_image',$request->file('answer_card_image'));
                    $QuizQuestionUiUp->answer_card_image = $fileName;

                }
                if ($request->hasFile('plus_one_image')) {
                    File::delete('public/uploads/quiz_question_ui_image/'.$QuizQuestionUiUp->plus_one_image);

                    $fileName = $this->fileUploader->handleFileUpload('quiz_question_ui_image',$request->file('plus_one_image'));
                    $QuizQuestionUiUp->plus_one_image = $fileName;

                }
                if ($request->hasFile('winner_model_image')) {
                    File::delete('public/uploads/quiz_question_ui_image/'.$QuizQuestionUiUp->winner_model_image);

                    $fileName = $this->fileUploader->handleFileUpload('quiz_question_ui_image',$request->file('winner_model_image'));
                    $QuizQuestionUiUp->winner_model_image = $fileName;

                }
                if ($request->hasFile('lost_model_image')) {
                    File::delete('public/uploads/quiz_question_ui_image/'.$QuizQuestionUiUp->lost_model_image);

                    $fileName = $this->fileUploader->handleFileUpload('quiz_question_ui_image',$request->file('lost_model_image'));
                    $QuizQuestionUiUp->lost_model_image = $fileName;

                }
                if ($request->hasFile('play_again_button_image')) {
                    File::delete('public/uploads/quiz_question_ui_image/'.$QuizQuestionUiUp->play_again_button_image);

                    $fileName = $this->fileUploader->handleFileUpload('quiz_question_ui_image',$request->file('play_again_button_image'));
                    $QuizQuestionUiUp->play_again_button_image = $fileName;

                }
                if ($request->hasFile('go_to_home_button_image')) {
                    File::delete('public/uploads/quiz_question_ui_image/'.$QuizQuestionUiUp->go_to_home_button_image);

                    $fileName = $this->fileUploader->handleFileUpload('quiz_question_ui_image',$request->file('go_to_home_button_image'));
                    $QuizQuestionUiUp->go_to_home_button_image = $fileName;

                }

                $QuizQuestionUiUp->save();

                $respMsg = "Quiz Question Ui Succesfully Updated!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';
            }catch(\Exception $e){

                $respMsg = "Quiz Question Ui  Updation Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }
}

?>
