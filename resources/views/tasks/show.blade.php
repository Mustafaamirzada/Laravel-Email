@extends('layouts.App')

@section('main')

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Tasks Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
        <li class="breadcrumb-item">Tasks</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row d-flex flex-column align-items-center">

      <div class="col-xl-10">
        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">
              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#task-overview">Overview</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#task-edit">Edit Tasks</button>
              </li>
            </ul>

            <div class="tab-content pt-2">
              <div class="tab-pane fade show active profile-overview" id="task-overview">
                <h5 class="card-title">Task Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Task Name</div>
                  <div class="col-lg-9 col-md-8">{{$task->taskname}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">{{$task->email}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Description</div>
                  <div class="col-lg-9 col-md-8">{{$task->description}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Created Date</div>
                  <div class="col-lg-9 col-md-8">{{$task->created_at->diffForHumans()}}</div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Last Update</div>
                  <div class="col-lg-9 col-md-8">{{$task->updated_at->diffForHumans()}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Phone</div>
                  <div class="col-lg-9 col-md-8">(436) 486-3538 x29071</div>
                </div>

                <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
                  @csrf
                  @method('PUT')
                  <button type="submit" class="btn btn-outline-success">
                    Mark as {{ $task->completed ? 'not completed' : 'completed' }}
                  </button>
                </form>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="task-edit">
                <!-- task Edit Form -->
                <form action="{{route('tasks.update', ['task' => $task->id])}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')

                  <div class="row mb-3">
                    <label for="user_id" class="col-md-4 col-lg-3 col-form-label">User Id</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="user_id" type="text" class="form-control" id="" value="{{$task->user_id}}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="name" class="col-md-4 col-lg-3 col-form-label">Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="name" type="text" class="form-control" id="" value="{{$task->taskname}}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="description" class="col-md-4 col-lg-3 col-form-label">Task Description</label>
                    <div class="col-md-8 col-lg-9">
                      <textarea name="description" id="description" class="form-control my-editor" cols="30" rows="10">{{$task->description}}</textarea>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="form-control" id="email" value="{{$task->email}}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="start_at" class="col-md-4 col-lg-3 col-form-label">Started At</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="start" type="date" class="form-control" id="" value="{{$task->created_at}}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="end_at" class="col-md-4 col-lg-3 col-form-label">Ended At</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="end" type="date" class="form-control" id="" value="{{$task->end_at}}">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-outline-primary">Edit Task</button>
                  </div>
                </form>
                <!-- End Profile Edit Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

@endsection()