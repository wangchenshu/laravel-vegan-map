<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\UserResource;
use App\Models\User;

class UserController extends Controller
{
    /**
     *
     * @SWG\Get(path="/api/v1/users",
     *   tags={"用戶"},
     *   summary="取得用戶列表",
     *   description="請求時需要附上JWT驗證",
     *   operationId="index",
     *   produces={"application/json"},
     *   @SWG\Parameter(
     *         name="Authorization",
     *         in="header",
     *         description="Bearer+空格+token",
     *         required=true,
     *         type="string",
     *     ),
     *   @SWG\Response(
     *     response="200",
     *     description="請求成功",
     *     @SWG\Schema(
     *              type="object",
     *              @SWG\Property(property="code", type="number", example=200, description="狀態碼"),
     *              @SWG\Property(property="status", type="string", example="success", description="狀態"),
     *              @SWG\Property(property="data", type="array",
     *                  @SWG\Items(type="object",
     *                      @SWG\Property(property="id", type="number", example=1, description="用戶 ID"),
     *                      @SWG\Property(property="name", type="string", example="test", description="用戶名稱"),
     *                      @SWG\Property(property="status", type="string", example="NORMAL", description="用戶狀態"),
     *                      @SWG\Property(property="real_name", type="string", example="王大明", description="用戶真實姓名"),
     *                      @SWG\Property(property="roles", type="string", example="ROLE_MANAGEMENT", description="用戶角色"),
     *                      @SWG\Property(property="created_at", type="string", example="2020-02-18 02:06:02", description="用戶資料建立時間"),
     *                      @SWG\Property(property="updated_at", type="string", example="2020-02-18 02:06:02", description="用戶資料更新時間"),
     *                   )
     *               ),
     *     )
     *   ),
     *   @SWG\Response(response="400", description="請求格式錯誤"),
     *   @SWG\Response(response="404", description="資源不存在 (Not Found)"),
     *   @SWG\Response(response="401", description="拒絕存取 (Unauthenticated)")
     * )
     */
    public function index()
    {
        $users = User::all();
        return $this->success(UserResource::collection($users));
    }

    /**
     *
     * @SWG\Get(path="/api/v1/users/{id}",
     *   tags={"用戶"},
     *   summary="取得用戶資料",
     *   description="請求時需要附上JWT驗證",
     *   operationId="show",
     *   produces={"application/json"},
     *   @SWG\Parameter(
     *         name="id",
     *         in="path",
     *         description="用戶 ID",
     *         required=true,
     *         type="number",
     *     ),
     *   @SWG\Parameter(
     *         name="Authorization",
     *         in="header",
     *         description="Bearer+空格+token",
     *         required=true,
     *         type="string",
     *     ),
     *   @SWG\Response(
     *     response="200",
     *     description="請求成功",
     *     @SWG\Schema(
     *              type="object",
     *              @SWG\Property(property="code", type="number", example=200, description="狀態碼"),
     *              @SWG\Property(property="status", type="string", example="success", description="狀態"),
     *              @SWG\Property(property="data", type="object",
     *                  @SWG\Property(property="id", type="number", example=1, description="用戶 ID"),
     *                  @SWG\Property(property="name", type="string", example="test", description="用戶名稱"),
     *                  @SWG\Property(property="status", type="string", example="NORMAL", description="用戶狀態"),
     *                  @SWG\Property(property="real_name", type="string", example="王大明", description="用戶真實姓名"),
     *                  @SWG\Property(property="roles", type="string", example="['ROLE_MANAGEMENT']", description="用戶角色"),
     *                  @SWG\Property(property="created_at", type="string", example="2020-02-18 02:06:02", description="用戶資料建立時間"),
     *                  @SWG\Property(property="updated_at", type="string", example="2020-02-18 02:06:02", description="用戶資料更新時間"),
     *               ),
     *     )
     *   ),
     *   @SWG\Response(response="400", description="請求格式錯誤"),
     *   @SWG\Response(response="404", description="資源不存在 (Not Found)"),
     *   @SWG\Response(response="401", description="拒絕存取 (Unauthenticated)")
     * )
     */
    public function show(User $user)
    {
        return $this->success(new UserResource($user));
    }
}
