<?php

namespace App\Http\Controllers;


use App\Repository\SankhyaRepository;
use App\Models\Sankhya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SankhyaStoreRequest;

class SankhyaController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new SankhyaRepository;
    }

    public function viewSankhyas()
    {
        list($respMsg,$respCode,$respData,$respDesignData) = $this->repo->handleSankhyaView();
        return response()->json([
            'message' => $respMsg,
            'sankhyaLists' => $respData,
            'sankhyaDesignLists'=>$respDesignData
        ], $respCode);
    }

    public function sankhyaView(){
        list($respMsg,$respCode,$respData) = $this->repo->handleSankhyaView();
         return view('backend.sankhya.view_sankhya',$respData);
     }

     public function sortUpdate(Request $request)
    {
        list($respMsg,$respCode,$respData) = $this->repo->handleSortUpdate($request);
        return response($respMsg, $respCode);
    }

     public function sankhyaAdd(){
        return view('backend.sankhya.add_sankhya');
    }

    public function sankhyaStore(SankhyaStoreRequest $request)
    {
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleSankhyaStore($request);
        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
        return redirect()->route('sankhya.view')->with($notification);

    }

    public function sankhyaEdit($id)
    {
        list($respMsg,$respCode,$respData) = $this->repo->handleSankhyaEdit($id);
        return view('backend.sankhya.edit_sankhya',compact('respData'));

    }

    public function sankhyaUpdate(SankhyaStoreRequest $request,$id)
    {
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleSankhyaUpdate($request,$id);

            $notification = array(
                'message' => $respMsg,
                'alert-type' =>$respType,
        );

        return redirect()->route('sankhya.view')->with($notification);
    }

    public function sankhyaDelete($id){
        list($respMsg,$respCode,$respType) = $this->repo->handleSankhyaDelete($id);

        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
    return redirect()->route('sankhya.view')->with($notification);
    }

    public function sankhyaRestore($id){
        list($respMsg,$respCode,$respType) = $this->repo->handleSankhyaRestore($id);

        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
    return redirect()->route('sankhya.view')->with($notification);
    }


    public function sankhyaTrashView()
    {
        list($respMsg,$respCode,$respData) = $this->repo->handleSankhyaTrashView();
         return view('backend.sankhya.view_sankhya_trash',$respData);
     }

     public function SankhyaForceDelete($id){
        list($respMsg,$respCode,$respType) = $this->repo->handleSankhyaForceDelete($id);

        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
    return redirect()->route('sankhya.trashView')->with($notification);
    }
}
