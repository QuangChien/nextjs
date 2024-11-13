<?php

namespace App\Http\Controllers\Type;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function all() {
        $data = [
            "success" => true,
            "message" => "Success!"
        ];
        try {
            $types = Type::all();
            $data["success"] = true;
            $data["types"] = $types;
        }catch (\Exception) {
            $data["success"] = false;
            $data["error"] = "Có lỗi xảy ra, vui lòng thử lại.";
        }

        return response()->json($data);
    }
}
