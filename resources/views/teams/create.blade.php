@extends('home')

@section('content')
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">Add Team</a>
    </nav>
    <br>
    <div class="container">
        <form method="POST" action="{{ route('teams.store') }}" enctype="multipart/form-data">
            @csrf
            <h6 class="heading-small text-muted mb-4">Team Detail</h6>
            <div class="row">
                <div class="form-group col-md-6 row">
                    <label class="col-md-4 control-label">Team Name<span class="required">*</span></label>
                    <div class="col-md-8">
                        <input required class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" id="name" name="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group col-md-6 row">
                    <label class="col-md-4 control-label">Club State Name<span class="required">*</span></label>
                    <div class="col-md-8">
                        <input required class="form-control @error('club_state') is-invalid @enderror" value="{{ old('club_state') }}" type="text" id="club_state" name="club_state">
                        @error('club_state')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group col-md-6 row">
                    <label class="col-md-4 control-label">Team Logo<span class="required">*</span></label>
                    <div class="col-md-8">
                        <input required class="form-control @error('logo') is-invalid @enderror" value="{{ old('logo') }}" type="file" id="logo" name="logo">
                        <span> Max Size: 1 MB</span>
                        @error('logo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
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
