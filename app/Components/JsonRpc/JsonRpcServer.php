<?php
declare(strict_types=1);

namespace App\Components\JsonRpc;

use ErrorException;
use Illuminate\Container\Container;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class JsonRpcServer
{
    public function handle(Request $request)
    {
        try {
            $config = Config::get('rpc');

            $content = json_decode($request->getContent(), true);

            if (empty($content)) {
                throw new ErrorException('Parse error', 403);
            }

            list($name, $method) = explode('.', $content['method']);

            $controllerName = $config['namespaceV1'] . Str::studly($name . $config['controllerSuffix']);

            if (!class_exists($controllerName)) {
                return JsonRpcResponse::error('Controller not found');
            }

            $controller = Container::getInstance()->make($controllerName);

            if (!method_exists($controller, $method)) {
                return JsonRpcResponse::error('Method not found');
            }

            return JsonRpcResponse::result($controller->$method($content['params']), $content['id']);

        } catch (\Throwable $e) {

            return JsonRpcResponse::error($e->getMessage());
        }
    }
}
