<?php

namespace App\Http\Controllers;

use App\Repository\LiteratureCategoryDetailsRepository;
use App\Http\Requests\LiteratureCategoryDetailsStoreRequest;

class LiteratureCategoryDetailsController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new LiteratureCategoryDetailsRepository;
    }

    public function literatureCategoryDetailsStore(LiteratureCategoryDetailsStoreRequest $request)
    {
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleLiteratureCategoryDetailsStore($request);

        $notification = array(
            'message' => $respMsg,
            'alert-type' => $respType
        );
        return redirect()->back()->with($notification);
    }

    public function literatureCategoryDetailsEdit($id)
    {
        list($respMsg,$respCode,$respEditData,$respLitCatId,$error) = $this->repo->handleLiteratureCategoryDetailsEdit($id);
        return view('backend.literatureCategoryDetails.edit_literature_category_details',compact('respEditData','respLitCatId','error'));
    }

    public function literatureCategoryDetailsUpdate(LiteratureCategoryDetailsStoreRequest $request, $id)
    {
        list($respMsg,$respCode,$respData,$respType,$respLitCatId) = $this->repo->handleLiteratureCategoryDetailsUpdate($request,$id);
        $notification = array(
            'message' => $respMsg,
            'alert-type' => $respType,
        );
        return redirect()->route('literatureCategory.innerView',['id'=>$respLitCatId])->with($notification);
    }

    public function literatureCategoryDetailsDelete($id)
    {
        list($respMsg,$respCode,$respType,$respLitCatId) = $this->repo->handleLiteratureCategoryDetailsDelete($id);

        $notification = array(
            'message' => $respMsg,
            'alert-type' => $respType,
        );
        return redirect()->route('literatureCategory.innerView',['id'=>$respLitCatId])->with($notification);
    }

    public function literatureCategoryDetailsRestore($id)
    {
        list($respMsg,$respCode,$respType,$respLitCatId) = $this->repo->handleLiteratureCategoryDetailsRestore($id);
        $notification = array(
            'message' => $respMsg,
            'alert-type' => $respType,
        );
        return redirect()->route('literatureCategory.innerView',['id'=>$respLitCatId])->with($notification);
    }


    public function literatureCategoryDetailsTrashView($id)
    {
        list($respMsg,$respCode,$respData,$error) = $this->repo->handleLiteratureCategoryDetailsTrashView($id);
        return view('backend.literatureCategoryDetails.view_literature_category_details_trash', $respData,compact('id','error'));
    }

    public function literatureCategoryDetailsForceDelete($id)
    {
        list($respMsg,$respCode,$respType,$respLitCatId) = $this->repo->handleLiteratureCategoryDetailsForceDelete($id);

        $notification = array(
            'message' => $respMsg,
            'alert-type' => $respType,
        );
        return redirect()->route('literatureCategoryDetails.trashView',['id'=>$respLitCatId])->with($notification);
    }
}
