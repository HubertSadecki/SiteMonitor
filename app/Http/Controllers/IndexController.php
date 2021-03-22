<?php

namespace App\Http\Controllers;

use App\Http\Resources\StatusResource;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function ping(Request $request)
    {
        return new StatusResource($request->query('message', 'OK'));
    }
}
