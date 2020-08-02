<!DOCTYPE html>
<html>
<head>
    <title>Cricket Board</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    @yield('ExtraCss')
</head>
<body>

    <div class="row">
        <div class="col-md-2" style="margin-right:0px;padding-right:0px">
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="#">Cricket Board</a>
            </nav>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><a class="nav-link" href="{{route('home')}}">Score Board</a></li>
                <li class="list-group-item"><a class="nav-link" href="{{route('teams.index')}}">Teams</a></li>                
                <li class="list-group-item"><a class="nav-link" href="{{route('matches.index')}}">Match Fixtures</a></li>                
                <li class="list-group-item"><a class="btn btn-primary" href="javascript:void(0);" id="set-auto-match" role="button">Set Match</a></li>
            </ul>
        </div>
        <div class="col-md-10" style="margin-left:0px;padding-left:0px">
            @yield('content')
        </div>
    </div>

    <div class="modal" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Setup A Match</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="response-message"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $('#set-auto-match').click(function(){
            $.ajax({
                method: "GET",
                url: "api/setup-a-match/",
            }).done(function (response) {
                var response = $.parseJSON(response)
                $('#response-message').html(response.message);
                $('#myModal').show();
                window.location.reload();
            });
        });
    </script>
    @yield('ExtraJs')
</body>
</html>
