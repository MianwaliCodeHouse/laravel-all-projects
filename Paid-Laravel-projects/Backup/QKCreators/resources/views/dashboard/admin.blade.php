@extends('dashboard.layouts.login')
@push('head')
  <title>Admin Login</title>
@endpush

@section('main-section')
<section class="vh-100">
  @if (session()->has('LoginCheckMessage'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <div class="container">
    <strong>Login Varification Fail!</strong> You should check in on some of those fields below.Because {{ session()->get('LoginCheckMessage') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  </div>
  @endif
  <div class="container p-5">   
    <div class="row">
      <div class="col-md-6 text-black pt-5">

        <div class="px-5 ms-xl-4">
          
          <div class="h1 fw-bold mb-0 text-info">QKCreators</div>
        </div>

        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

          <form action="{{ route('dashboard.admin.login') }}" method="post" style="width: 23rem;">
            @csrf
            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Admin Login</h3>

            <div class="form-floating mb-4">
              <input type="text" id="form2Example18" class="form-control form-control-lg"  placeholder="p" name="name"/>
              <label class="form-label" for="form2Example18">User Name</label>
              <span class="text-danger">
              @error('name')
                {{ $message }}
              @enderror
            </span>
            </div>

            <div class="form-floating mb-4">
              <input type="password" id="form2Example28" class="form-control form-control-lg" placeholder="p" name="password"/>
              <label class="form-label" for="form2Example28">Password</label>
              <span class="text-danger">
                @error('password')
                  {{ $message }}
                @enderror
              </span>
            </div>

            <div class="pt-1 mb-4">
              <button class="btn btn-info btn-lg btn-block fw-bold">Login</button>
            </div>

            

          </form>

        </div>

      </div>
      <div class="col-sm-6 px-0 d-none d-md-block">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img3.webp"
          alt="Login image" class="w-100 h-75" style="object-fit: cover; object-position: left;">
      </div>
    </div>
  </div>
</section>
@endsection