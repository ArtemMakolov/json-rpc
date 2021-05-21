<?php

declare(strict_types=1);

namespace App\Http\Resources\ApiV1;

use Illuminate\Http\Resources\Json\JsonResource;

class BaseResource extends JsonResource
{

    public function toResponse($request)
    {
        return $this->resolve($request);
    }
}
