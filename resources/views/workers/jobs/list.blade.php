@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">My Job List</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Customer</th>
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
                                                <span class="badge bg-secondary">{{ $job->status }}</span>
                                            @elseif ($job->status == 'accepted')
                                                <span class="badge bg-primary">{{ $job->status }}</span>
                                            @elseif ($job->status == 'on_progress')
                                                <span class="badge bg-warning">{{ $job->status }}</span>
                                            @elseif ($job->status == 'finished')
                                                <span class="badge bg-success">{{ $job->status }}</span>
                                            @else
                                                <span class="badge bg-danger">{{ $job->status }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $job->projectsAdmin->users->name ?? 'Finding Worker...' }}</td>
                                        <td>
                                            @if ($job->workers)
                                                <button class="btn btn-sm btn-primary text-white">Contact Customer</button>
                                            @endif
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
