<?php
namespace App\Repository;
use App\Http\Requests\QuizSettingsStoreRequest;
use App\Models\QuizSettings;
use Exception;


class QuizSettingsRepository {


    public function handleQuizSettingsView()
    {
        try{

            $data['allData'] = QuizSettings::first();


            $respMsg = "Quiz Settings Succesfully Viewed";
            $respCode = 200;
            $respData = $data;

        }catch(\Exception $e){

            $respMsg = " Quiz Settings Viewing Failed";
            $respCode = 400;
            $respData = $data;
        }
        return array($respMsg,$respCode, $respData);

    }

    public function handleQuizSettingsUpdate(QuizSettingsStoreRequest $request,$id)
    {

        try {
                // Will return only validated data
                $request->validated();

                $quizSettingsUp = QuizSettings::find($id);
                $quizSettingsUp->quiz_questions = $request->quiz_questions;
                $quizSettingsUp->quiz_time = $request->quiz_time;
                $quizSettingsUp->save();

                $respMsg = "Quiz Settings Succesfully Updated!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';
            }catch(\Exception $e){

                $respMsg = "Quiz Settings  Updation Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }


}

?>
