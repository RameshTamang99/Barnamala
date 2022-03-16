<?php

namespace App\Http\Controllers;

use App\Repository\SettingsRepository;
use App\Http\Requests\SettingsStoreRequest;

class SettingsController extends Controller
{

    private $repo;

    public function __construct()
    {
        $this->repo = new SettingsRepository;
    }

    public function settingsView()
    {
        list($respMsg,$respCode, $respData,$respData1) = $this->repo->handleSettingsView();
         return view('backend.settings.view_settings',$respData,compact('respData1'));
    }

    public function viewSettings()
    {
        list($respMsg,$respCode, $respData,$respData1) = $this->repo->handleSettingsView();
        return response()->json([
            'message' => $respMsg,
            'SettingsLists' => $respData,
        ], $respCode);
    }

    public function settingsUpdate(SettingsStoreRequest $request,$id)
    {
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleSettingsUpdate($request,$id);

            $notification = array(
                'message' => $respMsg,
                'alert-type' =>$respType,
        );
        return redirect()->route('settings.view')->with($notification);
    }
}
