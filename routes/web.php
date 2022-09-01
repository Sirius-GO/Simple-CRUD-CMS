<?php

use Illuminate\Support\Facades\Route;
use App\Models\Posts;
use App\Models\User;
use App\Models\Country;
use App\Models\Photo;


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
//    return view('welcome');
// });



Route::get('/insert', function(){

        $posts = new Posts;
        $posts->user_id = '1';
        $posts->title = 'Second post';
        $posts->content = 'Second Conent';
        $posts->save();
        $posts;

});

Route::get('/user/{id}/post', function($id){
    return User::find($id)->post;
});

Route::get('/user/{id}/posts', function($id){
    return User::find($id)->posts;
});

Route::get('/post/{id}/user', function($id){
    return Posts::find($id)->user;
});

Route::get('/user/{id}/role', function($id){
    $user = User::find($id);

    foreach($user->roles as $role){
        return $role->name;
    }
});


Route::get('/user/pivot', function(){
    $user = User::find(1);

    foreach($user->roles as $role){
        return $role->pivot->created_at;
    }
});

Route::get('/user/country', function(){
    $country = Country::find(1);

    foreach($country->posts as $post){
        return $post->title;
    }
});

//Polymorphic relations
Route::get('user/photos', function(){
    $user = User::find(1);
    foreach($user->photos as $photo){
        echo $photo.'<br>';
        echo $photo->path;
    }
});

Route::get('post/photos', function(){
    $post = Posts::find(1);
    foreach($post->photos as $photo){
        echo $photo.'<br>';
        echo $photo->path;
    }
});

Route::get('photo/{id}/post', function($id){
    $photo = Photo::findOrFail($id);
    echo $photo->imageable_id.'<br>';
    echo $photo->imageable;
});

Route::get('/post/tag', function(){
    $posts = Posts::findOrFail(1);
    foreach($posts->tags as $tag){
        echo $tag->name;
    } 
});


//CRUD ROUTES

//Route::resource('/posts', 'PostsController');

//Route::get('/', '\App\Http\Controllers\PostsController@index'); 
//Route::get('/', [\App\Http\Controllers\PostsController::class, 'index']);
Route::resource('posts', '\App\Http\Controllers\PostsController');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');