<?php

namespace App\Http\Controllers;

use App\Repository\LiteratureUiRepository;
use App\Http\Requests\LiteratureUiStoreRequest;

class LiteratureUiController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new LiteratureUiRepository;
    }

    public function literatureUiView()
    {
        list($respMsg,$respCode, $respData,$error) = $this->repo->handleLiteratureUiView();
         return view('backend.literatureUi.view_literature_ui',$respData,compact('error'));
    }

    public function viewLiteratureUi()
    {
        list($respMsg,$respCode, $respData) = $this->repo->handleLiteratureUiView();
        return response()->json([
            'message' => $respMsg,
            'LiteratureLists' => $respData,
        ], $respCode);
    }

    public function LiteratureUiEdit($id)
    {
        list($respMsg,$respCode,$respData,$error) = $this->repo->handleLiteratureUiEdit($id);
        return view('backend.literatureUi.edit_literature_ui',compact('respData','error'));
    }

    public function literatureUiUpdate(LiteratureUiStoreRequest $request,$id)
    {
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleLiteratureUiUpdate($request,$id);

            $notification = array(
                'message' => $respMsg,
                'alert-type' =>$respType,
        );
        return redirect()->route('literatureUi.view')->with($notification);
    }
}
