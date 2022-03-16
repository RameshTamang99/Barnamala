<?php
namespace App\Repository;
use App\Http\Requests\QuizMenuUiStoreRequest;
use App\Models\QuizMenuUi;
use Exception;
use Illuminate\Support\Facades\File;

class QuizMenuUiRepository {

    private $fileUploader;

    public function __construct()
    {
        $this->fileUploader = new FileUploadRepository;
    }

    public function handleQuizMenuUiView()
    {
        try{

            $data['allData'] = QuizMenuUi::all();
            $data['paths'] = array();
            array_push( $data['paths'] , array("image_path" => "public/uploads/quiz_menu_ui_image/"));
            $error = "No Image";

            $respMsg = "Quiz Menu Ui Succesfully Viewed";
            $respCode = 200;
            $respData = $data;


        }catch(\Exception $e){

            $respMsg = "Quiz Menu Ui Viewing Failed";
            $respCode = 400;
            $respData = $data;
        }
        return array($respMsg,$respCode, $respData,$error);

    }

    public function handleQuizMenuUiEdit($id)
    {
        try{
            $editData = QuizMenuUi::find($id);
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

    public function handleQuizMenuUiUpdate(QuizMenuUiStoreRequest $request,$id)
    {

        try {
                // Will return only validated data
                $request->validated();

                $QuizMenuUiUp = QuizMenuUi::find($id);

                if ($request->hasFile('background_image')) {
                    File::delete('public/uploads/quiz_menu_ui_image/'.$QuizMenuUiUp->background_image);

                    $fileName = $this->fileUploader->handleFileUpload('quiz_menu_ui_image',$request->file('background_image'));
                    $QuizMenuUiUp->background_image = $fileName;

                }

                if ($request->hasFile('back_button_image')) {
                    File::delete('public/uploads/quiz_menu_ui_image/'.$QuizMenuUiUp->back_button_image);

                    $fileName = $this->fileUploader->handleFileUpload('quiz_menu_ui_image',$request->file('back_button_image'));
                    $QuizMenuUiUp->back_button_image = $fileName;

                }
                if ($request->hasFile('quiz_menu_selector_image')) {
                    File::delete('public/uploads/quiz_menu_ui_image/'.$QuizMenuUiUp->quiz_menu_selector_image);

                    $fileName = $this->fileUploader->handleFileUpload('quiz_menu_ui_image',$request->file('quiz_menu_selector_image'));
                    $QuizMenuUiUp->quiz_menu_selector_image = $fileName;

                }
                $QuizMenuUiUp->save();

                $respMsg = "Quiz Menu Ui Succesfully Updated!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';
            }catch(\Exception $e){

                $respMsg = "Quiz Menu Ui  Updation Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }
}

?>
