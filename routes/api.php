<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Resources\PostCollection;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Broadcast::routes(['middleware' => ['auth:sanctum']]);

Route::any("uadd", [UserController::class, 'create']);
Route::post("login", [UserController::class, 'index']);

Route::apiResource("p", 'App\Http\Controllers\ProductController');


Route::get('/post', function () {
    return new PostCollection(Post::paginate());
});

Route::get('/comment', function () {
//    $cc = Comment::findOrFail(1);
//    $item = $cc->commentable;

    $post = Post::with('comments')->findOrFail(1);
    $comments = $post->comments;

    return $comments;

});

Route::group([
    'prefix' => 'v1',
    'middleware' => ['auth:sanctum']
], function (Router $router) {

    $router->get('/user', function (Request $request) {

//        Auth::guard('api')->user(); // 登录用户实例
//        Auth::guard('api')->check(); // 用户是否登录
//        Auth::guard('api')->id(); // 登录用户ID

        return $request->user();
    });

    $router->get('/logout', function (Request $request) {
        $user = $request->user();
        if ($user->tokens()->delete() == 1) {
            return "Bye";
        } else {
            return "Hello";
        }

    });

    $router->get('p', [ProductController::class, 'index']);

});
