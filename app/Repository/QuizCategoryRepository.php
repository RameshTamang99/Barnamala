<?php
namespace App\Repository;

use App\Models\QuizCategory;
use Illuminate\Http\Request;
use Exception;
use App\Helpers\Helper;
use App\Http\Requests\QuizCategoryStoreRequest;
use App\Http\Requests\QuizStoreRequest;
use App\Models\Quiz;
use App\Models\QuizMenuUi;
use App\Models\QuizQuestionUi;
use App\Models\QuizSettings;
use Illuminate\Support\Facades\File;

class QuizCategoryRepository {

    private $fileUploader;

    public function __construct()
    {
        $this->fileUploader = new FileUploadRepository;
    }


    public function handleQuizView($quiz_cat_code,$question_level)
    {
        try{

            $data['allData'] = Quiz::orderBy('quiz_order','ASC')->where('quiz_cat_code',"=",$quiz_cat_code)->where('question_level',"=",$question_level)->get();

            $datas['quizDesignLists'] = QuizQuestionUi::all();
            $datas['quizDesignPaths'] = array();
            array_push( $datas['quizDesignPaths'] , array("image_path" => "public/uploads/quiz_question_ui_image/"));

            $respMsg =  $question_level." Questions Succesfully Viewed";
            $respCode = 200;
            $respData = $data;
            $respDesignData = $datas;

        }catch(\Exception $e){

            $respMsg = $question_level." Questions Viewing Failed";
            $respCode = 400;
            $respData = $data;
            $respDesignData = $datas;
        }
        return array($respMsg,$respCode, $respData, $respDesignData);

    }

    public function handleQuizCategoryView()
    {
        try{
            $data['allData'] = QuizCategory::orderBy('quiz_cat_order','ASC')->get();

            $datas['quizDesignAllData'] = QuizMenuUi::all();

            $editData = QuizSettings::first();


            $data['paths'] = array();
            array_push( $data['paths'] , array("icon_image_path" => "public/uploads/quiz_cat_icon/"));

            $datas['quizDesignPaths'] = array();
            array_push( $datas['quizDesignPaths'] , array("image_path" => "public/uploads/quiz_menu_ui_image/"));

            $error = "No Image";

            $respMsg = "Quiz Category View Succesfully Listed!";
            $respCode = 200;
            $respData = $data;
            $respData1 = $editData;
            $respDesignData = $datas;

        }catch(\Exception $e){
            $respMsg = "Quiz Category View Listing Failed";
            $respCode = 400;
            $respData = $data;
            $respData1 = $editData;
            $respDesignData = $datas;
        }
        return array($respMsg,$respCode,$respData,$respData1,$respDesignData,$error);
    }


    public function handleSortUpdate(Request $request)
    {
        try {
                $idsOrder = $request->ids ;
                $idsOrderExplode = explode("," , $idsOrder);

                $counter = 1 ;

                foreach($idsOrderExplode as $id)
                {
                    $quizCatUp = QuizCategory::find($id);
                    $quizCatUp->quiz_cat_order = $counter;
                    $quizCatUp->save();
                    $counter++ ;
                }
                $respMsg = "Quiz Category Succesfully sorted";
                $respCode = 200;
                $respData = NULL;
            }catch(\Exception $e){

                // return $e->getMessage();
                $respMsg = "Quiz Category Sorting Failed";
                $respCode = 400;
                $respData = NULL;
            }

        return array($respMsg,$respCode, $respData);
    }
    public function handleQuestionsSortUpdate(Request $request)
    {
        try {
                $idsOrder = $request->ids ;
                $idsOrderExplode = explode("," , $idsOrder);
                $counter = 1 ;
                foreach($idsOrderExplode as $id)
                {
                    $quizUp = Quiz::find($id);
                    $quizUp->quiz_order = $counter;
                    $quizUp->save();
                    $counter++ ;
                }
                $respMsg = "Quiz Questions Succesfully sorted";
                $respCode = 200;
                $respData = NULL;
            }catch(\Exception $e){

                // return $e->getMessage();
                $respMsg = "Quiz Questions Sorting Failed";
                $respCode = 400;
                $respData = NULL;
            }

        return array($respMsg,$respCode, $respData);
    }

