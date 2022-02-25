@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Campaign - Project {{$project->name}} </div>

                    <div class="card-body">
                        <a href="/projects/{{$project->id}}/campaign"><button class="btn btn-success text-white mb-3">Add new campaign</button></a>
                        @if (count($jobs) == 0)
                            <div>
                                <h2>No Campaign</h2>
                            </div>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Worker</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobs as $key => $job)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $job->name }}</td>
                                            <td>
                                                @if ($job->status == 'created')
                                                    <span class="badge bg-secondary">{{$job->status}}</span>
                                                @elseif ($job->status == 'accepted')
                                                    <span class="badge bg-primary">{{$job->status}}</span>
                                                @elseif ($job->status == 'on_progress')
                                                    <span class="badge bg-warning text-black">{{$job->status}}</span>
                                                @elseif ($job->status == 'finished')
                                                    <span class="badge bg-success">{{$job->status}}</span>
                                                @else
                                                    <span class="badge bg-danger">{{$job->status}}</span>
                                                @endif
                                            </td>
                                            <td>{{ $job->workers->name ?? 'Finding Worker...' }}</td>
                                            <td>
                                                @if ($job->workers)
                                                    <button class="btn btn-sm btn-primary text-white">Contact Worker</button>
                                                @endif
                                                <a href="/jobs/{{$job->id}}"><button class="btn btn-sm btn-primary text-white">Show Detail</button></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
