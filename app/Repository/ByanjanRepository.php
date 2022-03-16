<?php
namespace App\Repository;

use App\Models\Byanjan;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ByanjanStoreRequest;
use App\Models\BarnamaalaContentsMenuUi;

class ByanjanRepository {
    private $fileUploader;

    public function __construct()
    {
        $this->fileUploader = new FileUploadRepository;
    }

    public function handleByanjanView()
    {
        try{
            $data['allData'] = Byanjan::orderBy('byanjan_order','ASC')->get();

            $datas['byanjanDesignAllData'] = BarnamaalaContentsMenuUi::where('type',"=",'byanjan')->get();

            $data['paths'] = array();
            array_push( $data['paths'] , array("audio_path" => "public/uploads/byanjan_audio/"));

            $datas['byanjanDesignPaths'] = array();
            array_push( $datas['byanjanDesignPaths'] , array("image_path" => "public/uploads/barnamaala_contents_menu_ui_image/"));


            $respMsg = "Byanjan View Succesfully Listed!";
            $respCode = 200;
            $respData = $data;
            $respDesignData = $datas;

        }catch(\Exception $e){
            $respMsg = "Byanjan View Listing Failed";
            $respCode = 400;
            $respData = $data;
            $respDesignData = $datas;

        }
        return array($respData,$respMsg,$respCode,$respDesignData);
    }

    public function handleSortUpdate(Request $request)
    {
        try {
                $idsOrder = $request->ids ;
                $idsOrderExplode = explode("," , $idsOrder);

                $counter = 1 ;

                foreach($idsOrderExplode as $id)
                {
                    $byanjanUp = Byanjan::find($id);
                    $byanjanUp->byanjan_order = $counter;
                    $byanjanUp->save();
                    $counter++ ;
                }
                $respMsg = "Byanjan Succesfully sorted";
                $respCode = 200;
                $respData = NULL;
            }catch(\Exception $e){

                // return $e->getMessage();
                $respMsg = "Byanjan Sorting Failed";
                $respCode = 400;
                $respData = NULL;
            }

        return array($respMsg,$respCode,$respData);
    }

    public function handleByanjanStore(ByanjanStoreRequest $request)
    {
        try {
                // Will return only validated data
                $request->validated();

                $ByanjanObj = new Byanjan;
                $ByanjanObj->byanjan_name = $request->byanjan_name;
                if ($request->hasFile('byanjan_audio')) {
                    $fileName = $this->fileUploader->handleFileUpload('byanjan_audio',$request->file('byanjan_audio'));
                    $ByanjanObj->byanjan_audio = $fileName;
                }
                $ByanjanObj->byanjan_order = Byanjan::max('byanjan_order') + 1;
                $ByanjanObj->save();

                $respMsg = "Byanjan Succesfully Added!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';

            }catch(\Exception $e)
            {
                $respMsg = "Byanjan Adding Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }

    public function handleByanjanEdit($id)
    {
        try{
            $editData = Byanjan::find($id);

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


    public function handleByanjanUpdate(ByanjanStoreRequest $request,$id)
    {

        try {
                // Will return only validated data
                $request->validated();

                $ByanjanUp = Byanjan::find($id);
                $ByanjanUp->byanjan_name = $request->byanjan_name;

                if ($request->hasFile('byanjan_audio')) {
                    File::delete('public/uploads/byanjan_audio/'.$ByanjanUp->byanjan_audio);

                    $fileName = $this->fileUploader->handleFileUpload('byanjan_audio',$request->file('byanjan_audio'));
                    $ByanjanUp->byanjan_audio = $fileName;
                }
                $ByanjanUp->save();

                $respMsg = "Byanjan Succesfully Updated!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';
            }catch(\Exception $e){

                $respMsg = "Byanjan Updation Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }

    public function handleByanjanDelete($id)
    {
        try{
            $ByanjanId = Byanjan::find($id);
            $ByanjanId->delete();

            $respMsg = "Byanjan Succesfully Deleted!";
            $respCode = 200;
            $respType = 'info';

        }catch(\Exception $e){
            $respMsg = "Barkhari Deletion Failed";
            $respCode = 400;
            $respType = 'danger';

        }
        return array($respMsg,$respCode,$respType);
    }

    public function handleByanjanRestore($id)
    {
        try{
            $ByanjanId = Byanjan::withTrashed()->find($id);
            $ByanjanId->restore();

            $respMsg = "Byanjan Succesfully Restored!";
            $respCode = 200;
            $respType = 'info';

        }catch(\Exception $e){
            $respMsg = "Byanjan Restoration Failed";
            $respCode = 400;
            $respType = 'danger';

        }
        return array($respMsg,$respCode,$respType);
    }

    public function handleByanjanTrashView()
    {
        try{
            $data['allData'] = Byanjan::onlyTrashed()->get();

            $respMsg = "Byanjan Trash Succesfully Viewed!";
            $respCode = 200;
            $respData = $data;

        }catch(\Exception $e){
            $respMsg = "Byanjan View Failed";
            $respCode = 400;
            $respData = $data;

        }
        return array($respMsg,$respCode,$respData);
    }

    public function handleByanjanForceDelete($id)
    {
        try{
            $ByanjanForceDeleteId = Byanjan::withTrashed()->find($id);
            File::delete('uploads/byanjan_audio/'.$ByanjanForceDeleteId->byanjan_audio);
            $ByanjanForceDeleteId->forceDelete();

            $respMsg = "Byanjan Deleted Permanently!";
            $respCode = 200;
            $respType = 'info';

        }catch(\Exception $e){
            $respMsg = "Byanjan Deletion Failed";
            $respCode = 400;
            $respType = 'danger';


        }
        return array($respMsg,$respCode,$respType);
    }

}

?>
