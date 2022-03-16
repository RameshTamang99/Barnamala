<?php
namespace App\Repository;
use App\Http\Requests\BarnamaalaMenuUiStoreRequest;
use App\Models\BarnamaalaMenuUi;

use App\Models\KManeKachuwa;
use App\Models\KManeKachuwaUi;

use Exception;
use Illuminate\Support\Facades\File;

class BarnamaalaMenuUiRepository {

    private $fileUploader;

    public function __construct()
    {
        $this->fileUploader = new FileUploadRepository;
    }

    public function handleBarnamaalaMenuUiView()
    {
        try{

            $data['allData'] = BarnamaalaMenuUi::all();
            $data['paths'] = array();
            array_push( $data['paths'] , array("image_path" => "public/uploads/barnamaala_menu_ui_image/"));
            $error = "No Image";

            $respMsg = "Barnamaala Menu Ui Succesfully Viewed";
            $respCode = 200;
            $respData = $data;


        }catch(\Exception $e){

            $respMsg = "Barnamaala Menu Ui Viewing Failed";
            $respCode = 400;
            $respData = $data;
        }
        return array($respMsg,$respCode, $respData,$error);

    }

    public function handleBarnamaalaMenuUiViewCombined()
    {
        $response = array();
        try{

            $data['allData'] = BarnamaalaMenuUi::all();
            $data['paths'] = array();
            array_push( $data['paths'] , array("image_path" => "public/uploads/barnamaala_menu_ui_image/"));
            $error = "No Image";

            $respMsg = "Barnamaala Menu Ui Succesfully Viewed";
            $respCode = 200;
            $respData = $data;


        }catch(\Exception $e){

            $respMsg = "Barnamaala Menu Ui Viewing Failed";
            $respCode = 400;
            $respData = $data;
        }
        $barnamala_view_ui =  $respData;
        array_push( $response , $barnamala_view_ui);

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
        $kaManeKachuwa =  $respData;
        array_push( $response , $kaManeKachuwa);
        $kaManeKachuwa =  $respDesignData;
        array_push( $response , $kaManeKachuwa);

        return $response;

    }


    public function handleBarnamaalaMenuUiEdit($id)
    {
        try{
            $editData = BarnamaalaMenuUi::find($id);
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

    public function handleBarnamaalaMenuUiUpdate(BarnamaalaMenuUiStoreRequest $request,$id)
    {

        try {
                // Will return only validated data
                $request->validated();

                $BarnamaalaMenuUiUp = BarnamaalaMenuUi::find($id);

                if ($request->hasFile('background_image')) {
                    File::delete('public/uploads/barnamaala_menu_ui_image/'.$BarnamaalaMenuUiUp->background_image);

                    $fileName = $this->fileUploader->handleFileUpload('barnamaala_menu_ui_image',$request->file('background_image'));
                    $BarnamaalaMenuUiUp->background_image = $fileName;

                }

                if ($request->hasFile('back_button_image')) {
                    File::delete('public/uploads/barnamaala_menu_ui_image/'.$BarnamaalaMenuUiUp->back_button_image);

                    $fileName = $this->fileUploader->handleFileUpload('barnamaala_menu_ui_image',$request->file('back_button_image'));
                    $BarnamaalaMenuUiUp->back_button_image = $fileName;

                }
                if ($request->hasFile('byanjan_menu_button_image')) {
                    File::delete('public/uploads/barnamaala_menu_ui_image/'.$BarnamaalaMenuUiUp->byanjan_menu_button_image);

                    $fileName = $this->fileUploader->handleFileUpload('barnamaala_menu_ui_image',$request->file('byanjan_menu_button_image'));
                    $BarnamaalaMenuUiUp->byanjan_menu_button_image = $fileName;

                }
                if ($request->hasFile('ka_mane_kachuwa_menu_button_image')) {
                    File::delete('public/uploads/barnamaala_menu_ui_image/'.$BarnamaalaMenuUiUp->ka_mane_kachuwa_menu_button_image);

                    $fileName = $this->fileUploader->handleFileUpload('barnamaala_menu_ui_image',$request->file('ka_mane_kachuwa_menu_button_image'));
                    $BarnamaalaMenuUiUp->ka_mane_kachuwa_menu_button_image = $fileName;

                }
                if ($request->hasFile('barakhari_menu_button_image')) {
                    File::delete('public/uploads/barnamaala_menu_ui_image/'.$BarnamaalaMenuUiUp->barakhari_menu_button_image);

                    $fileName = $this->fileUploader->handleFileUpload('barnamaala_menu_ui_image',$request->file('barakhari_menu_button_image'));
                    $BarnamaalaMenuUiUp->barakhari_menu_button_image = $fileName;

                }
                if ($request->hasFile('swor_menu_button_image')) {
                    File::delete('public/uploads/barnamaala_menu_ui_image/'.$BarnamaalaMenuUiUp->swor_menu_button_image);

                    $fileName = $this->fileUploader->handleFileUpload('barnamaala_menu_ui_image',$request->file('swor_menu_button_image'));
                    $BarnamaalaMenuUiUp->swor_menu_button_image = $fileName;

                }
                if ($request->hasFile('sankhya_menu_button_image')) {
                    File::delete('public/uploads/barnamaala_menu_ui_image/'.$BarnamaalaMenuUiUp->sankhya_menu_button_image);

                    $fileName = $this->fileUploader->handleFileUpload('barnamaala_menu_ui_image',$request->file('sankhya_menu_button_image'));
                    $BarnamaalaMenuUiUp->sankhya_menu_button_image = $fileName;

                }

                $BarnamaalaMenuUiUp->save();

                $respMsg = "Barnamaala Menu Ui Succesfully Updated!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';
            }catch(\Exception $e){

                $respMsg = "Barnamaala Menu Ui  Updation Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }
}

?>
