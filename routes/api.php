<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\FamiliesController;
use App\Http\Controllers\AttendancesController;
use App\Http\Controllers\SeedsController;
use App\Http\Controllers\TithesController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\VisitorsController;
use App\Http\Controllers\ExpendituresController;
use App\Http\Controllers\OfferingsController;

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

Route::prefix('v1')->group(function () {

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });
    
    Route::prefix('attendances')->group(function () {
        Route::get('/', [AttendancesController::class, 'index']);
    
        Route::get('/{id}', [AttendancesController::class, 'show']);
    
        Route::get('/create', [AttendancesController::class, 'create']);
        
        Route::post('/', [AttendancesController::class, 'store']);
    
        Route::get('/{id}/edit', [AttendancesController::class, 'edit']);
    
        Route::put('/{id}', [AttendancesController::class, 'update']);
    
        Route::delete('/{id}/destroy', [AttendancesController::class, 'destroy']);
    
        Route::get('/{id}/restore', [AttendancesController::class, 'restore']);
    
        Route::get('/{id}/delete', [AttendancesController::class, 'delete']); 
    });
    
    Route::prefix('departments')->group(function () {
        Route::get('/', [DepartmentsController::class, 'index']);
        
        Route::get('/{id}', [DepartmentsController::class, 'show']);
        
        Route::get('/create', [DepartmentsController::class, 'create']);
        
        Route::post('/', [DepartmentsController::class, 'store']);
        
        Route::get('/{id}/edit', [DepartmentsController::class, 'edit']);
        
        Route::put('/{id}', [DepartmentsController::class, 'update']);
        
        Route::delete('/{id}/destroy', [DepartmentsController::class, 'destroy']);
        
        Route::get('/{id}/restore', [DepartmentsController::class, 'restore']);
        
        Route::get('/{id}/delete', [DepartmentsController::class, 'delete']); 
    });
    
    Route::prefix('expenditure')->group(function () {
        Route::get('/', [ExpendituresController::class, 'index']);
    
        Route::get('/{id}', [ExpendituresController::class, 'show']);
        
        Route::get('/create', [ExpendituresController::class, 'create']);
        
        Route::post('/', [ExpendituresController::class, 'store']);
        
        Route::get('/{id}/edit', [ExpendituresController::class, 'edit']);
        
        Route::put('/{id}', [ExpendituresController::class, 'update']);
        
        Route::delete('/{id}/destroy', [ExpendituresController::class, 'destroy']);
        
        Route::get('/{id}/restore', [ExpendituresController::class, 'restore']);
        
        Route::get('/{id}/delete', [ExpendituresController::class, 'delete']); 
    });
    
    Route::prefix('families')->group(function () {
        Route::get('/', [FamiliesController::class, 'index']);
        
        Route::get('/{id}', [FamiliesController::class, 'show']);
        
        Route::get('/create', [FamiliesController::class, 'create']);
        
        Route::post('/', [FamiliesController::class, 'store']);
        
        Route::get('/{id}/edit', [FamiliesController::class, 'edit']);
        
        Route::put('/{id}', [FamiliesController::class, 'update']);
        
        Route::delete('/{id}/destroy', [FamiliesController::class, 'destroy']);
        
        Route::get('/{id}/restore', [FamiliesController::class, 'restore']);
        
        Route::get('/{id}/delete', [FamiliesController::class, 'delete']); 
    });
    
    Route::prefix('offerings')->group(function () {
        Route::get('/', [OfferingsController::class, 'index']);
    
        Route::get('/{id}', [OfferingsController::class, 'show']);
    
        Route::get('/create', [OfferingsController::class, 'create']);
        
        Route::post('/', [OfferingsController::class, 'store']);
    
        Route::get('/{id}/edit', [OfferingsController::class, 'edit']);
    
        Route::put('/{id}', [OfferingsController::class, 'update']);
    
        Route::delete('/{id}/destroy', [OfferingsController::class, 'destroy']);
    
        Route::get('/{id}/restore', [OfferingsController::class, 'restore']);
    
        Route::get('/{id}/delete', [OfferingsController::class, 'delete']); 
    });
    
    Route::prefix('roles')->group(function () {
        Route::get('/', [RolesController::class, 'index']);
        
        Route::get('/{id}', [RolesController::class, 'show']);
        
        Route::get('/create', [RolesController::class, 'create']);
        
        Route::post('/', [RolesController::class, 'store']);
        
        Route::get('/{id}/edit', [RolesController::class, 'edit']);
        
        Route::put('/{id}', [RolesController::class, 'update']);
        
        Route::delete('/{id}/destroy', [RolesController::class, 'destroy']);
    
        Route::get('/{id}/restore', [RolesController::class, 'restore']);
    
        Route::get('/{id}/delete', [RolesController::class, 'delete']); 
    });
    
    Route::prefix('seeds')->group(function () {
        Route::get('/', [SeedsController::class, 'index']);
        
        Route::get('/{id}', [SeedsController::class, 'show']);
    
        Route::get('/create', [SeedsController::class, 'create']);
        
        Route::post('/', [SeedsController::class, 'store']);
        
        Route::get('/{id}/edit', [SeedsController::class, 'edit']);
        
        Route::put('/{id}', [SeedsController::class, 'update']);
        
        Route::delete('/{id}/destroy', [SeedsController::class, 'destroy']);
        
        Route::get('/{id}/restore', [SeedsController::class, 'restore']);
        
        Route::get('/{id}/delete', [SeedsController::class, 'delete']); 
    });
    
    Route::prefix('tithes')->group(function () {
        Route::get('/', [TithesController::class, 'index']);
        
        Route::get('/{id}', [TithesController::class, 'show']);
        
        Route::get('/create', [TithesController::class, 'create']);
        
        Route::post('/', [TithesController::class, 'store']);
        
        Route::get('/{id}/edit', [TithesController::class, 'edit']);
        
        Route::put('/{id}', [TithesController::class, 'update']);
    
        Route::delete('/{id}/destroy', [TithesController::class, 'destroy']);
        
        Route::get('/{id}/restore', [TithesController::class, 'restore']);
        
        Route::get('/{id}/delete', [TithesController::class, 'delete']); 
    });
    
    Route::prefix('users')->group(function () {
        Route::get('/', [UsersController::class, 'index']);
        
        Route::get('/{id}', [UsersController::class, 'show']);
        
        Route::get('/create', [UsersController::class, 'create']);
        
        Route::post('/', [UsersController::class, 'store']);
        
        Route::get('/{id}/edit', [UsersController::class, 'edit']);
    
        Route::put('/{id}', [UsersController::class, 'update']);
        
        Route::delete('/{id}/destroy', [UsersController::class, 'destroy']);
    
        Route::get('/{id}/restore', [UsersController::class, 'restore']);
        
        Route::get('/{id}/delete', [UsersController::class, 'delete']); 
    });
    
    Route::prefix('visitors')->group(function () {
        Route::get('/', [VisitorsController::class, 'index']);
    
        Route::get('/{id}', [VisitorsController::class, 'show']);
    
        Route::get('/create', [VisitorsController::class, 'create']);
        
        Route::post('/', [VisitorsController::class, 'store']);
    
        Route::get('/{id}/edit', [VisitorsController::class, 'edit']);
    
        Route::put('/{id}', [VisitorsController::class, 'update']);
    
        Route::delete('/{id}/destroy', [VisitorsController::class, 'destroy']);
    
        Route::get('/{id}/restore', [VisitorsController::class, 'restore']);
        
        Route::get('/{id}/delete', [VisitorsController::class, 'delete']); 
    });
});
