<?php
namespace App\Repository;

use App\Helpers\Helper;
use App\Models\LiteratureCategory;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\File;
use App\Http\Requests\LiteratureCategoryStoreRequest;
use App\Http\Requests\LiteratureCategoryUpdateRequest;
use App\Models\LiteratureCategoryDetails;
use App\Models\LiteratureUi;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\NotificationHistory;

class LiteratureCategoryRepository {

    private $fileUploader;

    public function __construct()
    {
        $this->fileUploader = new FileUploadRepository;
    }

    public function handleLiteratureCategoryView()
    {
        try
        {
            $data['allData'] = LiteratureCategory::orderBy('order','ASC')->get();

            $datas['literatureCategoryDesignAllData'] = LiteratureUi::all();

            $data['paths'] = array();
            array_push( $data['paths'] , array("icon_image_path" => "public/uploads/literature_category_icon_image/","background_image_details_path" => "public/uploads/literature_category_bg_image_details/","back_button_details_path" => "public/uploads/literature_category_back_button_details/","card_button_details_image_path" => "public/uploads/literature_category_card_button_details/"));

            $datas['literatureCategoryDesignPaths'] = array();
            array_push( $datas['literatureCategoryDesignPaths'] , array("image_path" => "public/uploads/literature_ui_image/"));

            $error = "No Image";

            $respMsg = "Literature Category View Succesfully Listed!";
            $respCode = 200;
            $respData = $data;
            $respDesignData = $datas;

        }catch(\Exception $e){
            $respMsg = "Literature Category View Listing Failed";
            $respCode = 400;
            $respData = $data;
            $respDesignData = $datas;
        }
        return array($respMsg,$respCode,$respData,$respDesignData,$error);
    }


    public function handleSortUpdate(Request $request)
    {
        try {
                $ids_order = $request->ids ;
                $ids__order_explode = explode("," , $ids_order);

                $counter = 1 ;

                foreach($ids__order_explode as $id)
                {
                    $im_up = LiteratureCategory::find($id);
                    $im_up->order = $counter;
                    $im_up->save();
                    $counter++ ;
                }
                $respMsg = "Literature Category Succesfully sorted";
                $respCode = 200;
                $respData = NULL;
            }catch(\Exception $e){

                // return $e->getMessage();
                $respMsg = "Literature Category Sorting Failed";
                $respCode = 400;
                $respData = NULL;
            }
        return array($respMsg,$respCode,$respData);
    }

    public function handleInnerSortUpdate(Request $request)
    {
        try {
                $ids_order = $request->ids ;
                $ids__order_explode = explode("," , $ids_order);

                $counter = 1 ;

                foreach($ids__order_explode as $id)
                {
                    $im_up = LiteratureCategoryDetails::find($id);
                    $im_up->order = $counter;
                    $im_up->save();
                    $counter++ ;
                }
                $respMsg = "Literature Category Details Succesfully sorted";
                $respCode = 200;
                $respData = NULL;
            }catch(\Exception $e){

                // return $e->getMessage();
                $respMsg = "Literature Category Details Sorting Failed";
                $respCode = 400;
                $respData = NULL;
            }

        return array($respMsg,$respCode,$respData);
    }

    public function handleLiteratureCategoryInnerView($category_id)
    {
        try{
            $data = $category_id;
            $categoryName = LiteratureCategory::where('category_id',$category_id)->value('name');
            $LiteratureCategoryDetailsLists['allData'] = LiteratureCategoryDetails::orderBy('order','ASC')->where('category_id',$category_id)->get();

            $LiteratureCategoryDetailsLists['paths'] = array();
            array_push( $LiteratureCategoryDetailsLists['paths'] , array("thumbnail_image_path" => "public/uploads/literature_category_details_thumbnail_image/"));

            $error = "No Image";

            $respMsg = "Literature Category Details Succesfully Viewed";
            $respCode = 200;
            $respData = $data;
            $respCategoryName = $categoryName;
            $respLiteratureCategoryDetailsLists = $LiteratureCategoryDetailsLists;


        }catch(\Exception $e){

            $respMsg = "Literature Category Details Viewing Failed";
            $respCode = 400;
            $respData = $data;
            $respCategoryName = $categoryName;
            $respLiteratureCategoryDetailsLists = $LiteratureCategoryDetailsLists;
        }
        return array($respMsg,$respCode,$respData,$respCategoryName,$respLiteratureCategoryDetailsLists,$error);

    }

