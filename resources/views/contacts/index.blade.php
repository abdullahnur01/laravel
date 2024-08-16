@extends('layouts.app')

@section('content')

<a class="text-dark text-center text-decoration-none" href="{{ route('contacts.index') }}">
     <h1>Contacts</h1>
</a>

<div class="d-flex justify-content-between py-4">
     <a class="btn btn-primary" href="{{ route('contacts.create') }}">Create New Contact</a>
     <form class="d-flex" method="GET" action="{{ route('contacts.index') }}">
          <input class="form-control me-2" type="text" name="search" placeholder="Search by name or email"
               value="{{ request('search') }}" required>
          <button class="btn btn-secondary" type="submit">Search</button>
     </form>
     <div class="dropdown-center">
          <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
               Sort Data
          </button>
          <ul class="dropdown-menu">
               <li><a class="dropdown-item" href="{{ route('contacts.index', ['sort' => 'name']) }}">Sort by Name</a>
               </li>
               <li><a class="dropdown-item" href="{{ route('contacts.index', ['sort' => 'created_at']) }}">Sort by
                         Date</a></li>
          </ul>
     </div>
</div>

@if (session('success'))
<div class="text-success text-center h5">
     {{ session('success') }}
</div>
@endif

<table class="table table-bordered mt-3">
     <thead class="table-dark dropdown-menu-light">
          <tr>
               <th></th>
               <th>Name</th>
               <th>Email</th>
               <th>Created at</th>
               <th>Actions</th>
          </tr>
     </thead>
     <tbody>
          @foreach ($contacts as $contact)
          <tr>
               <td>{{ $contact->id }}</td>
               <td>{{ $contact->name }}</td>
               <td>{{ $contact->email }}</td>
               <td>{{ $contact->created_at }}</td>
               <td>
                    <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-sm btn-primary">View</a>
                    <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-sm btn-warning mx-1">Edit</a>
                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                         @csrf
                         @method('DELETE')
                         <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
               </td>
          </tr>
          @endforeach
     </tbody>
</table>
<p class="text-center h5">
     @if (count($contacts) > 0)
     Total {{ count($contacts) }} {{ count($contacts) > 1 ? 'records' : 'record' }} found
     @else
     No record found
     @endif
</p>

@endsection