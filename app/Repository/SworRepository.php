<?php
namespace App\Repository;


use App\Models\Swor;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SworStoreRequest;
use App\Models\BarnamaalaContentsMenuUi;

class SworRepository {

    private $fileUploader;

    public function __construct()
    {
        $this->fileUploader = new FileUploadRepository;
    }

    public function handleSworView()
    {
        try{
            $data['allData'] = Swor::orderBy('swor_order','ASC')->get();

            $datas['sworDesignAllData'] = BarnamaalaContentsMenuUi::where('type',"=",'swor')->get();

            $data['paths'] = array();
            array_push( $data['paths'] , array("audio_path" => "public/uploads/swor_audio/"));

            $datas['sworDesignPaths'] = array();
            array_push( $datas['sworDesignPaths'] , array("image_path" => "public/uploads/barnamaala_contents_menu_ui_image/"));

            $respMsg = "Swor View Succesfully Listed!";
            $respCode = 200;
            $respData = $data;
            $respDesignData = $datas;

        }catch(\Exception $e){
            $respMsg = "Swor View Listing Failed";
            $respCode = 400;
            $respData = $data;
            $respDesignData = $datas;

        }
        return array($respMsg,$respCode,$respData,$respDesignData);
    }


    public function handleSortUpdate(Request $request)
    {
        try {
                $ids_order = $request->ids ;
                $ids__order_explode = explode("," , $ids_order);

                $counter = 1 ;

                foreach($ids__order_explode as $id)
                {
                    $swor_up = Swor::find($id);
                    $swor_up->swor_order = $counter;
                    $swor_up->save();
                    $counter++ ;
                }
                $respMsg = "Swor Succesfully sorted";
                $respCode = 200;
                $respData = NULL;
            }catch(\Exception $e){

                // return $e->getMessage();
                $respMsg = "Swor Sorting Failed";
                $respCode = 400;
                $respData = NULL;
            }

        return array($respMsg,$respCode,$respData);
    }

    public function handleSworStore(SworStoreRequest $request)
    {

        try {
                // Will return only validated data
                $request->validated();

                $SworObj = new Swor;
                $SworObj->swor_name = $request->swor_name;

                if ($request->hasFile('swor_audio')) {
                    $fileName = $this->fileUploader->handleFileUpload('swor_audio',$request->file('swor_audio'));
                    $SworObj->swor_audio = $fileName;

                }
                $SworObj->swor_order = Swor::max('swor_order') + 1;
                $SworObj->save();

                $respMsg = "Swor Succesfully Added!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';

            }catch(\Exception $e){

                $respMsg = "Swor Adding Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }

    public function handleSworEdit($id)
    {
        try{
            $editData = Swor::find($id);

            $respMsg = "Edit Succesfully Done!";
            $respCode = 200;
            $respData = $editData;

        }catch(\Exception $e){
            $respMsg = "Editing Failed";
            $respCode = 400;
            $respData = $editData;

        }
        return array($respMsg,$respCode,$respData);
    }


    public function handleSworUpdate(SworStoreRequest $request,$id)
    {
        try {
                // Will return only validated data
                $request->validated();

                $SworUp = Swor::find($id);
                $SworUp->swor_name = $request->swor_name;

                if ($request->hasFile('swor_audio')) {
                    File::delete('public/uploads/swor_audio/'.$SworUp->swor_audio);

                    $fileName = $this->fileUploader->handleFileUpload('swor_audio',$request->file('swor_audio'));
                    $SworUp->swor_audio = $fileName;

                }
                $SworUp->save();

                $respMsg = "Swor Succesfully Updated!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';
            }catch(\Exception $e){

                $respMsg = "Swor Updation Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }

    public function handleSworDelete($id)
    {
        try{
            Swor::find($id)->delete();

            $respMsg = "Swor Succesfully Deleted!";
            $respCode = 200;
            $respType = 'info';

        }catch(\Exception $e){
            $respMsg = "Swor Deletion Failed";
            $respCode = 400;
            $respType = 'danger';

        }
        return array($respMsg,$respCode,$respType);
    }

    public function handleSworRestore($id)
    {
        try{
            Swor::withTrashed()->find($id)->restore();

            $respMsg = "Swor Succesfully Restored!";
            $respCode = 200;
            $respType = 'info';

        }catch(\Exception $e){
            $respMsg = "Swor Restoration Failed";
            $respCode = 400;
            $respType = 'danger';

        }
        return array($respMsg,$respCode,$respType);
    }

    public function handleSworTrashView()
    {
        try{
            $data['allData'] = Swor::onlyTrashed()->get();

            $respMsg = "Swor Trash Succesfully Viewed!";
            $respCode = 200;
            $respData = $data;

        }catch(\Exception $e){
            $respMsg = "Swor View Failed";
            $respCode = 400;
            $respData = $data;

        }
        return array($respMsg,$respCode,$respData);
    }

    public function handleSworForceDelete($id)
    {
        try{

            $SworForceDelId = Swor::withTrashed()->find($id);
            File::delete('public/uploads/swor_audio/'.$SworForceDelId->swor_audio);
            $SworForceDelId->forceDelete();

            $respMsg = "Swor Deleted Permanently!";
            $respCode = 200;
            $respType = 'info';

        }catch(\Exception $e){
            $respMsg = "Swor Deletion Failed";
            $respCode = 400;
            $respType = 'danger';
        }
        return array($respMsg,$respCode,$respType);
    }
}

?>
