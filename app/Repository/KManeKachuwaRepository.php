<?php
namespace App\Repository;

use App\Http\Requests\KManeKachuwaStoreRequest;
use App\Models\Byanjan;
use App\Models\KManeKachuwa;
use App\Models\KManeKachuwaUi;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\File;

class KManeKachuwaRepository {

    private $fileUploader;

    public function __construct()
    {
        $this->fileUploader = new FileUploadRepository;
    }

    public function handleKManeKachuwaView()
    {
        try{

            $data['allData']  = KManeKachuwa::select('byanjans.byanjan_name' ,'k_mane_kachuwas.*' )
            ->join('byanjans', 'byanjans.id', '=', 'k_mane_kachuwas.byanjan_id')
            ->orderBy('k_mane_kachuwas.kmk_order','ASC')
            ->get();

            $datas['kaManeKachuwaAllData'] = KManeKachuwaUi::all();


            $data['paths'] = array();
            array_push( $data['paths'] , array("image_path" => "public/uploads/kmk_image/" , "audio_path" => "public/uploads/kmk_audio/"));

            $datas['kaManeKachuwaDesignPaths'] = array();
            array_push( $datas['kaManeKachuwaDesignPaths'] , array("image_path" => "public/uploads/ka_mane_kachuwa_ui_image/"));

            $error = "No Image";

            $respMsg = "K Mane Kachuwa View Succesfully Listed!";
            $respCode = 200;
            $respData = $data;
            $respDesignData = $datas;


        }catch(\Exception $e){
            $respMsg = "K Mane Kachuwa View Listing Failed";
            $respCode = 400;
            $respData = $data;
            $respDesignData = $datas;

        }
        return array($respMsg,$respCode,$respData,$respDesignData,$error);
    }

    public function handleKManeKachuwaAdd()
    {
        try{
            $data['allData'] = Byanjan::all();

            $respMsg = "K Mane Kachuwa Add Succesfull";
            $respCode = 200;
            $respData = $data;

        }catch(\Exception $e){
            $respMsg = "K Mane Kachuwa Add Failed";
            $respCode = 400;
            $respData = $data;

        }
        return array($respMsg,$respCode,$respData);
    }

    public function handleSortUpdate(Request $request)
    {
        try {
                $idsOrder = $request->ids ;
                $idsOrderExplode = explode("," , $idsOrder);

                $counter = 1 ;

                foreach($idsOrderExplode as $id)
                {
                    $kmkUp = KManeKachuwa::find($id);
                    $kmkUp->kmk_order = $counter;
                    $kmkUp->save();
                    $counter++ ;
                }
                $respMsg = "K Mane Kachuwa Succesfully sorted";
                $respCode = 200;
                $respData = NULL;
            }catch(\Exception $e){

                // return $e->getMessage();
                $respMsg = "K Mane Kachuwa Sorting Failed";
                $respCode = 400;
                $respData = NULL;
            }

        return array($respMsg,$respCode,$respData);
    }

    public function handleKManeKachuwaStore(KManeKachuwaStoreRequest $request)
    {

        try {
                // Will return only validated data
                $request->validated();

                $KmkUp= new KManeKachuwa;
                $KmkUp->byanjan_id = $request->byanjan_id;
                $KmkUp->kmk_name = $request->kmk_name;
                if ($request->hasFile('kmk_image')) {
                    $fileName = $this->fileUploader->handleFileUpload('kmk_image',$request->file('kmk_image'));
                    $KmkUp->kmk_image = $fileName;

                }
                if ($request->hasFile('kmk_audio')) {
                    $fileName = $this->fileUploader->handleFileUpload('kmk_audio',$request->file('kmk_audio'));
                    $KmkUp->kmk_audio = $fileName;

                }
                $KmkUp->kmk_order = KManeKachuwa::max('kmk_order') + 1;
                $KmkUp->save();

                $respMsg = "K Mane Kachuwa Succesfully Added!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';

            }catch(\Exception $e){

                $respMsg = "K Mane Kachuwa Adding Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }

    public function handleKManeKachuwaEdit($id)
    {
        try{
            $data['allData'] = byanjan::all();
            $editData = KManeKachuwa::find($id);
            $error = "No Image";

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
        return array($respMsg,$respCode,$respData1,$respData2,$error);
    }


    public function handleKManeKachuwaUpdate(KManeKachuwaStoreRequest $request,$id)
    {

        try {
                // Will return only validated data
                $request->validated();

                $KmkUp = KManeKachuwa::find($id);
                $KmkUp->byanjan_id = $request->byanjan_id;
                $KmkUp->kmk_name = $request->kmk_name;

                if ($request->hasFile('kmk_image')) {
                    File::delete('public/uploads/kmk_image/'.$KmkUp->kmk_image);

                    $fileName = $this->fileUploader->handleFileUpload('kmk_image',$request->file('kmk_image'));
                    $KmkUp->kmk_image = $fileName;

                }

                if ($request->hasFile('kmk_audio')) {
                    File::delete('public/uploads/kmk_audio/'.$KmkUp->kmk_audio);

                    $fileName = $this->fileUploader->handleFileUpload('kmk_audio',$request->file('kmk_audio'));
                    $KmkUp->kmk_audio = $fileName;

                }
                $KmkUp->save();

                $respMsg = "K Mane Kachuwa Succesfully Updated!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';
            }catch(\Exception $e){

                $respMsg = "K Mane Kachuwa Updation Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }

    public function handleKManeKachuwaDelete($id)
    {
        try{
            KManeKachuwa::find($id)->delete();

            $respMsg = "K Mane Kachuwa Succesfully Deleted!";
            $respCode = 200;
            $respType = 'info';

        }catch(\Exception $e){
            $respMsg = "K Mane Kachuwa Deletion Failed";
            $respCode = 400;
            $respType = 'danger';

        }
        return array($respMsg,$respCode,$respType);
    }

    public function handleKManeKachuwaRestore($id)
    {
        try{
            KManeKachuwa::withTrashed()->find($id)->restore();

            $respMsg = "K Mane Kachuwa Succesfully Restored!";
            $respCode = 200;
            $respType = 'info';

        }catch(\Exception $e){
            $respMsg = "K Mane Kachuwa Restoration Failed";
            $respCode = 400;
            $respType = 'danger';

        }
        return array($respMsg,$respCode,$respType);
    }

    public function handleKManeKachuwaTrashView()
    {
        try{
            $data['allData'] = KManeKachuwa::onlyTrashed()->get();
            $error = "No Image";

            $respMsg = "K Mane Kachuwa Trash Succesfully Viewed!";
            $respCode = 200;
            $respData = $data;

        }catch(\Exception $e){
            $respMsg = "K Mane Kachuwa View Failed";
            $respCode = 400;
            $respData = $data;

        }
        return array($respMsg,$respCode,$respData,$error);
    }

    public function handleKManeKachuwaForceDelete($id)
    {
        try{
            $KmkId = KManeKachuwa::withTrashed()->find($id);
            File::delete('public/uploads/kmk_audio/'.$KmkId->kmk_audio);
            File::delete('public/uploads/kmk_image/'.$KmkId->kmk_image);
            $KmkId->forceDelete();

            $respMsg = "K Mane Kachuwa Deleted Permanently!";
            $respCode = 200;
            $respType = 'info';

        }catch(\Exception $e){
            $respMsg = "K Mane Kachuwa Deletion Failed";
            $respCode = 400;
            $respType = 'danger';
        }
        return array($respMsg,$respCode,$respType);
    }

}

?>
