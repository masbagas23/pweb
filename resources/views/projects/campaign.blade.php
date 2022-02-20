@extends('layouts.app')
@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Campaign</div>

                    <div class="card-body" id="body">
                        
                    </div>
                    <div class="card-footer bg-transparent">
                        <div class="d-flex justify-content-between">
                            <div id='btn-success'><button id="next" onClick="next()"
                                    class="btn btn-success text-white">Next</button></div>
                            <div><a href="/projects"><button id="cancel"
                                        class="btn btn-danger text-white">Cancel</button></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>    
    <script>
        $(document).ready(function() {
            $('#startdate').datepicker();
            $('#enddate').datepicker();
        });
    </script>
    <script type="text/javascript">
        const data = {!! $data !!}
        const project = {!! $project !!}
        $("#body").append(
            `${data[1].question} <div class="form-check"> <input class="form-check-input" value="${data[1].yes}" type="radio" name="flexRadioDefault" id="flexRadioDefault1"> <label class="form-check-label" for="flexRadioDefault1"> Yes </label> </div> <div class="form-check"> <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="${data[1].no}"> <label class="form-check-label" for="flexRadioDefault2"> No </label> </div>`
            )

        function next() {
            let value = $("input[name='flexRadioDefault']:checked").val();
            $("#body").empty();
            if (value == 'ads') {
                $("#btn-success").empty();
                $("#body").append(
                    `Pilih Satu Jenis Layanan Branding Yang Kami Sarankan : <div class="form-check"> <input class="form-check-input" type="radio" name="service" id="service1" value="ads1"> <label class="form-check-label" for="service1"> Membuat Website Perusahaan / Bisnis</label> </div> <div class="form-check"> <input class="form-check-input" type="radio" name="service" id="service2" value="ads2"> <label class="form-check-label" for="service2"> Online Ads</label> </div> <div class="form-check"> <input class="form-check-input" type="radio" name="service" id="service3" value="ads3"> <label class="form-check-label" for="service3"> Remarketing</label> </div> <div class="form-check"> <input class="form-check-input" type="radio" name="service" id="service4" value="ads4"> <label class="form-check-label" for="service4"> Product Placement </label> </div>`
                );
                $("#btn-success").append(
                    `<button id="next" onClick="setup()" class="btn btn-success text-white">Next</button>`);
            } else if (value == 'branding') {
                $("#btn-success").empty();
                $("#body").append(
                    `Pilih Satu Jenis Layanan Branding Yang Kami Sarankan : <div class="form-check"> <input class="form-check-input" type="radio" name="service" id="service1" value="branding1"> <label class="form-check-label" for="service1"> Paid Promote (Influencer)</label> </div> <div class="form-check"> <input class="form-check-input" type="radio" name="service" id="service2" value="branding2"> <label class="form-check-label" for="service2"> Membuat Kalender Konten</label> </div> <div class="form-check"> <input class="form-check-input" type="radio" name="service" id="service3" value="branding3"> <label class="form-check-label" for="service3"> Produksi Konten </label> </div> <div class="form-check"> <input class="form-check-input" type="radio" name="service" id="service4" value="branding4"> <label class="form-check-label" for="service4"> Management Konten </label> </div>`
                );
                $("#btn-success").append(
                    `<button id="next" onClick="setup()" class="btn btn-success text-white">Next</button>`);
            } else if (value == 'end') {
                $("#body").empty();
                $("#btn-success").empty();
                $("#body").append('Maaf kami belum menemukan layanan yang cocok untuk anda.');
                $("#btn-success").append(
                    `<a href="/projects/${project.id}"><button id="next" class="btn btn-success text-white">Finish</button></a>`);
            } else {
                $("#body").append(
                    `${data[value].question} <div class="form-check"> <input class="form-check-input" value="${data[value].yes}" type="radio" name="flexRadioDefault" id="flexRadioDefault1"> <label class="form-check-label" for="flexRadioDefault1"> Yes </label> </div> <div class="form-check"> <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="${data[value].no}"> <label class="form-check-label" for="flexRadioDefault2"> No </label> </div>`
                )
            }
        }
        function setup(){
            let service = $("input[name='service']:checked").val();
            $("#body").empty();
            $("#btn-success").empty();
            $("#btn-success").append(
                `<button id="next" onClick="save('${service}')" class="btn btn-success text-white">Finish</button>`);
            $("#body").append(`<div class="mb-3"> <label for="exampleFormControlInput1" class="form-label">Name Campaign</label> <input type="text" class="form-control" id="name"></div><div class="mb-3"> <label for="exampleFormControlInput1" class="form-label">Budget Campaign</label> <input type="number" class="form-control" id="budget"> </div> <div class="mb-3"> <label for="exampleFormControlInput1" class="form-label">Start Date</label> <input type="text" class="form-control" id="startdate"> </div> <div class="mb-3"> <label for="exampleFormControlInput1" class="form-label">End Date</label> <input type="text" class="form-control" id="enddate"> </div>`);
            $('#startdate').datepicker();
            $('#enddate').datepicker();
        }
        function save(service) {
            let name = $("#name").val();
            let project_id = project.id;
            let amount = $("#budget").val();
            let startdate = $("#startdate").val();
            let enddate = $("#enddate").val();
            let _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "/jobs",
                type: "POST",
                data: {
                    name: name,
                    project_id: project_id,
                    service: service,
                    amount: amount,
                    startdate: startdate,
                    enddate: enddate,
                    _token: _token
                },
                success: function(response) {
                    window.location.replace("/projects/" + project.id);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    </script>
@endsection
