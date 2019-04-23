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


Route::get('/', function () {
    return view('welcome');
});
Route::get('/posts/{post_id}/comments/{comment_id}/edit','PostsController@edit_comment');
Route::put('/posts/{post_id}/comments/{comment_id}','PostsController@update_comment');

Route::resource('/posts','PostsController'); //สร้าง route get post up de กับ 7 เมธอด









Route::get('/about','AboutController@index');
// Route::get('/about', function () {
//     return view('about', [
//         'name' => 'Fern',
//         'address' => 'KU' ]       
//     );
// })->where('id', '[0-9]+'); // RE



// Route::get('/news/{id}', function ($id) {
//     $news = [
//         [
//             'id' => 1,
//             'title' => 'Thailand Election 2019'

//         ],
//         [
//             'id' => 2,
//             'title' => 'Hot  climate in Thailand'
//         ]

    

//         ];
//     return view('news.show',['news' => $news[$id-1]]);
// })->where('id', '[0-9]+'); // RE

Route::get('/news','NewsController@index'); //index = function in controller
Route::get('/news/{id}','NewsController@show')->where('id','[0-9]+'); // RE; //index = function in controller
//Route::get('/about/{id}','AboutController@index')->where('id', '[0-9]+'); // RE; //index = function in controller



// Route::get('/news', function () {
    
//         $news = [
//             [
//                 'id' => 1,
//                 'title' => 'Thailand Election 2019'

//             ],
//             [
//                 'id' => 2,
//                 'title' => 'Hot  climate in Thailand'
//             ]

        

//             ];
//     //return view('news.all-news',['news' => $news]);       same
//     //return view('news.all-news')->with('news' , $news);
//     return view('news.all-news',compact('news')); //ทำให้ตัวแปรเป็น array
//     //compact('news') return ['news' => $news]
// });

Route::get('/news/{id}/comments/{c_id?}', function ($id,$c_id = null) {
    $data = [
        'news' => [ 
            'id' => $id,
            'title' => 'Thailand Election 2019',
            'comments' => [
                'id' => []
            ]
        ]
    ];
    if(!is_null($c_id)){
        $data['news']['comments'] = ['id' => $c_id];
    }
    return $data;
});


Route::get('/master',function(){

    return view('layouts.master');

});

// Authentacation  php artisan make:auth
// Auth::routes();
Auth::routes(['register' => false]); //get out!! register

Route::get('/home', 'HomeController@index')->name('home');
