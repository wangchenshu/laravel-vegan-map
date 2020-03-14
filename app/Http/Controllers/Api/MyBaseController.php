<?php

namespace App\Http\Controllers\Api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MyBaseController extends Controller
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $data = $this->model::all();

        return response()->json($data);
    }

    public function show($id)
    {
        try {
            $data = $this->model::findOrFail($id);

            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(
                ['message' => '找不到資料'],
                404
            );
        }
    }
}
