@extends('master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="40%">Name</th>
                            <th width="40%">Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <!-- <tr> -->
                            <tr id="user_{{ $user->id }}">
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    <div class="btn-group btn-group-justified">
                                        <!-- <a href="{{ route('delete', $user) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a> -->
                                        <a href="#" class="btn btn-danger" onclick="deleteUser({{ $user->id }}); return false;"><i class="fa fa-trash-o"></i></a>
                                        <a href="#" class="btn btn-primary">Edit</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection


@push('script')
    <script>
        function deleteUser(user_id) {
            $.ajaxSetup({
                dataType: 'json'
            });

            $.get('{{ route('delete', '') }}/' + user_id, function(response) {
                // remove row at user_id
                $('#user_' + user_id).addClass('highlightRow').fadeOut("fast");

                console.log(response);
            });

            // $.get('{{ route('delete', '') }}/' + user_id, function(response) {
            //     console.log(response);
            // }, 'json');
        }
    </script>
@endpush