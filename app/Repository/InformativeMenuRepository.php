<?php
namespace App\Repository;

use App\Helpers\Helper;
use App\Models\InformativeMenu;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\File;
use App\Http\Requests\InformativeMenuStoreRequest;
use App\Http\Requests\InformativeMenuUpdateRequest;
use App\Models\InformativeMenuDetails;
use App\Models\InformativeMenuUi;

class InformativeMenuRepository {

    private $fileUploader;

    public function __construct()
    {
        $this->fileUploader = new FileUploadRepository;
    }

    public function handleInformativeMenuView()
    {
        try
        {
            $data['allData'] = InformativeMenu::orderBy('order','ASC')->get();
            $datas['informativeMenuDesginAllDatas'] = InformativeMenuUi::all();

            $data['paths'] = array();
            array_push( $data['paths'] , array("background_image_path" => "public/uploads/background/","back_icon_path" => "public/uploads/back_icon/","card_image_path" => "public/uploads/card_image/"));
            $datas['designPaths'] = array();
            array_push( $datas['designPaths'] , array("image_path" => "public/uploads/informative_menu_ui_image/"));
            $error = "No Image";

            $respMsg = "Informative Menu View Succesfully Listed!";
            $respCode = 200;
            $respData = $data;
            $respDesignData = $datas;

        }catch(\Exception $e){
            $respMsg = "Informative Menu View Listing Failed";
            $respCode = 400;
            $respData = $data;
            $respDesignData = $datas;
        }
        return array($respMsg,$respCode,$respData,$respDesignData,$error);
    }


    public function handleSortUpdate(Request $request)
    {
        try {
                $ids_order = $request->ids ;
                $ids__order_explode = explode("," , $ids_order);

                $counter = 1 ;

                foreach($ids__order_explode as $id)
                {
                    $im_up = InformativeMenu::find($id);
                    $im_up->order = $counter;
                    $im_up->save();
                    $counter++ ;
                }
                $respMsg = "Informative Menu Succesfully sorted";
                $respCode = 200;
                $respData = NULL;
            }catch(\Exception $e){

                // return $e->getMessage();
                $respMsg = "Informative Menu Sorting Failed";
                $respCode = 400;
                $respData = NULL;
            }
        return array($respMsg,$respCode,$respData);
    }

    public function handleInnerSortUpdate(Request $request)
    {
        try {
                $ids_order = $request->ids ;
                $ids__order_explode = explode("," , $ids_order);

                $counter = 1 ;

                foreach($ids__order_explode as $id)
                {
                    $im_up = InformativeMenuDetails::find($id);
                    $im_up->imd_order = $counter;
                    $im_up->save();
                    $counter++ ;
                }
                $respMsg = "Informative Menu Details Succesfully sorted";
                $respCode = 200;
                $respData = NULL;
            }catch(\Exception $e){

                // return $e->getMessage();
                $respMsg = "Informative Menu Details Sorting Failed";
                $respCode = 400;
                $respData = NULL;
            }

        return array($respMsg,$respCode,$respData);
    }

    public function handleInformativeMenuInnerView($menu_id)
    {
        try{
            $data = $menu_id;
            $menuName = InformativeMenu::where('menu_id',$menu_id)->value('name');
            $informativeMenuDetailsLists['allData'] = InformativeMenuDetails::orderBy('imd_order','ASC')->where('menu_id',$menu_id)->get();

            $informativeMenuDetailsLists['paths'] = array();
            array_push( $informativeMenuDetailsLists['paths'] , array("image_path" => "public/uploads/imd_image/","audio_path" => "public/uploads/imd_audio/","video_path" => "public/uploads/imd_video/","background_image_path" => "public/uploads/imd_background_image/"));
            $error = "No Image";

            $respMsg = "Informative Menu Details Succesfully Viewed";
            $respCode = 200;
            $respData = $data;
            $respMenuName = $menuName;
            $respInformativeMenuLists = $informativeMenuDetailsLists;


        }catch(\Exception $e){

            $respMsg = "Informative Menu Details Viewing Failed";
            $respCode = 400;
            $respData = $data;
            $respMenuName = $menuName;
            $respInformativeMenuLists = $informativeMenuDetailsLists;
        }
        return array($respMsg,$respCode,$respData,$respMenuName,$respInformativeMenuLists,$error);

    }

