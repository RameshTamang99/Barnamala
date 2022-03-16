<?php

namespace App\Http\Controllers;

use App\Repository\QuizQuestionUiRepository;
use App\Http\Requests\QuizQuestionUiStoreRequest;

class QuizQuestionUiController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new QuizQuestionUiRepository;
    }

    public function quizQuestionUiView()
    {
        list($respMsg,$respCode, $respData,$error) = $this->repo->handleQuizQuestionUiView();
         return view('backend.quizQuestionUi.view_quiz_question_ui',$respData,compact('error'));
    }

    public function viewQuizQuestionUi()
    {
        list($respMsg,$respCode, $respData) = $this->repo->handleQuizQuestionUiView();
        return response()->json([
            'message' => $respMsg,
            'QuizQuestionLists' => $respData,
        ], $respCode);
    }

    public function quizQuestionUiEdit($id)
    {
        list($respMsg,$respCode,$respData,$error) = $this->repo->handleQuizQuestionUiEdit($id);
        return view('backend.quizQuestionUi.edit_quiz_question_ui',compact('respData','error'));
    }

    public function quizQuestionUiUpdate(QuizQuestionUiStoreRequest $request,$id)
    {
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleQuizQuestionUiUpdate($request,$id);

            $notification = array(
                'message' => $respMsg,
                'alert-type' =>$respType,
        );
        return redirect()->route('quizQuestionUi.view')->with($notification);
    }
}
