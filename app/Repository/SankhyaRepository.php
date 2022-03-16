<?php
namespace App\Repository;

use App\Models\Sankhya;
use Illuminate\Http\Request;
use Exception;
use App\Http\Requests\SankhyaStoreRequest;
use App\Models\BarnamaalaContentsMenuUi;
use Illuminate\Support\Facades\File;


class SankhyaRepository {
    private $fileUploader;

    public function __construct()
    {
        $this->fileUploader = new FileUploadRepository;
    }

    public function handleSankhyaView()
    {
        try{
            $data['allData'] = Sankhya::orderBy('sankhya_order','ASC')->get();
            $datas['sankhyaDesignAllData'] = BarnamaalaContentsMenuUi::where('type',"=",'sankhya')->get();

            $data['paths'] = array();
            array_push( $data['paths'] , array("audio_path" => "public/uploads/sankhya_audio/"));

            $datas['sankhyaDesignPaths'] = array();
            array_push( $datas['sankhyaDesignPaths'] , array("image_path" => "public/uploads/barnamaala_contents_menu_ui_image/"));

            $respMsg = "Sankhya View Succesfully Listed!";
            $respCode = 200;
            $respData = $data;
            $respDesignData = $datas;

        }catch(\Exception $e){
            $respMsg = "Sankhya View Listing Failed";
            $respCode = 400;
            $respData = $data;
            $respDesignData = $datas;

        }
        return array($respMsg,$respCode,$respData,$respDesignData);
    }


    public function handleSortUpdate(Request $request)
    {
        try {
                $idsOrder = $request->ids ;
                $idsOrderExplode = explode("," , $idsOrder);

                $counter = 1 ;

                foreach($idsOrderExplode as $id)
                {
                    $sankhyaUp = Sankhya::find($id);
                    $sankhyaUp->sankhya_order = $counter;
                    $sankhyaUp->save();
                    $counter++ ;
                }
                $respMsg = "Sankhya Succesfully sorted";
                $respCode = 200;
                $respData = NULL;
            }catch(\Exception $e){

                // return $e->getMessage();
                $respMsg = "Sankhya Sorting Failed";
                $respCode = 400;
                $respData = NULL;
            }

        return array($respMsg,$respCode,$respData);
    }
    public function handleSankhyaStore(SankhyaStoreRequest $request)
    {

        try {
                // Will return only validated data
                $request->validated();

                $SankhyaObj = new Sankhya;
                $SankhyaObj->sankhya_name = $request->sankhya_name;

                if ($request->hasFile('sankhya_audio')) {
                    $fileName = $this->fileUploader->handleFileUpload('sankhya_audio',$request->file('sankhya_audio'));
                    $SankhyaObj->sankhya_audio = $fileName;

                }
                $SankhyaObj->sankhya_order = Sankhya::max('sankhya_order') + 1;
                $SankhyaObj->save();

                $respMsg = "Sankhya Succesfully Added!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';

            }catch(\Exception $e){

                $respMsg = "Sankhya Adding Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }

    public function handleSankhyaEdit($id)
    {
        try{
            $editData = Sankhya::find($id);

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


    public function handleSankhyaUpdate(SankhyaStoreRequest $request,$id)
    {

        try {
                // Will return only validated data
                $request->validated();

                $SankhyaUp = Sankhya::find($id);
                $SankhyaUp->sankhya_name = $request->sankhya_name;

                if ($request->hasFile('sankhya_audio')) {
                    File::delete('public/uploads/sankhya_audio/'.$SankhyaUp->sankhya_audio);

                    $fileName = $this->fileUploader->handleFileUpload('sankhya_audio',$request->file('sankhya_audio'));
                    $SankhyaUp->sankhya_audio = $fileName;

                }
                $SankhyaUp->save();

                $respMsg = "Sankhya Succesfully Updated!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';
            }catch(\Exception $e){

                $respMsg = "Sankhya Updation Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData, $respType);
    }

    public function handleSankhyaDelete($id)
    {
        try{
            Sankhya::find($id)->delete();

            $respMsg = "Sankhya Succesfully Deleted!";
            $respCode = 200;
            $respType = 'info';

        }catch(\Exception $e){
            $respMsg = "Sankhya Deletion Failed";
            $respCode = 400;
            $respType = 'danger';

        }
        return array($respMsg,$respCode, $respType);
    }

    public function handleSankhyaRestore($id)
    {
        try{
            Sankhya::withTrashed()->find($id)->restore();

            $respMsg = "Sankhya Succesfully Restored!";
            $respCode = 200;
            $respType = 'info';

        }catch(\Exception $e){
            $respMsg = "Sankhya Restoration Failed";
            $respCode = 400;
            $respType = 'danger';

        }
        return array($respMsg,$respCode, $respType);
    }

    public function handleSankhyaTrashView()
    {
        try{
            $data['allData'] = Sankhya::onlyTrashed()->get();

            $respMsg = "Sankhya Trash Succesfully Viewed!";
            $respCode = 200;
            $respData = $data;

        }catch(\Exception $e){
            $respMsg = "Sankhya View Failed";
            $respCode = 400;
            $respData = $data;

        }
        return array($respMsg,$respCode,$respData);
    }

    public function handleSankhyaForceDelete($id)
    {
        try{

            $sankhyaForceDelId = Sankhya::withTrashed()->find($id);
            File::delete('public/uploads/sankhya_audio/'.$sankhyaForceDelId->sankhya_audio);
            $sankhyaForceDelId->forceDelete();

            $respMsg = "Sankhya Deleted Permanently!";
            $respCode = 200;
            $respType = 'info';

        }catch(\Exception $e){
            $respMsg = "Sankhya Deletion Failed";
            $respCode = 400;
            $respType = 'danger';
        }
        return array($respMsg,$respCode, $respType);
    }
}

?>
