<?php

Route::group(['middleware' => 'auth:api'], function () {

    Route::apiResource('template', 'Zhengwhizz\CustomizedForm\Http\Controllers\CustomizedFormTemplateController');
    Route::apiResource('form', 'Zhengwhizz\CustomizedForm\Http\Controllers\CustomizedFormController');

});
