<?php

use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\ConsultationController;
use App\Http\Controllers\Api\FacebookController;
use App\Http\Controllers\Api\FollowController;
use App\Http\Controllers\Api\ForgotPasswordController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\GeneralController;
use App\Http\Controllers\Api\GoogleController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\NewPodcastContoller;
use App\Http\Controllers\Api\PayPalPaymentController;
use App\Http\Controllers\Api\PodcastController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\SoundController;
use App\Http\Controllers\Api\TicketController;
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
Route::get('/testapi', [HomeController::class, 'testapi'])->name('testapi');
Route::get('/change_mention', [UserController::class, 'change_mention'])->name('change_mention');




Route::get('/home', [HomeController::class, 'home']);
Route::get('/get_about_home', [HomeController::class, 'about']);
Route::get('/get_all_scope_home', [HomeController::class, 'all_scope']);
Route::get('home_service', [HomeController::class, 'get_service']);
Route::get('home_blog', [HomeController::class, 'get_blog']);
Route::get('home_podcasts', [HomeController::class, 'get_podcast']);
Route::get('get_podcast_admin', [HomeController::class, 'get_podcast_admin']);
Route::get('main_images', [HomeController::class, 'main_image']);
Route::get('first_section', [HomeController::class, 'first_section']);


Route::get('home_video', [HomeController::class, 'get_video']);
Route::get('home_consulting', [HomeController::class, 'get_consulting']);
Route::get('home_markter', [HomeController::class, 'get_markter_home']);
Route::get('home_tools', [HomeController::class, 'get_home_tools']);
Route::get('single_tool/{id}', [HomeController::class, 'single_tool']);







Route::get('/homeddd', [HomeController::class, 'edit']);
Route::get('/rss_feed/{id}', [SoundController::class, 'rss_feed']);

Route::get('/questions', [HomeController::class, 'questions']);
Route::get('/get_markter/{id}', [HomeController::class, 'get_markter']);
Route::post('upload_images', [GalleryController::class, 'upload'])->name('upload_image');
Route::get('get_all_media', [GalleryController::class, 'index']);
Route::get('singe_media/{id}', [GalleryController::class, 'single']);
Route::post('update_media/{id}', [GalleryController::class, 'edit']);



// start marketer
Route::get('/get_markter/{id}', [HomeController::class, 'get_markter']);
Route::get('/get_all_markter', [HomeController::class, 'get_all_markter']);



Route::post('/forgot_password', [PasswordResetLinkController::class, 'apiStore']);
Route::post('/verify_token', [AuthenticatedSessionController::class, 'apiVerifyToken']);
Route::post('forget_email', [ForgotPasswordController::class, 'forgot']);
Route::post('reset_my_password', [ForgotPasswordController::class, 'reset'])->name('api_reset');




//start user profrle
Route::get('/send_email', [UserController::class, 'send_email']);

