<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roles;
class RolesController extends Controller
{
    public function index(){

        return response()->json([
            'roles' => Roles::paginate(),
            'status' => 'success'
        ], 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
    }
}
