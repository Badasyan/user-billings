<?php
namespace App\Http\Controllers\Logs;

use App\Http\Controllers\Controller;
use App\Http\Requests\Logs\ShowLogRequest;
use App\Http\Requests\Users\ShowRequest;
use App\Models\Logs\Log;
use Illuminate\Http\JsonResponse;
use OpenApi\Annotations as OA;

class IndexLogController extends Controller
{
    /**
     * @OA\Get(
     *     path="/log/{user_id}",
     *     summary="Получение логов пользователя",
     *     tags={"Логи"},
     *     @OA\Parameter(
     *         name="user_id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Успешный ответ",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="user_id", type="integer", example=24),
     *                 @OA\Property(property="currency", type="string", example="USD"),
     *                 @OA\Property(property="amount", type="string", example="12000"),
     *                 @OA\Property(property="status", type="string", example="increase")
     *             )
     *         )
     *     )
     * )
     */
    public function showLogs(ShowLogRequest $request): JsonResponse
    {
        $user_id = $request->show();
        $data = Log::query()->where('user_id', $user_id)->get();

        return response()->json($data);
    }
}
