@extends('layout')

@section('content')
    <div class="card mt-5">
        <div class="card-body">
            @if($id)
                <h2 class="card-title">
                    Suceess
                </h2>
                <p class="card-text">Your ID is {{ $id }}</p>
            @else
                <h2 class="card-title">
                    Oops
                </h2>
                <p class="card-text">An error has occurred</p>
            @endif
        </div>
    </div>
@endsection
