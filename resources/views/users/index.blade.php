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
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#All-Users">All Users</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#Add-User">Add Users</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active " id="All-Users">
                <div class="list-group mt-4 mb-4" id="myList" role="tablist">
                  @forelse ($users as $user)
                  <div>
                    <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" data-toggle="list" role="tab" href="{{ route('user.show', ['user' => $user->id]) }}">{{$user->name}}
                      {{-- <span class="badge bg-success rounded-pill">Task Preformed</span> --}}
                    </a>
                  </div>
                  @empty
                    <div>There are no User!</div>
                  @endforelse
                </div>
            
                {{$users->links()}}
                
              </div>

              <div class="tab-pane fade profile-edit pt-3" id="Add-User">

                <div class="col-8 mx-auto">
                  <!-- Profile Edit Form -->
                  <form action="{{ route('user.store')}}" method="POST" enctype="multipart/form-data">  
                    @csrf  
                    <div class="row mb-3">
                      <label for="name" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control" id="name" value="">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="email" value="">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="phone_number" class="col-md-4 col-lg-3 col-form-label">Phone Number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone_number" type="text" class="form-control" id="phone-number" value="">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Name" class="col-md-4 col-lg-3 col-form-label">Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="password" value="">
                      </div>
                    </div>
  
                    <div class="text-center">
                      <button type="submit" class="btn btn-outline-primary">Save User</button>
                    </div>
                  </form>
                  <!-- End Profile Edit Form -->
                </div>
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
