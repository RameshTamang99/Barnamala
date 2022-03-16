<?php
namespace App\Repository;

use App\Http\Requests\BarakhariStoreRequest;
use App\Models\Barakhari;
use App\Models\BarnamaalaContentsMenuUi;
use App\Models\Byanjan;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\File;

class BarakhariRepository {
    private $fileUploader;

    public function __construct()
    {
        $this->fileUploader = new FileUploadRepository;
    }

    public function handleBarakhariView($id)
    {
        try{
            $data['allData'] = Barakhari::orderBy('barakhari_order','ASC')->where('byanjan_id',"=",$id)->get();

            $datas['barakhariDesignAllData'] = BarnamaalaContentsMenuUi::where('type',"=",'barakhari')->get();

            $data['paths'] = array();
            array_push( $data['paths'] , array("audio_path" => "public/uploads/barakhari_audio/"));

            $datas['barakhariDesignPaths'] = array();
            array_push( $datas['barakhariDesignPaths'] , array("image_path" => "public/uploads/barnamaala_contents_menu_ui_image/"));

            $respMsg = "Barakhari View Succesfully Listed!";
            $respCode = 200;
            $respData = $data;
            $respDesignData = $datas;

        }catch(\Exception $e){
            $respMsg = "Barakhari View Listing Failed";
            $respCode = 400;
            $respData = $data;
            $respDesignData = $datas;

        }
        return array($respMsg,$respCode,$respData, $respDesignData);
    }


    public function handleBarakhariViewCombined()
    {
        try{
            // $data['allData'] = Barakhari::orderBy('barakhari_order','ASC')->where('byanjan_id',"=",$id)->get();
            $data['allData'] = Byanjan::orderBy('byanjan_order','ASC')->get();
            $datas['barakhariDesignAllData'] = BarnamaalaContentsMenuUi::where('type',"=",'barakhari')->get();

            $data['paths'] = array();
            array_push( $data['paths'] , array("audio_path" => "public/uploads/barakhari_audio/"));

            $datas['barakhariDesignPaths'] = array();
            array_push( $datas['barakhariDesignPaths'] , array("image_path" => "public/uploads/barnamaala_contents_menu_ui_image/"));

            $respMsg = "Barakhari View Succesfully Listed!";
            $respCode = 200;
            $respData = $data;
            $respDesignData = $datas;

        }catch(\Exception $e){
            $respMsg = "Barakhari View Listing Failed";
            $respCode = 400;
            $respData = $data;
            $respDesignData = $datas;

        }
        return array($respMsg,$respCode,$respData, $respDesignData);
    }


    public function handleByanjanBarakhariView()
    {
        try{
            $data['allData'] = Byanjan::orderBy('byanjan_order','ASC')->get();

            $respMsg = "Byanjan View Succesfully Listed!";
            $respCode = 200;
            $respData = $data;

        }catch(\Exception $e){
            $respMsg = "Byanjan View Listing Failed";
            $respCode = 400;
            $respData = $data;

        }
        return array($respMsg,$respCode,$respData);
    }

    public function handleBarakhariAdd()
    {
        try{
            $data['allData'] = Byanjan::all();

            $respMsg = "Barakhari Add Succesfull";
            $respCode = 200;
            $respData = $data;

        }catch(\Exception $e){
            $respMsg = "Barakhari Add Failed";
            $respCode = 400;
            $respData = $data;

        }
        return array($respData,$respMsg,$respCode);
    }

    public function handleSortUpdate(Request $request)
    {
        try {
                $idsOrder = $request->ids ;
                $idsOrderExplode = explode("," , $idsOrder);

                $counter = 1 ;

                foreach($idsOrderExplode as $id)
                {
                    $barakhariUp = Barakhari::find($id);
                    $barakhariUp->barakhari_order = $counter;
                    $barakhariUp->save();
                    $counter++ ;
                }
                $respMsg = "Barakhari Succesfully sorted";
                $respCode = 200;
                $respData = NULL;
            }catch(\Exception $e){

                // return $e->getMessage();
                $respMsg = "Barakhari Sorting Failed";
                $respCode = 400;
                $respData = NULL;
            }

        return array($respMsg,$respCode,$respData);
    }
    public function handleBarakhariStore(BarakhariStoreRequest $request)
    {

        try {
                // Will return only validated data
                $request->validated();
                $barakhariObj = new Barakhari;
                $barakhariObj->byanjan_id = $request->byanjan_id;
                $barakhariObj->barakhari_name = $request->barakhari_name;
                if ($request->hasFile('barakhari_audio')) {
                    $fileName = $this->fileUploader->handleFileUpload('barakhari_audio',$request->file('barakhari_audio'));
                    $barakhariObj->barakhari_audio = $fileName;

                }
                $max_order = Barakhari::where('byanjan_id',"=",$barakhariObj->byanjan_id)->max('barakhari_order');
                if($max_order == null)
                {
                    $max_order = 1;
                }
                else{
                    $max_order++;
                }
                $barakhariObj->barakhari_order = $max_order;
                $barakhariObj->save();

                $respMsg = "Barakhari Succesfully Added!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';
                $respViewId = $barakhariObj->byanjan_id;

            }catch(\Exception $e){

                $respMsg = "Barakhari Adding Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
                $respViewId = $barakhariObj->byanjan_id;
            }
        return array($respMsg,$respCode,$respData,$respType,$respViewId);
    }

