
<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <div class="col-md-2 bg-dark text-light py-4">
      <h2 class="text-center mb-5">Dashboard</h2>
      <a href="#" class="nav-link text-black py-2 px-4 bg-white bg-opacity-75 rounded mb-3">Home</a>
      
      <a href="{{ route('client.request.form') }}" class="nav-link text-black py-2 px-4 bg-white bg-opacity-75 rounded mb-3">Create Request</a>
      <a href="#" class="nav-link text-black py-2 px-4 bg-white bg-opacity-75 rounded mb-3">Check Request</a>
      <a href="#" class="nav-link text-black py-2 px-4 bg-white bg-opacity-75 rounded mb-3">Check Quotes</a>
      
      <a href="{{ route('client.logout') }}" class="nav-link text-white fw-bold py-2 px-4 bg-danger rounded mb-3">Logout</a>
      
    </div>
    <!-- Main Content Area -->
    <div class="col-md-10 py-4 overflow-auto vh-100">
      @yield('dynamic-section')
    </div>
  </div>
</div>


