<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Api\ConversationController;
use App\Http\Resource\ConversationResource;
use App\Http\Api\MessageController;
use App\Http\Resource\MessageResource;
use App\Http\Api\ParticipantController;
use App\Http\Resource\ParticipantResource;
use App\Http\Api\UserController;
use App\Http\Resource\UserResource;
use App\Http\Api\Auth\LoginController;
use App\Http\Api\Auth\LogoutController;
use App\Http\Api\Auth\RegisterController;



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
Route::get('conversations/{conversation_id}/messages', [ConversationController::class, 'getMessages']);
Route::get('/conversations/{conversation_id}/participants', [ConversationController::class, 'getParticipants']);
Route::apiResource('conversations', ConversationController::class);
Route::apiResource('messages', MessageController::class);
Route::apiResource('participants', ParticipantController::class);
Route::get('/users/{user_id}/conversations', [ConversationController::class, 'userConversations']);
Route::apiResource('users', UserController::class);

Route::prefix('auth')->group(function () {
    Route::post('/login', LoginController::class);
    Route::post('/logout', LogoutController::class)->middleware('auth:sanctum');
    Route::post('/register', RegisterController::class);
});
