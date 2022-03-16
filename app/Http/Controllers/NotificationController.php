<?php

namespace App\Http\Controllers;


use App\Http\Requests\NotificationStoreRequest;
use App\Repository\NotificationRepository;

class NotificationController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new NotificationRepository;
    }

    public function notificationView(){

         list($respMsg,$respCode,$respData) = $this->repo->handleNotificationView();
         return view('backend.notifications.view_notifications',$respData);
     }


    public function notificationSend(NotificationStoreRequest $request){

        list($respMsg,$respCode,$respType) = $this->repo->handleNotificationSend($request);

        $notification = array(
            'message' => $respMsg ,
            'alert-type' =>$respType,
    );

        return redirect()->back()->with($notification);
    }
}
