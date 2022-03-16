<?php

namespace App\Http\Controllers;

use App\Repository\BarnamaalaMenuUiRepository;
use App\Http\Requests\BarnamaalaMenuUiStoreRequest;

class BarnamaalaMenuUiController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new BarnamaalaMenuUiRepository;
    }

    public function barnamaalaMenuUiView()
    {
        list($respMsg,$respCode, $respData,$error) = $this->repo->handleBarnamaalaMenuUiView();
         return view('backend.barnamaalaMenuUi.view_barnamaala_menu_ui',$respData,compact('error'));
    }

    public function viewBarnamaalaMenuUi()
    {
        list($respMsg,$respCode, $respData) = $this->repo->handleBarnamaalaMenuUiView();
        return response()->json([
            'message' => $respMsg,
            'BarnamaalaMenuLists' => $respData,
        ], $respCode);
    }

    public function viewBarnamaalaMenuUiCombined()
    {
        // list($respMsg,$respCode, $respData) = $this->repo->handleBarnamaalaMenuUiViewCombined();
        $response = $this->repo->handleBarnamaalaMenuUiViewCombined(); 
        $respMsg = "Data Fetched";
        $respCode = 200 ;

        return response()->json([
            'message' => $respMsg,
            'combined' => $response,
        ], $respCode);
    }

    public function barnamaalaMenuUiEdit($id)
    {
        list($respMsg,$respCode,$respData,$error) = $this->repo->handleBarnamaalaMenuUiEdit($id);
        return view('backend.barnamaalaMenuUi.edit_barnamaala_menu_ui',compact('respData','error'));
    }

    public function barnamaalaMenuUiUpdate(BarnamaalaMenuUiStoreRequest $request,$id)
    {
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleBarnamaalaMenuUiUpdate($request,$id);

            $notification = array(
                'message' => $respMsg,
                'alert-type' =>$respType,
        );
        return redirect()->route('barnamaalaMenuUi.view')->with($notification);
    }
}
