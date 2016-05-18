<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-weight: 100;
                font-family: 'Lato';
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Latest Messages</div>

                <div id="jqueryMessages">
                    @if($messages->count() > 0)
                        @foreach($messages as $message)
                            <div>{{ $message->content }} </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <!-- jquery include -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>

        <script>
            var latestMessageId = {{ $messages->count() > 0 ? $messages->last()->id : 0 }};
            var waitInSeconds = 3;

            function addMessage(message) {
                $('#jqueryMessages').append('<div>' + message.content + '</div>');

                if(message.id > latestMessageId) {
                    latestMessageId = message.id;
                }
            }

            function getMessages() {
                $.ajax({
                    url: '{{ route('messages.latest', '') }}/' + latestMessageId,
                    success: function(results) {
                        $.each(results, function(index, messages) {
                            $.each(messages, function(idx, message) {
                                addMessage(message);
                            });
                        });

                        startMessages();
                    }
                });
            }

            function startMessages() {
                setTimeout(function() { getMessages(); }, waitInSeconds * 1000);
            }

            startMessages();
        </script>
    </body>
</html>
