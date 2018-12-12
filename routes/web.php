<?php

Route::get('/', function () {
    return view('welcome');
});
Route::get('login', function () {
    return 1234;
});

// Route::get('trangchu',function(){
//     return $_GET['page'];
// });


// Route::get('type/page/{p}',function($page){
//     return $page;
// });

// Route::get('type/page/{p?}/{id?}',function($page=1,$id){
//     return $page;
// })->name('type')->where('p','[0-9]+');

// Route::get('user/{id}/{username}',function($id, $username){
//     return [
//         'id'=>$id,
//         'username'=>$username
//     ];
// })->name('userinfo')->where([
//     'id' => '[0-9]+',
//     'username'=>'[a-zA-Z]+'
// ]);

// Route::get('test-redirect', function(){
//     // return redirect('type/page/4454');
//     // return redirect()->route('type',12);
//     // return redirect()->route('userinfo',[
//     //     'id'=>14,
//     //     'username'=>'customer'
//     // ]);
//     return redirect()->route('admin.detail');
// });

// Route::match(['get','post','put'],'detail',function(){
//     return 12121;
// });
// // Route::any('detail',function(){
// //     return 12121;
// // });

// // Route::group(['prefix'=>'admin'],function(){
// //     //..../admin
// //     Route::get('/',function(){
// //         return 'welcome to admin page';
// //     }); 

// //     //..../admin/detail
// //     Route::get('/detail',function(){
// //         return 'welcome to detail page';
// //     })->name('detail'); 
// // });

// Route::prefix('admin')->name('admin.')->group(function(){
//     //..../admin
//     Route::get('/',function(){
//         return 'welcome to admin page';
//     })->name('home'); 

//     //..../admin/detail
//     Route::get('/detail',function(){
//         return 'welcome to detail page';
//     })->name('detail'); 
// });


// Route::fallback(function () {
//     return '404 Not Found';
// });


// Route::get('admin/{id}/{username}','AdminController@index')->name('admin.home');
// Route::get('trang-chu','AdminController@getHomePage');
// Route::resource('product', 'HomeController')->names([
//     'create' => 'product.build',
//     'destroy' => 'destroy'
// ])->parameters([
//    'product'=>'id' 
// ]);


// Route::get('login','AdminController@getLogin');
// Route::post('login','AdminController@postLogin');

// Route::get('upload','AdminController@getUploadFile')->name('getuploadfile');
// Route::post('upload-file','AdminController@postUploadFile')->name('uploadfile');

// Route::get('test-session','AdminController@testSession');

// Route::get('set-cookie','AdminController@setCookie');

// Route::get('test-cookie','AdminController@getCookie');

Route::get('home','AdminController@getHome');
Route::get('type','AdminController@getType');