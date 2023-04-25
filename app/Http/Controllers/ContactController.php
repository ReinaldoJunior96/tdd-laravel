<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        Contact::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'number' => $request->number
        ]);
    }
}
