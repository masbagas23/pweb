@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My Skill</div>

                    <div class="card-body">
                        <form action="/users/skills" method="post">
                        @csrf
                        @foreach ($skills as $skill)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$skill->id}}" name="skills[]">
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{$skill->name}}
                                </label>
                            </div>
                        @endforeach
                        <button class="btn btn-primary text-white mt-2">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
