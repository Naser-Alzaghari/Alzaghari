@extends('admin.layouts.admin-masterpage')

@section('content')
<div class="container">
    <div class="page-inner">
      
      <div class="row">
        <form action="{{ !isset($user) ? route('admin.users.store') : route('admin.users.update', $user) }}" method="POST" class="col-md-12">
            @csrf
            @if(isset($user))
                @method('PUT') <!-- Only include PUT if $user is set (edit mode) -->
            @endif
          <div class="card">
            <div class="card-header">
              <div class="card-title">Users</div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="form-group form-inline">
                        <label
                          for="inlineinput"
                          class="col-md-3 col-form-label"
                          >Name</label
                        >
                        <div class="col-md-9 p-0">
                          <input
                            type="text"
                            class="form-control input-full"
                            name="name"
                            placeholder="Name"
                            value="{{ isset($user) ? $user->name : ""}}"
                          />
                          @error('name')
                            <div class="error">{{ $message }}</div>
                          @enderror                          
                        </div>
                      </div>
                  <div class="form-group">
                    <label for="email2">Email Address</label>
                    <input
                      type="email"
                      class="form-control"
                      name="email"
                      id="email2"
                      placeholder="Enter Email"
                      value="{{ isset($user) ? $user->email : ""}}"
                    />
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                    <small id="emailHelp2" class="form-text text-muted"
                      >We'll never share your email with anyone
                      else.</small
                    >
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input
                      type="password"
                      class="form-control"
                      id="password"
                      name="password"
                      placeholder="Password"
                    />
                    @error('password')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                
            </div>
            
          </div>
          <div class="card-action">
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="{{route('admin.users')}}" type="button" class="btn btn-danger">Cancel</a>
          </div>
        </div>
      </form>
    </div>
  </div>

    
@endsection
