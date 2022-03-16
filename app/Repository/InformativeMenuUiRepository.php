<?php
namespace App\Repository;
use App\Http\Requests\InformativeMenuUiStoreRequest;
use App\Models\InformativeMenuUi;
use Exception;
use Illuminate\Support\Facades\File;

class InformativeMenuUiRepository {

    private $fileUploader;

    public function __construct()
    {
        $this->fileUploader = new FileUploadRepository;
    }

    public function handleInformativeMenuUiView()
    {
        try{

            $data['allData'] = InformativeMenuUi::all();

            $error = "No Image";

            $respMsg = "Informative Menu Ui Succesfully Viewed";
            $respCode = 200;
            $respData = $data;


        }catch(\Exception $e){

            $respMsg = "Informative Menu Ui Viewing Failed";
            $respCode = 400;
            $respData = $data;
        }
        return array($respMsg,$respCode, $respData,$error);

    }

    public function handleInformativeMenuUiEdit($id)
    {
        try{
            $editData = InformativeMenuUi::find($id);
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

    public function handleInformativeMenuUiUpdate(InformativeMenuUiStoreRequest $request,$id)
    {

        try {
                // Will return only validated data
                $request->validated();

                $InformativeMenuUiUp = InformativeMenuUi::find($id);

                if ($request->hasFile('background_image')) {
                    File::delete('public/uploads/informative_menu_ui_image/'.$InformativeMenuUiUp->background_image);

                    $fileName = $this->fileUploader->handleFileUpload('informative_menu_ui_image',$request->file('background_image'));
                    $InformativeMenuUiUp->background_image = $fileName;

                }

                if ($request->hasFile('back_button_image')) {
                    File::delete('public/uploads/informative_menu_ui_image/'.$InformativeMenuUiUp->back_button_image);

                    $fileName = $this->fileUploader->handleFileUpload('informative_menu_ui_image',$request->file('back_button_image'));
                    $InformativeMenuUiUp->back_button_image = $fileName;

                }
                if ($request->hasFile('title_display_card_image')) {
                    File::delete('public/uploads/informative_menu_ui_image/'.$InformativeMenuUiUp->title_display_card_image);

                    $fileName = $this->fileUploader->handleFileUpload('informative_menu_ui_image',$request->file('title_display_card_image'));
                    $InformativeMenuUiUp->title_display_card_image = $fileName;

                }

                $InformativeMenuUiUp->save();

                $respMsg = "informative Menu Ui Succesfully Updated!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';
            }catch(\Exception $e){

                $respMsg = "informative Menu Ui  Updation Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }
}

?>
