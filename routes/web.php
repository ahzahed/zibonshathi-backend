<?php

use App\Blog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
//Soft Delete
Route::get('/softDelete', function () {
    Blog::find(1)->delete();
});

Route::get('/', 'AnyController@index');

Auth::routes(['verify'=>true]);

//For Home
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
// Route::get('/admin', 'HomeController@index')->name('admin');

Route::post('find-person','HomeController@search')->name('find-person');

//payment
Route::post('payment.process','RegisteredUserController@payment')->name('payment.process');
Route::post('stripe.charge','RegisteredUserController@stripeCharge')->name('stripe.charge');


//View Profile
Route::get('/viewProfile', 'RegisteredUserController@viewProfile')->name('viewProfile');
// Route::get('/editProfile', 'RegisteredUserController@editProfile')->name('editProfile');
// Route::post('/updateProfile/{id}', 'RegisteredUserController@updateProfile');

//Socialite
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');


//Multi Image
Route::get('multiple-image', 'ImageController@index');
Route::post('multiple-save', 'ImageController@save');

//Edit profile step by step
Route::post('/update_user_header/{id}', 'RegisteredUserController@update_user_header');
Route::post('/update_user_delails/{id}', 'RegisteredUserController@update_user_delails');
Route::post('/update_user_basics/{id}', 'RegisteredUserController@update_user_basics');
Route::post('/update_user_education/{id}', 'RegisteredUserController@update_user_education');
Route::post('/update_user_family/{id}', 'RegisteredUserController@update_user_family');
Route::post('/update_user_contact/{id}', 'RegisteredUserController@update_user_contact');
//Gallery
Route::post('/update_gimage1/{id}', 'RegisteredUserController@update_gimage1');
Route::post('/update_gimage2/{id}', 'RegisteredUserController@update_gimage2');
Route::post('/update_gimage3/{id}', 'RegisteredUserController@update_gimage3');
Route::post('/update_gimage4/{id}', 'RegisteredUserController@update_gimage4');


Route::post('/testimonial/{id}', 'RegisteredUserController@testimonial');

//Rgister as parent or guardian
Route::get('/register_as_p_g', 'Auth\RegisterController@register_as_p_g')->name('register_as_p_g');
Route::post('/register_as_p_g_store', 'Auth\RegisterController@register_as_p_g_store')->name('register_as_p_g_store');

//All Profile
Route::get('/allMaleProfile', 'RegisteredUserController@allMaleProfile')->name('allMaleProfile');
Route::get('/allFemaleProfile', 'RegisteredUserController@allFemaleProfile')->name('allFemaleProfile');

//Details profile view by registered user
Route::get('/detailsProfile/{id}', 'RegisteredUserController@detailsProfile')->name('detailsProfile');

/*  Contact */
Route::resource('contact', 'ContactController');
Route::post('/replypeople/{id}', 'ContactController@replypeople');

//Testimonial
Route::get('/testimonial', 'TestimonialController@testimonial');
Route::get('/testimonialDelete/{id}', 'TestimonialController@testimonialDelete');

//Payment
Route::get('/userPayment', 'PaymentController@userPayment');
Route::get('/paymentDelete/{id}', 'PaymentController@paymentDelete');

//About Us
Route::get('/aboutus', 'AnyController@aboutus')->name('aboutus');

//Privacy Policy
Route::get('/privacy_policy', 'AnyController@privacy_policy')->name('privacy_policy');

//Terms Of Us
Route::get('/termsof_us', 'AnyController@termsof_us')->name('termsof_us');

//Premium Membership
Route::get('/premium_membership', 'AnyController@premium_membership')->name('premium_membership');

//Partner Search Policy
Route::get('/partner_search_policy', 'AnyController@partner_search_policy')->name('partner_search_policy');

Route::get('/helpdesk', 'AnyController@helpdesk')->name('helpdesk');



//For Admin
Route::get('/visitor', 'VisitorController@visitorIndex');

// New Register maintain, For admin panel
Route::get('/registeredUser', 'RegisteredUserController@index');
Route::get('/registeredUserActive/{id}', 'RegisteredUserController@active');
Route::get('/registeredUserDeactive/{id}', 'RegisteredUserController@deactive');
Route::get('/pendingUser', 'RegisteredUserController@pendingUser');
Route::get('/approveUser/{id}', 'RegisteredUserController@approveUser');
Route::get('/registeredUserView/{id}', 'RegisteredUserController@registeredUserView');
Route::get('/pendingUserView/{id}', 'RegisteredUserController@pendingUserView');
Route::get('/registeredUserDelete/{id}', 'RegisteredUserController@registeredUserDelete');
Route::get('/pendingUserDelete/{id}', 'RegisteredUserController@pendingUserDelete');
Route::get('/registeredGardian', 'RegisteredUserController@registeredGardian');
Route::get('/registeredGardianDelete/{id}', 'RegisteredUserController@registeredGardianDelete');

//Service
Route::get('/service', 'ServiceController@index')->name('service');
Route::get('/serviceAdd', 'ServiceController@serviceAdd');
Route::post('/service.add', 'ServiceController@serviceStore')->name('service.add');

Route::get('/serviceDelete/{id}', 'ServiceController@serviceDelete');
Route::get('/serviceEdit/{id}', 'ServiceController@serviceEdit')->name('serviceEdit');
Route::post('/serviceUpdate/{id}', 'ServiceController@serviceUpdate')->name('serviceUpdate');
Route::get('/serviceView/{id}', 'ServiceController@serviceView')->name('serviceView');

Route::get('/serviceActive/{id}', 'ServiceController@active');
Route::get('/serviceDeactive/{id}', 'ServiceController@deactive');

/* Blog  Resource Route */
Route::resource('blog', 'BlogController');
Route::get('/addBlog', 'BlogController@addBlog');
Route::get('/allBlog', 'BlogController@allBlog');
Route::get('/trash_blog', 'BlogController@trash_blog');

Route::get('/blogActive/{id}', 'BlogController@active');
Route::get('/blogDeactive/{id}', 'BlogController@deactive');
Route::get('/blogDelete/{id}', 'BlogController@blogDelete');
Route::get('/blogForceDelete/{id}', 'BlogController@blogForceDelete');
Route::get('/blogRestore/{id}', 'BlogController@blogRestore');

/* Add User by admin */
Route::get('/adduser_byadmin', 'AddUserByAdminController@adduser_byadmin')->name('adduser_byadmin');
Route::post('/adduser_byadmin.add', 'AddUserByAdminController@adduser_byadmin_store')->name('adduser_byadmin.add');
Route::get('/userroleDelete/{id}', 'AddUserByAdminController@userroleDelete');

//User Role
Route::get('/userrole', 'AddUserByAdminController@userrole')->name('userrole');



//Multi-Image Upload
Route::post('save-image', 'ImageController@save');


