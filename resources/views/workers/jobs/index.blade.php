@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Find Jobs</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Job Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Budget</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $key => $job)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $job->name }}</td>
                                        <td>{{ $job->categories->name }}</td>
                                        <td>Rp {{ number_format($job->amount,0,',','.') }}</td>
                                        <td>{{ $job->end_date }}</td>
                                        
                                        <td>
                                            <a href="/jobs/{{$job->id}}/apply"><button class="btn btn-sm btn-success text-white">Apply</button></a>
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
