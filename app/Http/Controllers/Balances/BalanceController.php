<?php

namespace App\Http\Controllers\Balances;

use App\Exceptions\InvalidCurrencyException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Balances\ChangeBalanceRequest;
use App\Services\Action\Balances\ChangeBalanceAction;
use App\Services\DTO\Balances\ChangeBalanceDTO;
use Illuminate\Http\JsonResponse;
use OpenApi\Annotations as OA;

class BalanceController extends Controller
{
    /**
     * @throws InvalidCurrencyException
     */

    /**
     * @OA\Post(
     *     path="/change-balance/{user_id}",
     *     summary="Изменение баланса пользователя",
     *     tags={"Баланс"},
     *     @OA\Parameter(
     *         name="user_id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="amount", type="integer", example=2400),
     *             @OA\Property(property="currency", type="string", example="USD")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Успешный ответ",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Баланс успешно изменён")
     *         )
     *     )
     * )
     */
    public function changeBalance(
        ChangeBalanceRequest $request,
        ChangeBalanceAction $fillBalanceAction
    ): JsonResponse
    {

        $dto = ChangeBalanceDTO::fromRequest($request);
        $data =  $fillBalanceAction->run($dto);

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Баланс успешно изменён'
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Не удалось изменить баланс'
            ]);
        }

    }
}
