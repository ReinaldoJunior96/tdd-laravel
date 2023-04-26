<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function store(Request $request)
    {
        Group::create([
            'name' => $request->name,
            'description' => $request->description
        ]);
    }
}
