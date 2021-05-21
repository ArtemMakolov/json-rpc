<?php

declare(strict_types=1);

use App\Components\JsonRpc\JsonRpcServer;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1', 'namespace' => 'ApiV1'], function () {

    Route::post('/data', function (Request $request, JsonRpcServer $server) {
        return $server->handle($request);
    });
});