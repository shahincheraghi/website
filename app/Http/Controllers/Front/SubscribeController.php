<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Models\Subscribe;

use Illuminate\Http\Request;

use Response;

class SubscribeController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|max:255|unique:subscribes',
        ]);
        $todo = Subscribe::create($data);
        return Response::json($todo);
    }
}
