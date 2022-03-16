<?php

namespace App\Http\Controllers;

use App\Repository\KaManeKachuwaUiRepository;
use App\Http\Requests\KaManeKachuwaUiStoreRequest;

class KManeKachuwaUiController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new KaManeKachuwaUiRepository;
    }

    public function kaManeKachuwaUiView()
    {
        list($respMsg,$respCode, $respData,$error) = $this->repo->handleKaManeKachuwaUiView();
         return view('backend.kaManeKachuwaUi.view_ka_mane_kachuwa_ui',$respData,compact('error'));
    }

    public function viewKaManeKachuwaUi()
    {
        list($respMsg,$respCode, $respData) = $this->repo->handleKaManeKachuwaUiView();
        return response()->json([
            'message' => $respMsg,
            'KaManeKachuwaLists' => $respData,
        ], $respCode);
    }

    public function kaManeKachuwaUiEdit($id)
    {
        list($respMsg,$respCode,$respData,$error) = $this->repo->handleKaManeKachuwaUiEdit($id);
        return view('backend.kaManeKachuwaUi.edit_ka_mane_kachuwa_ui',compact('respData','error'));
    }

    public function kaManeKachuwaUiUpdate(KaManeKachuwaUiStoreRequest $request,$id)
    {
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleKaManeKachuwaUiUpdate($request,$id);

            $notification = array(
                'message' => $respMsg,
                'alert-type' =>$respType,
        );
        return redirect()->route('kaManeKachuwaUi.view')->with($notification);
    }
}
