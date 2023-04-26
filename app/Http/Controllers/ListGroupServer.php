<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ListGroupServer extends Controller
{
    public function __invoke(): JsonResponse
    {
        $groups = Group::all();
        return response()->json($groups);
    }
}
