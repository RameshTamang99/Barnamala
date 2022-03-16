<?php

namespace App\Http\Controllers;

use App\Repository\QuizLevelUiRepository;
use App\Http\Requests\QuizLevelUiStoreRequest;

class QuizLevelUiController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new QuizLevelUiRepository;
    }

    public function quizLevelUiView()
    {
        list($respMsg,$respCode, $respData,$error) = $this->repo->handleQuizLevelUiView();
         return view('backend.quizLevelUi.view_quiz_level_ui',$respData,compact('error'));
    }

    public function viewQuizLevelUi()
    {
        list($respMsg,$respCode, $respData) = $this->repo->handleQuizLevelUiView();
        return response()->json([
            'message' => $respMsg,
            'QuizLevelLists' => $respData,
        ], $respCode);
    }

    public function quizLevelUiEdit($id)
    {
        list($respMsg,$respCode,$respData,$error) = $this->repo->handleQuizLevelUiEdit($id);
        return view('backend.quizLevelUi.edit_quiz_level_ui',compact('respData','error'));
    }

    public function quizLevelUiUpdate(QuizLevelUiStoreRequest $request,$id)
    {
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleQuizLevelUiUpdate($request,$id);

            $notification = array(
                'message' => $respMsg,
                'alert-type' =>$respType,
        );
        return redirect()->route('quizLevelUi.view')->with($notification);
    }
}
