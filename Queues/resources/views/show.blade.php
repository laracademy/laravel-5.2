<html>
    <head>
        <title>Running Queues</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <style>
            .container{ margin-top: 25px; }
        </style>
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover table-bordered table-stripe">
                        <thead>
                            <tr>
                                <th>
                                    Username
                                </th>
                                <th>
                                    Sent Status
                                </th>
                                <th>

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                    <td>
                                        @if($user->reminders()->count() <= 0)
                                            <span class="label label-info">No Reminders On File</span>
                                        @else
                                            @if($user->reminders->last()->sent)
                                                <span class="label label-success">Success</span>
                                            @else
                                                <span class="label label-warning">Pending</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('user.send.reminder', $user) }}" class="btn btn-primary" onclick="return confirm('Are you sure?');">Send Email Reminder</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    <script src="//cdnjs.cloudflare.com/ajax/libs/vue/1.0.21/vue.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.0/vue-resource.js"></script>

    <script>
    new Vue({
    el: '#vueApp',
    data: {
    users: {!! $users !!}
    },
    methods:
    {
    updateUser: function(user_id) {
    var resource = this.$resource('update/{id}');

    resource.get({id: user_id}).then(function(response) {
    console.log('i am done');
    });
    }
    }
    });
    </script>

    </body>
    </html>
