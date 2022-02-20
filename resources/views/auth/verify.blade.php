@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verify Your Email Address') }}</div>
                    <div class="card-body">
                        <form class="d-inline" method="POST" action="/verify">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth::id()}}">
                            <button type="submit"
                                class="btn btn-link p-0 m-0 align-baseline">{{ __('Click to Verify...') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
