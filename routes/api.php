<?php

use Illuminate\Http\Request;

Route::get('/test', function() {
    return 'Hello World';
});

Route::apiResource('/courses', 'CourseController');
Route::apiResource('/contacts', 'ContactsController');
Route::apiResource('/news', 'NewsController');
