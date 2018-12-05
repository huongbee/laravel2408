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

Route::get('type/page/{p?}/{id?}',function($page=1,$id){
    return $page;
})->name('type')->where('p','[0-9]+');

Route::get('user/{id}/{username}',function($id, $username){
    return [
        'id'=>$id,
        'username'=>$username
    ];
})->name('userinfo')->where([
    'id' => '[0-9]+',
    'username'=>'[a-zA-Z]+'
]);

Route::get('test-redirect', function(){
    // return redirect('type/page/4454');
    // return redirect()->route('type',12);
    return redirect()->route('userinfo',[
        'id'=>14,
        'username'=>'customer'
    ]);

});

// Route::match(['get','post','put'],'detail',function(){
//     return 12121;
// });

Route::any('detail',function(){
    return 12121;
});
