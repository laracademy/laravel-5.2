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
                    <h1>Laracademy <span class="small"> - Pagination</span></h1>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <li>
                            <a href="{{ URL::to('/all') }}">All Data</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('/simple') }}">Simple Pagination</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('/simple-sorted') }}">Simple Sorted Pagination</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('/dual') }}">Dual Pagination</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('/custom') }}">Custom Links</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </body>
</html>
