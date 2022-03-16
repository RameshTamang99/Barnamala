<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\BarakhariController;
use App\Http\Controllers\BarnamaalaContentsMenuUiController;
use App\Http\Controllers\BarnamaalaMenuUiController;
use App\Http\Controllers\ByanjanController;
use App\Http\Controllers\FlipGamesController;
use App\Http\Controllers\HomeScreenUiController;
use App\Http\Controllers\InformativeMenuController;
use App\Http\Controllers\InformativeMenuDetailsController;
use App\Http\Controllers\InformativeMenuUiController;
use App\Http\Controllers\JinglesUiController;
use App\Http\Controllers\KManeKachuwaController;
use App\Http\Controllers\KManeKachuwaUiController;
use App\Http\Controllers\LiteratureCategoryController;
use App\Http\Controllers\LiteratureCategoryDetailsController;
use App\Http\Controllers\LiteratureUiController;
use App\Http\Controllers\LoginScreenUiController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\NoWifiUiController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PreloaderUiController;
use App\Http\Controllers\ProfileUiController;
use App\Http\Controllers\QuizCategoryController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizLevelUiController;
use App\Http\Controllers\QuizMenuUiController;
use App\Http\Controllers\QuizQuestionUiController;
use App\Http\Controllers\QuizSettingsController;
use App\Http\Controllers\SankhyaController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SignUpScreenUiController;
use App\Http\Controllers\SworController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('pwreset/success', function () {

    return view('auth.passwords.reset_success');
});
Auth::routes();

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');

})->name('dashboard');



