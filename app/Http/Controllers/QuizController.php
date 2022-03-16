<?php

namespace App\Http\Controllers;

use App\Repository\QuizRepository;
use Illuminate\Http\Request;
use App\Http\Requests\QuizStoreRequest;

class QuizController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new QuizRepository;
    }


    public function quizStore(QuizStoreRequest $request){

        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleQuizStore($request);

        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
        return redirect()->back()->with($notification);
    }

    // public function quizEdit($id)
    // {
    //     list($respMsg,$respCode,$respData1,$respData2,$respCatCode) = $this->repo->handleQuizEdit($id);
    //     return view('backend.quiz.edit_quiz',compact('respData2','respCatCode'),$respData1);
    // }

    public function questionsEdit($id)
    {
        list($respMsg,$respCode,$respData1,$respData2, $respCatCode,$respQuestionLevel) = $this->repo->handleQuestionsEdit($id);
        return view('backend.quiz.edit_questions',compact('respData2','respCatCode','respQuestionLevel'),$respData1);

    }

    public function quizUpdate(QuizStoreRequest $request,$id)
    {
        list($respMsg,$respCode,$respData,$respType,$respCatCode) = $this->repo->handleQuizUpdate($request,$id);

            $notification = array(
                'message' => $respMsg,
                'alert-type' =>$respType,
        );

        return redirect()->route('quizCategory.sajiloQuestionsView', ['id'=>$respCatCode])->with($notification);
    }


    public function quizDelete($id){
        list($respMsg,$respCode,$respType) = $this->repo->handleQuizDelete($id);

        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
    return redirect()->back()->with($notification);
    }

    public function viewCombinedQuizUi($quiz_cat_code)
    {
        list($respMsg,$respCode,$respData,$respDesignData,$respSajiloData,$respMadhyamaData,$respGaaroData , $respUiDatas) = $this->repo->handleCombineQuizUiView($quiz_cat_code);
        return response()->json([
            'message' => $respMsg,
            'QuizLevelLists' => $respData,
            'QuizSettingsLists' => $respDesignData,
            'SajiloQuestions' => $respSajiloData,
            'MadhyamaQuestions' => $respMadhyamaData,
            'GaaroQuestions' => $respGaaroData,
            'UiDatas' => $respUiDatas
        ], $respCode);
    }
}
