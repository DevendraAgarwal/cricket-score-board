@extends('home')

@section('content')
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">Players List</a>
    </nav>
    <br>
    <div class="container row">
        @foreach($players as $player)
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                    <img src="{{isset($player->profile_img) ? Storage::url($player->profile_img) : 'http://via.placeholder.com/565x565.jpg'  }}" class="card-img" alt="{{$player->getFullNameAttribute()}}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{$player->getFullNameAttribute()}}</h5>
                            <p class="card-text">
                                <div class="row">
                                    <div class="col-md-6"><b>Team Name</b></div>
                                    <div class="col-md-6">{{$player->team->name}} <img srcset="{{isset($player->team->logo_img) ? Storage::url($player->team->logo_img) : 'http://via.placeholder.com/565x565.jpg'  }}" style="max-width: 20px; max-height: 20px;" alt=""></div>
                                    <hr class="my-4" />
                                    <div class="col-md-6"><b>Jersey Number</b></div>
                                    <div class="col-md-6">{{$player->jersey_number}}</div>
                                    <div class="col-md-6"><b>Country</b></div>
                                    <div class="col-md-6">{{$player->country}}</div>
                                    <hr class="my-4" />
                                    <div class="col-md-6"><b>Total Matches</b></div>
                                    <div class="col-md-6">{{$player->total_matches}}</div>
                                    <div class="col-md-6"><b>Total Runs</b></div>
                                    <div class="col-md-6">{{$player->total_runs}}</div>
                                    <div class="col-md-6"><b>Highest Score</b></div>
                                    <div class="col-md-6">{{$player->highest_score}}</div>
                                    <div class="col-md-6"><b>No Of Fifties</b></div>
                                    <div class="col-md-6">{{$player->no_of_fifties}}</div>
                                    <div class="col-md-6"><b>No Of Hundreds</b></div>
                                    <div class="col-md-6">{{$player->no_of_hundreds}}</div>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
@endsection

@section('ExtraCss')
@endsection

@section('ExtraJs')
@endsection