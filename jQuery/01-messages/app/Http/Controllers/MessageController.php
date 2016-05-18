<?php

namespace App\Http\Controllers;

use App\Message;
use App\Http\Requests;
use Illuminate\Http\Request;


class MessageController extends Controller
{
    public function __construct()
    {

    }

    public function all()
    {
        return response()->json([
            'messages' => Message::orderBy('created_at', 'desc')->get()
        ]);
    }

    public function from($lastId)
    {
        return response()->json([
            'messages' => Message::where('id', '>', intval($lastId))->orderBy('created_at', 'desc')->get()
        ]);
    }
}
