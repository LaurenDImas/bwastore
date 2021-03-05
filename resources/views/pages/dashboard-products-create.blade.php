@extends('layouts.dashboard')

@section('title')
    Store Dashboard Product Detail
@endsection
@section('content')
<!-- Section Content -->
<div
  class="section-content section-dashboard-home"
  data-aos="fade-up"
>
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h5 class="dashboard-title">Create Product</h5>
      <p class="dashboard-subtitle">Create your own product</p>
    </div>
    <div class="dashboard-content">
      <div class="row">
        <div class="col-12">
          @if($errors->any())
              <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </div>
          @endif
          <form action="{{ route('dashboard-product-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Product Name</label>
                      <input type="text" class="form-control" name="name" required/>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Price</label>
                      <input type="number" class="form-control" name="price" required/>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="">Kategori</label>

                      <select name="categories_id" required class="form-control">
                          @foreach ($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="">Description</label>
                      <textarea name="description" id="editor" required></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="">Thumbnails</label>
                      <input type="file" name="photo" class="form-control" required/>
                      <p class="text-muted">
                        Kamu dapat memilih lebih dari satu file
                      </p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col text-right">
                    <button
                      type="submit"
                      class="btn btn-success px-5"
                    >
                      Save Now
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('addon-script')
  <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace("editor");
  </script>
@endpush