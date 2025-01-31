<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\RegisterRequest;
use App\Http\Requests\Users\ShowRequest;
use App\Http\Resources\Users\UserResource;
use App\Jobs\GetCurrenciesJob;
use App\Models\Users\User;
use App\Services\Action\Users\CreateUserAction;
use App\Services\DTO\Users\CreateUserDTO;
use Illuminate\Http\JsonResponse;
use OpenApi\Annotations as OA;

class CreateUserController extends Controller
{
    /**
     * @OA\Post(
     *     path="/users",
     *     summary="Создание нового пользователя",
     *     tags={"Пользователи"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "age", "phone", "email"},
     *             @OA\Property(property="name", type="string", example="Arman"),
     *             @OA\Property(property="age", type="integer", example=20),
     *             @OA\Property(property="phone", type="string", example="97255"),
     *             @OA\Property(property="email", type="string", example="an225555551@gmail.com")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Успешный ответ",
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string", example="Arman"),
     *             @OA\Property(property="age", type="integer", example=20),
     *             @OA\Property(property="phone", type="string", example="97255"),
     *             @OA\Property(property="email", type="string", example="an225555551@gmail.com"),
     *             @OA\Property(property="token", type="string", example="eyJ0eXAiOiJKV1...")
     *         )
     *     )
     * )
     */
    public function createUser(
        RegisterRequest $request,
        CreateUserAction $action
    ): UserResource {
        $dto = CreateUserDto::fromRequest($request);
        return $action->run($dto);
    }
    /**
     * @OA\Get(
     *     path="/",
     *     summary="Получение списка пользователей",
     *     tags={"Пользователи"},
     *     @OA\Response(
     *         response=200,
     *         description="Успешный ответ",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="name", type="string", example="Arman"),
     *                 @OA\Property(property="age", type="integer", example=20),
     *                 @OA\Property(property="phone", type="string", example="97255"),
     *                 @OA\Property(property="email", type="string", example="arman@gmail.com")
     *             )
     *         )
     *     )
     * )
     */
    public function index(): JsonResponse
    {
     $result = User::query()->with('balance')->get();
     return response()->json($result);
    }
    /**
     * @OA\Get(
     *     path="/{id}",
     *     summary="Получение информации о пользователе по ID",
     *     tags={"Пользователи"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Успешный ответ",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer", example=23),
     *             @OA\Property(property="name", type="string", example="Arman"),
     *             @OA\Property(property="age", type="integer", example=20),
     *             @OA\Property(property="phone", type="string", example="97255"),
     *             @OA\Property(property="balance", type="object", example={"id": 2, "amount": 2400, "currency_value": "USD"})
     *         )
     *     )
     * )
     */
    public function show(ShowRequest $request): JsonResponse
    {
        $user_id = $request->show();
        $result = User::query()->where('id', $user_id)->with('balance')->get();

       return response()->json($result);
    }
}
