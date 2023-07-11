<?php

use Illuminate\Support\Facades\Route ;
use App\Http\Controllers\AdminController ;
use App\Http\Controllers\LoginController ;
use App\Http\Controllers\CategoryController ;
use App\Http\Controllers\AgentManagement ;
use App\Http\Controllers\ContentManagement ;
use App\Http\Controllers\UserController ;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

    Route::get('/', function () {
        return view('website.webpage') ;
    });
     
    Route::post('/globalDelete/' , [AdminController::class,'globalDelete']) ;

    Route::resource('agent', UserController::class);
    Route::get('/login' , [UserController::class,'loginview'])->name('agent.login') ;
    Route::get('/details/{id}/{status?}', [UserController::class,'content_details'])->name('visa_details'); 
    Route::get('/agent_logout' , [UserController::class, 'logout']) ; 

    // =================== Admin Routes =====================
    
    Route::get('/login-admin' , [LoginController::class, 'login_adm']) ;
    
    Route::post('/login_admin' ,  [LoginController::class, 'login_admin']) ;
    
    Route::get('/adm_logout' , [LoginController::class, 'logout']) ;
    
    Route::view('/forgot-password', 'admin.forgot-password');
    
    Route::post('/forgot-password-submit' , [LoginController::class,'forgot_password_admin']) ;
    
    Route::get('/reset-password-admin/{token}' , [LoginController::class,'reset_password_confirm']) ;

    // ================ profile ================

    Route::group(['middleware' => ['agent-menu-access']], function () { 


    });


    Route::group(['middleware' => ['check-menu-access']], function () {

    Route::get('/admin_dashboard' , [AdminController::class, 'admin_dashboard']) ;
    
    Route::get('/adm-profile' , [AdminController::class, 'adm_profile']) ;
    
    Route::post('/profile-update' , [AdminController::class, 'profile_update']) ;
     
    // ================ Categories ================

    Route::get('/categories' , [CategoryController::class,'categories']) ;   
        
    Route::post('/category-save' , [CategoryController::class,'save_category']) ;  
        
    Route::post('/category-update' , [CategoryController::class,'update_category']) ;

    // ================ Categories ================

    Route::get('/countries' , [CategoryController::class,'countriesList']) ;   

    Route::post('/country-save' , [CategoryController::class,'save_country']) ;  

    Route::post('/country-update' , [CategoryController::class,'country_update']) ; 

    
    
    Route::get('/sub-category' , [CategoryController::class,'subCategories']) ;

    Route::post('/sub-category-save' , [CategoryController::class,'save_sub_category']) ;

    Route::post('/sub-category-update' , [CategoryController::class,'update_sub_category']) ;
    
    Route::resource('agent-management', AgentManagement::class);
    Route::get('/agent/delete/{id}', [AgentManagement::class,'destroy'])->name('agent.destroy');

    Route::resource('content-management',ContentManagement::class);
    Route::get('/content/delete/{id}', [ContentManagement::class,'destroy'])->name('content.destroy'); 
    Route::get('/content/search', [ContentManagement::class,'search'])->name('content.search'); 
    Route::post('/content/city', [ContentManagement::class,'city'])->name('contentcity'); 
    Route::post('/content/category', [ContentManagement::class,'category'])->name('contentcategory'); 

      
 });