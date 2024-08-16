@extends('layouts.app')

@section('content')
<h1 class="text-dark text-center">Create Contact</h1>

<form action="{{ route('contacts.store') }}" method="POST" class="mx-auto mt-4" style="max-width: 500px;">
     @csrf
     <div class="mb-3">
          <label for="name">Name:</label>
          <input class="form-control mt-2" type="text" name="name" id="name" value="{{ old('name') }}">
          @error('name')<span class="text-danger">{{ $message }}</span>@enderror
     </div>
     <div class="mb-3">
          <label for="email">Email:</label>
          <input class="form-control mt-2" type="email" name="email" id="email" value="{{ old('email') }}">
          @error('email')<span class="text-danger">{{ $message }}</span>@enderror
     </div>
     <div class="mb-3">
          <label for="phone">Phone:</label>
          <input class="form-control mt-2" type="text" name="phone" id="phone" value="{{ old('phone') }}">
          @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
     </div>
     <div class="mb-3">
          <label for="address">Address:</label>
          <textarea class="form-control mt-2" style="resize: none; min-height: 90px;" name="address"
               id="address">{{ old('address') }}</textarea>
          @error('address')<span class="text-danger">{{ $message }}</span>@enderror
     </div>
     <button class="btn btn-primary mt-2" style="min-width: 150px;" type="submit">Save</button>
</form>

@if (session('success'))
<div class="text-success mx-auto mt-4 h5" style="max-width: 500px;">
     {{ session('success') }}
     <a class=" text-primary text-decoration-none d-block mt-2 h5" href="{{ route('contacts.index') }}">Back to List</a>
</div>
@endif

@endsection