    public function handleSajiloQuestionsView($quiz_cat_code)
    {
        try{
            $QuizQuestionNo = QuizSettings::first()->quiz_questions;
            $data['allData'] = Quiz::inRandomOrder()->where('quiz_cat_code',"=",$quiz_cat_code)->where('question_level',"=",'sajilo')->take($QuizQuestionNo)->get();
            $CodeName = QuizCategory::where('quiz_cat_code',$quiz_cat_code)->value('quiz_cat_name');
            $catCode = $quiz_cat_code;

            $respMsg = "Sajilo Questions Succesfully Viewed";
            $respCode = 200;
            $respData = $data;
            $respCodeName = $CodeName;
            $respQuizCatCode = $catCode;


        }catch(\Exception $e){

            $respMsg = "Sajilo Questions Viewing Failed";
            $respCode = 400;
             $respData = $data;
            $respCodeName = $CodeName;
            $respQuizCatCode = $catCode;
        }
        return array($respMsg,$respCode, $respData,$respCodeName,$respQuizCatCode);

    }
    public function handleMadhyamaQuestionsView($quiz_cat_code)
    {
        try{
            $QuizQuestionNo = QuizSettings::first()->quiz_questions;
            $data['allData'] = Quiz::inRandomOrder()->where('quiz_cat_code',"=",$quiz_cat_code)->where('question_level',"=",'madhyama')->take($QuizQuestionNo)->get();
            $CodeName = QuizCategory::where('quiz_cat_code',$quiz_cat_code)->value('quiz_cat_name');
            $catCode = $quiz_cat_code;

            $respMsg = "Madhyama Questions Succesfully Viewed";
            $respCode = 200;
            $respData = $data;
            $respCodeName = $CodeName;
            $respQuizCatCode = $catCode;


        }catch(\Exception $e){

            $respMsg = "Madhyama Questions Viewing Failed";
            $respCode = 400;
            $respData = $data;
            $respCodeName = $CodeName;
            $respQuizCatCode = $catCode;
        }
        return array($respMsg,$respCode, $respData,$respCodeName,$respQuizCatCode);

    }
    public function handleGaaroQuestionsView($quiz_cat_code)
    {
        try{
            $QuizQuestionNo = QuizSettings::first()->quiz_questions;
            $data['allData'] = Quiz::inRandomOrder()->where('quiz_cat_code',"=",$quiz_cat_code)->where('question_level',"=",'gaaro')->take($QuizQuestionNo)->get();
            $CodeName = QuizCategory::where('quiz_cat_code',$quiz_cat_code)->value('quiz_cat_name');
            $catCode = $quiz_cat_code;

            $respMsg = "Gaaro Questions Succesfully Viewed";
            $respCode = 200;
            $respData = $data;
            $respCodeName = $CodeName;
            $respQuizCatCode = $catCode;


        }catch(\Exception $e){

            $respMsg = "Gaaro Questions Viewing Failed";
            $respCode = 400;
             $respData = $data;
            $respCodeName = $CodeName;
            $respQuizCatCode = $catCode;
        }
        return array($respMsg,$respCode, $respData,$respCodeName,$respQuizCatCode);

    }

    public function handleQuizCategoryStore(QuizCategoryStoreRequest $request)
    {

        try {
                // Will return only validated data
                $request->validated();

                $QuizCatCode = Helper::IDGenerator(new QuizCategory , 'quiz_cat_code',5,'QIZ');

                $QuizCategoryObj = new QuizCategory;
                $QuizCategoryObj->quiz_cat_name = $request->quiz_cat_name;

                if ($request->hasFile('quiz_cat_icon')) {
                    $fileName = $this->fileUploader->handleFileUpload('quiz_cat_icon',$request->file('quiz_cat_icon'));
                    $QuizCategoryObj->quiz_cat_icon = $fileName;
                }
                $QuizCategoryObj->quiz_cat_code = $QuizCatCode;
                $QuizCategoryObj->quiz_cat_order = QuizCategory::max('quiz_cat_order') + 1;
                $QuizCategoryObj->save();

                $respMsg = "Quiz Category Succesfully Added!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';

            }catch(\Exception $e){

                $respMsg = "Quiz Category Adding Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode, $respData,$respType);
    }

    public function handleQuestionsEdit($id)
    {
        try
        {
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

        }catch(\Exception $e)
        {
            $respMsg = "Editing Failed";
            $respCode = 400;
            $respData1 = $data;
            $respData2 = $editData;
            $respCatCode = $quizCatCode;
            $respQuestionLevel = $quizQuestionLevel;

        }
        return array($respMsg,$respCode, $respData1, $respData2, $respCatCode,$respQuestionLevel);
    }

    public function handleQuizCategoryEdit($id)
    {
        try{
            $editData = QuizCategory::find($id);
            $error = "No Image";

            $respMsg = "Edit Succesfully Done!";
            $respCode = 200;
            $respData = $editData;

        }catch(\Exception $e){
            $respMsg = "Editing Failed";
            $respCode = 400;
            $respData = $editData;

        }
        return array($respMsg,$respCode, $respData,$error);
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
                $resp_cat_code = $code;

            }catch(\Exception $e){

                $respMsg = "Quiz Updation Failed";
                $respCode = 400;
                 $respData = NULL;
                $respType = 'danger';
                $resp_cat_code = $code;

            }
        return array($respMsg,$respCode, $respData,$respType,$resp_cat_code);
    }


