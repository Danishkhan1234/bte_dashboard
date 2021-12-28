<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\WorkLevelController;
use App\Http\Controllers\ContractTypeController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;

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
    Route::get('/clear', function() {

    Artisan::call('cache:clear');

    Artisan::call('config:clear');

    Artisan::call('config:cache');

    Artisan::call('view:clear');
 
    return "Cleared!";
 
 });


            Route::get('/', function () {
                return view('welcome');
            });



                Route::get('/login', [AdminController::class, 'login_page'])->name('login');
                Route::post('/login', [AdminController::class, 'login'])->name('admin.login');

                Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
               
                Route::group(['middleware'=>'admin_auth'],function(){

                //Dashboard                    
                Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

                //User
                Route::get('/user', [UserController::class, 'index'])->name('admin.user');
               
               Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
               Route::get('/user/show/{id}', [UserController::class, 'show'])->name('admin.user.show');
               Route::put('/user/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
                
                

               

              


                Route::get('/tickets', [TicketController::class, 'index'])->name('admin.ticket');
   
                //City
                Route::get('/city', [CityController::class, 'index'])->name('admin.city');
                Route::get('/city/create', [CityController::class, 'create'])->name('admin.city.create');
                Route::get('/city/{id}', [CityController::class, 'edit'])->name('admin.city.edit');
                Route::put('/city/update/{id}', [CityController::class, 'update'])->name('admin.city.update');
                Route::post('/city/submit', [CityController::class, 'store'])->name('admin.city.store');
                Route::delete('/city/{id}', [CityController::class, 'delete'])->name('admin.city.delete');

               //Country
                Route::get('/country',[CountryController::class, 'index'])->name('admin.country');
                Route::get('/country/create',[CountryController::class, 'create'])->name('admin.country.create');
                Route::get('/country/{id}',[CountryController::class, 'edit'])->name('admin.country.edit');
                Route::put('/country/update/{id}',[CountryController::class, 'update'])->name('admin.country.update');
                Route::post('/country/submit', [CountryController::class, 'store'])->name('admin.country.store');
                Route::delete('/country/{id}', [CountryController::class, 'delete'])->name('admin.country.delete');


                //Skill
                Route::get('/skill',[SkillController::class, 'index'])->name('admin.skill');
                Route::get('/skill/create',[SkillController::class, 'create'])->name('admin.skill.create');
                Route::get('/skill/{id}',[SkillController::class, 'edit'])->name('admin.skill.edit');
                Route::put('/skill/update/{id}',[SkillController::class, 'update'])->name('admin.skill.update');
                Route::post('/skill/submit', [SkillController::class, 'store'])->name('admin.skill.store');
                Route::delete('/skill/{id}', [SkillController::class, 'delete'])->name('admin.skill.delete');

                //Service
                Route::get('/service',[ServiceController::class, 'index'])->name('admin.service');
                Route::get('/service/create',[ServiceController::class, 'create'])->name('admin.service.create');
                Route::get('/service/{id}',[ServiceController::class, 'edit'])->name('admin.service.edit');
                Route::put('/service/update/{id}',[ServiceController::class, 'update'])->name('admin.service.update');
                Route::post('/service/submit', [ServiceController::class, 'store'])->name('admin.service.store');
                Route::delete('/service/{id}', [ServiceController::class, 'delete'])->name('admin.service.delete');


                //Work Level
                Route::get('/work-level',[WorkLevelController::class, 'index'])->name('admin.work_level');
                Route::get('/work-level/create',[WorkLevelController::class, 'create'])->name('admin.work_level.create');
                Route::get('/work-level/{id}',[WorkLevelController::class, 'edit'])->name('admin.work_level.edit');
                Route::put('/work-level/update/{id}',[WorkLevelController::class, 'update'])->name('admin.work_level.update');
                Route::post('/work-level/submit', [WorkLevelController::class, 'store'])->name('admin.work_level.store');
                Route::delete('/work-level/{id}', [WorkLevelController::class, 'delete'])->name('admin.work_level.delete');


                //Cntract Type
                Route::get('/contract-type',[ContractTypeController::class, 'index'])->name('admin.contract_type');
                Route::get('/contract-type/create',[ContractTypeController::class, 'create'])->name('admin.contract_type.create');
                Route::get('/contract-type/{id}',[ContractTypeController::class, 'edit'])->name('admin.contract_type.edit');
                Route::put('/contract-type/update/{id}',[ContractTypeController::class, 'update'])->name('admin.contract_type.update');
                Route::post('/contract-type/submit', [ContractTypeController::class, 'store'])->name('admin.contract_type.store');
                Route::delete('/contract-type/{id}', [ContractTypeController::class, 'delete'])->name('admin.contract_type.delete');
        
                //Payment Type
                    Route::get('/payment-type',[PaymentTypeController::class, 'index'])->name('admin.payment_type');
                    Route::get('/payment-type/create',[PaymentTypeController::class, 'create'])->name('admin.payment_type.create');
                    Route::get('/payment-type/{id}',[PaymentTypeController::class, 'edit'])->name('admin.payment_type.edit');
                    Route::put('/payment-type/update/{id}',[PaymentTypeController::class, 'update'])->name('admin.payment_type.update');
                    Route::post('/payment-type/submit', [PaymentTypeController::class, 'store'])->name('admin.payment_type.store');
                    Route::delete('/payment-type/{id}', [PaymentTypeController::class, 'delete'])->name('admin.payment_type.delete');
            });