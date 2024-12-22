@extends('layouts.App')

@section('main')
<section class="main" id="main">
    <div class="row d-flex flex-column align-items-center">
        <div class="col-xl-10">
            <div class="card">
                <div class="card-body pt-3">
                    <h5 class="card-title">Task Details</h5>
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Task Name</div>
                        <div class="col-lg-9 col-md-8">{{$data['task_name']}}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Description</div>
                        <div class="col-lg-9 col-md-8">{{$data['description']}}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Created Date</div>
                        <div class="col-lg-9 col-md-8">{{$data['start_at']}}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Phone</div>
                        <div class="col-lg-9 col-md-8">(436) 486-3538 x29071</div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</section>
@endsection