<?php

namespace App\Http\Controllers;

use App\Repository\PreloaderUiRepository;
use App\Http\Requests\PreloaderUiStoreRequest;

class PreloaderUiController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new PreloaderUiRepository;
    }

    public function preloaderUiView()
    {
        list($respMsg,$respCode, $respData,$error) = $this->repo->handlePreloaderUiView();
         return view('backend.preloaderUi.view_preloader_ui',$respData,compact('error'));
    }

    public function viewPreloaderUi()
    {
        list($respMsg,$respCode, $respData) = $this->repo->handlePreloaderUiView();
        return response()->json([
            'message' => $respMsg,
            'PreloaderLists' => $respData,
        ], $respCode);
    }

    public function preloaderUiEdit($id)
    {
        list($respMsg,$respCode,$respData,$error) = $this->repo->handlePreloaderUiEdit($id);
        return view('backend.preloaderUi.edit_preloader_ui',compact('respData','error'));
    }

    public function preloaderUiUpdate(PreloaderUiStoreRequest $request,$id)
    {
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handlePreloaderUiUpdate($request,$id);

            $notification = array(
                'message' => $respMsg,
                'alert-type' =>$respType,
        );
        return redirect()->route('preloaderUi.view')->with($notification);
    }
}
