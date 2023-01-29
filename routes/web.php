<?php

use App\Http\Controllers\AboutPageController;
use App\Http\Controllers\Account\SettingsController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\SoundController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Auth\SocialiteLoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ConsultingController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\Documentation\ReferencesController;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GeneralInfoController;
use App\Http\Controllers\HowItWorkController;
use App\Http\Controllers\KeyWordController;
use App\Http\Controllers\Logs\AuditLogsController;
use App\Http\Controllers\Logs\SystemLogsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PlacetypeController;
use App\Http\Controllers\PodacstController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuastionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ToolsController;
use App\Http\Controllers\VideoController;
use App\Http\Livewire\Edit_consl;
use App\Http\Livewire\EditConsoltion;
use App\Models\Tools;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return redirect('index');
// });

$menu = theme()->getMenu();
// array_walk($menu, function ($val) {
//     if (isset($val['path'])) {
//         $route = Route::get($val['path'], [PagesController::class, 'index']);

//         // Exclude documentation from auth middleware
//         if (!Str::contains($val['path'], 'documentation')) {
//             $route->middleware('auth');
//         }
//     }
// });

// Documentations pages
Route::get('/rss_feed/{id}', [SoundController::class, 'rss_feed'])->name('rss_feed');

Route::get('/', [UsersController::class, 'dashbaord']);
Route::prefix('documentation')->group(function () {
    Route::get('getting-started/references', [ReferencesController::class, 'index']);
    Route::get('getting-started/changelog', [PagesController::class, 'index']);
});


// Account pages
Route::prefix('account')->group(function () {
    Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::put('settings', [SettingsController::class, 'update'])->name('settings.update');
    Route::put('settings/email', [SettingsController::class, 'changeEmail'])->name('settings.changeEmail');
    Route::put('settings/password', [SettingsController::class, 'changePassword'])->name('settings.changePassword');
});

// Logs pages
Route::prefix('log')->name('log.')->group(function () {
    Route::resource('system', SystemLogsController::class)->only(['index', 'destroy']);
    Route::resource('audit', AuditLogsController::class)->only(['index', 'destroy']);
});
Route::get('verify_email/{id}',[UsersController::class,'verfty_email'])->name('send_email.verfy');

