<?php

namespace App\Http\Controllers;

use App\Repository\ByanjanRepository;
use App\Http\Requests\ByanjanStoreRequest;
use Illuminate\Http\Request;

class ByanjanController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new ByanjanRepository;
    }

    public function viewByanjans()
    {
        list($respData,$respMsg,$respCode,$respDesignData) = $this->repo->handleByanjanView();
        return response()->json([
            'message' => $respMsg,
            'byanjanLists' => $respData,
            'byanjanDesignLists' => $respDesignData
        ], $respCode);
    }

    public function viewByanjanStatic()
    {
        $response = '{
            "message": "Byanjan View Succesfully Listed!",
            "byanjanLists": {
                "allData": [
                    {
                        "id": 1,
                        "byanjan_name": "क",
                        "byanjan_audio": "50221622375392.mp3",
                        "byanjan_order": 1,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:04:52.000000Z"
                    },
                    {
                        "id": 2,
                        "byanjan_name": "ख",
                        "byanjan_audio": "88021622375406.mp3",
                        "byanjan_order": 2,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:05:06.000000Z"
                    },
                    {
                        "id": 3,
                        "byanjan_name": "ग",
                        "byanjan_audio": "30951622375416.mp3",
                        "byanjan_order": 3,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:05:16.000000Z"
                    },
                    {
                        "id": 4,
                        "byanjan_name": "घ",
                        "byanjan_audio": "51541622375428.mp3",
                        "byanjan_order": 4,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:05:28.000000Z"
                    },
                    {
                        "id": 5,
                        "byanjan_name": "ङ",
                        "byanjan_audio": "52811622375443.mp3",
                        "byanjan_order": 5,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:05:43.000000Z"
                    },
                    {
                        "id": 6,
                        "byanjan_name": "च",
                        "byanjan_audio": "69191622375459.mp3",
                        "byanjan_order": 6,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:05:59.000000Z"
                    },
                    {
                        "id": 7,
                        "byanjan_name": "छ",
                        "byanjan_audio": "39511622375473.mp3",
                        "byanjan_order": 7,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:06:13.000000Z"
                    },
                    {
                        "id": 8,
                        "byanjan_name": "ज",
                        "byanjan_audio": "85051622375486.mp3",
                        "byanjan_order": 8,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:06:26.000000Z"
                    },
                    {
                        "id": 9,
                        "byanjan_name": "झ",
                        "byanjan_audio": "76951622375503.mp3",
                        "byanjan_order": 9,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:06:43.000000Z"
                    },
                    {
                        "id": 10,
                        "byanjan_name": "ञ",
                        "byanjan_audio": "36081622375515.mp3",
                        "byanjan_order": 10,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:06:55.000000Z"
                    },
                    {
                        "id": 11,
                        "byanjan_name": "ट",
                        "byanjan_audio": "14131622375535.mp3",
                        "byanjan_order": 11,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:07:15.000000Z"
                    },
                    {
                        "id": 12,
                        "byanjan_name": "ठ",
                        "byanjan_audio": "29131622375550.mp3",
                        "byanjan_order": 12,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:07:30.000000Z"
                    },
                    {
                        "id": 13,
                        "byanjan_name": "ड",
                        "byanjan_audio": "56271622375561.mp3",
                        "byanjan_order": 13,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:07:41.000000Z"
                    },
                    {
                        "id": 14,
                        "byanjan_name": "ढ",
                        "byanjan_audio": "23301622375573.mp3",
                        "byanjan_order": 14,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:07:53.000000Z"
                    },
                    {
                        "id": 15,
                        "byanjan_name": "ण",
                        "byanjan_audio": "311622375598.mp3",
                        "byanjan_order": 15,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:08:18.000000Z"
                    },
                    {
                        "id": 16,
                        "byanjan_name": "त",
                        "byanjan_audio": "44231622375612.mp3",
                        "byanjan_order": 16,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:08:32.000000Z"
                    },
                    {
                        "id": 17,
                        "byanjan_name": "थ",
                        "byanjan_audio": "99991622375625.mp3",
                        "byanjan_order": 17,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:08:45.000000Z"
                    },
                    {
                        "id": 18,
                        "byanjan_name": "द",
                        "byanjan_audio": "90081622375638.mp3",
                        "byanjan_order": 18,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:08:58.000000Z"
                    },
                    {
                        "id": 19,
                        "byanjan_name": "ध",
                        "byanjan_audio": "67351622376462.mp3",
                        "byanjan_order": 19,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:22:42.000000Z"
                    },
                    {
                        "id": 20,
                        "byanjan_name": "न",
                        "byanjan_audio": "6301622376474.mp3",
                        "byanjan_order": 20,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:22:54.000000Z"
                    },
                    {
                        "id": 21,
                        "byanjan_name": "प",
                        "byanjan_audio": "35711622376487.mp3",
                        "byanjan_order": 21,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:23:07.000000Z"
                    },
                    {
                        "id": 22,
                        "byanjan_name": "फ",
                        "byanjan_audio": "15571622376501.mp3",
                        "byanjan_order": 22,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:23:21.000000Z"
                    },
                    {
                        "id": 23,
                        "byanjan_name": "ब",
                        "byanjan_audio": "39071622376512.mp3",
                        "byanjan_order": 23,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:23:32.000000Z"
                    },
                    {
                        "id": 24,
                        "byanjan_name": "भ",
                        "byanjan_audio": "6801622376523.mp3",
                        "byanjan_order": 24,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:23:43.000000Z"
                    },
                    {
                        "id": 25,
                        "byanjan_name": "म",
                        "byanjan_audio": "91851622376534.mp3",
                        "byanjan_order": 25,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:23:54.000000Z"
                    },
                    {
                        "id": 26,
                        "byanjan_name": "य",
                        "byanjan_audio": "65761622376545.mp3",
                        "byanjan_order": 26,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:24:05.000000Z"
                    },
                    {
                        "id": 27,
                        "byanjan_name": "र",
                        "byanjan_audio": "84641622376556.mp3",
                        "byanjan_order": 27,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:24:16.000000Z"
                    },
                    {
                        "id": 28,
                        "byanjan_name": "ल",
                        "byanjan_audio": "39521622376572.mp3",
                        "byanjan_order": 28,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:24:32.000000Z"
                    },
                    {
                        "id": 29,
                        "byanjan_name": "व",
                        "byanjan_audio": "78511622376582.mp3",
                        "byanjan_order": 29,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:24:42.000000Z"
                    },
                    {
                        "id": 30,
                        "byanjan_name": "श",
                        "byanjan_audio": "70501622376594.mp3",
                        "byanjan_order": 30,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:24:54.000000Z"
                    },
                    {
                        "id": 31,
                        "byanjan_name": "ष",
                        "byanjan_audio": "56201622376617.mp3",
                        "byanjan_order": 31,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:25:17.000000Z"
                    },
                    {
                        "id": 32,
                        "byanjan_name": "स",
                        "byanjan_audio": "15101622376628.mp3",
                        "byanjan_order": 32,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:25:28.000000Z"
                    },
                    {
                        "id": 33,
                        "byanjan_name": "ह",
                        "byanjan_audio": "34461622376640.mp3",
                        "byanjan_order": 33,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:25:40.000000Z"
                    },
                    {
                        "id": 34,
                        "byanjan_name": "क्ष",
                        "byanjan_audio": "51961622376649.mp3",
                        "byanjan_order": 34,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:25:49.000000Z"
                    },
                    {
                        "id": 35,
                        "byanjan_name": "त्र",
                        "byanjan_audio": "28721622376606.mp3",
                        "byanjan_order": 35,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:25:06.000000Z"
                    },
                    {
                        "id": 36,
                        "byanjan_name": "ज्ञ",
                        "byanjan_audio": "38131622375586.mp3",
                        "byanjan_order": 36,
                        "deleted_at": null,
                        "created_at": "2021-05-02T07:22:07.000000Z",
                        "updated_at": "2021-05-30T06:08:06.000000Z"
                    }
                ],
                "paths": [
                    {
                        "audio_path": "public/uploads/byanjan_audio/"
                    }
                ]
            },
            "byanjanDesignLists": {
                "byanjanDesignAllData": [
                    {
                        "id": 1,
                        "list_bg_image": "27901622443410.jpg",
                        "list_back_button_image": "19711622443410.png",
                        "list_letter_card_image": "84231622443410.png",
                        "list_header_image": null,
                        "particular_text_card_image": "29791622443410.png",
                        "particular_teacher_avatar_image": null,
                        "particular_back_button_image": "71841622443410.png",
                        "particular_background_image": "75391622443410.jpg",
                        "particular_auto_play_icon_image": "28001622443410.png",
                        "particular_auto_play_pause_icon_image": "80051622443410.png",
                        "type": "byanjan",
                        "created_at": "2021-05-30T09:20:52.000000Z",
                        "updated_at": "2021-05-31T00:58:30.000000Z"
                    }
                ],
                "byanjanDesignPaths": [
                    {
                        "image_path": "public/uploads/barnamaala_contents_menu_ui_image/"
                    }
                ]
            }
        }' ;

        return $response ;
    }

    public function byanjanView()
    {
        list($respData,$respMsg,$respCode) = $this->repo->handleByanjanView();
         return view('backend.byanjan.view_byanjan',$respData);
    }

    public function sortUpdate(Request $request)
    {
        list($respMsg,$respCode,$respData) = $this->repo->handleSortUpdate($request);
        return response($respMsg, $respCode);
    }

    public function byanjanStore(ByanjanStoreRequest $request)
    {
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleByanjanStore($request);
        $notification = array(
            'message' => $respMsg ,
            'alert-type' =>$respType,
        );
        return redirect()->route('byanjan.view')->with($notification);
    }

    public function byanjanEdit($id)
    {
        list($respMsg,$respCode,$respData) = $this->repo->handleByanjanEdit($id);

        return view('backend.byanjan.edit_byanjan',compact('respData'));

    }

    public function byanjanUpdate(ByanjanStoreRequest $request,$id)
    {

        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleByanjanUpdate($request,$id);

            $notification = array(
                'message' => $respMsg,
                'alert-type' =>$respType
        );

        return redirect()->route('byanjan.view')->with($notification);
    }

    public function byanjanDelete($id){
        list($respMsg,$respCode,$respType) = $this->repo->handleByanjanDelete($id);

        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
    return redirect()->route('byanjan.view')->with($notification);
    }

    public function byanjanRestore($id){
        list($respMsg,$respCode,$respType) = $this->repo->handleByanjanRestore($id);

        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
    return redirect()->route('byanjan.view')->with($notification);
    }


    public function byanjanTrashView(){
        list($respMsg,$respCode,$respData) = $this->repo->handleByanjanTrashView();
         return view('backend.byanjan.view_byanjan_trash',$respData);
     }

     public function byanjanForceDelete($id){
        list($respMsg,$respCode,$respType) = $this->repo->handleByanjanForceDelete($id);
        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
    return redirect()->route('byanjan.trashView')->with($notification);
    }


}
