<?php

namespace Infrastructure\Common\Response;

use JsonSerializable;
use Symfony\Component\HttpFoundation\JsonResponse;

interface ResponseManagerInterface {
    public function success(JsonSerializable|array|string $data): JsonResponse;
    public function error(JsonSerializable|array|string $data): JsonResponse;
}