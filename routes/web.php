<?php

Route::get('/', function () {
    return redirect()->route('site-applications.create');
});

Route::resource('site-applications', 'SiteApplicationsController', ['only' => ['create', 'store']]);
