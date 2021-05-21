<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response as R;

class Response
{
    public const JSON_RPC_VERSION = '2.0';

    public function handle($request, Closure $next)
    {
        /** @var R $response */
        $error = null;
        $response = $next($request);
        $original = $response->getOriginalContent();

        return response()->json($original);
    }
}
