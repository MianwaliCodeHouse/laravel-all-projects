<!-- resources/views/events/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Event</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('events.store') }}">
                            @csrf
                            <!-- Event details input fields -->
                            <div class="form-group">
                                <label for="title">Event Title</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                            <!-- Date, time, and other event attributes -->
                            <!-- Add a field for the Google Meet link if needed -->
                            <button type="submit" class="btn btn-primary">Create Event</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
