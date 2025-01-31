<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="Your API Title",
 *     description="API documentation using Swagger"
 * )
 *
 * // Optional: You can also define a base server URL for your API
 * @OA\Server(
 *     url="http://localhost:8000",
 *     description="Local dev server"
 * )
 */
class OpenApiController
{
    // This class is just a container for OpenAPI annotations.
}
