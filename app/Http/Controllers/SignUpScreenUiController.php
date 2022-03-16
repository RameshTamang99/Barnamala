<?php

namespace App\Http\Controllers;

use App\Repository\SignUpScreenUiRepository;
use App\Http\Requests\SignUpScreenUiStoreRequest;

class SignUpScreenUiController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new SignUpScreenUiRepository;
    }

    public function SignUpScreenUiView()
    {
        list($respMsg,$respCode, $respData,$error) = $this->repo->handleSignUpScreenUiView();
         return view('backend.signUpScreen.view_sign_up_screen_ui',$respData,compact('error'));
    }

    public function viewSignUpScreenUi()
    {
        list($respMsg,$respCode, $respData) = $this->repo->handleSignUpScreenUiView();
        return response()->json([
            'message' => $respMsg,
            'SignUpScreenLists' => $respData,
        ], $respCode);
    }

    public function SignUpScreenUiEdit($id)
    {
        list($respMsg,$respCode,$respData,$error) = $this->repo->handleSignUpScreenUiEdit($id);
        return view('backend.signUpScreen.edit_sign_up_screen_ui',compact('respData','error'));
    }

    public function SignUpScreenUiUpdate(SignUpScreenUiStoreRequest $request,$id)
    {
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleSignUpScreenUiUpdate($request,$id);

            $notification = array(
                'message' => $respMsg,
                'alert-type' =>$respType,
        );
        return redirect()->route('signUpScreen.view')->with($notification);
    }
}
