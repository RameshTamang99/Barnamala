<?php

namespace App\Http\Controllers;

use App\Repository\JinglesUiRepository;
use App\Http\Requests\JinglesUiStoreRequest;

class JinglesUiController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new JinglesUiRepository;
    }

    public function jinglesUiView()
    {
        list($respMsg,$respCode, $respData) = $this->repo->handleJinglesUiView();
         return view('backend.jinglesUi.view_jingles_ui',$respData);
    }

    public function viewJinglesUi()
    {
        list($respMsg,$respCode, $respData) = $this->repo->handleJinglesUiView();
        return response()->json([
            'message' => $respMsg,
            'JinglesLists' => $respData,
        ], $respCode);
    }

    public function jinglesUiEdit($id)
    {
        list($respMsg,$respCode,$respData) = $this->repo->handleJinglesUiEdit($id);
        return view('backend.jinglesUi.edit_jingles_ui',compact('respData'));
    }

    public function jinglesUiUpdate(JinglesUiStoreRequest $request,$id)
    {
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleJinglesUiUpdate($request,$id);

            $notification = array(
                'message' => $respMsg,
                'alert-type' =>$respType,
        );
        return redirect()->route('jinglesUi.view')->with($notification);
    }
}
