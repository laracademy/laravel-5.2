<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Upload;

class UploadController extends Controller
{

    public function index()
    {
        return view('index', [
            'uploads' => Upload::all()
        ]);
    }

    public function upload()
    {
        return view('upload');
    }

}
