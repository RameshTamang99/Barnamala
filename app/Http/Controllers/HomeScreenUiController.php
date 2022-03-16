<?php

namespace App\Http\Controllers;

use App\Repository\HomeScreenUiRepository;
use App\Http\Requests\HomeScreenUiStoreRequest;

class HomeScreenUiController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new HomeScreenUiRepository;
    }

    public function homeScreenUiView()
    {
        list($respMsg,$respCode, $respData,$error) = $this->repo->handleHomeScreenUiView();
         return view('backend.homeScreenUi.view_home_screen_ui',$respData,compact('error'));
    }

    public function viewHomeScreenUi()
    {
        list($respMsg,$respCode, $respData) = $this->repo->handlehomeScreenUiView();
        return response()->json([
            'message' => $respMsg,
            'HomeScreenLists' => $respData,
        ], $respCode);
    }

    
    public function viewHomeScreenUiCombinedSettingsJingles()
    {
        // list($respMsg,$respCode, $respData) = $this->repo->handleHomeScreenUiViewCombined();
        return response()->json([
            'message' => 'Data Succesfully fetched',
            'HomeScreenLists' => $this->repo->handleHomeScreenUiViewCombined(),
        ], 200);
    }

    public function homeScreenUiEdit($id)
    {
        list($respMsg,$respCode,$respData,$error) = $this->repo->handleHomeScreenUiEdit($id);
        return view('backend.homeScreenUi.edit_home_screen_ui',compact('respData','error'));
    }

    public function homeScreenUiUpdate(HomeScreenUiStoreRequest $request,$id)
    {
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleHomeScreenUiUpdate($request,$id);

            $notification = array(
                'message' => $respMsg,
                'alert-type' =>$respType,
        );
        return redirect()->route('homeScreenUi.view')->with($notification);
    }
}