    public function handleQuizCategoryUpdate(QuizCategoryStoreRequest $request,$id)
    {

        try {
                // Will return only validated data
                $request->validated();

                $QuizCategoryUp = QuizCategory::find($id);
                $QuizCategoryUp->quiz_cat_name = $request->quiz_cat_name;
                if ($request->hasFile('quiz_cat_icon')) {
                    File::delete('public/uploads/quiz_cat_icon/'.$QuizCategoryUp->quiz_cat_icon);

                    $fileName = $this->fileUploader->handleFileUpload('quiz_cat_icon',$request->file('quiz_cat_icon'));
                    $QuizCategoryUp->quiz_cat_icon = $fileName;
                }
                $QuizCategoryUp->save();

                $respMsg = "Quiz Category Succesfully Updated!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';
            }catch(\Exception $e){

                $respMsg = "Quiz Category Updation Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode, $respData,$respType);
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

    public function handleQuizCategoryDelete($id)
    {
        try{
            QuizCategory::find($id)->delete();

            $respMsg = "Quiz Category Succesfully Deleted!";
            $respCode = 200;
            $respType = 'info';

        }catch(\Exception $e){
            $respMsg = "Quiz Category Deletion Failed";
            $respCode = 400;
            $respType = 'danger';

        }
        return array($respMsg,$respCode,$respType);
    }

    public function handleQuizRestore($id)
    {
        try{
            $quizTrashedId  = Quiz::withTrashed()->find($id);
            $quizCatCode = $quizTrashedId->quiz_cat_code;
            $quizTrashedId ->restore();

            $respMsg = "Quiz Succesfully Restored!";
            $respCode = 200;
            $respType = 'info';
            $respCatCode = $quizCatCode;

        }catch(\Exception $e){
            $respMsg = "Quiz Restoration Failed";
            $respCode = 400;
            $respType = 'danger';
            $respCatCode = $quizCatCode;

        }
        return array($respMsg,$respCode,$respType,$respCatCode);
    }

    public function handleQuizCategoryRestore($id)
    {
        try{
            QuizCategory::withTrashed()->find($id)->restore();

            $respMsg = "Quiz Category Succesfully Restored!";
            $respCode = 200;
            $respType = 'info';

        }catch(\Exception $e){
            $respMsg = "Quiz Category Restoration Failed";
            $respCode = 400;
            $respType = 'danger';

        }
        return array($respMsg,$respCode,$respType);
    }

    public function handleQuizTrashView($id)
    {
        try{
            $catCode  = $id;
            $data['allData'] = Quiz::onlyTrashed()->get();

            $respMsg = "Quiz Trash Succesfully Viewed!";
            $respCode = $catCode;
            $respData = $data;

        }catch(\Exception $e){
            $respMsg = "Quiz View Failed";
            $respCode =  $catCode;
            $respData = $data;

        }
        return array($respMsg,$respCode, $respData);
    }

    public function handleQuizCategoryTrashView()
    {
        try{

            $data['allData'] = QuizCategory::onlyTrashed()->get();
            $error = "No Image";

            $respMsg = "Quiz Category Trash Succesfully Viewed!";
            $respCode = 200;
            $respData = $data;

        }catch(\Exception $e){
            $respMsg = "Quiz Category View Failed";
            $respCode = 400;
            $respData = $data;

        }
        return array($respMsg,$respCode, $respData, $error);
    }

    public function handleQuizForceDelete($id)
    {
        try{
            Quiz::withTrashed()->find($id)->forceDelete();

            $respMsg = "Quiz Deleted Permanently!";
            $respCode = 200;
            $respType = 'info';

        }catch(\Exception $e){
            $respMsg = "Quiz Deletion Failed";
            $respCode = 400;
            $respType = 'danger';
        }
        return array($respMsg,$respCode,$respType);
    }



    public function handleQuizCategoryForceDelete($id)
    {
        try{
            $QuizCategoryForceDelId = QuizCategory::withTrashed()->find($id);
            File::delete('public/uploads/quiz_cat_icon/'.$QuizCategoryForceDelId->quiz_cat_icon);
            $QuizCategoryForceDelId->forceDelete();

            $respMsg = "Quiz Category Deleted Permanently!";
            $respCode = 200;
            $respType = 'info';

        }catch(\Exception $e){
            $respMsg = "Quiz Category Deletion Failed";
            $respCode = 400;
            $respType = 'danger';
        }
        return array($respMsg,$respCode,$respType);
    }
}

?>
