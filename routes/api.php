<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectController;   //questo controller ha lo stesso  nome di un'altro ma non va in conflitto perche è di Api e non di admin
use App\Http\Controllers\Api\TechnologyController;
use App\Http\Controllers\Api\LeadController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/projects',[ProjectController::class, 'index']);
Route::get('/technologies',[TechnologyController::class, 'index']);
// ProjectController lo scelgo in base alla pag in cui ho fatto la funzione  e getProjectBySlug è nme funzione
Route::get('/project-by-slug/{slug}',[ProjectController::class, 'getProjectBySlug']);
Route::post('/send-email',[LeadController::class, 'store']);
