<?php

namespace App\Http\Controllers;


use App\Repository\InformativeMenuDetailsRepository;
use Illuminate\Http\Request;
use App\Http\Requests\InformativeMenuDetailsStoreRequest;

class InformativeMenuDetailsController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new InformativeMenuDetailsRepository;
    }

    public function infoMenuDetailsStore(InformativeMenuDetailsStoreRequest $request)
    {
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleInformativeMenuDetailsStore($request);

        $notification = array(
            'message' => $respMsg,
            'alert-type' => $respType
        );
        return redirect()->back()->with($notification);
    }

    public function infoMenuDetailsEdit($id)
    {
        list($respMsg,$respCode,$respEditData,$respMenuId,$error) = $this->repo->handleInformativeMenuDetailsEdit($id);
        return view('backend.infoMenuDetails.edit_infoMenuDetails',compact('respEditData','respMenuId','error'));
    }

    public function infoMenuDetailsUpdate(InformativeMenuDetailsStoreRequest $request, $id)
    {
        list($respMsg,$respCode,$respData,$respType,$respMenuId) = $this->repo->handleInformativeMenuDetailsUpdate($request,$id);
        $notification = array(
            'message' => $respMsg,
            'alert-type' => $respType,
        );
        return redirect()->route('infoMenu.innerView',['id'=>$respMenuId])->with($notification);
    }

    public function infoMenuDetailsDelete($id)
    {
        list($respMsg,$respCode,$respType,$respMenuId) = $this->repo->handleInformativeMenuDetailsDelete($id);

        $notification = array(
            'message' => $respMsg,
            'alert-type' => $respType,
        );
        return redirect()->route('infoMenu.innerView',['id'=>$respMenuId])->with($notification);
    }

    public function infoMenuDetailsRestore($id)
    {
        list($respMsg,$respCode,$respType,$respMenuId) = $this->repo->handleInformativeMenuDetailsRestore($id);
        $notification = array(
            'message' => $respMsg,
            'alert-type' => $respType,
        );
        return redirect()->route('infoMenu.innerView',['id'=>$respMenuId])->with($notification);
    }


    public function infoMenuDetailsTrashView($id)
    {
        list($respMsg,$respCode,$respData,$error) = $this->repo->handleInformativeMenuDetailsTrashView($id);
        return view('backend.infoMenuDetails.view_infoMenuDetails_trash', $respData,compact('id','error'));
    }

    public function infoMenuDetailsForceDelete($id)
    {
        list($respMsg,$respCode,$respType,$respMenuId) = $this->repo->handleInformativeMenuDetailsForceDelete($id);

        $notification = array(
            'message' => $respMsg,
            'alert-type' => $respType,
        );
        return redirect()->route('infoMenuDetails.trashView',['id'=>$respMenuId])->with($notification);
    }
}
