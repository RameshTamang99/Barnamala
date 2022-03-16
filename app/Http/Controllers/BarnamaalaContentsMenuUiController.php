<?php

namespace App\Http\Controllers;

use App\Repository\BarnamaalaContentsMenuUiRepository;
use App\Http\Requests\BarnamaalaContentsMenuUiStoreRequest;

class BarnamaalaContentsMenuUiController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new BarnamaalaContentsMenuUiRepository;
    }

    public function barnamaalaContentsMenuUiView()
    {
        list($respMsg,$respCode, $respData,$error) = $this->repo->handleBarnamaalaContentsMenuUiView();
         return view('backend.barnamaalaContentsMenuUi.view_barnamaala_contents_menu_ui',$respData,compact('error'));
    }

    public function viewBarnamaalaContentsMenuUi($type)
    {
        list($respMsg,$respCode, $respData) = $this->repo->handleViewBarnamaalaContentsMenuUi($type);
        return response()->json([
            'message' => $respMsg,
            'BarnamaalaContentsMenuLists' => $respData,
        ], $respCode);
    }

    public function barnamaalaContentsMenuUiEdit($id)
    {
        list($respMsg,$respCode,$respData,$error) = $this->repo->handleBarnamaalaContentsMenuUiEdit($id);
        return view('backend.barnamaalaContentsMenuUi.edit_barnamaala_contents_menu_ui',compact('respData','error'));
    }

    public function BarnamaalaContentsMenuUiUpdate(BarnamaalaContentsMenuUiStoreRequest $request,$id)
    {
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleBarnamaalaContentsMenuUiUpdate($request,$id);

            $notification = array(
                'message' => $respMsg,
                'alert-type' =>$respType,
        );
        return redirect()->route('barnamaalaContentsMenuUi.view')->with($notification);
    }
}
