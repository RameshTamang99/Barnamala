<?php

namespace App\Http\Controllers;

use App\Repository\NoWifiUiRepository;
use App\Http\Requests\NoWifiUiStoreRequest;

class NoWifiUiController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new NoWifiUiRepository;
    }

    public function noWifiUiView()
    {
        list($respMsg,$respCode, $respData,$error) = $this->repo->handleNoWifiUiView();
         return view('backend.noWifiUi.view_no_wifi_ui',$respData,compact('error'));
    }

    public function viewNoWifiUi()
    {
        list($respMsg,$respCode, $respData) = $this->repo->handleNoWifiUiView();
        return response()->json([
            'message' => $respMsg,
            'NoWifiLists' => $respData,
        ], $respCode);
    }

    public function noWifiUiEdit($id)
    {
        list($respMsg,$respCode,$respData,$error) = $this->repo->handleNoWifiUiEdit($id);
        return view('backend.noWifiUi.edit_no_wifi_ui',compact('respData','error'));
    }

    public function noWifiUiUpdate(NoWifiUiStoreRequest $request,$id)
    {
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleNoWifiUiUpdate($request,$id);

            $notification = array(
                'message' => $respMsg,
                'alert-type' =>$respType,
        );
        return redirect()->route('noWifiUi.view')->with($notification);
    }
}
