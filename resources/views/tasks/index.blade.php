@extends('layouts.App')

@section('main')
<div id="main" class="main">
  <section class="section profile">
    <div class="row d-flex flex-column align-items-center">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">
              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#All-Tasks">All Users Tasks</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#Add-Task">Add Tasks For Users</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#User-Info">Users Info For Tasks</button>
              </li>
            </ul>
            <div class="tab-content pt-2">
              <div class="tab-pane fade show active " id="All-Tasks">
                <div class="list-group mt-4 mb-4" id="myList" role="tablist">
                  @forelse ($tasks as $task)
                  <div>
                    <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" data-toggle="list" role="tab" href="{{ route('tasks.show', ['task' => $task->id])}}">{{$task->taskname}}
                      @if ($task->end_at > now() && $task->completed)
                        <span class="badge bg-success rounded-pill">Done</span>
                      @elseif ($task->end_at <= now() && $task->completed)
                        <span class="badge bg-success rounded-pill">Done</span>
                      @elseif ($task->end_at <= now() && !$task->completed)
                        <span class="badge bg-danger rounded-pill">Missed</span>
                      @else
                        <span class="badge bg-primary rounded-pill">Assigned</span>
                      @endif
                    </a>
                  </div>
                  @empty
                    <div>There are no Tasks For User!</div>
                  @endforelse
                </div>
            
                {{$tasks->links()}}

              </div>


              <div class="tab-pane fade profile-edit pt-3" id="Add-Task">
                <div class="col-8 mx-auto">
                  <!-- Profile Edit Form -->
                  <form action="{{ route('tasks.store')}}" method="POST" enctype="multipart/form-data">  
                    @csrf  
                    <div class="row mb-3">
                      <label for="id" class="col-md-4 col-lg-3 col-form-label">User Id</label>
                      <div class="col-md-8 col-lg-9">
                        <select name="user_id" type="text" class="form-select" id="id">
                          <option selected value=""></option>
                          @forelse($userdata as $user)
                          <option>{{$user->id}}</option>
                          @empty
                          <option></option>
                          @endforelse
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="name" class="col-md-4 col-lg-3 col-form-label">Task Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control" id="name" value="">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="description" class="col-md-4 col-lg-3 col-form-label">Task Description</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="description" id="description" class="form-control my-editor" cols="30" rows="10"></textarea>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <select name="email" type="email" class="form-select" id="email">
                          <option selected value=""></option>
                          @forelse($userdata as $user)
                          <option>{{$user->email}}</option>
                          @empty
                          <option></option>
                          @endforelse
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="start" class="col-md-4 col-lg-3 col-form-label">Start Date</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="start" type="date" class="form-control" id="start" value="">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="end" class="col-md-4 col-lg-3 col-form-label">End Date</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="end" type="date" class="form-control" id="end" value="">
                      </div>
                    </div>
  
                    <div class="text-center">
                      <button type="submit" class="btn btn-outline-primary">Save Task For User</button>
                    </div>
                  </form>
                  <!-- End Task Edit Form -->
                </div>
              </div>


              <div class="tab-pane fade pt-3" id="User-Info">
                <div class="list-group mt-4 mb-4" id="myList" role="tablist">
                  <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                      For more information about DataTables, please visit the.</p>
                  <!-- DataTales Example -->
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>Id</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone Number</th>
                            </tr>
                          </thead>
                          <tbody>
                            @forelse ($users as $user)
                              <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->Phone_Number}}</td>
                              </tr>
                            @empty
                            <div>There are no Tasks For User!</div>
                            @endforelse
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

                {{$users->links()}}

              </div>
            </div>
            <!-- End Bordered Tabs -->
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- End #Section -->
</div>
@endsection