    public function handleBarakhariEdit($id)
    {
        try{
            $data['allData'] = Byanjan::all();
            $editData = Barakhari::find($id);

            $respMsg = "Edit Succesfully Done!";
            $respCode = 200;
            $respData1 = $data;
            $respData2 = $editData;


        }catch(\Exception $e){
            $respMsg = "Editing Failed";
            $respCode = 400;
            $respData1 = $data;
            $respData2 = $editData;

        }
        return array($respMsg,$respCode,$respData1,$respData2);
    }


    public function handleBarakhariUpdate(BarakhariStoreRequest $request,$id)
    {

        try {
                // Will return only validated data
                $request->validated();

                $barakhariUp = Barakhari::find($id);
                $barakhariUp->byanjan_id = $request->byanjan_id;
                $barakhariUp->barakhari_name = $request->barakhari_name;

                if ($request->hasFile('barakhari_audio')) {
                    File::delete('public/uploads/barakhari_audio/'.$barakhariUp->barakhari_audio);

                    $fileName = $this->fileUploader->handleFileUpload('barakhari_audio',$request->file('barakhari_audio'));
                    $barakhariUp->barakhari_audio = $fileName;

                }
                $barakhariUp->save();

                $respMsg = "Barakhari Succesfully Updated!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';
                $respId = $barakhariUp->byanjan_id;
            }catch(\Exception $e){

                $respMsg = "Barakhari Updation Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
                $respId = $barakhariUp->byanjan_id;
            }
        return array($respMsg,$respCode,$respData,$respType,$respId);
    }

    public function handleBarakhariDelete($id)
    {
        try{

            $barakhariId = Barakhari::find($id);
            $byanjanId = $barakhariId->byanjan_id;
            $barakhariId->delete();

            $respMsg = "Barakhari Succesfully Deleted!";
            $respCode = 200;
            $respType = 'info';
            $respId = $byanjanId;

        }catch(\Exception $e){
            $respMsg = "Barkhari Deletion Failed";
            $respCode = 400;
            $respType = 'danger';
            $respId = $byanjanId;
        }
        return array($respMsg,$respCode,$respType,$respId);
    }

    public function handleBarakhariRestore($id)
    {
        try{

            $barakhariTrashedId = Barakhari::withTrashed()->find($id);
            $byanjanId = $barakhariTrashedId->byanjan_id;
            $barakhariTrashedId->restore();

            $respMsg = "Barakhari Succesfully Restored!";
            $respCode = 200;
            $respType = 'info';
            $respId = $byanjanId;

        }catch(\Exception $e){
            $respMsg = "Barakhari Restoration Failed";
            $respCode = 400;
            $respType = 'danger';
            $respId = $byanjanId;

        }
        return array($respMsg,$respCode,$respType,$respId);
    }

    public function handleBarakhariTrashView()
    {
        try{
            $data['allData'] = Barakhari::onlyTrashed()->get();

            $respMsg = "Barakhari Trash Succesfully Viewed!";
            $respCode = 200;
            $respData = $data;

        }catch(\Exception $e){
            $respMsg = "Barakhari View Failed";
            $respCode = 400;
            $respData = $data;

        }
        return array($respMsg,$respCode,$respData);
    }

    public function handleBarakhariForceDelete($id)
    {
        try{

            $barakhari_f_id = Barakhari::withTrashed()->find($id);
            File::delete('public/uploads/barakhari_audio/'.$barakhari_f_id->barakhari_audio);
            $barakhari_f_id->forceDelete();

            $respMsg = "Barakhari Deleted Permanently!";
            $respCode = 200;
            $respType = 'info';

        }catch(\Exception $e){
            $respMsg = "Barakhari Deletion Failed";
            $respCode = 400;
            $respType = 'danger';
        }
        return array($respMsg,$respCode,$respType);
    }
}

?>
