@extends('dashboard.layouts.main')
@push('head')
    <title>Dashboard | Register</title>
@endpush


@section('dynamic-section')
@if (session()->has('Registration'))
  <div class="alert alert-success alert-dismissible fade show mb-5" role="alert">
    <div class="container">
    <strong>{{ session()->get('Registration') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  </div>
  @endif
    <div class="h1 mt-4 text-center mb-5">Register Client</div>
    <form action="{{ route('dashboard.register') }}" method="post" class="row g-3 p-3">
        @csrf
        <div class="col-11 mx-auto">
            <label for="inputAddress2" class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Enter the Client Name" name="Client_Name" value="{{ old('Client_Name') }}">
            <span class="text-danger">
                @error('Client_Name')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="col-11 mx-auto">
            <label for="inputAddress" class="form-label">Phone Number</label>
            <input type="number" class="form-control" placeholder="+__ ___ _______" name="Client_Mobile" value="{{ old('Client_Mobile') }}">
            <span class="text-danger">
              @error('Client_Mobile')
                  {{ $message }}
              @enderror
          </span>
        </div>
        <div class="col-md-5 mx-auto">
            <label for="inputEmail4" class="form-label">Country</label>
            <input type="text" class="form-control" placeholder="Country" name="Client_Country" value="{{ old('Client_Country') }}">
            <span class="text-danger">
              @error('Client_Country')
                  {{ $message }}
              @enderror
          </span>
        </div>
        <div class="col-md-5 mx-auto">
            <label for="inputPassword4" class="form-label">City</label>
            <input type="text" class="form-control" placeholder="City" name="Client_City" value="{{ old('Client_City') }}">
            <span class="text-danger">
              @error('Client_City')
                  {{ $message }}
              @enderror
          </span>
        </div>


        <div class="col-md-5 mx-auto">
            <label for="inputCity" class="form-label">Email</label>
            <input type="email" class="form-control" placeholder="example@gmail.com" name="Client_Email" value="{{ old('Client_Email') }}">
            <span class="text-danger">
              @error('Client_Email')
                  {{ $message }}
              @enderror
          </span>
        </div>
        <div class="col-md-5 mx-auto">
            <label for="inputCity" class="form-label">Password</label>
            <input type="password" class="form-control" placeholder="Set Client Password" name="Client_Password">
            <span class="text-danger">
              @error('Client_Password')
                  {{ $message }}
              @enderror
          </span>
        </div>


        <div class="col-11 mx-auto mt-4">
            <button type="submit" class="btn btn-primary btn-lg">Register Client</button>
        </div>
    </form>
@endsection
