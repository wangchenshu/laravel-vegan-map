<?php

namespace App\Http\Controllers\Api;

class APIDocsController extends Controller
{
    /**
     * 利用getJSON()產生JSON格式的Swagger定義
     *
     * @SWG\Swagger(
     *   @SWG\Info(
     *     description="你可以使用XXX API讀取與寫入REST Resource",
     *     title="API Document",
     *     version="1.0.0"
     *   )
     * )
     */
    public function getJSON()
    {
        //指定Swagger要掃描的路徑，\Wsagger\scan()會讀取這個路徑下的文件
        //並且將讀取到的Swagger Annotations都轉換成JSON格式
        $swagger = \Swagger\scan(app_path('Http/Controllers/'));
        return response()->json($swagger, 200);
    }
}
