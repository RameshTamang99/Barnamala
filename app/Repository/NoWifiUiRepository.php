<?php
namespace App\Repository;
use App\Http\Requests\NoWifiUiStoreRequest;
use App\Models\NoWifiUi;
use Exception;
use Illuminate\Support\Facades\File;

class NoWifiUiRepository {

    private $fileUploader;

    public function __construct()
    {
        $this->fileUploader = new FileUploadRepository;
    }

    public function handleNoWifiUiView()
    {
        try{

            $data['allData'] = NoWifiUi::all();
            $data['paths'] = array();
            array_push( $data['paths'] , array("image_path" => "public/uploads/no_wifi_ui_image/"));
            $error  = "No Image";

            $respMsg = "No Wifi Ui Succesfully Viewed";
            $respCode = 200;
            $respData = $data;


        }catch(\Exception $e){

            $respMsg = "No Wifi Ui Viewing Failed";
            $respCode = 400;
            $respData = $data;
        }
        return array($respMsg,$respCode, $respData,$error);

    }


    public function handleNoWifiUiEdit($id)
    {
        try{
            $editData = NoWifiUi::find($id);
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

    public function handleNoWifiUiUpdate(NoWifiUiStoreRequest $request,$id)
    {

        try {
                // Will return only validated data
                $request->validated();

                $NoWifiUiUp = NoWifiUi::find($id);

                if ($request->hasFile('model_image')) {
                    File::delete('public/uploads/no_wifi_ui_image/'.$NoWifiUiUp->model_image);

                    $fileName = $this->fileUploader->handleFileUpload('no_wifi_ui_image',$request->file('model_image'));
                    $NoWifiUiUp->model_image = $fileName;

                }

                if ($request->hasFile('reconnect_btn_image')) {
                    File::delete('public/uploads/no_wifi_ui_image/'.$NoWifiUiUp->reconnect_btn_image);

                    $fileName = $this->fileUploader->handleFileUpload('no_wifi_ui_image',$request->file('reconnect_btn_image'));
                    $NoWifiUiUp->reconnect_btn_image = $fileName;

                }
                $NoWifiUiUp->save();

                $respMsg = "No Wifi Ui Succesfully Updated!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';
            }catch(\Exception $e){

                $respMsg = "No Wifi Ui  Updation Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }
}

?>
