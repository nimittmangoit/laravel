<?php

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

// default route for index page

// Route::get('/', function () {


//     return view('welcome');
// });

Route::get('/','ArticleController@welcome_page_articles');

// route for clients page

Route::get('articles','WebController@articles');

// route for about page

Route::get('about','WebController@about');

// route for notes page

Route::get('notes','NoteController@all_notes');

// route for api home

Route::get('api_home','ApiController@api_home');

// route for contact page

Route::get('contact','WebController@contact');

//route for create article page

Route::get('create_article','ArticleController@create_article')->middleware('auth');

//route for view create note page

Route::get('view_create_note_page','NoteController@view_create_note_page')->middleware('auth');

//route for create article form

Route::post('save_article','ArticleController@save_article')->middleware('auth');

//route for viewing article

Route::get('view_article/{article_id}','ArticleController@view_article');

//for update article

Route::get('update_article_view/{article_id}','ArticleController@update_article_view');

Route::put('update_article','ArticleController@update_article');

// route for create note

Route::post('save_note','NoteController@save_note')->middleware('auth');

// route for view update note page

Route::get('update_note_view/{id}','NoteController@update_note_view')->middleware('auth');

// view particular notes from tag

Route::get('view_tag_notes/{tag}','NoteController@view_tag_notes');

// update note

Route::put('update_note','NoteController@update_note')->middleware('auth');

// for delete article

Route::delete('delete_article/{article_id}','ArticleController@delete_article')->middleware('auth');

// for delete note

Route::delete('delete_note/{id}','NoteController@delete_note')->middleware('auth');

// route for get tags

Route::get('view_tags','TagController@view_tags')->middleware('auth');

// save tag route

Route::post('save_tag','TagController@save_tag')->middleware('auth');

// delete tag 

Route::delete('delete_tag/{id}','TagController@delete_tag')->middleware('auth');

// for viewing note

Route::get('view_note/{id}','NoteController@view_note');

//route for home and auth

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// admin group for admin routes

Route::group(['prefix' => 'admin', 'middleware' => ['auth' => 'admin']], function (){

    // for admin home 

    Route::get('/dashboard','AdminController@index');

    // for view all notes from admin

    Route::get('/all_notes','AdminController@all_notes');

    // route for view update note page

    Route::get('/edit_note_view/{id}','AdminController@edit_note_view');

    // route for note approval

    Route::get('/approve_note/{id}','AdminController@approve_note');

    // for delete note

    Route::delete('delete_note/{id}','AdminController@delete_note');

    // view notes for specific tags

    Route::get('view_tag_notes/{tag}','AdminController@view_tag_notes');

    // for view tags

    Route::get('view_tags','AdminController@view_tags');

    // view all users

    Route::get('view_users','AdminController@view_users');

    // delete user

    Route::delete('delete_user/{id}','AdminController@delete_user');

    // view create note page

    Route::get('view_create_note_page','AdminController@view_create_note_page');

    // for viewing note

    Route::get('view_note/{id}','AdminController@view_note');


});
