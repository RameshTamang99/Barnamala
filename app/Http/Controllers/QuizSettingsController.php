<?php

namespace App\Http\Controllers;

use App\Repository\QuizSettingsRepository;
use App\Http\Requests\QuizSettingsStoreRequest;

class QuizSettingsController extends Controller
{

    private $repo;

    public function __construct()
    {
        $this->repo = new QuizSettingsRepository;
    }

    public function viewQuizSettings()
    {
        list($respMsg,$respCode, $respData) = $this->repo->handleQuizSettingsView();
        return response()->json([
            'message' => $respMsg,
            'QuizSettingsLists' => $respData,
        ], $respCode);
    }

    public function update(QuizSettingsStoreRequest $request,$id)
    {
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleQuizSettingsUpdate($request,$id);

            $notification = array(
                'message' => $respMsg,
                'alert-type' =>$respType,
        );
        return redirect()->route('quizCategory.view')->with($notification);
    }
}
