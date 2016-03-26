<!DOCTYPE html>
<html>
    <head>
        <title>Laracademy - Pagination</title>

        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>All Data <small><a href="{{ URL::to('/') }}">home</a></small></h1>
                </div>
            </div>
        </div>

        <!-- CONTENT -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($users->count() > 0)
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="2" class="alert alert-danger">
                                        <h4>Sorry</h4>
                                        <p>No users have been found</p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- CONTENT -->

    </body>
</html>
