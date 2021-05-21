<?php

declare(strict_types=1);

namespace App\Http\Resources\ApiV1\User;

use App\Http\Resources\ApiV1\BaseResource;
use App\Models\BalanceHistory;

class BalanceHistoryResource extends BaseResource
{
    public function toArray($request): array
    {
        /** @var BalanceHistory $this */
        return [
            'id'         => $this->id,
            'value'      => $this->value,
            'balance'    => $this->balance,
            'user_id'    => $this->user_id,
            'created_at' => $this->created_at,
        ];
    }
}