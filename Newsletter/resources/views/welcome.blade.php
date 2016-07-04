@extends('layout.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                <form action="{{ route('signup') }}" method="POST" autocomplete="off">
                    {!! csrf_field() !!}

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Newsletters
                            </h3>
                        </div> <!-- panel-heading -->
                        <div class="panel-body">
                            <p>
                                By signing up for our newsletter you will be emailed once a month with tips and trick on Laravel.
                            </p>

                            <div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="text" name="email" class="form-control" placeholder="example@example.com" />
                                </div>
                                <div class="alert alert-info">
                                    <i class="fa fa-question-circle"></i> You will need to verify your email after subscription
                                </div>
                            </div>
                        </div> <!-- panel-body -->
                        <div class="panel-footer">
                            <input type="submit" class="btn btn-block btn-success" value="Sign up" />
                        </div> <!-- panel-footer -->
                    </div> <!-- panel panel-default -->
                </form>

            </div> <!-- col-md-6 col-md-offset-3 -->
        </div> <!-- row -->
    </div> <!-- container -->

@endsection