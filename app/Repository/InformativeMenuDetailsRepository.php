<?php
namespace App\Repository;

use App\Http\Requests\InformativeMenuDetailsStoreRequest;
use App\Models\InformativeMenu;
use App\Models\InformativeMenuDetails;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\File;
use Vimeo\Laravel\Facades\Vimeo;

class InformativeMenuDetailsRepository {

    private $fileUploader;

    public function __construct()
    {
        $this->fileUploader = new FileUploadRepository;
    }



    public function handleInformativeMenuDetailsStore(InformativeMenuDetailsStoreRequest $request)
    {

        try {
                // Will return only validated data
                $request->validated();

                $infoMenuDetails = new InformativeMenuDetails;
                $infoMenuDetails->menu_id = $request->menu_id;
                $infoMenuDetails->imd_name = $request->imd_name;
                $infoMenuDetails->imd_description = $request->imd_description;
                if ($request->hasFile('imd_image')) {
                    $fileName = $this->fileUploader->handleFileUpload('imd_image',$request->file('imd_image'));
                    $infoMenuDetails->imd_image = $fileName;
                }
                if ($request->hasFile('imd_audio')) {
                    $fileName = $this->fileUploader->handleFileUpload('imd_audio',$request->file('imd_audio'));
                    $infoMenuDetails->imd_audio = $fileName;
                }
                if ($request->hasFile('imd_video')) {
                    $response = Vimeo::upload($request->imd_video,[
                        "name" => $request->imd_video->getclientOriginalName(),
                        "privacy" => [
                            'view' => 'anybody'
                        ]
                    ]);
                    $fileName = explode("/",$response);
                    $infoMenuDetails->imd_video =$fileName[2];
                }
                if ($request->hasFile('imd_background_image')) {
                    $fileName = $this->fileUploader->handleFileUpload('imd_background_image',$request->file('imd_background_image'));
                    $infoMenuDetails->imd_background_image = $fileName;
                }

                $selection = $infoMenuDetails->where('menu_id', '=', $infoMenuDetails->menu_id)->get();
                $count = count($selection);

                if ($count == 0) {
                    $infoMenuDetails->imd_order = 1;
                }
                else
                {
                    $maxOrder = $infoMenuDetails->where('menu_id', '=', $infoMenuDetails->menu_id)->get()->max('imd_order');
                    $increment = $maxOrder + 1;
                    $infoMenuDetails->imd_order = $increment;
                }
                $infoMenuDetails->save();

                $respMsg = "Informative Menu Details Succesfully Added!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';

            }catch(\Exception $e){

                $respMsg = "Informative Menu Details Adding Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }

    public function handleInformativeMenuDetailsEdit($id)
    {
        try{
            $editData = InformativeMenuDetails::find($id);

            $menuId = $editData->menu_id;

            $error  = "No Image";

            $respMsg = "Edit Succesfully Done!";
            $respCode = 200;
            $respEditData = $editData;
            $respMenuId = $menuId;

        }catch(\Exception $e){
            $respMsg = "Editing Failed";
            $respCode = 400;
            $respEditData = $editData;
            $respMenuId = $menuId;

        }
        return array($respMsg,$respCode,$respEditData,$respMenuId,$error);
    }


    public function handleInformativeMenuDetailsUpdate(InformativeMenuDetailsStoreRequest $request,$id)
    {

        try {
                // Will return only validated data
                $request->validated();

                $infoMenuDetailsUp = InformativeMenuDetails::find($id);

                $menuId = $request->menu_id;
                $infoMenuDetailsUp->menu_id =  $menuId ;
                $infoMenuDetailsUp->imd_name = $request->imd_name;
                $infoMenuDetailsUp->imd_description = $request->imd_description;

                if ($request->hasFile('imd_image')) {
                    File::delete('public/uploads/imd_image/' . $infoMenuDetailsUp->imd_image);
                    $fileName = $this->fileUploader->handleFileUpload('imd_image',$request->file('imd_image'));
                    $infoMenuDetailsUp->imd_image = $fileName;
                }
                if ($request->hasFile('imd_audio')) {
                    File::delete('public/uploads/imd_audio/' . $infoMenuDetailsUp->imd_audio);
                    $fileName = $this->fileUploader->handleFileUpload('imd_audio',$request->file('imd_audio'));
                    $infoMenuDetailsUp->imd_audio = $fileName;
                }
                if ($infoMenuDetailsUp->imd_video == NULL) {
                    $response = Vimeo::upload($request->imd_video,[
                        "name" => $request->imd_video->getclientOriginalName(),
                        "privacy" => [
                            'view' => 'anybody'
                        ]
                    ]);
                    $fileName = explode("/",$response);
                    $infoMenuDetailsUp->imd_video =$fileName[2];
                    }
                    elseif($request->hasFile('imd_video')){
                    $response1 = Vimeo::replace('/videos/'.$infoMenuDetailsUp->imd_video, $request->imd_video,[
                        "name" => $request->imd_video->getclientOriginalName(),
                        "privacy" => [
                            'view' => 'anybody'
                        ]
                    ]);
                    $fileName = explode("/",$response1);
                    $infoMenuDetailsUp->imd_video = $fileName[2];
                }
                if ($request->hasFile('imd_background_image')) {
                    File::delete('public/uploads/imd_background_image/' . $infoMenuDetailsUp->imd_background_image);
                    $fileName = $this->fileUploader->handleFileUpload('imd_background_image',$request->file('imd_background_image'));
                    $infoMenuDetailsUp->imd_background_image = $fileName;
                }
                $infoMenuDetailsUp->save();

                $respMsg = "Informative Menu Details Succesfully Updated!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';
                $respMenuId = $menuId;
            }catch(\Exception $e){

                $respMsg = "Informative Menu Details Updation Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
                $respMenuId = $menuId;
            }
        return array($respMsg,$respCode,$respData,$respType,$respMenuId);
    }

    public function handleInformativeMenuDetailsDelete($id)
    {
        try{
            $infoMenuDetailsId = InformativeMenuDetails::find($id);
            $menuId = $infoMenuDetailsId->menu_id;
            $infoMenuDetailsId->delete();

            $respMsg = "Informative Menu Details Succesfully Deleted!";
            $respCode = 200;
            $respType = 'info';
            $respMenuId =  $menuId;

        }catch(\Exception $e){
            $respMsg = "Informative Menu Details Deletion Failed";
            $respCode = 400;
            $respType = 'danger';
            $respMenuId =  $menuId;

        }
        return array($respMsg,$respCode,$respType,$respMenuId);
    }

    public function handleInformativeMenuDetailsRestore($id)
    {
        try{
            $infoMenuDetailsId = InformativeMenuDetails::withTrashed()->find($id);
            $menuId = $infoMenuDetailsId->menu_id;
            $infoMenuDetailsId->restore();

            $respMsg = "Informative Menu Details Succesfully Restored!";
            $respCode = 200;
            $respType = 'info';
            $respMenuId = $menuId;

        }catch(\Exception $e){
            $respMsg = "Informative Menu Details Restoration Failed";
            $respCode = 400;
            $respType = 'danger';
            $respMenuId = $menuId;

        }
        return array($respMsg,$respCode,$respType,$respMenuId);
    }

    public function handleInformativeMenuDetailsTrashView($id)
    {
        try{
            $data['allData'] = InformativeMenuDetails::onlyTrashed()->get();

            $error = "No Image";

            $respMsg = "Informative Menu Details Trash Succesfully Viewed!";
            $respCode = 200;
            $respData = $data;


        }catch(\Exception $e){
            $respMsg = "Informative Menu Details View Failed";
            $respCode = 400;
            $respData = $data;

        }
        return array($respMsg,$respCode,$respData,$error);
    }



    public function handleInformativeMenuDetailsForceDelete($id)
    {
        try{

            $infoMenuDetailsForceDeleteId = InformativeMenuDetails::withTrashed()->find($id);
            File::delete('public/uploads/imd_background_image/' . $infoMenuDetailsForceDeleteId->imd_background_image);
            $file_name='/videos/'.$infoMenuDetailsForceDeleteId->imd_video;
            Vimeo::request($file_name,array(),'DELETE');
            File::delete('public/uploads/imd_audio/' . $infoMenuDetailsForceDeleteId->imd_audio);
            File::delete('public/uploads/imd_image/' . $infoMenuDetailsForceDeleteId->imd_image);

            $menuId = $infoMenuDetailsForceDeleteId->menu_id;
            $infoMenuDetailsForceDeleteId->forceDelete();

            $respMsg = "Informative Menu Details Deleted Permanently!";
            $respCode = 200;
            $respType = 'info';
            $respMenuId = $menuId;

        }catch(\Exception $e){
            $respMsg = "Informative Menu Details Deletion Failed";
            $respCode = 400;
            $respType = 'danger';
            $respMenuId = $menuId;

        }
        return array($respMsg,$respCode,$respType,$respMenuId);
    }
}

?>
