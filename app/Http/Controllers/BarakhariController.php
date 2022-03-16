<?php

namespace App\Http\Controllers;

use App\Repository\BarakhariRepository;
use Illuminate\Http\Request;
use App\Http\Requests\BarakhariStoreRequest;

class BarakhariController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new BarakhariRepository;
    }

    public function viewBarakharis($id)
    {
        list($respMsg,$respCode,$respData,$respDesginData) = $this->repo->handleBarakhariView($id);
        return response()->json([
            'message' => $respMsg,
            'barakhariLists' => $respData,
            'barakhariDesignlists' => $respDesginData
        ], $respCode);
    }

    
    public function viewBarakharisCombined()
    {
        list($respMsg,$respCode,$respData,$respDesginData) = $this->repo->handleBarakhariViewCombined();
        return response()->json([
            'message' => $respMsg,
            'barakhariLists' => $respData,
            'barakhariDesignlists' => $respDesginData
        ], $respCode);
    }

    public function barakhariView($id){
        list($respMsg,$respCode,$respData) = $this->repo->handleBarakhariView($id);
         return view('backend.barakhari.view_barakhari',$respData);
     }

    public function byanjanBarakhariView(){
        list($respMsg,$respCode,$respData) = $this->repo->handleByanjanBarakhariView();
         return view('backend.barakhari.view_byanjan_barakhari',$respData);
    }

     public function barakhariAdd(){
        list($respData,$respMsg,$respCode) = $this->repo->handleBarakhariAdd();
        return view('backend.barakhari.add_barakhari', $respData);
    }


     public function sortUpdate(Request $request)
    {
        list($respMsg,$respCode,$respData) = $this->repo->handleSortUpdate($request);

        return response($respMsg, $respCode);
    }


    public function barakhariStore(BarakhariStoreRequest $request){

        list($respMsg,$respCode,$respData,$respType,$respViewId) = $this->repo->handleBarakhariStore($request);

        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );

        return redirect()->route('barakhari.view', ['id'=>$respViewId])->with($notification);

    }

    public function barakhariEdit($id)
    {
        list($respMsg,$respCode,$respData1,$respData2) = $this->repo->handleBarakhariEdit($id);
        return view('backend.barakhari.edit_barakhari',$respData1,compact('respData2'));
    }

    public function barakhariUpdate(BarakhariStoreRequest $request,$id)
    {

        list($respMsg,$respCode,$respData,$respType,$respId) = $this->repo->handleBarakhariUpdate($request,$id);

            $notification = array(
                'message' => $respMsg,
                'alert-type' =>$respType
        );

        return redirect()->route('barakhari.view', ['id'=>$respId])->with($notification);
    }

    public function barakhariDelete($id){
        list($respMsg,$respCode,$respType,$respId) = $this->repo->handleBarakhariDelete($id);

        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
    return redirect()->route('barakhari.view',['id'=>$respId])->with($notification);
    }

    public function barakhariRestore($id){
        list($respMsg,$respCode,$respType,$respId) = $this->repo->handleBarakhariRestore($id);

        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
    return redirect()->route('barakhari.view',['id'=>$respId])->with($notification);
    }


    public function barakhariTrashView(){
        list($respMsg,$respCode,$respData) = $this->repo->handleBarakhariTrashView();
         return view('backend.barakhari.view_barakhari_trash',$respData);
     }

     public function barakhariForceDelete($id){
        list($respMsg,$respCode,$respType) = $this->repo->handleBarakhariForceDelete($id);

        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
    return redirect()->route('barakhari.trashView')->with($notification);
    }
}
