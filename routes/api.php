<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\BarakhariController;;
use App\Http\Controllers\BarnamaalaMenuUiController;
use App\Http\Controllers\ByanjanController;
use App\Http\Controllers\FlipGamesController;
use App\Http\Controllers\HomeScreenUiController;
use App\Http\Controllers\InformativeMenuController;
use App\Http\Controllers\JinglesUiController;
use App\Http\Controllers\KManeKachuwaController;
use App\Http\Controllers\LiteratureCategoryController;
use App\Http\Controllers\LoginScreenUiController;
use App\Http\Controllers\NoWifiUiController;
use App\Http\Controllers\PreloaderUiController;
use App\Http\Controllers\ProfileUiController;
use App\Http\Controllers\QuizCategoryController;
use App\Http\Controllers\QuizLevelUiController;
use App\Http\Controllers\QuizSettingsController;
use App\Http\Controllers\SankhyaController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SignUpScreenUiController;
use App\Http\Controllers\SworController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\QuizController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login', [UserController::class,'login']);
Route::post('register/{userType}', [UserController::class,'registerUser']);
Route::post('social-login', [LoginController::class,'socialLogin']);
Route::post('password/email', [ForgotPasswordController::class,'forgot']);

 //Preloader Ui lists
 Route::get('design/preloader', [PreloaderUiController::class,'viewPreloaderUi']);


//Sign Up Screen Ui lists
Route::get('design/sign-up', [SignUpScreenUiController::class,'viewSignUpScreenUi']);

//Login Screen Ui lists
Route::get('design/login', [LoginScreenUiController::class,'viewLoginScreenUi']);



// to secured routes
Route::get('combine/design-barnamaala-menu-ka-mane-kachuwa', [BarnamaalaMenuUiController::class,'viewBarnamaalaMenuUiCombined']);
Route::get('combine/barakhari', [BarakhariController::class,'viewBarakharisCombined']);
Route::get('combine/home-settings-jingles', [HomeScreenUiController::class,'viewHomeScreenUiCombinedSettingsJingles']);
Route::get('design/combine/quiz-screen/{quiz_cat_code}', [QuizController::class,'viewCombinedQuizUi']);

    // For ProfileScreen.jsx
        Route::get('logged-user', [UserController::class,'viewLogedInUsers']);
        Route::get('design/profile', [ProfileUiController::class,'viewProfileUi']);





// Route::group(['middleware' => 'auth:sanctum'], function(){
    //user
    Route::get('users', [UserController::class,'viewUsers']);
    // Route::get('logged-user', [UserController::class,'viewLogedInUsers']);
    Route::post('update-user/{id}', [UserController::class,'editUser']);
    Route::delete('delete-user/{id}', [UserController::class,'deleteUser']);
    Route::get('restore-user/{id}', [UserController::class,'restoreUser']);
    Route::delete('permanent-delete-user/{id}', [UserController::class,'permanentDeleteUser']);
    Route::post('logout', [UserController::class,'logoutUser']);

    //user Profile
    Route::post('update-user-profile', [ProfileController::class,'updateProfile']);
    Route::post('change-password', [ProfileController::class,'changeUserPassword']);

                                //Contents Parts
    //byanjans Lists
    Route::get('byanjans', [ByanjanController::class,'viewByanjans']);
    Route::get('byanjanstatic', [ByanjanController::class,'viewByanjanStatic']);
    //Barakhari using byanjan Id Lists
    Route::get('barakhari/{id}', [BarakhariController::class,'viewBarakharis']);

    //Ka Mane Kachuwa Lists
    Route::get('ka-mane-kachuwa', [KManeKachuwaController::class,'viewKaManeKachuwas']);


    //Swor Lists
    Route::get('swor', [SworController::class,'viewSwors']);
    //sankhya Lists
    Route::get('sankhya', [SankhyaController::class,'viewSankhyas']);

                                //Informative Parts
    //informative menu lists
    Route::get('informative-menus', [InformativeMenuController::class,'viewInformativeMenus']);

    //informative menu details by menu idlists
    Route::get('informative-menu-details/{menu_id}', [InformativeMenuController::class,'viewInfomativeMenuDetails']);

                                //Literatures Parts
    //Literature Category lists
    Route::get('literature-category', [LiteratureCategoryController::class,'viewLiteratureCategory']);

    //Literature Category details by menu idlists
    Route::get('literature-category-details/{category_id}', [LiteratureCategoryController::class,'viewLiteratureCategoryDetails']);

                                //Games Parts
    //quiz Category lists
    Route::get('quiz-category', [QuizCategoryController::class,'viewQuizCategories']);

    //Quiz Category by quizcategory code and question level lists
    Route::get('quiz/{quiz_cat_code}/{question_level}', [QuizCategoryController::class,'viewQuizes']);

    //Combined Quiz Ui lists
    // Route::get('design/combine/quiz-screen/{quiz_cat_code}', [QuizController::class,'viewCombinedQuizUi']);

    //Flip Games lists
    Route::get('flip-games', [FlipGamesController::class,'viewFlipgames']);

    //Quiz Settings lists
    Route::get('quiz-settings', [QuizSettingsController::class,'viewQuizSettings']);

    //Settings lists
    Route::get('settings', [SettingsController::class,'viewSettings']);



    //Barnamaala Menu Ui lists
    Route::get('design/barnamaala-menu', [BarnamaalaMenuUiController::class,'viewBarnamaalaMenuUi']);


    //Quiz Level Ui lists
    Route::get('design/quiz-level', [QuizLevelUiController::class,'viewQuizLevelUi']);

    
    //Home Screen Ui lists
    Route::get('design/home', [HomeScreenUiController::class,'viewHomeScreenUi']);




    //Profile Ui lists
    // Route::get('design/profile', [ProfileUiController::class,'viewProfileUi']);

    //Jingles Ui lists
    Route::get('design/jingles', [JinglesUiController::class,'viewJinglesUi']);


    //No Wifi Ui lists
    Route::get('design/no-wifi', [NoWifiUiController::class,'viewNoWifiUi']);


    // });




