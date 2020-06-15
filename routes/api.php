<?php

Route::group(['middleware' => 'auth:api'], function () {

    Route::apiResource('customized_form_template', 'Zhengwhizz\CustomizedForm\Controllers\CustomizedFormTemplateController');
    Route::apiResource('customized_form', 'Zhengwhizz\CustomizedForm\Controllers\CustomizedFormController');

});
