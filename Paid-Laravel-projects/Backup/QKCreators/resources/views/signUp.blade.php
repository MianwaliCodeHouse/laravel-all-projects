@extends('layouts.main')
@push('head')
    <title>Login Page</title>
@endpush
@section('main-section')

<div class="row mt-5">
<div class="col-10 col-md-6 col-sm-9 mx-auto card mt-5">
    <div class="card-body">
        <h1 class="text-center mt-3">SignUp</h1>
        <p class="text-center mb-5">Please fill up the Registeration Form Carefully</p>
        <form action="" method="post">
          <div class="row g-2 mb-3">
            <div class="col-md">
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingInputGrid" placeholder="name@example.com" value="">
                <label for="floatingInputGrid">Name</label>
              </div>
            </div>
            <div class="col-md">
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingInputGrid" placeholder="name@example.com" value="">
                <label for="floatingInputGrid">City</label>
              </div>
            </div>
          </div>
          <div class="row g-2 mb-3">
            <div class="col-md">
              <div class="form-floating">
                <input type="email" class="form-control" id="floatingInputGrid" placeholder="name@example.com" value="mdo@example.com">
                <label for="floatingInputGrid">Email address</label>
              </div>
            </div>
            <div class="col-md">
              <div class="form-floating">
                <select class="form-select" id="floatingSelectGrid">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
                <label for="floatingSelectGrid">Works with selects</label>
              </div>
            </div>
          </div>
            
              <button class="btn btn-primary btn-lg mx-auto d-block mt-4">Login</button>
              <a href="{{ route('client.login.page') }}" class="d-block mt-5">Have an account?Login</a>
        </form>
    </div>
</div>
</div>
@endsection
