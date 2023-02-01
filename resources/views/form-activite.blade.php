@extends('layouts.app')

@section('content')
    <div class="container mt-5">

        <!-- Success message -->
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif

        <form action="" method="post" action="{{ action('App\Http\Controllers\ActiviteController@createNewActivityForm') }}">

            @csrf

            <div class="form-group">
                <label>Type Activite : </label>
                <input type="text" class="form-control {{ $errors->has('TypeActivite') ? 'error' : '' }}" name="TypeActivite" id="TypeActivite">

                <!-- Error -->
                @if ($errors->has('TypeActivite'))
                <div class="error">
                    {{ $errors->first('TypeActivite') }}
                </div>
                @endif
            </div>

            <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
        </form>
    </div>
@endsection