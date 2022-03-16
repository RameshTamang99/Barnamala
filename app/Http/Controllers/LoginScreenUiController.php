<?php

namespace App\Http\Controllers;

use App\Repository\LoginScreenUiRepository;
use App\Http\Requests\LoginScreenUiStoreRequest;

class LoginScreenUiController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new LoginScreenUiRepository;
    }

    public function loginScreenUiView()
    {
        list($respMsg,$respCode, $respData,$error) = $this->repo->handleLoginScreenUiView();
         return view('backend.loginScreen.view_login_screen_ui',$respData,compact('error'));
    }

    public function viewLoginScreenUi()
    {
        list($respMsg,$respCode, $respData) = $this->repo->handleLoginScreenUiView();
        return response()->json([
            'message' => $respMsg,
            'LoginScreenLists' => $respData,
        ], $respCode);
    }

    public function loginScreenUiEdit($id)
    {
        list($respMsg,$respCode,$respData,$error) = $this->repo->handleLoginScreenUiEdit($id);
        return view('backend.loginScreen.edit_login_screen_ui',compact('respData','error'));
    }

    public function loginScreenUiUpdate(LoginScreenUiStoreRequest $request,$id)
    {
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleLoginScreenUiUpdate($request,$id);

            $notification = array(
                'message' => $respMsg,
                'alert-type' =>$respType,
        );
        return redirect()->route('loginScreen.view')->with($notification);
    }
}
