<?php
namespace App\Repository;

use App\Http\Requests\LiteratureCategoryDetailsStoreRequest;
use App\Models\LiteratureCategory;
use App\Models\LiteratureCategoryDetails;
use Exception;
use Illuminate\Support\Facades\File;
use Vimeo\Laravel\Facades\Vimeo;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\NotificationHistory;

class LiteratureCategoryDetailsRepository {

    private $fileUploader;

    public function __construct()
    {
        $this->fileUploader = new FileUploadRepository;
    }


    public function handleLiteratureCategoryDetailsView()
    {
        try{
            $data['allData'] = LiteratureCategoryDetails::orderBy('order', 'ASC')->get();

            $respMsg = "Literature Category Details View Succesfully Listed!";
            $respCode = 200;
            $respData = $data;

        }catch(\Exception $e){
            $respMsg = "Literature Category Details View Listing Failed";
            $respCode = 400;
            $respData = $data;

        }
        return array($respMsg,$respCode,$respData);
    }

    public function handleLiteratureCategoryDetailsStore(LiteratureCategoryDetailsStoreRequest $request)
    {

        try {
                // Will return only validated data
                $request->validated();

                $litCatDetailsObj = new LiteratureCategoryDetails;
                $litCatDetailsObj->category_id = $request->category_id;
                $litCatDetailsObj->title_name = $request->title_name;
                if ($request->hasFile('thumbnail_image')) {
                    $fileName = $this->fileUploader->handleFileUpload('literature_category_details_thumbnail_image',$request->file('thumbnail_image'));
                    $litCatDetailsObj->thumbnail_image = $fileName;
                }
                if ($request->hasFile('vimeo_id')) {
                    $response = Vimeo::upload($request->vimeo_id,[
                        "name" => $request->vimeo_id->getclientOriginalName(),
                        "privacy" => [
                            'view' => 'anybody'
                        ]
                    ]);
                    $fileName = explode("/",$response);
                    $litCatDetailsObj->vimeo_id =$fileName[2];
                }


                $selection = $litCatDetailsObj->where('category_id', '=', $litCatDetailsObj->category_id)->get();
                $count = count($selection);

                if ($count == 0) {
                    $litCatDetailsObj->order = 1;
                }
                else
                {
                    $maxOrder = $litCatDetailsObj->where('category_id', '=', $litCatDetailsObj->category_id)->get()->max('order');
                    $increment = $maxOrder + 1;
                    $litCatDetailsObj->order = $increment;
                }
                $litCatDetailsObj->save();


                $LiteratureCatName = LiteratureCategory::where('category_id',"=",$litCatDetailsObj->category_id)->pluck('name');

                $notify = Http::asForm()->post('https://exp.host/--/api/v2/push/send', [
                    'to' => 'ExponentPushToken[YR4towF9HOVZs2TmgnA6uy]',
                    'sound' => 'default',
                    'title'=> 'Literature of category '.$LiteratureCatName[0].' added!!',
                    'body'=> 'Literature Title '.$litCatDetailsObj->title_name.' added inside '.$LiteratureCatName[0].' category',
                ]);

                $userId=Auth::user()->id;
                $notification = new NotificationHistory();
                $notification->user_id = $userId;
                $notification->resp_id = $notify['data']['id'];
                $notification->title = $litCatDetailsObj->title_name;
                $notification->description = 'Literature Title '.$litCatDetailsObj->title_name.' added inside '.$LiteratureCatName[0].' category';
                $notification->save();


                $respMsg = "Literature Category Details Succesfully Added!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';

            }catch(\Exception $e){

                $respMsg = "Literature Category Details Adding Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }

    public function handleLiteratureCategoryDetailsEdit($id)
    {
        try{
            $editData = LiteratureCategoryDetails::find($id);

            $litCatId = $editData->category_id;

            $error = "No Image";

            $respMsg = "Edit Succesfully Done!";
            $respCode = 200;
            $respEditData = $editData;
            $respLitCatId = $litCatId;

        }catch(\Exception $e){
            $respMsg = "Editing Failed";
            $respCode = 400;
            $respEditData = $editData;
            $respLitCatId = $litCatId;

        }
        return array($respMsg,$respCode,$respEditData,$respLitCatId,$error);
    }


    public function handleLiteratureCategoryDetailsUpdate(LiteratureCategoryDetailsStoreRequest $request,$id)
    {

        try {
                // Will return only validated data
                $request->validated();

                $litCatDetailsUp = LiteratureCategoryDetails::find($id);

                $litCatId = $request->category_id;
                $litCatDetailsUp->category_id =  $litCatId ;
                $litCatDetailsUp->title_name = $request->title_name;
                if ($request->hasFile('thumbnail_image')) {
                    File::delete('public/uploads/literature_category_details_thumbnail_image/' . $litCatDetailsUp->thumbnail_image);
                    $fileName = $this->fileUploader->handleFileUpload('literature_category_details_thumbnail_image',$request->file('thumbnail_image'));
                    $litCatDetailsUp->thumbnail_image = $fileName;
                }
                if ($litCatDetailsUp->vimeo_id == NULL) {

                    $response = Vimeo::upload($request->vimeo_id,[
                        "name" => $request->vimeo_id->getclientOriginalName(),
                        "privacy" => [
                            'view' => 'anybody'
                        ]
                    ]);
                    $fileName = explode("/",$response);
                    $litCatDetailsUp->vimeo_id =$fileName[2];
                }
                elseif($request->hasFile('vimeo_id')){
                        $response1 = Vimeo::replace('/videos/'.$litCatDetailsUp->vimeo_id, $request->vimeo_id,[
                        "name" => $request->vimeo_id->getclientOriginalName(),
                        "privacy" => [
                            'view' => 'anybody'
                        ]
                    ]);
                    $fileName = explode("/",$response1);
                    $litCatDetailsUp->vimeo_id = $fileName[2];
                }
                $litCatDetailsUp->save();

                $respMsg = "Literature Category Details Succesfully Updated!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';
                $respLitCatId = $litCatId;
            }catch(\Exception $e){

                $respMsg = "Literature Category Details Updation Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
                $respLitCatId = $litCatId;
            }
        return array($respMsg,$respCode,$respData,$respType,$respLitCatId);
    }

    public function handleLiteratureCategoryDetailsDelete($id)
    {
        try{
            $litCatDetailsId = LiteratureCategoryDetails::find($id);
            $litCatId = $litCatDetailsId->category_id;
            $litCatDetailsId->delete();

            $respMsg = "Literature Category Details Succesfully Deleted!";
            $respCode = 200;
            $respType = 'info';
            $respLitCatId =  $litCatId;

        }catch(\Exception $e){
            $respMsg = "Literature Category Details Deletion Failed";
            $respCode = 400;
            $respType = 'danger';
            $respLitCatId =  $litCatId;

        }
        return array($respMsg,$respCode,$respType,$respLitCatId);
    }

    public function handleLiteratureCategoryDetailsRestore($id)
    {
        try{
            $litCatDetailsId = LiteratureCategoryDetails::withTrashed()->find($id);
            $litCatId = $litCatDetailsId->category_id;
            $litCatDetailsId->restore();

            $respMsg = "Literature Category Details Succesfully Restored!";
            $respCode = 200;
            $respType = 'info';
            $respLitCatId = $litCatId;

        }catch(\Exception $e){
            $respMsg = "Literature Category Details Restoration Failed";
            $respCode = 400;
            $respType = 'danger';
            $respLitCatId = $litCatId;

        }
        return array($respMsg,$respCode,$respType,$respLitCatId);
    }

    public function handleLiteratureCategoryDetailsTrashView($id)
    {
        try{
            $data['allData'] = LiteratureCategoryDetails::onlyTrashed()->get();
            $error = "No Image";

            $respMsg = "Literature Category Details Trash Succesfully Viewed!";
            $respCode = 200;
            $respData = $data;


        }catch(\Exception $e){
            $respMsg = "Literature Category Details View Failed";
            $respCode = 400;
            $respData = $data;

        }
        return array($respMsg,$respCode,$respData,$error);
    }

    public function handleLiteratureCategoryDetailsForceDelete($id)
    {
        try{

            $litCatDetailsForceDeleteId = LiteratureCategoryDetails::withTrashed()->find($id);
            $file_name='/videos/'.$litCatDetailsForceDeleteId->vimeo_id;
            Vimeo::request($file_name,array(),'DELETE');
            File::delete('public/uploads/literature_category_details_thumbnail_image/' . $litCatDetailsForceDeleteId->thumbnail_image);
            $litCatId = $litCatDetailsForceDeleteId->category_id;
            $litCatDetailsForceDeleteId->forceDelete();

            $respMsg = "Literature Category Details Deleted Permanently!";
            $respCode = 200;
            $respType = 'info';
            $respLitCatId = $litCatId;

        }catch(\Exception $e){
            $respMsg = "Literature Category Details Deletion Failed";
            $respCode = 400;
            $respType = 'danger';
            $respLitCatId = $litCatId;

        }
        return array($respMsg,$respCode,$respType,$respLitCatId);
    }
}

?>
