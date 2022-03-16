<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\InformativeMenuRepository;
use App\Http\Requests\InformativeMenuStoreRequest;
use App\Http\Requests\InformativeMenuUpdateRequest;

class InformativeMenuController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new InformativeMenuRepository;
    }

    public function viewInfomativeMenuDetails($menu_id)
    {
        list($respMsg,$respCode,$respData,$respMenuName,$respInformativeMenuLists) = $this->repo->handleInformativeMenuInnerView($menu_id);
        return response()->json([
            'message' => $respMsg,
            'user' => $respInformativeMenuLists,
        ], $respCode);
    }

    public function viewInformativeMenus()
    {
        list($respMsg,$respCode,$respData,$respDesignData) = $this->repo->handleInformativeMenuView();
        return response()->json([
            'message' => $respMsg,
            'informativeMenuLists' => $respData,
            'informativeMenuDesignLists'=> $respDesignData

        ], $respCode);
    }

    public function infoMenuView(){

        list($respMsg,$respCode,$respData,$error) = $this->repo->handleInformativeMenuView();
         return view('backend.infoMenu.view_infoMenu',$respData,compact('error'));
     }

     public function infoMenuInnerView($menu_id){
        list($respMsg,$respCode,$respData,$respMenuName,$respInformativeMenuLists,$error) = $this->repo->handleInformativeMenuInnerView($menu_id);
         return view('backend.infoMenu.view_infoMenuDetails')->with(compact('respData','respMenuName','respInformativeMenuLists','error'));
     }

    public function sortUpdate(Request $request)
    {

        list($respMsg,$respCode,$respData) = $this->repo->handleSortUpdate($request);

        return response($respMsg, $respCode);
    }

    public function detailsSortUpdate(Request $request)
    {
        list($respMsg,$respCode,$respData) = $this->repo->handleInnerSortUpdate($request);

        return response($respMsg, $respCode);
    }


    public function infoMenuStore(InformativeMenuStoreRequest $request){

        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleInformativeMenuStore($request);

        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
        return redirect()->route('infoMenu.view')->with($notification);
    }

    public function infoMenuEdit($id)
    {
        list($respMsg,$respCode,$respData,$error) = $this->repo->handleInformativeMenuEdit($id);
        return view('backend.infoMenu.edit_infoMenu',compact('respData','error'));
    }

    public function infoMenuUpdate(InformativeMenuUpdateRequest $request,$id)
    {
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleInformativeMenuUpdate($request, $id);

            $notification = array(
                'message' => $respMsg,
                'alert-type' =>$respType,
        );

        return redirect()->route('infoMenu.view')->with($notification);
    }

    public function infoMenuDelete($id){
        list($respMsg,$respCode,$respType) = $this->repo->handleInformativeMenuDelete($id);

        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
    return redirect()->route('infoMenu.view')->with($notification);
    }

    public function infoMenuRestore($id){

        list($respMsg,$respCode,$respType) = $this->repo->handleInformativeMenuRestore($id);
        $notification = array(
            'message' =>$respMsg,
            'alert-type' =>$respType,
    );
    return redirect()->route('infoMenu.view')->with($notification);
    }



    public function infoMenuTrashView(){
        list($respMsg,$respCode,$respData,$error) = $this->repo->handleInformativeMenuTrashView();
         return view('backend.infoMenu.view_infoMenu_trash',$respData,compact('error'));
     }

     public function infoMenuForceDelete($id){
        list($respMsg,$respCode,$respType) = $this->repo->handleInformativeMenuForceDelete($id);
        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
    return redirect()->route('infoMenu.trashView')->with($notification);
    }
}
