<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Video;
use App\Models\Tag;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function(){
    $post = Post::create(['name'=>'My third post']);
    $tag = Tag::find(2);
    $post->tags()->save($tag);
    $video = Video::create(['name'=>'Vids.mov']);
    $tag1 = Tag::find(2);
    $video->tags()->save($tag1);
});

Route::get('/read', function(){
    $post = Post::findOrFail(2);

    foreach($post->tags as $tag){
        echo $tag;
    }
});

Route::get('/update', function(){
    $post = Post::findOrFail(2);

    $tag = Tag::findOrFail(1);
    $post->tags()->save($tag);

    // foreach($post->tags as $tag){
    //     $tag->whereName('tag1')->update(['name'=>'PHP']);
    // }
});

Route::get('/delete', function(){
    $post = Post::findOrFail(3);

    foreach($post->tags as $tag){
        $tag->whereId(1)->delete();
    }
});