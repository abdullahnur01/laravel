@extends('layouts.app')

@section('content')
<h1 class="text-dark text-center mb-4">Contact Details</h1>

<table class="table table-bordered">
     <tr>
          <td><strong>Name :</strong></td>
          <td>{{ $contact->name }}</td>
     </tr>
     <tr>
          <td><strong>Email :</strong></td>
          <td>{{ $contact->email }}</td>
     </tr>
     <tr>
          <td><strong>Phone :</strong></td>
          <td> {{ $contact->phone }} </td>
     </tr>
     <tr>
          <td><strong>Address :</strong></td>
          <td>{{ $contact->address }}</td>
     </tr>
     <tr>
          <td><strong>Created at :</strong></td>
          <td>{{ $contact->created_at }}</td>
     </tr>
     <tr>
          <td><strong>Updated at :</strong></td>
          <td>{{ $contact->updated_at }}</td>
     </tr>
</table>

<a class="btn btn-primary mt-4" href="{{ route('contacts.index') }}">Back to List</a>
@endsection