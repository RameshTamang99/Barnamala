<?php

namespace App\Http\Controllers;

use App\Repository\InformativeMenuUiRepository;
use App\Http\Requests\InformativeMenuUiStoreRequest;

class InformativeMenuUiController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new InformativeMenuUiRepository;
    }

    public function informativeMenuUiView()
    {
        list($respMsg,$respCode, $respData,$error) = $this->repo->handleInformativeMenuUiView();
         return view('backend.informativeMenuUi.view_informative_menu_ui',$respData,compact('error'));
    }

    public function informativeMenuUiEdit($id)
    {
        list($respMsg,$respCode,$respData,$error) = $this->repo->handleInformativeMenuUiEdit($id);
        return view('backend.informativeMenuUi.edit_informative_menu_ui',compact('respData','error'));
    }

    public function informativeMenuUiUpdate(informativeMenuUiStoreRequest $request,$id)
    {
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleInformativeMenuUiUpdate($request,$id);

            $notification = array(
                'message' => $respMsg,
                'alert-type' =>$respType,
        );
        return redirect()->route('informativeMenuUi.view')->with($notification);
    }
}
