<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>{{ config('app.name', 'Task Notifications App') }}</title>

</head>
<body>

    <section class="section profile">
        <div class="row d-flex flex-column align-items-center">
          <div class="col-xl-10">
            <div class="card">
              <div class="card-body pt-3">
                <div class="tab-content pt-2">
                    <h5 class="card-title">Task Details</h5>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Task Name</div>
                      <div class="col-lg-9 col-md-8">{{$data['task_name']}}</div>
                    </div>
    
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Email</div>
                      <div class="col-lg-9 col-md-8">{{$data['email']}}</div>
                    </div>
    
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Description</div>
                      <div class="col-lg-9 col-md-8">{{$data['description']}}</div>
                    </div>
    
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Created Date</div>
                      <div class="col-lg-9 col-md-8">{{$data->created_at->diffForHumans()}}</div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Last Update</div>
                      <div class="col-lg-9 col-md-8">{{$data->end_at->diffForHumans()}}</div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
</body>
</html>

