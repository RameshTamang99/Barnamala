<?php
namespace App\Repository;
use App\Http\Requests\LiteratureUiStoreRequest;
use App\Models\LiteratureUi;
use Exception;
use Illuminate\Support\Facades\File;

class LiteratureUiRepository {

    private $fileUploader;

    public function __construct()
    {
        $this->fileUploader = new FileUploadRepository;
    }

    public function handleLiteratureUiView()
    {
        try{

            $data['allData'] = LiteratureUi::all();
            $data['paths'] = array();
            array_push( $data['paths'] , array("image_path" => "public/uploads/literature_ui_image/"));
            $error = "No Image";

            $respMsg = "Literature Ui Succesfully Viewed";
            $respCode = 200;
            $respData = $data;


        }catch(\Exception $e){

            $respMsg = "Literature Ui Viewing Failed";
            $respCode = 400;
            $respData = $data;
        }
        return array($respMsg,$respCode, $respData,$error);

    }


    public function handleLiteratureUiEdit($id)
    {
        try{
            $editData = LiteratureUi::find($id);
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

    public function handleLiteratureUiUpdate(LiteratureUiStoreRequest $request,$id)
    {

        try {
                // Will return only validated data
                $request->validated();

                $LiteratureUiUp = LiteratureUi::find($id);

                if ($request->hasFile('background_image')) {
                    File::delete('public/uploads/literature_ui_image/'.$LiteratureUiUp->background_image);

                    $fileName = $this->fileUploader->handleFileUpload('literature_ui_image',$request->file('background_image'));
                    $LiteratureUiUp->background_image = $fileName;

                }

                if ($request->hasFile('back_button_image')) {
                    File::delete('public/uploads/literature_ui_image/'.$LiteratureUiUp->back_button_image);

                    $fileName = $this->fileUploader->handleFileUpload('literature_ui_image',$request->file('back_button_image'));
                    $LiteratureUiUp->back_button_image = $fileName;

                }
                if ($request->hasFile('category_display_card_image')) {
                    File::delete('public/uploads/literature_ui_image/'.$LiteratureUiUp->category_display_card_image);

                    $fileName = $this->fileUploader->handleFileUpload('literature_ui_image',$request->file('category_display_card_image'));
                    $LiteratureUiUp->category_display_card_image = $fileName;

                }
                $LiteratureUiUp->save();

                $respMsg = "Literature Ui Succesfully Updated!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';
            }catch(\Exception $e){

                $respMsg = "Literature Ui  Updation Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }
}

?>
