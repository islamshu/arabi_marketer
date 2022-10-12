<?php

use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\ConsultationController;
use App\Http\Controllers\Api\GeneralController;
use App\Http\Controllers\Api\PodcastController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\VideoController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\SampleDataController;
use Illuminate\Support\Facades\Route;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

// Sample API route
Route::get('/profits', [SampleDataController::class, 'profits'])->name('profits');



Route::post('/forgot_password', [PasswordResetLinkController::class, 'apiStore']);

Route::post('/verify_token', [AuthenticatedSessionController::class, 'apiVerifyToken']);



//start user profrle
Route::get('/users', [SampleDataController::class, 'getUsers']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::group(['middleware' => 'is_login'], function () {
    Route::post('/edit_profile', [UserController::class, 'edit_profile']);
    Route::post('/edit_profile_step_2', [UserController::class, 'edit_profile_step_2']);
    Route::post('/edit_profile_step_3', [UserController::class, 'edit_profile_step_3']);
    Route::get('/profile', [UserController::class, 'profile']);
    Route::get('/my_blogs', [UserController::class, 'get_blog']);
    Route::get('/my_services', [UserController::class, 'get_service']);
    Route::get('/my_podcasts', [UserController::class, 'get_podcasts']);
});
Route::get('/type_of_user', [UserController::class, 'type_of_user']);
//end profile


//start blog
Route::get('/blog_category', [BlogController::class, 'blog_category']);
Route::get('/blog_keyword', [BlogController::class, 'blog_keyword']);
Route::post('/add_blog', [BlogController::class, 'store']);
Route::get('/get_all_blogs', [BlogController::class, 'get_all']);
Route::get('/single_blog/{id}', [BlogController::class, 'single'])->name('single_blog');
Route::get('/blog_search', [BlogController::class, 'serach']);
Route::get('/related_blogs/{id}', [BlogController::class, 'related_blogs']);

//end blog 

//start service
Route::get('/service_category', [ServiceController::class, 'service_category']);
Route::get('/service_keyword', [ServiceController::class, 'service_keyword']);
Route::get('/get_specialty', [ServiceController::class, 'get_specialty']);
Route::group(['middleware' => 'is_login'], function () {
    Route::post('/add_service', [ServiceController::class, 'store']);
});
Route::get('/single_service/{id}', [ServiceController::class, 'single'])->name('single_service');
Route::get('/get_all_service', [ServiceController::class, 'get_all']);

//end service 

//start podcasts
Route::get('/podcast_category', [PodcastController::class, 'podcast_category']);
Route::get('/podcast_keywords', [PodcastController::class, 'podcast_keyword']);
Route::get('/get_all_podcasts', [PodcastController::class, 'get_all']);
Route::get('/single_podcast/{id}', [PodcastController::class, 'single'])->name('single_podcast');
Route::group(['middleware' => 'is_login'], function () {
    Route::post('/add_podcast', [PodcastController::class, 'store']);
});

//end podcasts


//start Video
Route::get('/video_category', [VideoController::class, 'video_category']);
Route::get('/video_keywords', [VideoController::class, 'video_keyword']);
Route::get('/get_all_videos', [VideoController::class, 'get_all']);
Route::get('/single_video/{id}', [VideoController::class, 'single'])->name('single_video');
Route::group(['middleware' => 'is_login'], function () {
    Route::post('/add_video', [VideoController::class, 'store']);
});
//end Video

//start consultation
Route::get('/consultation_category', [ConsultationController::class, 'consultation_category']);
Route::get('/consultation_keywords', [ConsultationController::class, 'consultation_keyword']);
Route::get('/consultation_places', [ConsultationController::class, 'places']);
Route::get('/consultation_payments', [ConsultationController::class, 'payments']);
Route::get('/get_all_consultation', [ConsultationController::class, 'all_consultation']);
Route::group(['middleware' => 'is_login'], function () {
    Route::post('/add_consultion', [ConsultationController::class, 'store']);
});


//start general data
Route::get('/get_all_countires', [GeneralController::class, 'get_all_countires']);
Route::get('/all_cities', [GeneralController::class, 'all_cites']);
Route::get('/get_all_city_user_country_id/{id}', [GeneralController::class, 'get_all_city_belong_country']);
