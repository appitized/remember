<?php

Route::post('api/password/forgot', 'Appitized\Remember\Controllers\ForgotPasswordController@sendResetLinkEmail');
