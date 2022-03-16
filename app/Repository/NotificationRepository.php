<?php
namespace App\Repository;

use Exception;
use App\Http\Requests\NotificationStoreRequest;
use App\Models\LoginHistory;
use App\Models\NotificationHistory;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
class NotificationRepository {


    public function handleNotificationView()
    {
        try{

            $data['allData'] = NotificationHistory::all();

            $respMsg = "Notification Histories View Succesfully Listed!";
            $respCode = 200;
            $respData = $data;

        }catch(\Exception $e){
            $respMsg = "Notification Histories View Listing Failed";
            $respCode = 400;
            $respData = $data;

        }
        return array($respMsg,$respCode,$respData);
    }

    public function handleNotificationSend(NotificationStoreRequest $request)
    {

        try {
                // Will return only validated data
                $request->validated();

                $reqName = $request->name;
                $reqDescription = $request->description;
                $userId=Auth::user()->id;
                $notification = new NotificationHistory();



                $LoginHistories = LoginHistory::pluck('expo_tokens');

                foreach ($LoginHistories as $expo) {
                     Http::asForm()->post('https://exp.host/--/api/v2/push/send', [
                        'to' => $expo,
                        'sound' => 'default',
                        'title'=> $reqName,
                        'body'=> $reqDescription,
                    ]);
                }

                    $notification->user_id = $userId;
                    $notification->title = $reqName;
                    $notification->description = $reqDescription;
                    $notification->save();

                $respMsg = "Notification Succesfully Send!";
                $respCode = 200;
                $respType = 'info';
            }catch(\Exception $e){

                $respMsg = "Notification Sending Failed";
                $respCode = 400;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respType);
    }

}

?>
