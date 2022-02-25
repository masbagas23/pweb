@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Projects</div>

                    <div class="card-body">
                        <a href="/projects/create"><button class="btn btn-success text-white mb-3">Add new project</button></a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $key => $project)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $project->name }}</td>
                                        <td>{{ $project->description }}</td>
                                        <td>
                                            <a href="/projects/{{$project->id}}"><button class="btn btn-sm btn-success text-white">Show</button></a>
                                            <button class="btn btn-sm btn-primary text-white">Edit</button>
                                            <button class="btn btn-sm btn-danger text-white">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
