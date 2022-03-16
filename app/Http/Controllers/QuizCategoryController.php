<?php

namespace App\Http\Controllers;

use App\Repository\QuizCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Requests\QuizCategoryStoreRequest;

class QuizCategoryController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new QuizCategoryRepository;
    }

    public function viewQuizes($quiz_cat_code,$question_level)
    {
        list($respMsg,$respCode, $respData, $respDesignData) = $this->repo->handleQuizView($quiz_cat_code,$question_level);
        return response()->json([
            'message' => $respMsg,
            'quizLists' => $respData,
            'quizDesignLists' => $respDesignData
        ], $respCode);
    }

    public function viewQuizCategories()
    {
        list($respMsg,$respCode,$respData,$respData1,$respDesignData) = $this->repo->handleQuizCategoryView();
        return response()->json([
            'message' => $respMsg,
            'quizCategoryLists' => $respData,
            'quizCategoryDesignLists' => $respDesignData
        ], $respCode);
    }

    public function quizCategoryView(){
        list($respMsg,$respCode,$respData,$respData1,$error) = $this->repo->handleQuizCategoryView();
         return view('backend.quizCategory.view_quizCategory',$respData,compact('respData1','error'));
     }

     public function sajiloQuestionsView($quiz_cat_code){
        list($respMsg,$respCode, $respData,$respCodeName,$respQuizCatCode) = $this->repo->handleSajiloQuestionsView($quiz_cat_code);
         return view('backend.quizCategory.view_sajilo_questions',$respData,compact('respCodeName','respQuizCatCode'));
     }

     public function madhyamaQuestionsView($quiz_cat_code){
        list($respMsg,$respCode, $respData,$respCodeName,$respQuizCatCode) = $this->repo->handleMadhyamaQuestionsView($quiz_cat_code);
         return view('backend.quizCategory.view_madhyama_questions',$respData,compact('respCodeName','respQuizCatCode'));
     }

     public function gaaroQuestionsView($quiz_cat_code){
        list($respMsg,$respCode, $respData,$respCodeName,$respQuizCatCode) = $this->repo->handleGaaroQuestionsView($quiz_cat_code);
         return view('backend.quizCategory.view_gaaro_questions',$respData,compact('respCodeName','respQuizCatCode'));
     }

     public function sortUpdate(Request $request)
     {
        list($respMsg,$respCode, $respData) = $this->repo->handleSortUpdate($request);

        return response($respMsg, $respCode);
     }

     public function quizSortUpdate(Request $request)
    {
        list($respMsg,$respCode, $respData) = $this->repo->handleQuestionsSortUpdate($request);

        return response($respMsg, $respCode);
    }


     public function quizCategoryAdd(){
        return view('backend.quizCategory.add_quizCategory');
    }


    public function quizCategoryStore(QuizCategoryStoreRequest $request){

        list($respMsg,$respCode, $respData,$respType) = $this->repo->handleQuizCategoryStore($request);

        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
        return redirect()->route('quizCategory.view')->with($notification);
    }

    public function questionsEdit($id)
    {
        list($respMsg,$respCode, $respData1, $respData2, $respCatCode,$respQuestionLevel) = $this->repo->handleQuestionsEdit($id);
        return view('backend.quiz.edit_questions',compact('respData2','respCatCode','respQuestionLevel'),$respData1);

    }


    public function quizCategoryEdit($id)
    {
        list($respMsg,$respCode, $respData, $error) = $this->repo->handleQuizCategoryEdit($id);
        return view('backend.quizCategory.edit_quizCategory',compact('respData','error'));

    }

    public function quizCategoryUpdate(QuizCategoryStoreRequest $request,$id)
    {
        list($respMsg,$respCode, $respData,$respType) = $this->repo->handleQuizCategoryUpdate($request,$id);
            $notification = array(
                'message' => $respMsg,
                'alert-type' =>$respType,
        );
        return redirect()->route('quizCategory.view')->with($notification);
    }

    public function quizCategoryDelete($id){
        list($respMsg,$respCode,$respType) = $this->repo->handleQuizCategoryDelete($id);

        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
    return redirect()->route('quizCategory.view')->with($notification);
    }

    public function quizRestore($id){
        list($respMsg,$respCode,$respType,$respCatCode) = $this->repo->handleQuizRestore($id);

        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
    return redirect()->route('quizCategory.quiz.trashView', $respCatCode)->with($notification);
    }

    public function quizCategoryRestore($id){
        list($respMsg,$respCode,$respType) = $this->repo->handleQuizCategoryRestore($id);

        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
    return redirect()->route('quizCategory.view')->with($notification);
    }

    public function quizTrashView($id){
        list($respMsg,$respCode, $respData) = $this->repo->handleQuizTrashView($id);
         return view('backend.quiz.view_quiz_trash',$respData,compact('respCode'));
     }


    public function quizCategoryTrashView(){
        list($respMsg,$respCode, $respData,$error) = $this->repo->handleQuizCategoryTrashView();
         return view('backend.quizCategory.view_quizCategory_trash',$respData,compact('error'));
    }

    public function quizForceDelete($id,$cat_code){
            list($respMsg,$respCode,$respType) = $this->repo->handleQuizForceDelete($id);
            $notification = array(
                'message' => $respMsg,
                'alert-type' =>$respType,
        );
        return redirect()->route('quizCategory.quiz.trashView', $cat_code)->with($notification);
    }


    public function quizCategoryForceDelete($id){
        list($respMsg,$respCode,$respType) = $this->repo->handleQuizCategoryForceDelete($id);

        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
    return redirect()->route('quizCategory.trashView')->with($notification);
    }
}
