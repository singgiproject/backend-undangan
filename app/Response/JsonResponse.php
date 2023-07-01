<?php

namespace App\Response;

use Stringable;

class JsonResponse implements Stringable
{
    private $response;

    public function __toString(): string
    {
        return $this->response;
    }

    public function success(array|object $data, int $code): JsonResponse
    {
        $this->response = json([
            'code' => $code,
            'data' => $data,
            'error' => []
        ], $code);

        return $this;
    }

    public function error(array|object $error, int $code): JsonResponse
    {
        $this->response = json([
            'code' => $code,
            'data' => [],
            'error' => $error
        ], $code);

        return $this;
    }
}
