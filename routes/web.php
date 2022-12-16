<?php

use App\Http\Controllers\HubSpotController;
use App\Http\Controllers\ServiceBridgeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Log::channel('sb-client')->info('Something happened!');
    Artisan::call('sb:sync');
    // Artisan::call('hs:sync');
});

Route::get('/sb', function () {
    $sb = new ServiceBridgeController('dW9vb3B1cnh1c2x1b29vb3J3dHFx0', 'gFYRFF8DS^Rh4a*VQdffUU2WiV7V@AkD');
    $sb->login();
    dump($sb->get_estimates_by_customer(6000702031));
    // dump($sb->get_customer(6004286685));
});

Route::get('/hs', function () {
    $hs = new HubSpotController(env('HUBSPOT_API_KEY'));
    dd($hs->search_deal(2487, 6000702031));
});
