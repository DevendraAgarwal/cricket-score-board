@extends('home')

@section('content')
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">Score Board</a>
    </nav>
    <br>
    <div class="container">
        <div class="table-responsive">
            <table id="points-table" class="table align-items-center table-flush">
                <thead class="thead-light">
                <tr>
                    <th class="sort text-center" data-sort="budget">#</th>
                    <th class="sort text-center" data-sort="budget">Logo</th>
                    <th class="sort text-center" data-sort="status">Name</th>
                    <th class="sort text-center" data-sort="status">Total Matches</th>
                    <th class="sort text-center" data-sort="status">Wins</th>
                    <th class="sort text-center" data-sort="status">Losses</th>
                    <th class="sort text-center" data-sort="status">Points</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach($points as $point)
                    <tr>
                        <th class="sort text-center">{{$i}}</th>
                        <td class="sort text-center"><img srcset="{{isset($point->logo_img) ? Storage::url($point->logo_img) : 'http://via.placeholder.com/565x565.jpg'  }}" style="max-width: 202px; max-height: 50px;" alt=""></td>
                        <td class="sort text-center">{{$point->name}}</td>
                        <td class="sort text-center">{{$point->getScoreDetails->total_matches}}</td>
                        <td class="sort text-center">{{$point->getScoreDetails->win}}</td>
                        <td class="sort text-center">{{$point->getScoreDetails->loss}}</td>
                        <td class="sort text-center">{{$point->getScoreDetails->points}}</td>
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
            $('#points-table').DataTable({
                "order": [[ 6, "desc" ]]
            });
        } );
    </script>
@endsection