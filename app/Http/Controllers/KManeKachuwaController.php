<?php

namespace App\Http\Controllers;

use App\Repository\KManeKachuwaRepository;
use Illuminate\Http\Request;
use App\Http\Requests\KManeKachuwaStoreRequest;

class KManeKachuwaController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new KManeKachuwaRepository;
    }

    public function viewKaManeKachuwas()
    {
        list($respMsg,$respCode,$respData,$respDesignData) = $this->repo->handleKManeKachuwaView();
        return response()->json([
            'message' => $respMsg,
            'kaManeKachuwaLists' => $respData,
            'kaManeKachuwaDesignLists' => $respDesignData
        ], $respCode);
    }

    public function kmkView(){
        list($respMsg,$respCode,$respData,$error) = $this->repo->handleKManeKachuwaView();
         return view('backend.kmk.view_kmk',$respData,compact('error'));
     }

     public function KmkAdd(){
        list($respMsg,$respCode,$respData) = $this->repo->handleKManeKachuwaAdd();
        return view('backend.kmk.add_kmk', $respData);
    }

    public function sortUpdate(Request $request)
    {
        list($respMsg,$respCode,$respData) = $this->repo->handleSortUpdate($request);

        return response($respMsg, $respCode);
    }


    public function kmkStore(KManeKachuwaStoreRequest $request){
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleKManeKachuwaStore($request);

        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
        return redirect()->route('kmk.view')->with($notification);
    }

    public function kmkEdit($id)
    {
        list($respMsg,$respCode,$respData1,$respData2,$error) = $this->repo->handleKManeKachuwaEdit($id);
        return view('backend.kmk.edit_kmk',compact('respData2','error'),$respData1);

    }

    public function kmkUpdate(KManeKachuwaStoreRequest $request,$id)
    {
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleKManeKachuwaUpdate($request,$id);

            $notification = array(
                'message' => $respMsg,
                'alert-type' =>$respType,
        );
        return redirect()->route('kmk.view')->with($notification);
    }

    public function kmkDelete($id){
        list($respMsg,$respCode,$respType) = $this->repo->handleKManeKachuwaDelete($id);

        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
    return redirect()->route('kmk.view')->with($notification);
    }

    public function kmkRestore($id){
        list($respMsg,$respCode,$respType) = $this->repo->handleKManeKachuwaRestore($id);
        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
    return redirect()->route('kmk.view')->with($notification);
    }


    public function kmkTrashView(){
        list($respMsg,$respCode,$respData,$error) = $this->repo->handleKManeKachuwaTrashView();
         return view('backend.kmk.view_kmk_trash',$respData,compact('error'));
     }

     public function kmkForceDelete($id){
        list($respMsg,$respCode,$respType) = $this->repo->handleKManeKachuwaForceDelete($id);

        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
    return redirect()->route('kmk.trashView')->with($notification);
    }
}
