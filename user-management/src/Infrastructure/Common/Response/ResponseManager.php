<?php

namespace Infrastructure\Common\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

final class ResponseManager implements ResponseManagerInterface {
    
	/**
	 *
	 * @param \JsonSerializable|array $data
	 *
	 * @return \Symfony\Component\HttpFoundation\JsonResponse
	 */
	function success(\JsonSerializable|array|string $data,int $status = 200): \Symfony\Component\HttpFoundation\JsonResponse {
        return new JsonResponse($data, $status);
	}
	
	/**
	 *
	 * @param \JsonSerializable|array $data
	 *
	 * @return \Symfony\Component\HttpFoundation\JsonResponse
	 */
	function error(\JsonSerializable|array|string $data,int $status = 500): \Symfony\Component\HttpFoundation\JsonResponse {
        return new JsonResponse($data, $status);
    }
}