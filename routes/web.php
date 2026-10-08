<?php

use App\Http\Controllers\CampaignController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('campaigns.index');
});

Route::resource('campaigns', CampaignController::class);
