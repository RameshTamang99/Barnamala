<?php
namespace App\Repository;
use App\Http\Requests\BarnamaalaContentsMenuUiStoreRequest;
use App\Models\BarnamaalaContentsMenuUi;
use Exception;
use Illuminate\Support\Facades\File;

class BarnamaalaContentsMenuUiRepository {

    private $fileUploader;

    public function __construct()
    {
        $this->fileUploader = new FileUploadRepository;
    }

    public function handleBarnamaalaContentsMenuUiView()
    {
        try{

            $data['allData'] = BarnamaalaContentsMenuUi::all();
            $data['paths'] = array();
            array_push( $data['paths'] , array("image_path" => "public/uploads/barnamaala_contents_menu_ui_image/"));
            $error = "No Image";

            $respMsg = "Barnamaala Contents Menu Ui Succesfully Viewed";
            $respCode = 200;
            $respData = $data;


        }catch(\Exception $e){

            $respMsg = "Barnamaala Contents Menu Ui Viewing Failed";
            $respCode = 400;
            $respData = $data;
        }
        return array($respMsg,$respCode, $respData,$error);

    }

    public function handleViewBarnamaalaContentsMenuUi($type)
    {
        try{

            $data['allData'] = BarnamaalaContentsMenuUi::where('type',"=",$type)->get();


            $data['paths'] = array();
            array_push( $data['paths'] , array("image_path" => "public/uploads/barnamaala_contents_menu_ui_image/"));

            $respMsg = "Barnamaala Contents Menu Ui Succesfully Viewed";
            $respCode = 200;
            $respData = $data;


        }catch(\Exception $e){

            $respMsg = "Barnamaala Contents Menu Ui Viewing Failed";
            $respCode = 400;
            $respData = $data;
        }
        return array($respMsg,$respCode, $respData);

    }

    public function handleBarnamaalaContentsMenuUiEdit($id)
    {
        try{
            $editData = BarnamaalaContentsMenuUi::find($id);
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

    public function handleBarnamaalaContentsMenuUiUpdate(BarnamaalaContentsMenuUiStoreRequest $request,$id)
    {

        try {
                // Will return only validated data
                $request->validated();

                $BarnamaalaContentsMenuUiUp = BarnamaalaContentsMenuUi::find($id);

                if ($request->hasFile('list_bg_image')) {
                    File::delete('public/uploads/barnamaala_contents_menu_ui_image/'.$BarnamaalaContentsMenuUiUp->list_bg_image);

                    $fileName = $this->fileUploader->handleFileUpload('barnamaala_contents_menu_ui_image',$request->file('list_bg_image'));
                    $BarnamaalaContentsMenuUiUp->list_bg_image = $fileName;

                }

                if ($request->hasFile('list_back_button_image')) {
                    File::delete('public/uploads/barnamaala_contents_menu_ui_image/'.$BarnamaalaContentsMenuUiUp->list_back_button_image);

                    $fileName = $this->fileUploader->handleFileUpload('barnamaala_contents_menu_ui_image',$request->file('list_back_button_image'));
                    $BarnamaalaContentsMenuUiUp->list_back_button_image = $fileName;

                }
                if ($request->hasFile('list_letter_card_image')) {
                    File::delete('public/uploads/barnamaala_contents_menu_ui_image/'.$BarnamaalaContentsMenuUiUp->list_letter_card_image);

                    $fileName = $this->fileUploader->handleFileUpload('barnamaala_contents_menu_ui_image',$request->file('list_letter_card_image'));
                    $BarnamaalaContentsMenuUiUp->list_letter_card_image = $fileName;

                }
                if ($request->hasFile('list_header_image')) {
                    File::delete('public/uploads/barnamaala_contents_menu_ui_image/'.$BarnamaalaContentsMenuUiUp->list_header_image);

                    $fileName = $this->fileUploader->handleFileUpload('barnamaala_contents_menu_ui_image',$request->file('list_header_image'));
                    $BarnamaalaContentsMenuUiUp->list_header_image = $fileName;

                }
                if ($request->hasFile('particular_text_card_image')) {
                    File::delete('public/uploads/barnamaala_contents_menu_ui_image/'.$BarnamaalaContentsMenuUiUp->particular_text_card_image);

                    $fileName = $this->fileUploader->handleFileUpload('barnamaala_contents_menu_ui_image',$request->file('particular_text_card_image'));
                    $BarnamaalaContentsMenuUiUp->particular_text_card_image = $fileName;

                }
                if ($request->hasFile('particular_teacher_avatar_image')) {
                    File::delete('public/uploads/barnamaala_contents_menu_ui_image/'.$BarnamaalaContentsMenuUiUp->particular_teacher_avatar_image);

                    $fileName = $this->fileUploader->handleFileUpload('barnamaala_contents_menu_ui_image',$request->file('particular_teacher_avatar_image'));
                    $BarnamaalaContentsMenuUiUp->particular_teacher_avatar_image = $fileName;

                }
                if ($request->hasFile('particular_back_button_image')) {
                    File::delete('public/uploads/barnamaala_contents_menu_ui_image/'.$BarnamaalaContentsMenuUiUp->particular_back_button_image);

                    $fileName = $this->fileUploader->handleFileUpload('barnamaala_contents_menu_ui_image',$request->file('particular_back_button_image'));
                    $BarnamaalaContentsMenuUiUp->particular_back_button_image = $fileName;

                }
                if ($request->hasFile('particular_background_image')) {
                    File::delete('public/uploads/barnamaala_contents_menu_ui_image/'.$BarnamaalaContentsMenuUiUp->particular_background_image);

                    $fileName = $this->fileUploader->handleFileUpload('barnamaala_contents_menu_ui_image',$request->file('particular_background_image'));
                    $BarnamaalaContentsMenuUiUp->particular_background_image = $fileName;

                }
                if ($request->hasFile('particular_auto_play_icon_image')) {
                    File::delete('public/uploads/barnamaala_contents_menu_ui_image/'.$BarnamaalaContentsMenuUiUp->particular_auto_play_icon_image);

                    $fileName = $this->fileUploader->handleFileUpload('barnamaala_contents_menu_ui_image',$request->file('particular_auto_play_icon_image'));
                    $BarnamaalaContentsMenuUiUp->particular_auto_play_icon_image = $fileName;

                }
                if ($request->hasFile('particular_auto_play_pause_icon_image')) {
                    File::delete('public/uploads/barnamaala_contents_menu_ui_image/'.$BarnamaalaContentsMenuUiUp->particular_auto_play_pause_icon_image);

                    $fileName = $this->fileUploader->handleFileUpload('barnamaala_contents_menu_ui_image',$request->file('particular_auto_play_pause_icon_image'));
                    $BarnamaalaContentsMenuUiUp->particular_auto_play_pause_icon_image = $fileName;

                }
                $BarnamaalaContentsMenuUiUp->type = $request->type;
                $BarnamaalaContentsMenuUiUp->save();

                $respMsg = "Barnamaala Contents Menu Ui Succesfully Updated!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';
            }catch(\Exception $e){

                $respMsg = "Barnamaala Contents Menu Ui  Updation Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }
}

?>