Route::get('/', function () {

    return redirect()->route('login');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->route('dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::post('user',[UserController::class, 'userLogin']);

Route::get('/admin/logout',[AdminController::class, 'Logout'])->name('admin.logout');

//Notification part
Route::prefix('notification')->group(function(){

    Route::get('/view',[NotificationController::class, 'notificationView'])->name('view.notification');
    Route::post('/send',[NotificationController::class, 'notificationSend'])->name('notification.send');
});

//user management all routes

Route::prefix('users')->group(function(){
    Route::get('/view',[UserController::class, 'userView'])->name('user.view');
    Route::get('/add',[UserController::class, 'userAdd'])->name('user.add');
    Route::post('/store/{userType}',[UserController::class, 'userStore'])->name('user.store');
    Route::get('/edit/{id}',[UserController::class, 'userEdit'])->name('user.edit');
    Route::post('/update/{id}',[UserController::class, 'userUpdate'])->name('user.update');
    Route::get('/delete/{id}',[UserController::class, 'userDelete'])->name('user.delete');
    Route::get('/restore/{id}',[UserController::class, 'userRestore'])->name('user.restore');
    Route::get('/permanentDelete/{id}',[UserController::class, 'userForceDelete'])->name('user.permanentDelete');
    Route::get('/trashView',[UserController::class, 'userTrashView'])->name('user.trashView');
});
    Route::get('post',[PostController::class, 'index'])->name('post.index');
    Route::get('post-sortable',[PostController::class, 'update'])->name('post.update');


                                //////CONTENTS PARTS/////
//byanjan part
Route::prefix('byanjan')->group(function(){
    Route::post('/byanjan-sortable',[ByanjanController::class, 'sortUpdate']);
    Route::get('/view',[ByanjanController::class, 'byanjanView'])->name('byanjan.view');
    Route::post('/store',[ByanjanController::class, 'byanjanStore'])->name('byanjan.store');
    Route::get('/edit/{id}',[ByanjanController::class, 'byanjanEdit'])->name('byanjan.edit');
    Route::post('/update/{id}',[ByanjanController::class, 'byanjanUpdate'])->name('byanjan.update');
    Route::get('/delete/{id}',[ByanjanController::class, 'byanjanDelete'])->name('byanjan.delete');
    Route::get('/restore/{id}',[ByanjanController::class, 'byanjanRestore'])->name('byanjan.restore');
    Route::get('/permanentDelete/{id}',[ByanjanController::class, 'byanjanForceDelete'])->name('byanjan.permanentDelete');
    Route::get('/trashView',[ByanjanController::class, 'byanjanTrashView'])->name('byanjan.trashView');

});

//Barakhari part
Route::prefix('barakhari')->group(function(){
    Route::post('view/barakhari-sortable',[BarakhariController::class, 'sortUpdate'])->name('barakhari.sortupdate');
    Route::get('/view/{id}',[BarakhariController::class, 'barakhariView'])->name('barakhari.view');
    Route::get('/byanjan-view',[BarakhariController::class, 'byanjanBarakhariView'])->name('byanjanBarakhari.view');
    Route::get('/add',[BarakhariController::class, 'barakhariAdd'])->name('barakhari.add');
    Route::post('/store',[BarakhariController::class, 'barakhariStore'])->name('barakhari.store');
    Route::get('/edit/{id}',[BarakhariController::class, 'barakhariEdit'])->name('barakhari.edit');
    Route::post('/update/{id}',[BarakhariController::class, 'barakhariUpdate'])->name('barakhari.update');
    Route::get('/delete/{id}',[BarakhariController::class, 'barakhariDelete'])->name('barakhari.delete');
    Route::get('/restore/{id}',[BarakhariController::class, 'barakhariRestore'])->name('barakhari.restore');
    Route::get('/permanentDelete/{id}',[BarakhariController::class, 'barakhariForceDelete'])->name('barakhari.permanentDelete');
    Route::get('/trashView',[BarakhariController::class, 'barakhariTrashView'])->name('barakhari.trashView');

});

//Swor
Route::prefix('swor')->group(function(){
    Route::post('/swor-sortable',[SworController::class, 'sortUpdate'])->name('swor.sortupdate');
    Route::get('/view',[SworController::class, 'sworView'])->name('swor.view');
    Route::get('/add',[SworController::class, 'sworAdd'])->name('swor.add');
    Route::post('/store',[SworController::class, 'sworStore'])->name('swor.store');
    Route::get('/edit/{id}',[SworController::class, 'sworEdit'])->name('swor.edit');
    Route::post('/update/{id}',[SworController::class, 'sworUpdate'])->name('swor.update');
    Route::get('/delete/{id}',[SworController::class, 'sworDelete'])->name('swor.delete');
    Route::get('/restore/{id}',[SworController::class, 'sworRestore'])->name('swor.restore');
    Route::get('/permanentDelete/{id}',[SworController::class, 'sworForceDelete'])->name('swor.permanentDelete');
    Route::get('/trashView',[SworController::class, 'sworTrashView'])->name('swor.trashView');

});

//Sankhya
Route::prefix('sankhya')->group(function(){
    Route::post('/sankhya-sortable',[SankhyaController::class, 'sortUpdate'])->name('sankhya.sortupdate');
    Route::get('/view',[SankhyaController::class, 'sankhyaView'])->name('sankhya.view');
    Route::get('/add',[SankhyaController::class, 'sankhyaAdd'])->name('sankhya.add');
    Route::post('/store',[SankhyaController::class, 'sankhyaStore'])->name('sankhya.store');
    Route::get('/edit/{id}',[SankhyaController::class, 'sankhyaEdit'])->name('sankhya.edit');
    Route::post('/update/{id}',[SankhyaController::class, 'sankhyaUpdate'])->name('sankhya.update');
    Route::get('/delete/{id}',[SankhyaController::class, 'sankhyaDelete'])->name('sankhya.delete');
    Route::get('/restore/{id}',[SankhyaController::class, 'sankhyaRestore'])->name('sankhya.restore');
    Route::get('/permanentDelete/{id}',[SankhyaController::class, 'sankhyaForceDelete'])->name('sankhya.permanentDelete');
    Route::get('/trashView',[SankhyaController::class, 'sankhyaTrashView'])->name('sankhya.trashView');

});

//K Mane Kachuwa part
Route::prefix('kmk')->group(function(){
    Route::post('/kmk-sortable',[KManeKachuwaController::class, 'sortUpdate'])->name('kmk.sortupdate');
    Route::get('/view',[KManeKachuwaController::class, 'kmkView'])->name('kmk.view');
    Route::get('/add',[KManeKachuwaController::class, 'kmkAdd'])->name('kmk.add');
    Route::post('/store',[KManeKachuwaController::class, 'kmkStore'])->name('kmk.store');
    Route::get('/edit/{id}',[KManeKachuwaController::class, 'kmkEdit'])->name('kmk.edit');
    Route::post('/update/{id}',[KManeKachuwaController::class, 'kmkUpdate'])->name('kmk.update');
    Route::get('/delete/{id}',[KManeKachuwaController::class, 'kmkDelete'])->name('kmk.delete');
    Route::get('/restore/{id}',[KManeKachuwaController::class, 'kmkRestore'])->name('kmk.restore');
    Route::get('/permanentDelete/{id}',[KManeKachuwaController::class, 'kmkForceDelete'])->name('kmk.permanentDelete');
    Route::get('/trashView',[KManeKachuwaController::class, 'kmkTrashView'])->name('kmk.trashView');
});




                                        /////Literatures Part/////

//Literature Category part
Route::prefix('literatureCategory')->group(function(){
    Route::post('/literatureCategory-sortable',[LiteratureCategoryController::class, 'sortUpdate'])->name('literatureCategory.sortupdate');
    Route::post('/innerView/literatureCategoryDetails-sortable',[LiteratureCategoryController::class, 'detailsSortUpdate'])->name('literatureCategoryDetails.sortupdate');
    Route::get('/innerView/{id}',[LiteratureCategoryController::class, 'literatureCategoryInnerView'])->name('literatureCategory.innerView');
    Route::get('/view',[LiteratureCategoryController::class, 'literatureCategoryView'])->name('literatureCategory.view');
    Route::post('/store',[LiteratureCategoryController::class, 'literatureCategoryStore'])->name('literatureCategory.store');
    Route::get('/edit/{id}',[LiteratureCategoryController::class, 'literatureCategoryEdit'])->name('literatureCategory.edit');
    Route::post('/update/{id}',[LiteratureCategoryController::class, 'literatureCategoryUpdate'])->name('literatureCategory.update');
    Route::get('/delete/{id}',[LiteratureCategoryController::class, 'literatureCategoryDelete'])->name('literatureCategory.delete');
    Route::get('/restore/{id}',[LiteratureCategoryController::class, 'literatureCategoryRestore'])->name('literatureCategory.restore');
    Route::get('/permanentDelete/{id}',[LiteratureCategoryController::class, 'literatureCategoryForceDelete'])->name('literatureCategory.permanentDelete');
    Route::get('/trashView',[LiteratureCategoryController::class, 'literatureCategoryTrashView'])->name('literatureCategory.trashView');
});

//Literature Category Details part
Route::prefix('literatureCategoryDetails')->group(function(){
    Route::post('/store',[LiteratureCategoryDetailsController::class, 'literatureCategoryDetailsStore'])->name('literatureCategoryDetails.store');
    Route::get('/edit/{id}',[LiteratureCategoryDetailsController::class, 'literatureCategoryDetailsEdit'])->name('literatureCategoryDetails.edit');
    Route::post('/update/{id}',[LiteratureCategoryDetailsController::class, 'literatureCategoryDetailsUpdate'])->name('literatureCategoryDetails.update');
    Route::get('/delete/{id}',[LiteratureCategoryDetailsController::class, 'literatureCategoryDetailsDelete'])->name('literatureCategoryDetails.delete');
    Route::get('/restore/{id}',[LiteratureCategoryDetailsController::class, 'literatureCategoryDetailsRestore'])->name('literatureCategoryDetails.restore');
    Route::get('/permanentDelete/{id}',[LiteratureCategoryDetailsController::class, 'literatureCategoryDetailsForceDelete'])->name('literatureCategoryDetails.permanentDelete');
    Route::get('/trashView/{id}',[LiteratureCategoryDetailsController::class, 'literatureCategoryDetailsTrashView'])->name('literatureCategoryDetails.trashView');
});

                                    /////Quiz Part/////
//Quiz Category part
Route::prefix('quizCategory')->group(function(){
    Route::post('/quizCategory-sortable',[QuizCategoryController::class, 'sortUpdate'])->name('quizCategory.sortupdate');
    Route::get('/view',[QuizCategoryController::class, 'quizCategoryView'])->name('quizCategory.view');
    Route::post('/quiz-sortable',[QuizCategoryController::class, 'quizSortUpdate'])->name('quizCategory.sortupdate');
    Route::get('/quiz/sajilo-questions-view/{id}',[QuizCategoryController::class, 'sajiloQuestionsView'])->name('quizCategory.sajiloQuestionsView');
    Route::get('/quiz/madhyama-questions-view/{id}',[QuizCategoryController::class, 'madhyamaQuestionsView'])->name('quizCategory.madhyamaQuestionsView');
    Route::get('/quiz/gaaro-question-view/{id}',[QuizCategoryController::class, 'gaaroQuestionsView'])->name('quizCategory.gaaroQuestionsView');
    Route::get('/add',[QuizCategoryController::class, 'quizCategoryAdd'])->name('quizCategory.add');
    Route::post('/store',[QuizCategoryController::class, 'quizCategoryStore'])->name('quizCategory.store');
    Route::get('/edit/{id}',[QuizCategoryController::class, 'quizCategoryEdit'])->name('quizCategory.edit');
    Route::post('/update/{id}',[QuizCategoryController::class, 'quizCategoryUpdate'])->name('quizCategory.update');
    Route::get('/delete/{id}',[QuizCategoryController::class, 'quizCategoryDelete'])->name('quizCategory.delete');
    Route::get('/quizCategory/restore/{id}',[QuizCategoryController::class, 'quizCategoryRestore'])->name('quizCategory.restore');
    Route::get('/permanentDelete/{id}',[QuizCategoryController::class, 'quizCategoryForceDelete'])->name('quizCategory.permanentDelete');
    Route::get('/trashView',[QuizCategoryController::class, 'quizCategoryTrashView'])->name('quizCategory.trashView');
    Route::get('quiz/trashView/{id}',[QuizCategoryController::class, 'quizTrashView'])->name('quizCategory.quiz.trashView');
    Route::get('/restore/{id}',[QuizCategoryController::class, 'quizRestore'])->name('quizCategory.quiz.restore');
    Route::get('/permanentDelete/{id}/{resp_code}',[QuizCategoryController::class, 'quizForceDelete'])->name('quizCategory.quiz.permanentDelete');
});

//Quiz part
Route::prefix('quiz')->group(function(){

    Route::post('/store',[QuizController::class, 'quizStore'])->name('quiz.store');
    // Route::get('/edit/{id}',[QuizController::class, 'quizEdit'])->name('quiz.edit');
    Route::get('/questionsEdit/{id}',[QuizController::class, 'questionsEdit'])->name('questions.edit');
    Route::post('/update/{id}',[QuizController::class, 'quizUpdate'])->name('quiz.update');
    Route::get('/delete/{id}',[QuizController::class, 'quizDelete'])->name('quiz.delete');

});
//Flip Games part
Route::prefix('flipgames')->group(function(){
    Route::get('/view',[FlipGamesController::class, 'flipGamesView'])->name('flipGames.view');
    Route::get('/add',[FlipGamesController::class, 'flipGamesAdd'])->name('flipGames.add');
    Route::post('/store',[FlipGamesController::class, 'flipGamesStore'])->name('flipGames.store');
    Route::get('/edit/{id}',[FlipGamesController::class, 'flipGamesEdit'])->name('flipGames.edit');
    Route::post('/update/{id}',[FlipGamesController::class, 'flipGamesUpdate'])->name('flipGames.update');
    Route::get('/delete/{id}',[FlipGamesController::class, 'flipGamesDelete'])->name('flipGames.delete');
    Route::get('/restore/{id}',[FlipGamesController::class, 'flipGamesRestore'])->name('flipGames.restore');
    Route::get('/permanentDelete/{id}',[FlipGamesController::class, 'flipGamesForceDelete'])->name('flipGames.permanentDelete');
    Route::get('/trashView',[FlipGamesController::class, 'flipGamesTrashView'])->name('flipGames.trashView');

});





//user profile and password

Route::prefix('profile')->group(function(){
    Route::get('/view',[ProfileController::class, 'profileView'])->name('profile.view');
    Route::get('/edit',[ProfileController::class, 'profileEdit'])->name('profile.edit');
    Route::post('/store',[ProfileController::class, 'profileStore'])->name('profile.store');
    Route::get('/password/view',[ProfileController::class, 'passwordView'])->name('password.view');
    Route::post('/password/update',[ProfileController::class, 'passwordUpdate'])->name('profile.pass.update');});

//Informative Menu part
Route::prefix('infoMenu')->group(function(){
    Route::post('/infoMenu-sortable',[InformativeMenuController::class, 'sortUpdate'])->name('infoMenu.sortupdate');
    Route::post('/innerView/infoMenuDetails-sortable',[InformativeMenuController::class, 'detailsSortUpdate'])->name('infoMenuDetails.sortupdate');
    Route::get('/innerView/{id}',[InformativeMenuController::class, 'infoMenuInnerView'])->name('infoMenu.innerView');
    Route::get('/view',[InformativeMenuController::class, 'infoMenuView'])->name('infoMenu.view');
    Route::post('/store',[InformativeMenuController::class, 'infoMenuStore'])->name('infoMenu.store');
    Route::get('/edit/{id}',[InformativeMenuController::class, 'infoMenuEdit'])->name('infoMenu.edit');
    Route::post('/update/{id}',[InformativeMenuController::class, 'infoMenuUpdate'])->name('infoMenu.update');
    Route::get('/delete/{id}',[InformativeMenuController::class, 'infoMenuDelete'])->name('infoMenu.delete');
    Route::get('/restore/{id}',[InformativeMenuController::class, 'infoMenuRestore'])->name('infoMenu.restore');
    Route::get('/permanentDelete/{id}',[InformativeMenuController::class, 'infoMenuForceDelete'])->name('infoMenu.permanentDelete');
    Route::get('/trashView',[InformativeMenuController::class, 'infoMenuTrashView'])->name('infoMenu.trashView');
});

//Informative Menu Details part
Route::prefix('infoMenuDetails')->group(function(){

    Route::post('/store',[InformativeMenuDetailsController::class, 'infoMenuDetailsStore'])->name('infoMenuDetails.store');
    Route::get('/edit/{id}',[InformativeMenuDetailsController::class, 'infoMenuDetailsEdit'])->name('infoMenuDetails.edit');
    Route::post('/update/{id}',[InformativeMenuDetailsController::class, 'infoMenuDetailsUpdate'])->name('infoMenuDetails.update');
    Route::get('/delete/{id}',[InformativeMenuDetailsController::class, 'infoMenuDetailsDelete'])->name('infoMenuDetails.delete');
    Route::get('/restore/{id}',[InformativeMenuDetailsController::class, 'infoMenuDetailsRestore'])->name('infoMenuDetails.restore');
    Route::get('/permanentDelete/{id}',[InformativeMenuDetailsController::class, 'infoMenuDetailsForceDelete'])->name('infoMenuDetails.permanentDelete');
    Route::get('/trashView/{id}',[InformativeMenuDetailsController::class, 'infoMenuDetailsTrashView'])->name('infoMenuDetails.trashView');
});

//Quiz Settings Part
Route::prefix('quizSettings')->group(function(){

    Route::get('/edit/{id}',[QuizSettingsController::class, 'edit'])->name('quizSettings.edit');
    Route::post('/update/{id}',[QuizSettingsController::class, 'update'])->name('quizSettings.update');

});

//Settings Part
Route::prefix('settings')->group(function(){
    Route::get('/view',[SettingsController::class, 'settingsView'])->name('settings.view');
    Route::post('/update/{id}',[SettingsController::class, 'settingsUpdate'])->name('settings.update');
});

//Sign Up Screen Ui Part
Route::prefix('design/sign-up')->group(function(){
    Route::get('/view',[SignUpScreenUiController::class, 'signUpScreenUiView'])->name('signUpScreen.view');
    Route::get('/edit/{id}',[SignUpScreenUiController::class, 'signUpScreenUiEdit'])->name('signUpScreen.edit');
    Route::post('/update/{id}',[SignUpScreenUiController::class, 'signUpScreenUiUpdate'])->name('signUpScreen.update');
});

//Login Screen Ui Part
Route::prefix('design/login')->group(function(){
    Route::get('/view',[LoginScreenUiController::class, 'loginScreenUiView'])->name('loginScreen.view');
    Route::get('/edit/{id}',[loginScreenUiController::class, 'loginScreenUiEdit'])->name('loginScreen.edit');
    Route::post('/update/{id}',[loginScreenUiController::class, 'loginScreenUiUpdate'])->name('loginScreen.update');
});

//Informative Menu Ui Part
Route::prefix('infoMenuUi')->group(function(){
    Route::get('/view',[InformativeMenuUiController::class, 'informativeMenuUiView'])->name('informativeMenuUi.view');
    Route::get('/edit/{id}',[InformativeMenuUiController::class, 'informativeMenuUiEdit'])->name('informativeMenuUi.edit');
    Route::post('/update/{id}',[InformativeMenuUiController::class, 'informativeMenuUiUpdate'])->name('informativeMenuUi.update');
});

//Barnamaala Menu Ui Part
Route::prefix('design/barnamaala-menu')->group(function(){
    Route::get('/view',[BarnamaalaMenuUiController::class, 'barnamaalaMenuUiView'])->name('barnamaalaMenuUi.view');
    Route::get('/edit/{id}',[BarnamaalaMenuUiController::class, 'barnamaalaMenuUiEdit'])->name('barnamaalaMenuUi.edit');
    Route::post('/update/{id}',[BarnamaalaMenuUiController::class, 'barnamaalaMenuUiUpdate'])->name('barnamaalaMenuUi.update');
});

//Barnamala Contents Menu Ui Part
Route::prefix('barnamaalaContentsMenuUi')->group(function(){
    Route::get('/view',[BarnamaalaContentsMenuUiController::class, 'barnamaalaContentsMenuUiView'])->name('barnamaalaContentsMenuUi.view');
    Route::get('/edit/{id}',[BarnamaalaContentsMenuUiController::class, 'barnamaalaContentsMenuUiEdit'])->name('barnamaalaContentsMenuUi.edit');
    Route::post('/update/{id}',[BarnamaalaContentsMenuUiController::class, 'barnamaalaContentsMenuUiUpdate'])->name('barnamaalaContentsMenuUi.update');
});

//Ka Mane Kachuwa Ui Part
Route::prefix('kaManeKachuwaUi')->group(function(){
    Route::get('/view',[KManeKachuwaUiController::class, 'kaManeKachuwaUiView'])->name('kaManeKachuwaUi.view');
    Route::get('/edit/{id}',[KManeKachuwaUiController::class, 'kaManeKachuwaUiEdit'])->name('kaManeKachuwaUi.edit');
    Route::post('/update/{id}',[KManeKachuwaUiController::class, 'kaManeKachuwaUiUpdate'])->name('kaManeKachuwaUi.update');
});

//Quiz Menu Ui Part
Route::prefix('quizMenuUi')->group(function(){
    Route::get('/view',[QuizMenuUiController::class, 'quizMenuUiView'])->name('quizMenuUi.view');
    Route::get('/edit/{id}',[QuizMenuUiController::class, 'quizMenuUiEdit'])->name('quizMenuUi.edit');
    Route::post('/update/{id}',[QuizMenuUiController::class, 'quizMenuUiUpdate'])->name('quizMenuUi.update');
});

//Quiz Level Ui Part
Route::prefix('design/quiz-level')->group(function(){
    Route::get('/view',[QuizLevelUiController::class, 'quizLevelUiView'])->name('quizLevelUi.view');
    Route::get('/edit/{id}',[QuizLevelUiController::class, 'quizLevelUiEdit'])->name('quizLevelUi.edit');
    Route::post('/update/{id}',[QuizLevelUiController::class, 'quizLevelUiUpdate'])->name('quizLevelUi.update');
});


//Quiz Question Ui Part
Route::prefix('quizQuestionUi')->group(function(){
    Route::get('/view',[QuizQuestionUiController::class, 'quizQuestionUiView'])->name('quizQuestionUi.view');
    Route::get('/edit/{id}',[QuizQuestionUiController::class, 'quizQuestionUiEdit'])->name('quizQuestionUi.edit');
    Route::post('/update/{id}',[QuizQuestionUiController::class, 'quizQuestionUiUpdate'])->name('quizQuestionUi.update');
});

//Home Screen Ui Part
Route::prefix('design/home')->group(function(){
    Route::get('/view',[HomeScreenUiController::class, 'homeScreenUiView'])->name('homeScreenUi.view');
    Route::get('/edit/{id}',[HomeScreenUiController::class, 'homeScreenUiEdit'])->name('homeScreenUi.edit');
    Route::post('/update/{id}',[HomeScreenUiController::class, 'homeScreenUiUpdate'])->name('homeScreenUi.update');
});

//Literature Ui Part
Route::prefix('literatureUi')->group(function(){
    Route::get('/view',[LiteratureUiController::class, 'literatureUiView'])->name('literatureUi.view');
    Route::get('/edit/{id}',[LiteratureUiController::class, 'literatureUiEdit'])->name('literatureUi.edit');
    Route::post('/update/{id}',[LiteratureUiController::class, 'literatureUiUpdate'])->name('literatureUi.update');
});

//Preloader Ui Part
Route::prefix('design/preloader')->group(function(){
    Route::get('/view',[PreloaderUiController::class, 'preloaderUiView'])->name('preloaderUi.view');
    Route::get('/edit/{id}',[PreloaderUiController::class, 'preloaderUiEdit'])->name('preloaderUi.edit');
    Route::post('/update/{id}',[PreloaderUiController::class, 'preloaderUiUpdate'])->name('preloaderUi.update');
});

//Profile Ui Part
Route::prefix('design/profile')->group(function(){
    Route::get('/view',[ProfileUiController::class, 'profileUiView'])->name('profileUi.view');
    Route::get('/edit/{id}',[ProfileUiController::class, 'profileUiEdit'])->name('profileUi.edit');
    Route::post('/update/{id}',[ProfileUiController::class, 'profileUiUpdate'])->name('profileUi.update');
});

//Jingles Ui Part
Route::prefix('design/jingles')->group(function(){
    Route::get('/view',[JinglesUiController::class, 'jinglesUiView'])->name('jinglesUi.view');
    Route::get('/edit/{id}',[JinglesUiController::class, 'jinglesUiEdit'])->name('jinglesUi.edit');
    Route::post('/update/{id}',[JinglesUiController::class, 'jinglesUiUpdate'])->name('jinglesUi.update');
});

//No Wifi Ui Part
Route::prefix('design/noWifi')->group(function(){
    Route::get('/view',[NoWifiUiController::class, 'noWifiUiView'])->name('noWifiUi.view');
    Route::get('/edit/{id}',[NoWifiUiController::class, 'noWifiUiEdit'])->name('noWifiUi.edit');
    Route::post('/update/{id}',[NoWifiUiController::class, 'noWifiUiUpdate'])->name('noWifiUi.update');
});

