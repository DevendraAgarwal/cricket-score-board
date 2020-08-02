@extends('home')

@section('content')
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">Match Fixtures</a>
    </nav>
    <br>
    <div class="container">
        <div class="table-responsive">
            <table id="team-table" class="table align-items-center table-flush">
                <thead class="thead-light">
                <tr>
                    <th class="sort text-center" data-sort="budget">#</th>
                    <th class="sort text-center" data-sort="status">Match Date</th>
                    <th class="sort text-center" data-sort="budget">Team One</th>
                    <th class="sort text-center" data-sort="status">Team Two</th>
                    <th class="sort text-center" data-sort="status">Winner</th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach($matches as $match)
                        <tr>
                            <th class="sort text-center">{{$i}}</th>
                            <td class="sort text-center">{{$match->match_date}}</td>
                            <td class="sort text-center">{{$match->teamOne->name}}</td>
                            <td class="sort text-center">{{$match->teamTwo->name}}</td>
                            <td class="sort text-center">{{$match->winnerTeam->name}}</td>                            
                        </tr>
                        @php
                            $i = $i + 1;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
@endsection

@section('ExtraCss')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
@endsection

@section('ExtraJs')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#team-table').DataTable({
                "order": [[ 1, "asc" ]]
            });
        } );
    </script>
@endsection