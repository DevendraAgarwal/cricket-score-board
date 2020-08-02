@extends('home')

@section('content')
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">Add Player</a>
    </nav>
    <br>
    <div class="container">
        <form method="POST" action="{{ route('player.store') }}" enctype="multipart/form-data">
            @csrf
            <fieldset class="p-sm form-horizontal">
                <h6 class="heading-small text-muted mb-4">Player Detail</h6>
                <div class="row">
                    <input type="hidden" name="team" value="{{$team->id}}">
                    <div class="form-group col-md-6 row">
                        <label class="col-md-4 control-label">First Name<span class="required">*</span></label>
                        <div class="col-md-8">
                            <input required class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" type="text" id="first_name" name="first_name">
                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-6 row">
                        <label class="col-md-4 control-label">Last Name<span class="required">*</span></label>
                        <div class="col-md-8">
                            <input required class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" type="text" id="last_name" name="last_name">
                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>                    
                    <div class="form-group col-md-6 row">
                        <label class="col-md-4 control-label">Jersey Number<span class="required">*</span></label>
                        <div class="col-md-8">
                            <input required class="form-control @error('jersey_number') is-invalid @enderror" value="{{ old('jersey_number') }}" type="number" id="jersey_number" name="jersey_number">
                            @error('jersey_number')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-6 row">
                        <label class="col-md-4 control-label">Country<span class="required">*</span></label>
                        <div class="col-md-8">
                            <input required class="form-control @error('country') is-invalid @enderror" value="{{ old('country') }}" type="text" id="country" name="country">
                            @error('country')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-6 row">
                        <label class="col-md-4 control-label">Profile Image<span class="required">*</span></label>
                        <div class="col-md-8">
                            <input required class="form-control @error('profile_img') is-invalid @enderror" value="{{ old('profile_img') }}" type="file" id="profile_img" name="profile_img">
                            <span> Max Size: 1 MB</span>
                            @error('profile_img')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 row">
                        <label class="col-md-4 control-label">Team</label>
                        <div class="col-md-8">
                            <b>{{$team->name}}</b>
                        </div>
                    </div>
                </div>
                <hr class="my-4" />
                <h6 class="heading-small text-muted mb-4">Player Record</h6>
                <div class="row">
                    <div class="form-group col-md-6 row">
                        <label class="col-md-4 control-label">Total Matches<span class="required">*</span></label>
                        <div class="col-md-8">
                            <input required class="form-control @error('total_matches') is-invalid @enderror" value="{{ old('total_matches') }}" type="number" id="total_matches" name="total_matches">
                            @error('total_matches')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-6 row">
                        <label class="col-md-4 control-label">Total Runs<span class="required">*</span></label>
                        <div class="col-md-8">
                            <input required class="form-control @error('total_runs') is-invalid @enderror" value="{{ old('total_runs') }}" type="number" id="total_runs" name="total_runs">
                            @error('total_runs')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-6 row">
                        <label class="col-md-4 control-label">Highest Score<span class="required">*</span></label>
                        <div class="col-md-8">
                            <input required class="form-control @error('highest_score') is-invalid @enderror" value="{{ old('highest_score') }}" type="number" id="highest_score" name="highest_score">
                            @error('highest_score')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-6 row">
                        <label class="col-md-4 control-label">Total Fifties<span class="required">*</span></label>
                        <div class="col-md-8">
                            <input required class="form-control @error('no_of_fifties') is-invalid @enderror" value="{{ old('no_of_fifties') }}" type="number" id="no_of_fifties" name="no_of_fifties">
                            @error('no_of_fifties')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-6 row">
                        <label class="col-md-4 control-label">Total Hundreds<span class="required">*</span></label>
                        <div class="col-md-8">
                            <input required class="form-control @error('no_of_hundreds') is-invalid @enderror" value="{{ old('no_of_hundreds') }}" type="number" id="no_of_hundreds" name="no_of_hundreds">
                            @error('no_of_hundreds')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </fieldset>
            <!--Footer-->
            <div class="modal-footer clear_both">
                <button type="submit" class="btn btn-primary btn-sm" id="submitButton">Submit</button>
                <button type="reset" class="btn btn-white btn-sm">Cancel</button>
            </div>
        </form>
    </div>    
@endsection

@section('ExtraCss')
    <style>
        .required {
            color:red;
        }
    </style>
@endsection
