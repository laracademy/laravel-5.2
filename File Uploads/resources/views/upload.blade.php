@extends('master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>
                    Upload a File
                </h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <form action="{{ URL::route('store') }}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label>File to Upload</label>
                        <input type="file" name="uploaded_file">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn-btn-success" value="Upload Selected File">
                    </div>
                </form>

            </div>
        </div>
    </div>
@stop