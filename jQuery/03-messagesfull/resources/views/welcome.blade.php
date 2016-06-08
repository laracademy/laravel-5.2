<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <style>
            #header{ padding-top: 20px; }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="header" class="text-center">
                        <h1>Laracademy Chat</h1>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-8">

                    <div id="jqueryMessages">
                        @if($messages->count() > 0)
                            @foreach($messages as $message)
                                <p>
                                    {{ $message->content }}
                                    <br>
                                    <em>{{ $message->created_at->format('M d, Y') }}</em>
                                </p>
                            @endforeach
                        @endif
                    </div>

                </div>
                <div class="col-md-4">

                    <form action="#">
                        <div class="form-group">
                            <label>Message</label>
                            <input type="text" class="form-control" id="message" placeholder="Your message">
                            <span id="errors"></span>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success btn-block" onclick="sendMessage(); return false;">Send Message</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <!-- jquery include -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>

        <script>
            var latestMessageId = {{ $messages->count() > 0 ? $messages->last()->id : 0 }};
            var waitInSeconds = 3;

            function addMessage(message) {
                var html = '<p>';
                html += message.content;
                html += '<br>';
                html += moment(message.created_at, 'YYYY-MM-DD HH:mm:ss').format('MMM DD, YYYY');
                html += '</p>';

                $('#jqueryMessages').append(html);

                if(message.id > latestMessageId) {
                    latestMessageId = message.id;
                }
            }

            function sendMessage() {
                var msg = $('#message').val();
                var data = {
                    message: msg,
                    _token: '{{ csrf_token() }}'
                };

                $('#errors').html('');

                $.post('{{ route('messages.create') }}', data, function(response) {
                    // 200
                    if(response.is_valid) {
                        // content was added successfully

                        // empty message
                        $('#message').val('')

                        // grab latest messages
                        getMessages(true);
                    }
                }, 'json')
                .fail(function(response) {
                    $('#errors').html(response.responseJSON.message.pop());
                });
            }

            function getMessages(runOnce = false) {
                $.ajax({
                    url: '{{ route('messages.latest', '') }}/' + latestMessageId,
                    success: function(results) {
                        $.each(results, function(index, messages) {
                            $.each(messages, function(idx, message) {
                                addMessage(message);
                            });
                        });

                        if(! runOnce) {
                            startMessages();
                        }
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
