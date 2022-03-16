<?php
namespace App\Repository;
use App\Http\Requests\JinglesUiStoreRequest;
use App\Models\JinglesUi;
use Exception;
use Illuminate\Support\Facades\File;

class JinglesUiRepository {

    private $fileUploader;

    public function __construct()
    {
        $this->fileUploader = new FileUploadRepository;
    }

    public function handleJinglesUiView()
    {
        try{

            $data['allData'] = JinglesUi::all();
            $data['paths'] = array();
            array_push( $data['paths'] , array("audio_path" => "public/uploads/jingles_ui_audio/"));

            $respMsg = "Jingles Ui Succesfully Viewed";
            $respCode = 200;
            $respData = $data;


        }catch(\Exception $e){

            $respMsg = "Jingles Ui Viewing Failed";
            $respCode = 400;
            $respData = $data;
        }
        return array($respMsg,$respCode, $respData);

    }


    public function handleJinglesUiEdit($id)
    {
        try{
            $editData = JinglesUi::find($id);

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

    public function handleJinglesUiUpdate(JinglesUiStoreRequest $request,$id)
    {

        try {
                // Will return only validated data
                $request->validated();

                $JinglesUiUp = JinglesUi::find($id);

                if ($request->hasFile('app_jingle')) {
                    File::delete('public/uploads/jingles_ui_audio/'.$JinglesUiUp->app_jingle);

                    $fileName = $this->fileUploader->handleFileUpload('jingles_ui_audio',$request->file('app_jingle'));
                    $JinglesUiUp->app_jingle = $fileName;

                }
                $JinglesUiUp->save();

                $respMsg = "Jingles Ui Succesfully Updated!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';
            }catch(\Exception $e){

                $respMsg = "Jingles Ui  Updation Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }
}

?>
