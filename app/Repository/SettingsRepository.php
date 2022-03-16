<?php
namespace App\Repository;
use App\Http\Requests\SettingsStoreRequest;
use App\Models\Settings;
use Exception;

class SettingsRepository {

    public function handleSettingsView()
    {
        try{

            $data['allData'] = Settings::all();
            $editData = Settings::first();

            $respMsg = "Settings Succesfully Viewed";
            $respCode = 200;
            $respData = $data;
            $respData1 = $editData;

        }catch(\Exception $e){

            $respMsg = "Settings Viewing Failed";
            $respCode = 400;
            $respData = $data;
            $respData1 = $editData;
        }
        return array($respMsg,$respCode, $respData, $respData1);

    }

    public function handleSettingsUpdate(SettingsStoreRequest $request,$id)
    {

        try {
                // Will return only validated data
                $request->validated();

                $SettingsUp = Settings::find($id);
                $SettingsUp->autoplay_timer = $request->autoplay_timer;
                $SettingsUp->save();

                $respMsg = "Settings Succesfully Updated!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';
            }catch(\Exception $e){

                $respMsg = "Settings  Updation Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }
}

?>
