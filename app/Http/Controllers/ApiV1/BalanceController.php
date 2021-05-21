<?php

declare(strict_types=1);

namespace App\Http\Controllers\ApiV1;

use App\Components\JsonRpc\JsonRpcClient;
use App\Http\Controllers\Controller;
use App\Http\Resources\ApiV1\User\BalanceHistoryResource;
use App\Models\BalanceHistory;

class BalanceController extends Controller
{
    public function __construct
    (
        public JsonRpcClient $jsonRpcClient,
    )
    {
    }

    public function userBalance(array $params)
    {
        return BalanceHistory::whereUserId($params['user_id'])
            ->orderByDesc('id')
            ->first();
    }

    public function histories(array $params)
    {
        $balanceHistory = BalanceHistory::query()->limit($params['limit'])->get();

        return BalanceHistoryResource::collection($balanceHistory);
    }
}
