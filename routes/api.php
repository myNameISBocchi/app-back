<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\citieController;
use App\Http\Controllers\CommitteeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComunityController;
use App\Http\Controllers\CouncilController;
use App\Http\Controllers\countryController;
use App\Http\Controllers\personController;
use App\Http\Controllers\privilegesController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\rolePrivilegeController;
use App\Http\Controllers\stateController;


Route::post('/loggin', [AuthController::class, 'loggin']);


Route::middleware('auth')->group(function () {

   
    Route::get('/comunities', [ComunityController::class, 'findAll']);
    Route::get('/councils', [CouncilController::class, 'findAll']);
    Route::get('/committees', [CommitteeController::class, 'findAll']); 
    Route::get('/roles', [roleController::class, 'findAll']);
    Route::get('/privileges', [privilegesController::class, 'findAll']);
    Route::get('/cities', [citieController::class, 'findAll']);
    Route::get('/countries', [countryController::class, 'findAll']);
    Route::get('/states', [stateController::class, 'findAll']);
    
  
    Route::post('/peoples', [personController::class, 'store']);
    Route::get('/peoples/search', [personController::class, 'searchPerson']);
    Route::get('/peoples/{id}', [personController::class, 'findById']);
    Route::put('/peoples/{id}', [personController::class, 'update']);
    Route::post('/peoples/{id}/photo', [personController::class, 'uploadPhoto']);
    Route::get('rolesPrivileges/{roleId}', [rolePrivilegeController::class, 'findPrivilegeByRoleId']);


    Route::middleware('auth:ADMINISTRADOR,LIDER DE COMUNA')->group(function () {
        // Gestión de Comunidades
        Route::post('/comunities', [ComunityController::class, 'store']);
        Route::put('/comunities/{id}', [ComunityController::class, 'update']);
        Route::delete('/comunities/{id}', [ComunityController::class, 'delete']);
        Route::post('/comunities/{id}/photo', [ComunityController::class, 'uploadPhoto']);

        
        Route::post('/councils', [CouncilController::class, 'store']);
        Route::put('/councils/{id}', [CouncilController::class, 'update']);
        Route::delete('/councils/{id}', [CouncilController::class, 'delete']);

      
        Route::post('/committees', [CommitteeController::class, 'store']); 
    });

    
    Route::middleware('auth:ADMINISTRADOR')->group(function () {
        Route::post('/roles', [roleController::class, 'store']);
        Route::put('/roles/{id}', [roleController::class, 'update']);
        Route::delete('roles/{id}', [roleController::class, 'delete']);
        
        Route::post('/privileges', [privilegesController::class, 'store']);
        Route::put('privileges/{id}', [privilegesController::class, 'update']);
        Route::delete('privileges/{id}', [privilegesController::class, 'delete']);
        
        Route::post('/rolesPrivileges', [rolePrivilegeController::class, 'store']);
        
        Route::get('/peoples', [personController::class, 'findAll']);
        Route::delete('/peoples/{id}', [personController::class, 'delete']);

        // Ubicaciones Geográficas
        Route::post('/countries', [countryController::class, 'store']);
        Route::put('countries/{id}', [countryController::class, 'update']);
        Route::delete('/countries/{id}', [countryController::class, 'delete']);
        Route::post('/states', [stateController::class, 'store']);
        Route::put('/states/{id}', [stateController::class, 'update']);
        Route::delete('/states/{id}', [stateController::class, 'delete']);
        Route::post('/cities', [citieController::class, 'store']);
        Route::put('/cities/{id}', [citieController::class, 'update']);
        Route::delete('/cities/{id}', [citieController::class, 'delete']);
    });
});