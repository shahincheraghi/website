<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Counseling;
use Illuminate\Http\Request;
use Response;

class CounselingController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'phone' => 'required|max:11|min:11',
            'description' => 'max:255',
        ]);
        $todo = Counseling::create($data);
        return Response::json($todo);
    }
}
