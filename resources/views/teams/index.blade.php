@extends('home')

@section('content')
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">Teams List</a>
        <form class="form-inline my-2 my-lg-0">
            <a href="{{route('teams.create')}}" type="button" class="btn btn-outline-success">Add New Team</a>
        </form>
    </nav>
    <br>
    <div class="container">
        <div class="table-responsive">
            @if ($message = Session::get('success'))
                <div class="alert-success">
                </div>
            @endif
            <table id="team-table" class="table align-items-center table-flush">
                <thead class="thead-light">
                <tr>
                    <th class="sort text-center" data-sort="budget">#</th>
                    <th class="sort text-center" data-sort="budget">Logo</th>
                    <th class="sort text-center" data-sort="status">Name</th>
                    <th class="sort text-center" data-sort="status">Club</th>
                    <th class="sort text-center" data-sort="status">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($teams as $team)
                    <tr>
                        <th class="sort text-center">{{$team->id}}</th>
                        <td class="sort text-center"><img srcset="{{isset($team->logo_img) ? Storage::url($team->logo_img) : 'http://via.placeholder.com/565x565.jpg'  }}" style="max-width: 202px; max-height: 50px;" alt=""></td>
                        <td class="sort text-center">{{$team->name}}</td>
                        <td class="sort text-center">{{$team->club_state}}</td>
                        <td class="sort text-center">
                            <a href="{{route('player.show', $team->id)}}" type="button" class="btn  btn-sm btn-primary" title="">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
                                    <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                </svg>
                                View Players
                            </a>
                            <a href="{{route('player.create', 'team='.$team->id)}}" type="button" class="btn  btn-sm btn-success" title="">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                                    <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                                </svg>
                                Add Player
                            </a>
                        </td>
                    </tr>
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
            $('#team-table').DataTable();
        } );
    </script>
@endsection