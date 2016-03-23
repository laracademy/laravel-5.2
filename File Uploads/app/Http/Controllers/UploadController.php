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

    public function store(Request $request)
    {
        $rules = [
            'uploaded_file' => 'required'
        ];

        // quick check on rules
        $this->validate($request, $rules);

        $upload = new Upload();
        $upload->name = $request->file('uploaded_file')->getClientOriginalName();
        $upload->tmp  = uniqid() .'.'. $request->file('uploaded_file')->getClientOriginalExtension();

        // move the file
        $request->file('uploaded_file')->move(public_path() .'/uploads', $upload->tmp);

        // save to database
        $upload->save();

        return 'Saved Image';
    }

}