    public function handleLiteratureCategoryStore(LiteratureCategoryStoreRequest $request)
    {

        try {

                $request->validated();

                $category_id = Helper::IDGenerator(new LiteratureCategory, 'category_id',5,'LC');

                $litCatObj = new LiteratureCategory;
                $litCatObj->name = $request->name;
                $litCatObj->category_id = $category_id;
                if ($request->hasFile('icon_image')) {
                    $fileName = $this->fileUploader->handleFileUpload('literature_category_icon_image',$request->file('icon_image'));
                    $litCatObj->icon_image = $fileName;
                }
                if ($request->hasFile('bg_image_details')) {
                    $fileName = $this->fileUploader->handleFileUpload('literature_category_bg_image_details',$request->file('bg_image_details'));
                    $litCatObj->bg_image_details = $fileName;
                }
                if ($request->hasFile('back_button_details')) {
                    $fileName = $this->fileUploader->handleFileUpload('literature_category_back_button_details',$request->file('back_button_details'));
                    $litCatObj->back_button_details = $fileName;
                }
                if ($request->hasFile('card_button_details')) {
                    $fileName = $this->fileUploader->handleFileUpload('literature_category_card_button_details',$request->file('card_button_details'));
                    $litCatObj->card_button_details = $fileName;
                }
                $litCatObj->order = LiteratureCategory::max('order') + 1;
                $litCatObj->save();


                $notify = Http::asForm()->post('https://exp.host/--/api/v2/push/send', [
                    'to' => 'ExponentPushToken[YR4towF9HOVZs2TmgnA6uy]',
                    'sound' => 'default',
                    'title'=> 'Literature Category Added!!',
                    'body'=> 'Literature Category Of Title '.$litCatObj->name.' added!!',
                ]);

                $userId=Auth::user()->id;
                $notification = new NotificationHistory();
                $notification->user_id = $userId;
                $notification->resp_id = $notify['data']['id'];
                $notification->title = $litCatObj->name;
                $notification->description = 'Literature Category Of Title '.$litCatObj->name.' added!!';
                $notification->save();


                $respMsg = "Literature Category Succesfully Added!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';

            }catch(\Exception $e){

                $respMsg = "Literature Category Adding Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }

    public function handleLiteratureCategoryEdit($id)
    {
        try{

            $editData = LiteratureCategory::find($id);
            $error = "No Image";

            $respMsg = "Edit Succesfully Done!";
            $respCode = 200;
            $respData = $editData;

        }catch(\Exception $e){
            $respMsg = "Editing Failed";
            $respCode = 400;
            $respData = $editData;

        }
        return array($respMsg,$respCode,$respData,$error);
    }


    public function handleLiteratureCategoryUpdate(LiteratureCategoryUpdateRequest $request,$id)
    {

        try {

                $request->validated();

                $litCatObjUp = LiteratureCategory::find($id);
                $litCatObjUp->name = $request->name;
                if ($request->hasFile('icon_image')) {
                    File::delete('public/uploads/literature_category_icon_image/'.$litCatObjUp->icon_image);
                    $fileName = $this->fileUploader->handleFileUpload('literature_category_icon_image',$request->file('icon_image'));
                    $litCatObjUp->icon_image = $fileName;
                }
                if ($request->hasFile('bg_image_details')) {
                    File::delete('public/uploads/literature_category_bg_image_details/'.$litCatObjUp->bg_image_details);
                    $fileName = $this->fileUploader->handleFileUpload('literature_category_bg_image_details',$request->file('bg_image_details'));
                    $litCatObjUp->bg_image_details = $fileName;
                }
                if ($request->hasFile('back_button_details')) {
                    File::delete('public/uploads/literature_category_back_button_details/'.$litCatObjUp->back_button_details);
                    $fileName = $this->fileUploader->handleFileUpload('literature_category_back_button_details',$request->file('back_button_details'));
                    $litCatObjUp->back_button_details = $fileName;
                }
                if ($request->hasFile('card_button_details')) {
                    File::delete('public/uploads/literature_category_card_button_details/'.$litCatObjUp->card_button_details);
                    $fileName = $this->fileUploader->handleFileUpload('literature_category_card_button_details',$request->file('card_button_details'));
                    $litCatObjUp->card_button_details = $fileName;
                }
                $litCatObjUp->status = $request->status;
                $litCatObjUp -> save();


                $respMsg = "Literature Category Succesfully Updated!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';
            }catch(\Exception $e){

                $respMsg = "Literature Category Updation Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }

    public function handleLiteratureCategoryDelete($id)
    {
        try{
            LiteratureCategory::find($id)->delete();

            $respMsg = "Literature Category Succesfully Deleted!";
            $respCode = 200;
            $respType = 'info';

        }catch(\Exception $e){
            $respMsg = "Literature Category Deletion Failed";
            $respCode = 400;
            $respType = 'danger';

        }
        return array($respMsg,$respCode,$respType);
    }

    public function handleLiteratureCategoryRestore($id)
    {
        try{
            LiteratureCategory::withTrashed()->find($id)->restore();

            $respMsg = "Literature Category Succesfully Restored!";
            $respCode = 200;
            $respType = 'info';

        }catch(\Exception $e){
            $respMsg = "Literature Category Restoration Failed";
            $respCode = 400;
            $respType = 'danger';

        }
        return array($respMsg,$respCode,$respType);
    }

    public function handleLiteratureCategoryTrashView()
    {
        try{
            $data['allData'] = LiteratureCategory::onlyTrashed()->get();
            $error = "No Image";

            $respMsg = "Literature Category Trash Succesfully Viewed!";
            $respCode = 200;
            $respData = $data;

        }catch(\Exception $e){
            $respMsg = "Literature Category View Failed";
            $respCode = 400;
            $respData = $data;

        }
        return array($respMsg,$respCode,$respData,$error);
    }

    public function handleLiteratureCategoryForceDelete($id)
    {
        try{

            $litCatForceDeleteId = LiteratureCategory::withTrashed()->find($id);
            File::delete('public/uploads/literature_category_card_button_details/'.$litCatForceDeleteId->card_button_details);
            File::delete('public/uploads/literature_category_back_button_details/'.$litCatForceDeleteId->back_button_details);
            File::delete('public/uploads/literature_category_bg_image_details/'.$litCatForceDeleteId->bg_image_details);
            File::delete('public/uploads/literature_category_icon_image/'.$litCatForceDeleteId->icon_image);
            $litCatForceDeleteId->forceDelete();
            $respMsg = "Literature Category Deleted Permanently!";
            $respCode = 200;
            $respType = 'info';

        }catch(\Exception $e){
            $respMsg = "Literature Category Deletion Failed";
            $respCode = 400;
            $respType = 'danger';
        }
        return array($respMsg,$respCode,$respType);
    }
}

?>
