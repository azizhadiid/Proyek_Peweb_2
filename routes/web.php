<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.templates.mainAdminlayout');
});

Route::get('/login', function () {
    return view('admin.templates.loginAdminlayout');
});

Route::get('/register', function () {
    return view('admin.templates.regisAdminlayout');
});