<?php
namespace App\Repository;


use App\Models\Quiz;
use App\Models\QuizCategory;
use Illuminate\Http\Request;
use Exception;
use App\Http\Requests\QuizStoreRequest;
use App\Models\QuizLevelUi;
use App\Models\QuizSettings;
use App\Models\QuizQuestionUi;

class QuizRepository {


    public function handleQuizStore(QuizStoreRequest $request)
    {

        try {
                // Will return only validated data
                $request->validated();

                $quizn = new Quiz;
                $quizn->quiz_cat_code = $request->quiz_cat_code;
                $quizn->question_level = $request->question_level;
                $quizn->question = $request->question;
                $quizn->option_1 = $request->option_1;
                $quizn->option_2 = $request->option_2;
                $quizn->option_3 = $request->option_3;
                $quizn->option_4 = $request->option_4;
                $quizn->right_option = $request->right_option;

                $max_order = Quiz::where('quiz_cat_code',"=",$quizn->quiz_cat_code)->where('question_level',"=",$quizn->question_level)->max('quiz_order');
                if($max_order == null)
                {
                    $max_order = 1;
                }
                else{
                    $max_order++;
                }

                $quizn->quiz_order = $max_order;
                $quizn->save();

                $respMsg = "Quiz Succesfully Added!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';

            }catch(\Exception $e){

                $respMsg = "Quiz Adding Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }

    // public function handleQuizEdit($id)
    // {
    //     try{
    //         $data['allData'] = QuizCategory::all();
    //         $editData = quiz::find($id);
    //         $quizCatCode = $editData->quiz_cat_code;


    //         $respMsg = "Edit Succesfully Done!";
    //         $respCode = 200;
    //         $respData1 = $data;
    //         $respData2 = $editData;
    //         $respCatCode = $quizCatCode;

    //     }catch(\Exception $e){
    //         $respMsg = "Editing Failed";
    //         $respCode = 400;
    //         $respData1 = $data;
    //         $respData2 = $editData;
    //         $respCatCode = $quizCatCode;

    //     }
    //     return array($respMsg,$respCode,$respData1,$respData2,$respCatCode);
    // }

    public function handleQuestionsEdit($id)
    {
        try{
            $data['allData'] = QuizCategory::all();
            $editData = quiz::find($id);
            $quizCatCode = $editData->quiz_cat_code;
            $quizQuestionLevel = $editData->question_level;


            $respMsg = "Edit Succesfully Done!";
            $respCode = 200;
            $respData1 = $data;
            $respData2 = $editData;
            $respCatCode = $quizCatCode;
            $respQuestionLevel = $quizQuestionLevel;

        }catch(\Exception $e){
            $respMsg = "Editing Failed";
            $respCode = 400;
            $respData1 = $data;
            $respData2 = $editData;
            $respCatCode = $quizCatCode;
            $respQuestionLevel = $quizQuestionLevel;

        }
        return array($respMsg,$respCode,$respData1,$respData2, $respCatCode,$respQuestionLevel);
    }



    public function handleQuizUpdate(QuizStoreRequest $request,$id)
    {

        try {
                // Will return only validated data
                $request->validated();

                $quizUp = Quiz::find($id);
                $code = $request->quiz_cat_code;
                $quizUp->quiz_cat_code = $code;
                $quizUp->question = $request->question;
                $quizUp->option_1 = $request->option_1;
                $quizUp->option_2 = $request->option_2;
                $quizUp->option_3 = $request->option_3;
                $quizUp->option_4 = $request->option_4;
                $quizUp->right_option = $request->right_option;
                $quizUp->question_level = $request->question_level;
                $quizUp -> save();

                $respMsg = "Quiz Succesfully Updated!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';
                $respCatCode = $code;

            }catch(\Exception $e){

                $respMsg = "Quiz Updation Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
                $respCatCode = $code;

            }
        return array($respMsg,$respCode,$respData,$respType,$respCatCode);
    }


    public function handleQuizDelete($id)
    {
        try{
            Quiz::find($id)->delete();

            $respMsg = "Quiz Succesfully Deleted!";
            $respCode = 200;
            $respType = 'info';

        }catch(\Exception $e){
            $respMsg = "Quiz Deletion Failed";
            $respCode = 400;
            $respType = 'danger';

        }
        return array($respMsg,$respCode,$respType);
    }

    public function handleCombineQuizUiView($quiz_cat_code)
    {
        try{

            $data['allData'] = QuizLevelUi::all();
            $data['paths'] = array();
            array_push( $data['paths'] , array("image_path" => "public/uploads/quiz_level_ui_image/"));


            $datas['allData'] = QuizSettings::first();

            $sajiloData['allData'] = Quiz::orderBy('quiz_order','ASC')->where('quiz_cat_code',"=",$quiz_cat_code)->where('question_level',"=",'sajilo')->get();
            $madhyamaData['allData'] = Quiz::orderBy('quiz_order','ASC')->where('quiz_cat_code',"=",$quiz_cat_code)->where('question_level',"=",'madhyama')->get();
            $gaaroData['allData'] = Quiz::orderBy('quiz_order','ASC')->where('quiz_cat_code',"=",$quiz_cat_code)->where('question_level',"=",'gaaro')->get();

            $uiDatas['quizDesignLists'] = QuizQuestionUi::all();
            $uiDatas['quizDesignPaths'] = array();
            array_push( $uiDatas['quizDesignPaths'] , array("image_path" => "public/uploads/quiz_question_ui_image/"));

            $respMsg = "Combined Quiz View Succesfully Listed!";
            $respCode = 200;
            $respData = $data;
            $respDesignData = $datas;
            $respSajiloData = $sajiloData;
            $respMadhyamaData = $madhyamaData;
            $respGaaroData = $gaaroData;
            $respUiDatas = $uiDatas ;

        }catch(\Exception $e){
            $respMsg = "Combined Quiz View Listing Failed";
            $respCode = 400;
            $respData = $data;
            $respDesignData = $datas;
            $respSajiloData = $sajiloData;
            $respMadhyamaData = $madhyamaData;
            $respGaaroData = $gaaroData;
        }
        return array($respMsg,$respCode,$respData,$respDesignData,$respSajiloData,$respMadhyamaData,$respGaaroData,$respUiDatas);
    }
}

?>
