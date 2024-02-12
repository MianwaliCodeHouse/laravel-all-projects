@extends('layouts.main')
@push('head')
  <title>Dashboard | Request</title>
@endpush

@section('dynamic-section')
@if (session()->has('ClientRequestSent'))
<div class="alert alert-success alert-dismissible fade show mb-5" role="alert">
  <div class="container">
  <strong>{{ session()->get('ClientRequestSent') }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
</div>
@endif
  <div class="h1 mt-4 text-center mb-5">Create Request</div>
  <form action="{{ route('client.request') }}" method="post" enctype="multipart/form-data" class="row g-3 p-3">
      @csrf
      <div class="col-md-5 mx-auto">
          <label for="inputAddress2" class="form-label">Request Title<sup>*</sup></label>
          <input type="text" class="form-control" placeholder="Type Request Title" name="request_title" value="{{ old('request_title') }}">
          <span class="text-danger">
              @error('request_title')
                  {{ $message }}
              @enderror
          </span>
      </div>
      <div class="col-md-5 mx-auto">
          <label for="inputAddress2" class="form-label">Your Deadline</label>
          <input type="date" class="form-control" name="request_deadline" value="{{ old('request_deadline') }}">
          
      </div>
      <div class="col-11 mx-auto">
          <label for="inputAddress" class="form-label">Request Requirements<sup>*</sup></label>
          <textarea class="form-control" rows="3" name="request_requirements" placeholder="Type Requirements">{{ old('request_requirements') }}</textarea>
          <span class="text-danger">
            @error('request_requirements')
                {{ $message }}
            @enderror
        </span>
      </div>
      <div class="col-md-5 mx-auto">
          <label for="inputEmail4" class="form-label">Your Budget</label>
          <input type="text" class="form-control" placeholder="___$" name="request_budget" value="{{ old('request_budget') }}">
          
      </div>
      <div class="col-md-5 mx-auto">
          <label for="inputPassword4" class="form-label">Project Type<sup>*</sup></label>
          <select class="form-select" aria-label="Default select example" name="project_type">
            <option value="">Choose Project Type</option>
            <option value="New Project">New Project</option>
            <option value="Change in Existing Project">Change in Existing Project</option>
            <option value="Bug in Existing Project">Bug in Existing Project</option>
          </select>
          <span class="text-danger">
            @error('project_type')
                {{ $message }}
            @enderror
        </span>
      </div>


      <div class="col-11 mx-auto">
        <label for="inputAddress2" class="form-label">Attachments</label>
        <input type="file" class="form-control" name="attachments[]" multiple>
    </div>


      <div class="col-11 mx-auto mt-4">
          <button type="submit" class="btn btn-primary btn-lg">Submit</button>
      </div>
  </form>
@endsection
