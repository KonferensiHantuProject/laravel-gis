@extends('layouts.main')

@section('container')

<h1 class="text-center">List of Saved Location</h1>

{{-- Button --}}
<div class="text-end">
    <a href="/map/location" class="mt-3 btn btn-primary">Back to Form</a>
</div>

<table class="table table-stripped text-white mt-3 text-center">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Location Name</th>
        <th scope="col">Saved Date</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($locations as $location)
      <tr>
        <th scope="row">{{ $location->id }}</th>
        <td>{{ $location->location }}</td>
        <td>{{ \App\Helpers\DateHelper::toDay($location->created_at) }}</td>
        <td>
            <a href="#" class="btn btn-warning text-white">Update</a>
            <a href="#" class="btn btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

@endsection