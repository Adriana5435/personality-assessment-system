<?php

/*
|--------------------------------------------------------------------------
| Application Web Routes
|--------------------------------------------------------------------------
|
| Define the web routes that power your MBTI-based questionnaire application.
| These routes are loaded by the RouteServiceProvider within the "web" middleware group.
| Let's create a seamless user experience!
|
*/


// Authentication routes
Auth::routes();

// Custom logout route
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Frontend routes
Route::group(['namespace' => 'Front', 'as' => 'front.'], function () {

    // Homepage
    Route::get('/', 'FrontController@index')->name('index');

    // User-related routes
    Route::group(['as' => 'user.', 'prefix' => 'users', 'middleware' => 'auth'], function () {
        Route::get('/dashboard', 'UserController@dashboard')->name('dashboard');
    });

    // Questionnaire routes
    Route::group(['as' => 'questionnaire.', 'prefix' => 'questionnaire/{questionnaire}/{submit}', 'middleware' => 'auth'], function () {
        // Show questionnaire
        Route::get('/', 'QuestionnairesController@show')->name('show');
        // Get questionnaire report
        Route::get('/report', 'QuestionnairesController@report')->name('report');
        // Submit questionnaire
        Route::post('/submit', 'QuestionnairesController@submit')->name('submit');
    });

    // Payment routes
    Route::group(['as' => 'payment.', 'prefix' => 'payment', 'middleware' => 'auth'], function () {
        // Display payment factor
        Route::get('/{questionnaire}', 'PaymentController@factor')->name('factor');
        // Process payment redirect
        Route::post('/{questionnaire}', 'PaymentController@redirect')->name('redirect');
        // Payment callback
        Route::match(['post', 'get'], '/{submit}/callback', 'PaymentController@callback')->name('callback');
    });

});

// Admin routes
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['is_admin']], function () {

    // Admin dashboard
    Route::get('/', 'QuestionnairesController@questonnairePaidList')->name('admin.home');
    // View questionnaire report
    Route::get('/report/{submit}', 'QuestionnairesController@report')->name('admin.report');
    // Manage payments
    Route::get('/payments', 'QuestionnairesController@payment')->name('admin.payment');

    // Resource routes for managing questionnaires
    Route::resource('questionnaire', 'QuestionnairesController');

    // User management routes
    Route::group(['prefix' => 'users', 'as' => 'admin.users.'], function () {
        // Export users data
        Route::get('export', 'UserController@export')->name('export');
    });

    // Questionnaire-related routes
    Route::group(['prefix' => 'questionnaire', 'as' => 'questionnaire.'], function () {

        // Type Indicators Group
        Route::group(['prefix' => '{questionnaire}'], function () {
            // Resource routes for managing type indicators
            Route::resource('typeindicator', 'TypeIndicatorController')->except(['show', 'destroy']);
        });

        // Pairs Group
        Route::group(['prefix' => '{questionnaire}'], function () {
            // Resource routes for managing pairs
            Route::resource('pair', 'PairController')->except(['show', 'destroy']);
        });

        // Questions Group
        Route::group(['prefix' => '{questionnaire}'], function () {
            // Resource routes for managing questions
            Route::resource('question', 'QuestionController')->except(['show', 'destroy']);
        });

        // Personality Types Group
        Route::group(['prefix' => '{questionnaire}'], function () {
            // Resource routes for managing personality types
            Route::resource('persontype', 'PersonTypeController')->except(['show', 'destroy']);
        });
    });
});
