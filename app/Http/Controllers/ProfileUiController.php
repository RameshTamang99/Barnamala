<?php

namespace App\Http\Controllers;

use App\Repository\ProfileUiRepository;
use App\Http\Requests\ProfileUiStoreRequest;

class ProfileUiController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new ProfileUiRepository;
    }

    public function profileUiView()
    {
        list($respMsg,$respCode, $respData,$error) = $this->repo->handleProfileUiView();
         return view('backend.profileUi.view_profile_ui',$respData,compact('error'));
    }

    public function viewProfileUi()
    {
        list($respMsg,$respCode, $respData) = $this->repo->handleProfileUiView();
        return response()->json([
            'message' => $respMsg,
            'ProfileLists' => $respData,
        ], $respCode);
    }

    public function profileUiEdit($id)
    {
        list($respMsg,$respCode,$respData,$error) = $this->repo->handleProfileUiEdit($id);
        return view('backend.profileUi.edit_profile_ui',compact('respData','error'));
    }

    public function profileUiUpdate(ProfileUiStoreRequest $request,$id)
    {
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleProfileUiUpdate($request,$id);

            $notification = array(
                'message' => $respMsg,
                'alert-type' =>$respType,
        );
        return redirect()->route('profileUi.view')->with($notification);
    }
}
