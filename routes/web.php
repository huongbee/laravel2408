<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('trangchu',function(){
    return $_GET['page'];
});


Route::get('type/page/{p}',function($page){
    return $page;
});

Route::get('type/page/{p?}',function($page=1){
    return $page;
});