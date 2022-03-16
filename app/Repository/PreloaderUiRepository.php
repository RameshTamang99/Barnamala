<?php
namespace App\Repository;
use App\Http\Requests\PreloaderUiStoreRequest;
use App\Models\PreloaderUi;
use Exception;
use Illuminate\Support\Facades\File;

class PreloaderUiRepository {

    private $fileUploader;

    public function __construct()
    {
        $this->fileUploader = new FileUploadRepository;
    }

    public function handlePreloaderUiView()
    {
        try{

            $data['allData'] = PreloaderUi::all();
            $data['paths'] = array();
            array_push( $data['paths'] , array("image_path" => "public/uploads/preloader_ui_image/"));

            $error = "No Image";

            $respMsg = "Preloader Ui Succesfully Viewed";
            $respCode = 200;
            $respData = $data;


        }catch(\Exception $e){

            $respMsg = "Preloader Ui Viewing Failed";
            $respCode = 400;
            $respData = $data;
        }
        return array($respMsg,$respCode, $respData, $error);

    }


    public function handlePreloaderUiEdit($id)
    {
        try{
            $editData = PreloaderUi::find($id);
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

    public function handlePreloaderUiUpdate(PreloaderUiStoreRequest $request,$id)
    {

        try {
                // Will return only validated data
                $request->validated();

                $PreloaderUiUp = PreloaderUi::find($id);

                if ($request->hasFile('background_image')) {
                    File::delete('public/uploads/preloader_ui_image/'.$PreloaderUiUp->background_image);

                    $fileName = $this->fileUploader->handleFileUpload('preloader_ui_image',$request->file('background_image'));
                    $PreloaderUiUp->background_image = $fileName;

                }
                $PreloaderUiUp->loader_color_code = $request->loader_color_code;
                $PreloaderUiUp->save();

                $respMsg = "Preloader Ui Succesfully Updated!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';
            }catch(\Exception $e){

                $respMsg = "Preloader Ui  Updation Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }
}

?>
