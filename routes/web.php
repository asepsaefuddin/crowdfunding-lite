<?php

// use App\Http\Controllers\CampaignController;
// use App\Http\Controllers\DonationController;
use App\Http\Controllers\DonationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CampaignController as AdminCampaign;
use App\Http\Controllers\Front\CampaignController as FrontCampaign;

Route::get('/', function () {
    return view('welcome');
});

// USER
Route::get('/campaigns', [FrontCampaign::class, 'index']);
Route::post('/campaigns/{id}/donate', [DonationController::class, 'donate'])->name('campaigns.donate');

// ADMIN
Route::get('/admin/campaigns', [AdminCampaign::class, 'index']);
Route::get('/admin/campaigns/create', [AdminCampaign::class, 'create']);
Route::post('/admin/campaigns', [AdminCampaign::class, 'store']);
Route::get('/admin/campaigns/{id}/edit', [AdminCampaign::class, 'edit']);
Route::post('/admin/campaigns/{id}/update', [AdminCampaign::class, 'update']);
Route::post('/admin/campaigns/{id}/delete', [AdminCampaign::class, 'destroy']);
Route::get('/admin/campaigns/{id}/edit', [AdminCampaign::class, 'edit']);
Route::post('/admin/campaigns/{id}/update', [AdminCampaign::class, 'update']);
