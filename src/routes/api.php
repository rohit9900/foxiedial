<?php


// Route::get('foxiedial', function(){

//     return 'Foxiedial123';
// });

Route::group(['namespace' => 'Xoyal\Foxiedial\Http\Controllers'], function(){

    //API to create foxieapi
    Route::resource('api/foxie',  'FoxieController');

});
