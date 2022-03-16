<?php

namespace App\Http\Controllers;

use App\Repository\QuizMenuUiRepository;
use App\Http\Requests\QuizMenuUiStoreRequest;

class QuizMenuUiController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new QuizMenuUiRepository;
    }

    public function quizMenuUiView()
    {
        list($respMsg,$respCode, $respData,$error) = $this->repo->handleQuizMenuUiView();
         return view('backend.quizMenuUi.view_quiz_menu_ui',$respData,compact('error'));
    }

    public function viewQuizMenuUi()
    {
        list($respMsg,$respCode, $respData) = $this->repo->handleQuizMenuUiView();
        return response()->json([
            'message' => $respMsg,
            'QuizMenuLists' => $respData,
        ], $respCode);
    }

    public function quizMenuUiEdit($id)
    {
        list($respMsg,$respCode,$respData,$error) = $this->repo->handleQuizMenuUiEdit($id);
        return view('backend.quizMenuUi.edit_quiz_menu_ui',compact('respData','error'));
    }

    public function quizMenuUiUpdate(QuizMenuUiStoreRequest $request,$id)
    {
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleQuizMenuUiUpdate($request,$id);

            $notification = array(
                'message' => $respMsg,
                'alert-type' =>$respType,
        );
        return redirect()->route('quizMenuUi.view')->with($notification);
    }
}