    public function handleInformativeMenuStore(InformativeMenuStoreRequest $request)
    {

        try {

                $request->validated();

                $menu_id = Helper::IDGenerator(new InformativeMenu, 'menu_id',5,'IMS');

                $infoMenun = new InformativeMenu;
                $infoMenun->name = $request->name;
                $infoMenun->menu_id = $menu_id;
                $infoMenun->description = $request->description;
                if ($request->hasFile('background')) {
                    $fileName = $this->fileUploader->handleFileUpload('background',$request->file('background'));
                    $infoMenun->background = $fileName;
                }
                if ($request->hasFile('back_icon')) {
                    $fileName = $this->fileUploader->handleFileUpload('back_icon',$request->file('back_icon'));
                    $infoMenun->back_icon = $fileName;
                }
                if ($request->hasFile('card_image')) {
                    $fileName = $this->fileUploader->handleFileUpload('card_image',$request->file('card_image'));
                    $infoMenun->card_image = $fileName;
                }
                $infoMenun->order = InformativeMenu::max('order') + 1;
                $infoMenun->save();

                $respMsg = "Informative Menu Succesfully Added!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';

            }catch(\Exception $e){

                $respMsg = "Informative Menu Adding Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }

    public function handleInformativeMenuEdit($id)
    {
        try{

            $editData = InformativeMenu::find($id);
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


    public function handleInformativeMenuUpdate(InformativeMenuUpdateRequest $request,$id)
    {

        try {

                $request->validated();

                $infoMenuUp = InformativeMenu::find($id);
                $infoMenuUp->name = $request->name;
                $infoMenuUp->description = $request->description;
                if ($request->hasFile('background')) {
                    File::delete('public/uploads/background/'.$infoMenuUp->background);
                    $fileName = $this->fileUploader->handleFileUpload('background',$request->file('background'));
                    $infoMenuUp->background = $fileName;
                }
                if ($request->hasFile('back_icon')) {
                    File::delete('public/uploads/back_icon/'.$infoMenuUp->back_icon);
                    $fileName = $this->fileUploader->handleFileUpload('back_icon',$request->file('back_icon'));
                    $infoMenuUp->back_icon = $fileName;
                }
                if ($request->hasFile('card_image')) {
                    File::delete('public/uploads/card_image/'.$infoMenuUp->card_image);
                    $fileName = $this->fileUploader->handleFileUpload('card_image',$request->file('card_image'));
                    $infoMenuUp->card_image = $fileName;
                }
                $infoMenuUp->status = $request->status;
                $infoMenuUp -> save();


                $respMsg = "Informative Menu Succesfully Updated!";
                $respCode = 200;
                $respData = NULL;
                $respType = 'info';
            }catch(\Exception $e){

                $respMsg = "Informative Menu Updation Failed";
                $respCode = 400;
                $respData = NULL;
                $respType = 'danger';
            }
        return array($respMsg,$respCode,$respData,$respType);
    }

    public function handleInformativeMenuDelete($id)
    {
        try{
            InformativeMenu::find($id)->delete();

            $respMsg = "Informative Menu Succesfully Deleted!";
            $respCode = 200;
            $respType = 'info';

        }catch(\Exception $e){
            $respMsg = "Informative Menu Deletion Failed";
            $respCode = 400;
            $respType = 'danger';

        }
        return array($respMsg,$respCode,$respType);
    }

    public function handleInformativeMenuRestore($id)
    {
        try{
            InformativeMenu::withTrashed()->find($id)->restore();

            $respMsg = "Informative Menu Succesfully Restored!";
            $respCode = 200;
            $respType = 'info';

        }catch(\Exception $e){
            $respMsg = "Informative Menu Restoration Failed";
            $respCode = 400;
            $respType = 'danger';

        }
        return array($respMsg,$respCode,$respType);
    }

    public function handleInformativeMenuTrashView()
    {
        try{
            $data['allData'] = InformativeMenu::onlyTrashed()->get();
            $error = "No Image";

            $respMsg = "Informative Menu Trash Succesfully Viewed!";
            $respCode = 200;
            $respData = $data;

        }catch(\Exception $e){
            $respMsg = "Informative Menu View Failed";
            $respCode = 400;
            $respData = $data;

        }
        return array($respMsg,$respCode,$respData,$error);
    }

    public function handleInformativeMenuForceDelete($id)
    {
        try{

            $InfoMenuForceDeleteId = InformativeMenu::withTrashed()->find($id);
            File::delete('public/uploads/background/'.$InfoMenuForceDeleteId->background);
            File::delete('public/uploads/back_icon/'.$InfoMenuForceDeleteId->back_icon);
            File::delete('public/uploads/card_image/'.$InfoMenuForceDeleteId->card_image);
            $InfoMenuForceDeleteId->forceDelete();
            $respMsg = "Informative Menu Deleted Permanently!";
            $respCode = 200;
            $respType = 'info';

        }catch(\Exception $e){
            $respMsg = "Informative Menu Deletion Failed";
            $respCode = 400;
            $respType = 'danger';
        }
        return array($respMsg,$respCode,$respType);
    }
}

?>
