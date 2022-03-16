<?php
namespace App\Repository;
use App\Http\Requests\KaManeKachuwaUiStoreRequest;
use App\Models\KManeKachuwaUi;
use Exception;
use Illuminate\Support\Facades\File;

class KaManeKachuwaUiRepository {

    private $fileUploader;

    public function __construct()
    {
        $this->fileUploader = new FileUploadRepository;
    }

    public function handleKaManeKachuwaUiView()
    {
        try{

            $data['allData'] = KManeKachuwaUi::all();
            $data['paths'] = array();
            array_push( $data['paths'] , array("image_path" => "public/uploads/ka_mane_kachuwa_ui_image/"));
            $error = "No Image";

            $respMsg = "Ka Mane Kachuwa Ui Succesfully Viewed";
            $respCode = 200;
            $respData = $data;


        }catch(\Exception $e){

            $respMsg = "Ka Mane Kachuwa Ui Viewing Failed";
            $respCode = 400;
            $respData = $data;
        }
        return array($respMsg,$respCode, $respData,$error);

    }


    public function handleKaManeKachuwaUiEdit($id)
    {
        try{
            $editData = KManeKachuwaUi::find($id);
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

    public function handleKaManeKachuwaUiUpdate(KaManeKachuwaUiStoreRequest $request,$id)
    {

        try {
                // Will return only validated data
                $request->validated();

                $KaManeKachuwaUiUp = KManeKachuwaUi::find($id);

                if ($request->hasFile('background_image')) {
                    File::delete('public/uploads/ka_mane_kachuwa_ui_image/'.$KaManeKachuwaUiUp->background_image);

                    $fileName = $this->fileUploader->handleFileUpload('ka_mane_kachuwa_ui_image',$request->file('background_image'));
                    $KaManeKachuwaUiUp->background_image = $fileName;

                }

                if ($request->hasFile('back_button_image')) {
                    File::delete('public/uploads/ka_mane_kachuwa_ui_image/'.$KaManeKachuwaUiUp->back_button_image);

                    $fileName = $this->fileUploader->handleFileUpload('ka_mane_kachuwa_ui_image',$request->file('back_button_image'));
                    $KaManeKachuwaUiUp->back_button_image = $fileName;

                }
                if ($request->hasFile('text_display_card_image')) {
                    File::delete('public/uploads/ka_mane_kachuwa_ui_image/'.$KaManeKachuwaUiUp->text_display_card_image);

                    $fileName = $this->fileUploader->handleFileUpload('ka_mane_kachuwa_ui_image',$request->file('text_display_card_image'));
                    $KaManeKachuwaUiUp->text_display_card_image = $fileName;

                }
                if ($request->hasFile('autoplay_image')) {
                    File::delete('public/uploads/ka_mane_kachuwa_ui_image/'.$KaManeKachuwaUiUp->autoplay_image);

                    $fileName = $this->fileUploader->handleFileUpload('ka_mane_kachuwa_ui_image',$request->file('autoplay_image'));
                    $KaManeKachuwaUiUp->autoplay_image = $fileName;

                }
                if ($request->hasFile('autoplay_pause_image')) {
                    File::delete('public/uploads/ka_mane_kachuwa_ui_image/'.$KaManeKachuwaUiUp->autoplay_pause_image);

                    $fileName = $this->fileUploader->handleFileUpload('ka_mane_kachuwa_ui_image',$request->file('autoplay_pause_image'));
                    $KaManeKachuwaUiUp->autoplay_pause_image = $fileName;

                }

                $KaManeKachuwaUiUp->save();

                $respMsg = "Ka Mane Kachuwa Ui Succesfully Updated!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';
            }catch(\Exception $e){

                $respMsg = "Ka Mane Kachuwa Ui  Updation Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }
}

?>
