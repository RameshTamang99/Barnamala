<?php
namespace App\Repository;
use App\Http\Requests\FlipGamesStoreRequest;
use App\Models\FlipGames;
use Exception;
use Illuminate\Support\Facades\File;

class FlipGamesRepository {

    private $fileUploader;

    public function __construct()
    {
        $this->fileUploader = new FileUploadRepository;
    }


    public function handleFlipGamesStore(FlipGamesStoreRequest $request)
    {

        try {
                // Will return only validated data
                $request->validated();

                $FlipGamesObj = new FlipGames;
                if ($request->hasFile('flipgames_image')) {
                    $fileName = $this->fileUploader->handleFileUpload('flipgames_image',$request->file('flipgames_image'));
                    $FlipGamesObj->flipgames_image = $fileName;
                }
                $FlipGamesObj->save();

                $respMsg = "Flip Games Succesfully Added!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';

            }catch(\Exception $e){

                $respMsg = "Flip Games Adding Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }

    public function handleFlipGamesUpdate(FlipGamesStoreRequest $request,$id)
    {

        try {
                // Will return only validated data
                $request->validated();

                $FlipGamesUp = FlipGames::find($id);
                if ($request->hasFile('flipgames_image')) {
                    File::delete('public/uploads/flipgames_image/'.$FlipGamesUp->flipgames_image);

                    $fileName = $this->fileUploader->handleFileUpload('flipgames_image',$request->file('flipgames_image'));
                    $FlipGamesUp->flipgames_image = $fileName;

                }
                $FlipGamesUp->save();

                $respMsg = "Flip Games Succesfully Updated!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';
            }catch(\Exception $e){

                $respMsg = "Flip Games Updation Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }

    public function handleFlipGamesView()
    {
        try{
            $data['allData'] = FlipGames::all();
            $data['paths'] = array();
            array_push( $data['paths'] , array("image_path" => "public/uploads/flipgames_image/"));

            $respMsg = "View Succesfully Listed!";
            $respCode = 200;
            $respData = $data;

        }catch(\Exception $e){
            $respMsg = "View Listing Failed";
            $respCode = 400;
            $respData = $data;

        }
        return array($respMsg,$respCode,$respData);
    }

    public function handleFlipGamesEdit($id)
    {
        try{
            $editData = FlipGames::find($id);

            $respMsg = "Flip Games Edit Succesfully Done!";
            $respCode = 200;
            $respData = $editData;

        }catch(\Exception $e){
            $respMsg = "Flip Games Editing Failed";
            $respCode = 400;
            $respData = $editData;

        }
        return array($respMsg,$respCode,$respData);
    }

    public function handleFlipGamesDelete($id)
    {
        try{
            $flipgamesId = FlipGames::find($id);
            $flipgamesId->delete();

            $respMsg = "Flip Games Succesfully Deleted!";
            $respCode = 200;
            $respType = 'info';

        }catch(\Exception $e){
            $respMsg = "Flip Games Deletion Failed";
            $respCode = 400;
            $respType = 'danger';

        }
        return array($respMsg,$respCode,$respType);
    }

    public function handleFlipGamesRestore($id)
    {
        try{
            $flipgamesId = FlipGames::withTrashed()->find($id);
            $flipgamesId->restore();

            $respMsg = "Flip Games Succesfully Restored!";
            $respCode = 200;
            $respType = 'info';

        }catch(\Exception $e){
            $respMsg = "Flip Games Restoration Failed";
            $respCode = 400;
            $respType = 'danger';

        }
        return array($respMsg,$respCode,$respType);
    }

    public function handleFlipGamesTrashView()
    {
        try{
            $data['allData'] = FlipGames::onlyTrashed()->get();

            $respMsg = "Flip Games Trash Succesfully Viewed!";
            $respCode = 200;
            $respData = $data;

        }catch(\Exception $e){
            $respMsg = "Flip Games View Failed";
            $respCode = 400;
            $respData = $data;

        }
        return array($respMsg,$respCode,$respData);
    }

    public function handleFlipGamesForceDelete($id)
    {
        try{
            $FlipGamesForceDeleteId = FlipGames::withTrashed()->find($id);
            File::delete('public/uploads/flipgames_image/'.$FlipGamesForceDeleteId->flipgames_image);
            $FlipGamesForceDeleteId->forceDelete();

            $respMsg = " Flip Games Deleted Permanently!";
            $respCode = 200;
            $respType = 'info';

        }catch(\Exception $e){
            $respMsg = "Flip Games Deletion Failed";
            $respCode = 400;
            $respType = 'danger';
        }
        return array($respMsg,$respCode,$respType);
    }
}

?>
