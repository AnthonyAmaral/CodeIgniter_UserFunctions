<?php
Route::get('/', array(
    'as' => 'home',
    'uses' => 'HomeController@home'    
));

Route::get('/user/{username}', array(
    'as' => 'profile-user',
    'uses' => 'ProfileController@user'
));

//Authenticated group
Route::group(array('before' => 'auth'), function(){
    //csrf protection group
    Route::group(array('before' => 'csrf'), function() {
        //change password (POST)
        Route::post('/account/change-password', array(
           'as' => 'account-change-password-post',
           'uses' => 'AccountController@postChangePassword'
        ));
    });  
    
    //Sign Out (GET)
    Route::get('/account/logout', array(
        'as' => 'account-logout',
        'uses' => 'AccountController@getLogout'
    ));
    //change password (GET)
    Route::get('/account/change-password', array(
       'as' => 'account-change-password',
        'uses' => 'AccountController@getChangePassword'
    ));
});

//unauthenticated group
Route::group(array('before' => 'guest'), function(){
    
    //csrf protection group
    Route::group(array('before' => 'csrf'), function(){        
        //create account (POST)
        Route::post('/account/create', array(
        'as' => 'account-create-post',
        'uses' => 'AccountController@postCreate'   
        ));
        
        //sign in (POST)
        Route::post('/account/login', array(
           'as' => 'account-login-post',
           'uses' => 'AccountController@postLogin'    
        ));
        
        //forgot password(POST)
        Route::post('/account/forgot-password', array(
        'as' => 'account-forgot-password-post',
        'uses' => 'AccountController@postForgotPassword'
        ));
    });
    
    //forgot password (GET)
    Route::get('/account/forgot-password', array(
        'as' => 'account-forgot-password',
        'uses' => 'AccountController@getForgotPassword'
    ));
    
    //recover
    Route::get('/account/recover/{code}',array(
        'as' => 'account-recover',
        'uses' => 'AccountController@getRecover'
    ));
    
    //sign in (GET)
    Route::get('/account/login', array(
       'as' => 'account-login',
       'uses' => 'AccountController@getLogin'
    ));
    
    //create account (GET)
    Route::get('/account/create', array(
        'as' => 'account-create',
        'uses' => 'AccountController@getCreate'   
    ));
    
    Route::get('/account/activate/{code}',array(
       'as' => 'account-activate',
        'uses' => 'AccountController@getActivate'
    ));
});