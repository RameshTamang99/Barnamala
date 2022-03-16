<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Repository\LiteratureCategoryRepository;
use App\Http\Requests\LiteratureCategoryStoreRequest;
use App\Http\Requests\LiteratureCategoryUpdateRequest;

class LiteratureCategoryController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new LiteratureCategoryRepository;
    }

    public function viewLiteratureCategoryDetails($category_id)
    {
        list($respMsg,$respCode,$respData,$respMenuName,$respLiteratureCategoryLists) = $this->repo->handleLiteratureCategoryInnerView($category_id);
        return response()->json([
            'message' => $respMsg,
            'literatureCategoryDetailsLists' => $respLiteratureCategoryLists,
        ], $respCode);
    }

    public function viewLiteratureCategory()
    {
        list($respMsg,$respCode,$respData,$respDesignData) = $this->repo->handleLiteratureCategoryView();
        return response()->json([
            'message' => $respMsg,
            'literatureCategoryLists' => $respData,
            'literatureCategoryDesignLists' => $respDesignData
        ], $respCode);
    }

    public function literatureCategoryView(){

        list($respMsg,$respCode,$respData,$respDesignData,$error) = $this->repo->handleLiteratureCategoryView();
         return view('backend.literatureCategory.view_literature_category',$respData,compact('error'));
     }

     public function literatureCategoryInnerView($category_id){
        list($respMsg,$respCode,$respData,$respCategoryName,$respLiteratureCategoryDetailsLists,$error) = $this->repo->handleLiteratureCategoryInnerView($category_id);
         return view('backend.literatureCategory.view_literature_category_details')->with(compact('respData','respCategoryName','respLiteratureCategoryDetailsLists','error'));
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


    public function literatureCategoryStore(LiteratureCategoryStoreRequest $request){

        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleLiteratureCategoryStore($request);

        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
        return redirect()->route('literatureCategory.view')->with($notification);
    }

    public function literatureCategoryEdit($id)
    {
        list($respMsg,$respCode,$respData,$error) = $this->repo->handleLiteratureCategoryEdit($id);
        return view('backend.literatureCategory.edit_literature_category',compact('respData','error'));
    }

    public function literatureCategoryUpdate(LiteratureCategoryUpdateRequest $request,$id)
    {
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleLiteratureCategoryUpdate($request, $id);

            $notification = array(
                'message' => $respMsg,
                'alert-type' =>$respType,
        );

        return redirect()->route('literatureCategory.view')->with($notification);
    }

    public function literatureCategoryDelete($id){
        list($respMsg,$respCode,$respType) = $this->repo->handleLiteratureCategoryDelete($id);

        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
    return redirect()->route('literatureCategory.view')->with($notification);
    }

    public function literatureCategoryRestore($id){

        list($respMsg,$respCode,$respType) = $this->repo->handleLiteratureCategoryRestore($id);
        $notification = array(
            'message' =>$respMsg,
            'alert-type' =>$respType,
    );
    return redirect()->route('literatureCategory.view')->with($notification);
    }



    public function literatureCategoryTrashView(){
        list($respMsg,$respCode,$respData,$error) = $this->repo->handleLiteratureCategoryTrashView();
         return view('backend.literatureCategory.view_literature_category_trash',$respData,compact('error'));
     }

     public function literatureCategoryForceDelete($id){
        list($respMsg,$respCode,$respType) = $this->repo->handleLiteratureCategoryForceDelete($id);
        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
    return redirect()->route('literatureCategory.trashView')->with($notification);
    }
}