Route::get('/users', [SampleDataController::class, 'getUsers']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/check_name', [UserController::class, 'check_name']);
Route::post('/check_email', [UserController::class, 'check_email']);




Route::get('/show_notification/{id}', [UserController::class, 'show_notification'])->name('show_notification');

Route::group(['middleware' => 'is_login'], function () {
    Route::post('/edit_profile', [UserController::class, 'edit_profile']);
    Route::post('/upload_profile_image', [UserController::class, 'upload_image']);

    Route::post('/edit_pio', [UserController::class, 'edit_pio']);
    Route::post('/edit_soical', [UserController::class, 'edit_soical']);
    Route::post('/edit_profile_user', [UserController::class, 'edit_profile_user']);
    Route::post('/edit_password', [UserController::class, 'edit_password']);
    Route::post('/check_mention_name', [UserController::class, 'check_mention_name']);
    Route::post('/be_marketer', [UserController::class, 'be_marketer']);
    Route::get('/profile', [UserController::class, 'profile']);
    Route::get('/my_service_buy', [UserController::class, 'my_service_buy']);
    Route::get('/my_consultations_buy', [UserController::class, 'my_consultations_buy']);
    Route::get('/my_orders', [UserController::class, 'order']);
    Route::get('/order_show/{id}', [UserController::class, 'order_show'])->name('order_show');
    Route::get('/my_notification', [UserController::class, 'my_notification'])->name('my_notification');
    Route::post('/edit_profile_step_2', [UserController::class, 'edit_profile_step_2']);
    Route::post('/edit_profile_step_3', [UserController::class, 'edit_profile_step_3']);
    Route::post('/edit_profile_step_4', [UserController::class, 'edit_profile_step_4']);
});
Route::group(['middleware' => 'is_login', 'middleware' => 'Is_markter'], function () {
    Route::post('add_bank_info', [UserController::class, 'add_bank_info']);
    Route::get('/my_blogs', [UserController::class, 'get_blog']);
    Route::get('/my_services', [UserController::class, 'get_service']);
    Route::get('/my_podcasts', [UserController::class, 'get_podcasts']);
    Route::get('/get_videos', [UserController::class, 'get_videos']);
    Route::get('/get_consultations', [UserController::class, 'get_consultations']);
});
Route::get('/markter_blogs/{id}', [UserController::class, 'get_markter_blog']);
Route::get('/markter_services/{id}', [UserController::class, 'get_markter_service']);
Route::get('/markter_podcasts/{id}', [UserController::class, 'get_markter_podcasts']);
Route::get('/markter_videos/{id}', [UserController::class, 'get_markter_videos']);
Route::get('/markter_consultations/{id}', [UserController::class, 'get_markter_consultations']);
Route::get('/type_of_user', [UserController::class, 'type_of_user']);
//end profile
Route::get('/rss', [HomeController::class, 'rss']);


//start blog
Route::get('/blog_category', [BlogController::class, 'blog_category']);
Route::get('/blog_keyword', [BlogController::class, 'blog_keyword']);
Route::group(['middleware' => 'is_login', 'middleware' => 'Is_markter'], function () {
    Route::post('/add_blog', [BlogController::class, 'store']);
    Route::post('/update_blog', [BlogController::class, 'update']);
    Route::delete('/delete_blog/{id}', [BlogController::class, 'delete']);
});
Route::post('/add_comment', [CommentController::class, 'store']);
Route::post('/add_rate', [BlogController::class, 'add_rate']);
Route::get('/get_comments_for_blog/{id}', [CommentController::class, 'get_comment']);
Route::get('/get_all_blogs', [BlogController::class, 'get_all']);
Route::get('/single_blog/{mention}/{id}', [BlogController::class, 'single'])->name('single_blog');
Route::get('/all_blog_user/{mention}', [BlogController::class, 'all_blog_user'])->name('all_blog_user');

Route::get('/blog_search', [BlogController::class, 'serach']);
Route::get('/related_blogs/{id}', [BlogController::class, 'related_blogs']);
Route::post('/add_service', [ServiceController::class, 'store']);

//end blog 

//start service
Route::get('/service_category', [ServiceController::class, 'service_category']);
Route::get('/service_keyword', [ServiceController::class, 'service_keyword']);
Route::get('/get_specialty', [ServiceController::class, 'get_specialty']);
Route::get('/service_search', [ServiceController::class, 'serach']);
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('auth/facebook', [FacebookController::class, 'redirectToGoogle']);
Route::get('facebook/callback', [FacebookController::class, 'handleGoogleCallback']);
Route::group(['middleware' => 'is_login', 'middleware' => 'is_able_markter'], function () {
    Route::post('/store_sound', [SoundController::class, 'store']);

    Route::post('/add_service', [ServiceController::class, 'store']);
    Route::post('/update_service', [ServiceController::class, 'update']);
    Route::delete('/delete_service/{id}', [ServiceController::class, 'delete']);
});
Route::group(['middleware' => 'is_login'], function () {

    Route::post('/add_service_comment', [ServiceController::class, 'add_comment']);
});

Route::get('/single_service/{id}', [ServiceController::class, 'single'])->name('single_service');
Route::get('/get_all_service', [ServiceController::class, 'get_all']);

//end service 


//start podcasts
Route::get('/podcast_category', [PodcastController::class, 'podcast_category']);
Route::get('/podcast_keywords', [PodcastController::class, 'podcast_keyword']);
Route::get('/get_all_podcasts', [PodcastController::class, 'get_all']);
Route::get('/single_podcast/{id}', [PodcastController::class, 'single'])->name('single_podcast');
Route::get('/podcast_search', [PodcastController::class, 'serach']);

Route::group(['middleware' => 'is_login', 'middleware' => 'is_able_markter'], function () {

    Route::post('/add_podcast', [PodcastController::class, 'store']);
    Route::post('/update_podcast', [PodcastController::class, 'update']);
    Route::delete('/delete_podcast/{id}', [PodcastController::class, 'delete']);
    Route::post('add_new_podcast', [NewPodcastContoller::class, 'store']);
});
Route::group(['middleware' => 'is_login'], function () {
    Route::get('/carts', [CartController::class, 'index']);
    Route::post('/add_to_cart', [CartController::class, 'store']);
    Route::post('/checkout_cons', [CartController::class, 'checkout_cons']);
    Route::delete('/delete_from_carts/{id}', [CartController::class, 'delete']);
    Route::get('/checkout', [PayPalPaymentController::class, 'handlePayment'])->name('make.payment');
    Route::get('/tickets', [TicketController::class, 'index']);
    Route::get('/single_ticket/{id}', [TicketController::class, 'single_ticket']);

    Route::post('/send_replay', [TicketController::class, 'send_replay']);



    Route::post('/add_ticket', [TicketController::class, 'store']);
    Route::post('/send_messsage', [MessageController::class, 'store']);
    Route::get('/all_message', [MessageController::class, 'index']);
    Route::get('all_message_between_user/{id}/{id2}', [MessageController::class, 'message_betwwen_2'])->name('message_two');
    Route::get('/followe_markter/{id}', [FollowController::class, 'store']);
    Route::get('/get_all_follower', [FollowController::class, 'index']);
    Route::delete('/delete_follow_marketer/{id}', [FollowController::class, 'delete']);
});

//end podcasts


//start Video
Route::get('/video_category', [VideoController::class, 'video_category']);
Route::get('/video_keywords', [VideoController::class, 'video_keyword']);
Route::get('/get_all_videos', [VideoController::class, 'get_all']);
Route::get('/single_video/{id}', [VideoController::class, 'single'])->name('single_video');
Route::get('/video_search', [VideoController::class, 'serach']);
Route::get('/related_videos/{id}', [VideoController::class, 'related_videos']);


Route::group(['middleware' => 'is_login', 'middleware' => 'is_able_markter'], function () {

    Route::post('/add_video', [VideoController::class, 'store']);
    Route::post('/update_video', [VideoController::class, 'update']);
    Route::delete('/delete_video/{id}', [VideoController::class, 'delete']);
});
//end Video

//start consultation
Route::get('/consultation_category', [ConsultationController::class, 'consultation_category']);
Route::get('/consultation_keywords', [ConsultationController::class, 'consultation_keyword']);
Route::get('/consultation_places', [ConsultationController::class, 'places']);
Route::get('/consultation_payments', [ConsultationController::class, 'payments']);
Route::get('/get_all_consultation', [ConsultationController::class, 'all_consultation']);
Route::get('/single_consultion/{id}', [ConsultationController::class, 'single_consultion']);

Route::group(['middleware' => 'is_login', 'middleware' => 'is_able_markter'], function () {
    Route::post('/add_consultion', [ConsultationController::class, 'store']);
    Route::post('/update_consultion/{id}', [ConsultationController::class, 'update']);
});
Route::get('consultation_search', [ConsultationController::class, 'serach']);



//start general data
Route::get('/get_all_countires', [GeneralController::class, 'get_all_countires']);
Route::get('/all_cities', [GeneralController::class, 'all_cites']);
Route::get('/get_all_city_user_country_id/{id}', [GeneralController::class, 'get_all_city_belong_country']);

Route::get('handle-payment', [PayPalPaymentController::class, 'handlePayment'])->name('make.payment');

Route::get('cancel-payment', [PayPalPaymentController::class, 'paymentCancel'])->name('cancel.payment');

Route::get('payment-success/{id}', [PayPalPaymentController::class, 'paymentSuccess'])->name('success.payment');



Route::get('cancel-payment-consultion', [CartController::class, 'paymentCancel'])->name('cancel.payment.consultion');
Route::get('payment-success-consultion/{id}', [CartController::class, 'paymentSuccess'])->name('success.payment.consultion');
