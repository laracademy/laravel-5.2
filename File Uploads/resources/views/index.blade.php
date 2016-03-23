@extends('master')

@section('content')

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>
                        File Uploads
                    </h1>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-hover table-bordered">
                        <caption>
                            <span class="pull-right">
                                <a href="{{ URL::route('upload') }}" class="btn btn-info">Upload File</a>
                            </span>
                        </caption>
                        <thead>
                            <tr>
                                <th>Filename</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($uploads->count() > 0)
                                @foreach($uploads as $upload)
                                    <tr>
                                        <td>
                                            <a href="{{ asset('/uploads/'. $upload->tmp) }}">{{ $upload->name }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

@stop