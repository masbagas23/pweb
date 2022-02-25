@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Campaign {{$job->name}}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                              Name
                            </div>
                            <div class="col-1">
                                :
                            </div>
                            <div class="col-8">
                                {{$job->name}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                              Worker
                            </div>
                            <div class="col-1">
                                :
                            </div>
                            <div class="col-8">
                                {{$job->workers->name ?? '-'}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                              Status
                            </div>
                            <div class="col-1">
                                :
                            </div>
                            <div class="col-8">
                                {{$job->status}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                              Budget
                            </div>
                            <div class="col-1">
                                :
                            </div>
                            <div class="col-8">
                                Rp {{ number_format($job->amount,0,',','.') }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                              Start Date
                            </div>
                            <div class="col-1">
                                :
                            </div>
                            <div class="col-8">
                                {{$job->start_date}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                              End Date
                            </div>
                            <div class="col-1">
                                :
                            </div>
                            <div class="col-8">
                                {{$job->end_date}}
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            @if ($job->status == 'on_progress')
                <div class="col-md-8 mt-3">
                    <div class="card">
                        <div class="card-header">Payment</div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Upload Bukti Pembayaran</label>
                                <input class="form-control" type="file" id="formFile">
                              </div>
                              <button class="btn btn-primary text-white">Save</button>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
