<?php

declare(strict_types=1);

namespace App\Components\JsonRpc;

use Illuminate\Contracts\Support\{Arrayable, Jsonable};

class JsonRpcResponse implements Jsonable, Arrayable
{
    /**
     * JsonRpcResponse constructor.
     * @param string $jsonrpc
     * @param int|null $id
     * @param null $error
     * @param null $result
     */
    public function __construct
    (
        public string $jsonrpc = '2.0',
        public ?int $id = null,
        public $error = null,
        public $result = null,
    ){}

    public static function result($result, int $id = null): self
    {
        $instance = new self();
        $instance->result = $result;
        $instance->id = $id;

        return $instance;
    }

    public static function error($error, string $id = null): self
    {
        $instance = new self();
        $instance->error = $error;
        $instance->id = $id;

        return $instance;
    }

    /**
     * @inheritDoc
     * @throws \JsonException
     */
    public function toJson($options = 0): bool|string
    {
        return json_encode($this->toArray(), JSON_THROW_ON_ERROR | $options | JSON_UNESCAPED_UNICODE);
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        $result = [];
        $result['jsonrpc'] = $this->jsonrpc;
        if ($this->id !== null) {
            $result['id'] = $this->id;
        }

        if ($this->error !== null) {
            $result['error'] = $this->valueToArray($this->error);
        } else {
            $result['result'] = $this->valueToArray($this->result);
        }

        return $result;
    }

    private function valueToArray($value)
    {
        if ($value instanceof Arrayable) {
            return $value->toArray();
        }

        if ($value instanceof \JsonSerializable) {
            return $value->jsonSerialize();
        }

        return $value;
    }
}