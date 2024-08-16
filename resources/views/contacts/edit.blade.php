@extends('layouts.app')

@section('content')
<h1 class="text-dark text-center">Edit Contact</h1>

<form action="{{ route('contacts.update', $contact->id) }}" method="POST" class="mx-auto mt-4"
     style="max-width: 500px;">
     @csrf
     @method('PUT')

     <!-- Hidden fields for original values -->
     <input type="hidden" name="original_name" value="{{ $contact->name }}">
     <input type="hidden" name="original_email" value="{{ $contact->email }}">
     <input type="hidden" name="original_phone" value="{{ $contact->phone }}">
     <input type="hidden" name="original_address" value="{{ $contact->address }}">

     <!-- Fields for editing values -->
     <div class="mb-3">
          <label for="name">Name:</label>
          <input class="form-control mt-2" type="text" name="name" id="name" value="{{ old('name', $contact->name) }}">
          @error('name')<span class="text-danger">{{ $message }}</span>@enderror
     </div>
     <div class="mb-3">
          <label for="email">Email:</label>
          <input class="form-control mt-2" type="email" name="email" id="email"
               value="{{ old('email', $contact->email) }}">
          @error('email')<span class="text-danger">{{ $message }}</span>@enderror
     </div>
     <div class="mb-3">
          <label for="phone">Phone:</label>
          <input class="form-control mt-2" type="text" name="phone" id="phone"
               value="{{ old('phone', $contact->phone) }}">
          @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
     </div>
     <div class="mb-3">
          <label for="address">Address:</label>
          <textarea class="form-control mt-2" style="resize: none; min-height: 90px;" name="address"
               id="address">{{ old('address', $contact->address) }}</textarea>
          @error('address')<span class="text-danger">{{ $message }}</span>@enderror
     </div>
     <button class="btn btn-primary mt-2" style="min-width: 150px;" type="submit">Update</button>
</form>
@if (session('success'))
<div class="text-success mx-auto mt-4 h5" style="max-width: 500px;">
     {{ session('success') }}
     <a class=" text-primary text-decoration-none d-block mt-2 h5" href="{{ route('contacts.index') }}">Back to List</a>
</div>
@endif
@if (session('info'))
<div class="text-warning mx-auto mt-4 h5" style="max-width: 500px;">
     {{ session('info') }}
</div>
@endif
@endsection