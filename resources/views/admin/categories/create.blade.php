@extends('admin.layouts.admin-masterpage')

@section('content')
<div class="container">
    <div class="page-inner">
      
      <div class="row">
        <form action="{{ !isset($category) ? route('admin.categories.store') : route('admin.categories.update', $category) }}" method="POST" class="col-md-12" enctype="multipart/form-data">
            @csrf
            @if(isset($category))
                @method('PUT') <!-- Only include PUT if $category is set (edit mode) -->
            @endif
          <div class="card">
            <div class="card-header">
              <div class="card-title">Categories</div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="form-group form-inline">
                        <label
                          for="inlineinput"
                          class="col-md-3 col-form-label"
                          >Name</label>

                        <div class="col-12 p-0">
                          <input
                            type="text"
                            class="form-control input-full"
                            name="name"
                            placeholder="Name"
                            value="{{ isset($category) ? $category->name : ""}}"
                          />
                        </div>
                        
                    </div>

                    <div class="form-group">
                        <label for="comment">Description</label>
                        <textarea class="form-control" id="comment" rows="5" name="description">{{ isset($category) ? $category->description : ""}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                </div>
              </div>
            </div>
            <div class="card-action">
              <button type="submit" class="btn btn-success">Submit</button>
              <a href="{{ route('admin.categories') }}" class="btn btn-danger">Cancel</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
