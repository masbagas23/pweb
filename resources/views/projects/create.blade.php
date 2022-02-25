@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Projects</div>

                    <div class="card-body">
                        <form action="/projects" method="post">
                            @csrf
                            <div class="mb-3"> <label for="exampleFormControlInput1" class="form-label">Name Project</label> <input required type="text" class="form-control" name="name"></div>
                            <div class="mb-3"> <label for="exampleFormControlInput1" class="form-label">Description</label> <input required type="text" class="form-control" name="desc"> </div>
                            <button class="btn btn-primary text-white">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