Route::middleware('auth')->group(function () {
    Route::resource('users', UsersController::class);
    Route::resource('tickets', TicketController::class);
    Route::post('send_replay',[TicketController::class,'send_replay'])->name('send_replay');
    Route::post('change_status_service/{id}',[ServiceController::class,'change_status_service'])->name('change_status_service');

    
    Route::get('creators',[ProfileController::class,'markters']);
    Route::delete('delete_creators/{id}',[ProfileController::class,'delete_creators'])->name('delete_creators');

    Route::get('creators_requests',[UsersController::class,'marketers_requests'])->name('marketers_requests');
    Route::get('get_cats',[ServiceController::class,'get_cats'])->name('get_cats');
    Route::get('show_pending',[ServiceController::class,'show_pending'])->name('show_pending');
    Route::get('blog_pending',[BlogController::class,'show_pending'])->name('blog_pending');
    Route::get('video_pending',[VideoController::class,'video_pending'])->name('video_pending');
    Route::get('creator_pending',[UserController::class,'creator_pending'])->name('creator_pending');

    Route::get('customers',[ProfileController::class,'users']);
    Route::get('creators_order',[ProfileController::class,'markter_order'])->name('markter_order');
    Route::get('show_customer_markter/{id}',[ProfileController::class,'show_customer_markter'])->name('show_customer_markter');

    
    Route::get('customer/{id}',[ProfileController::class,'show_customer'])->name('customer.show');
    Route::post('change_status_markter/{id}',[UsersController::class,'change_status_markter'])->name('change_status_markter');

    
    Route::get('order/{id}',[ProfileController::class,'show_order'])->name('order.show');
    Route::get('show_messages/{id}',[ProfileController::class,'show_messages'])->name('show_messages');
    Route::get('show_message_from_user/{id}/{id2}',[ProfileController::class,'show_message_from_user'])->name('show_message_from_user');

    
    Route::get('marketer/{id}',[ProfileController::class,'show'])->name('marketer.show');
    Route::get('/status/update',[ProfileController::class,'updateStatus'])->name('users.update.status');    
    Route::get('/pan/update',[ProfileController::class,'updatepan'])->name('users.update.pan');    

    
    Route::get('/status/blogs',[BlogController::class,'updateStatus'])->name('blogs.update.status');  
    Route::get('/status/service',[ServiceController::class,'updateStatus'])->name('service.update.status');  
    Route::get('user/getData', [UsersController::class, 'getData'])->name('users.getDat');
    Route::resource('specialtys', SpecialtyController::class);
    Route::resource('payments', PaymentController::class);
    Route::post('update_payments/update/{id}', [PaymentController::class, 'update'])->name('update_payments');
    Route::post('get_form_payment', [PaymentController::class, 'get_form_payment'])->name('get_form_payment');
    Route::get('cons',function(){
        return view('pages.consl');
    });
  
    Route::resource('places', PlacetypeController::class);
    Route::resource('city', CityController::class);
    Route::resource('about', AboutPageController::class);
    Route::resource('howItWords', HowItWorkController::class);

    Route::post('get_form_city', [CityController::class,'get_form_city'])->name('get_form_city');
    Route::post('update_city/{id}', [CityController::class, 'update_city'])->name('update_city');

    Route::post('update_places/update/{id}', [PlacetypeController::class, 'update'])->name('update_places');
    Route::post('get_form_places', [PlacetypeController::class, 'get_form_place'])->name('get_form_place');

    Route::get('specialtysgetData', [SpecialtyController::class, 'getData'])->name('specialty.getDat');
    Route::post('get_form_specialty', [SpecialtyController::class, 'get_form_specialty'])->name('get_form_specialty');

    

    Route::post('update_specialty/update/{id}', [SpecialtyController::class, 'update_specialty'])->name('update_specialty');
    Route::get('service_category', [CategoryController::class, 'service_index'])->name('service_index');
    Route::get('user_category', [CategoryController::class, 'user_index'])->name('user_index');

    Route::post('service_category', [CategoryController::class, 'store_service_category'])->name('store_service_category');
    Route::get('consultation_category', [CategoryController::class, 'consultation_index'])->name('consultation_index');
    Route::post('consultation_category', [CategoryController::class, 'store_consultation_category'])->name('store_consultation_category');
    Route::post('user_category', [CategoryController::class, 'store_user_category'])->name('store_user_category');

    Route::get('get_user_category', [CategoryController::class, 'getUsereData'])->name('getUsereData');

    Route::get('get_service_category', [CategoryController::class, 'getServiceData'])->name('getServiceData');
    Route::delete('service_category_delete/{id}', [CategoryController::class, 'delete_service_category'])->name('delete_service_category');
    Route::post('update_category/{id}', [CategoryController::class, 'update_category'])->name('update_category');
    Route::post('update_category_service/{id}', [CategoryController::class, 'update_category_service'])->name('update_category_service');

    
    Route::post('get_form_category', [CategoryController::class, 'get_form_category'])->name('get_form_category');
    Route::post('get_form_category_service', [CategoryController::class, 'get_form_category_service'])->name('get_form_category_service');

    
    Route::get('get_blog_category', [CategoryController::class, 'getBlogData'])->name('getBlogData');
    Route::get('get_podcast_category', [CategoryController::class, 'getPodcastData'])->name('getPodcastCategory');
    Route::get('get_consultation_category', [CategoryController::class, 'getConsultationData'])->name('getConsultationData');

    


    Route::get('video_category', [CategoryController::class, 'video_index'])->name('video_index');
    Route::post('video_category', [CategoryController::class, 'store_video_category'])->name('store_video_category');
    Route::get('get_video_category', [CategoryController::class, 'getVideoData'])->name('getVideoData');




    
    Route::post('blog_category', [CategoryController::class, 'store_blog_category'])->name('store_blog_category');
    Route::post('store_podcast_category', [CategoryController::class, 'store_podcast_category'])->name('store_podcast_category');

    Route::get('blog_category', [CategoryController::class, 'blog_index'])->name('blog_index');
    Route::get('podcast_category', [CategoryController::class, 'podcast_index'])->name('podcast_index');
    Route::get('podcast_keyword_index', [KeyWordController::class, 'podcast_index'])->name('podcast_index');
    Route::get('video_keyword_index', [KeyWordController::class, 'video_index'])->name('video_index');
    Route::post('video_keyword', [KeyWordController::class, 'store_video_keyword'])->name('store_video_keyword');
    Route::get('get_video_keyword', [KeyWordController::class, 'getVideoData'])->name('getVideoData_key');

    Route::post('podcast_keyword', [KeyWordController::class, 'store_podcast_keyword'])->name('store_podcast_keyword');
    Route::post('consoltion_keyword', [KeyWordController::class, 'store_consoltion_keyword'])->name('store_consoltion_keyword');

    Route::get('get_podcast_keyword', [KeyWordController::class, 'getPodcastData'])->name('getPodcastData');
    Route::get('consoltion_keyword', [KeyWordController::class, 'consoltion_index'])->name('consoltion_index');
    Route::get('get_consoltion_keyword', [KeyWordController::class, 'getConsoltionData'])->name('getConsoltionData');

    Route::get('service_keyword', [KeyWordController::class, 'service_index'])->name('service_index');
    Route::post('service_keyword', [KeyWordController::class, 'store_service_keyword'])->name('store_service_keyword');
    Route::get('get_service_keyword', [KeyWordController::class, 'getServiceData'])->name('getKeywordServiceData');

    Route::get('service_keyword', [KeyWordController::class, 'service_index'])->name('service_index');
    Route::post('service_keyword', [KeyWordController::class, 'store_service_keyword'])->name('store_service_keyword');
    Route::get('get_service_keyword', [KeyWordController::class, 'getServiceData'])->name('getKeywordServiceData');
    Route::delete('service_keyword_delete/{id}', [KeyWordController::class, 'delete_service_keyword'])->name('delete_service_keyword');
    Route::post('update_keyword/{id}', [KeyWordController::class, 'update_keyword'])->name('update_keyword');
    Route::post('get_form_keyword', [KeyWordController::class, 'get_form_keyword'])->name('get_form_keyword');
    Route::get('get_blog_keyword', [KeyWordController::class, 'getBlogData'])->name('getKeywordData');
    Route::post('blog_keyword', [KeyWordController::class, 'store_blog_keyword'])->name('store_blog_keyword');
    Route::get('blog_keyword', [KeyWordController::class, 'blog_index'])->name('keyword_index');
    Route::resource('countires', CountryController::class);
    Route::post('countires_store', [CountryController::class,'store'])->name('countires.store_data');
    Route::post('update_country/{id}', [CountryController::class,'update_country'])->name('update_country');
    Route::get('country_get_data',[CountryController::class, 'getData'])->name('country.getData');
    Route::get('get_form_country',[CountryController::class, 'get_form_country'])->name('get_form_country');
    Route::resource('services',ServiceController::class);
    Route::resource('blogs',BlogController::class);
    Route::post('upload_image',[GeneralInfoController::class,'upload'])->name("upload_image");
    Route::get('get_image/{id}',[GeneralInfoController::class,'get_image'])->name("get_image");
    Route::post('update_data_image',[GeneralInfoController::class,'update_data_image'])->name("update_data_image");
    Route::resource('roles',RoleController::class);
    Route::resource('tools',ToolsController::class);

    
    
    Route::get('show_comments/{id}',[BlogController::class,'show_comments'])->name('show_comments');
    Route::delete('comments',[BlogController::class,'delete_comment'])->name('comments.destroy');
    Route::get('number_in_follower_range', [ServiceController::class, 'number_in_follower_range']);

    Route::get('update_comment_status/',[BlogController::class,'update_comment_status'])->name('comment.update.status');
    Route::resource('general_info',GeneralInfoController::class);
    Route::get('general_data',[GeneralInfoController::class,'general_data'])->name('general_data');
    Route::get('first_section',[GeneralInfoController::class,'first_section'])->name('first_section');
    Route::get('price_service',[GeneralInfoController::class,'price_service'])->name('price_service');
    Route::get('price_consultion',[GeneralInfoController::class,'price_consultion'])->name('price_consultion');

    
    Route::get('myfatoorah_config',[GeneralInfoController::class,'myfatoorah']);
    Route::get('notification_info/{id}',[GeneralInfoController::class,'notification'])->name('show.notification');

    
    Route::resource('orders',OrderController::class);
    Route::get('order_consulting',[OrderController::class,'order_consulting'])->name('order_consulting');
    Route::get('order_consulting_show/{id}',[OrderController::class,'order_consulting_show'])->name('order_consulting.show');

    

    Route::resource('quastions',QuastionController::class);
    Route::resource('podcasts',PodacstController::class);
    Route::post('maual_podcast', [PodacstController::class, 'maual_podcast'])->name('maual_podcast.store');
    Route::get('create_manula_podcast', [PodacstController::class, 'create_manula_podcast'])->name('create_manula_podcast');

    Route::resource('videos', VideoController::class);
    Route::resource('consloution', ConsultingController::class);
    Route::resource('consloution', ConsultingController::class);
    Route::post('reject_cons', [ConsultingController::class,'reject_cons'])->name('reject_cons');

    

    Route::post('change_status_consulting/{id}', [ConsultingController::class,'change_status_consulting'])->name('change_status_consulting');

    Route::resource('faqs', FaqsController::class);
    Route::post('update_sort_faqs',[FaqsController::class,'update_sort_faqs'])->name('update_sort_faqs'); 

    Route::get('create_marketer', [UserController::class,'create_markter'])->name('create_markter');
    Route::get('about_frontend', [GeneralInfoController::class,'about_frontend'])->name('about_frontend');
    Route::get('return_exchange_policy', [GeneralInfoController::class,'return_exchange_policy'])->name('return_exchange_policy');
    Route::get('usage_policy', [GeneralInfoController::class,'usage_policy'])->name('usage_policy');
    Route::get('pay_policy', [GeneralInfoController::class,'pay_policy'])->name('pay_policy');
    Route::get('rights_guarantee', [GeneralInfoController::class,'rights_guarantee'])->name('rights_guarantee');
    Route::get('how_site_work', [GeneralInfoController::class,'how_site_work'])->name('how_site_work');

    
    
    Route::get('privacy_policy', [GeneralInfoController::class,'privacy_policy'])->name('privacy_policy');
    Route::post('update_status_video',[VideoController::class,'update_status_video'])->name('update_status_video');

    Route::get('services_update/{id}',[ServiceController::class, 'update'])->name('services_update');

    Route::get('service_getData',[ServiceController::class,'getData'])->name('service.getData');
    Route::get('get_speclis_service',[ServiceController::class,'get_speclis_service'])->name('get_speclis_service');
    Route::get('get_type_service',[ServiceController::class,'get_type_service'])->name('get_type_service');
    Route::get('get_keywords_service',[ServiceController::class,'get_keywords_service'])->name('get_keywords_service');
    Route::post('gallery',[GalleryController::class,'store'])->name('gallery.store');
    Route::post('gallery',[GalleryController::class,'store'])->name('gallery.store');
    Route::get('dashabord_search',[GeneralInfoController::class,'dashabord_search'])->name('dashabord_search');
    Route::get('/rss', [HomeController::class, 'rss']);
    Route::get('/create_podcast',function(){
        return view('pages.podcasts.new_create');
    })->name('create_podcast_new');
    Route::get('/index_podcast',[PodacstController::class,'new_index'])->name('new_index');
    Route::delete('/destort_new/{id}',[PodacstController::class,'destort_new'])->name('destort_new');
    Route::post('/store_podcast',[PodacstController::class,'store_podcast'])->name('store_podcast');
    // Route::get('/show_podcust/{url}',[PodacstController::class,'media_rss'])->name('media_rss');
    Route::post('/uploda_sound',[PodacstController::class,'uploda_sound'])->name('uploda_sound');

    

    

});









/**
 * Socialite login using Google service
 * https://laravel.com/docs/8.x/socialite
 */
Route::get('/auth/redirect/{provider}', [SocialiteLoginController::class, 'redirect']);
Route::get('/show_podcust/{url}',[PodacstController::class,'media_rss'])->name('media_rss');

require __DIR__ . '/auth.php';
