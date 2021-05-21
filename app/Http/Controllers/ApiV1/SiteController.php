<?php

declare(strict_types=1);

namespace App\Http\Controllers\ApiV1;

use App\Components\JsonRpc\JsonRpcClient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __construct
    (
        public JsonRpcClient $jsonRpcClient,
    )
    {
    }

    public function getBalance(Request $request, string $id)
    {
        $data = $this->jsonRpcClient->send('balance.userBalance', [
            'user_id' => $id,
        ]);

        return view('userBalance', ['history' => $data['result']]);
    }

    public function getHistories(Request $request)
    {
        $data = $this->jsonRpcClient->send('balance.histories', [
            'limit' => 50,
        ]);

        return view('userHistories', ['histories' => $data['result']]);
    }
}
