<?php

namespace App\Http\Controllers;

use App\Repository\FlipGamesRepository;
use App\Http\Requests\FlipGamesStoreRequest;

class FlipGamesController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new FlipGamesRepository;
    }

    public function viewFlipgames()
    {
        list($respMsg,$respCode,$respData) = $this->repo->handleFlipGamesView();
        return response()->json([
            'message' => $respMsg,
            'user' => $respData,
        ], $respCode);
    }

    public function flipGamesView(){
        list($respMsg,$respCode,$respData) = $this->repo->handleFlipGamesView();
         return view('backend.flipGames.view_flipgames',$respData);
     }

     public function flipGamesAdd(){
        return view('backend.flipGames.add_flipgames');
    }


    public function flipGamesStore(FlipGamesStoreRequest $request){

        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleFlipGamesStore($request);

        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
        return redirect()->route('flipGames.view')->with($notification);
    }

    public function flipGamesEdit($id)
    {
        list($respMsg,$respCode,$respData) = $this->repo->handleFlipGamesEdit($id);
        return view('backend.flipGames.edit_flipgames',compact('respData'));

    }

    public function flipGamesUpdate(FlipGamesStoreRequest $request,$id)
    {
        list($respMsg,$respCode,$respData,$respType) = $this->repo->handleFlipGamesUpdate($request,$id);

            $notification = array(
                'message' => $respMsg,
                'alert-type' => $respType,
        );
        return redirect()->route('flipGames.view')->with($notification);
    }

    public function flipGamesDelete($id){
        list($respMsg,$respCode,$respType) = $this->repo->handleFlipGamesDelete($id);

        $notification = array(
            'message' => $respMsg,
            'alert-type' => $respType,
    );
    return redirect()->route('flipGames.view')->with($notification);
    }

    public function flipGamesRestore($id){
        list($respMsg,$respCode,$respType) = $this->repo->handleFlipGamesRestore($id);

        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType,
    );
    return redirect()->route('flipGames.view')->with($notification);
    }


    public function flipGamesTrashView(){
        list($respMsg,$respCode,$respData) = $this->repo->handleFlipGamesTrashView();
         return view('backend.flipGames.view_flipgames_trash',$respData);
     }

     public function flipGamesForceDelete($id){
        list($respMsg,$respCode,$respType) = $this->repo->handleFlipGamesForceDelete($id);

        $notification = array(
            'message' => $respMsg,
            'alert-type' =>$respType
    );
    return redirect()->route('flipGames.trashView')->with($notification);
    }
}
