<?php

namespace App\Http\Controllers;


use App\Repository\SworRepository;
use App\Models\Swor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SworStoreRequest;


class SworController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new SworRepository;
    }

    public function viewSwors()
    {
        list($respMsg,$respCode,$respData,$respDesignData) = $this->repo->handleSworView();
        return response()->json([
            'message' => $respMsg,
            'sworLists' => $respData,
            'sworDesignLists' => $respDesignData
        ], $respCode);
    }

    public function sworView(){
        list($respMsg,$respCode,$respData) = $this->repo->handleSworView();
         return view('backend.swor.view_swor',$respData);
     }

     public function sortUpdate(Request $request)
     {
        list($respMsg,$respCode,$respData) = $this->repo->handleSortUpdate($request);
        return response($respMsg, $respCode);
     }

     public function sworAdd(){
        return view('backend.swor.add_swor');
    }

    public function sworStore(SworStoreRequest $request)
    {
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleSworStore($request);
        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
        return redirect()->route('swor.view')->with($notification);
    }


    public function sworEdit($id)
    {
        list($respMsg,$respCode,$respData) = $this->repo->handleSworEdit($id);
        return view('backend.swor.edit_swor',compact('respData'));
    }

    public function sworUpdate(SworStoreRequest $request,$id)
    {
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleSworUpdate($request,$id);
            $notification = array(
                'message' => $respMsg,
                'alert-type' =>$respType,
        );
        return redirect()->route('swor.view')->with($notification);
    }

    public function sworDelete($id){
        list($respMsg,$respCode,$respType) = $this->repo->handleSworDelete($id);

        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
    return redirect()->route('swor.view')->with($notification);
    }

    public function sworRestore($id){
        list($respMsg,$respCode,$respType) = $this->repo->handleSworRestore($id);

        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
    return redirect()->route('swor.view')->with($notification);
    }

    public function sworTrashView(){
        list($respMsg,$respCode,$respData) = $this->repo->handleSworTrashView();
         return view('backend.swor.view_swor_trash',$respData);
     }

     public function sworForceDelete($id){
        list($respMsg,$respCode,$respType) = $this->repo->handleSworForceDelete($id);
        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
    return redirect()->route('swor.trashView')->with($notification);
    }
}
