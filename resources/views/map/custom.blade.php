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
            <a href="#" data-bs-toggle="modal" data-action="{{ route('map.location', ['id'=> $location->id ]) }}" data-bs-target="#detail-map-modal" class="btn btn-primary text-white detail_button">Detail</a>
            <a href="#" data-bs-toggle="modal" data-bs-target="#update-map-modal" class="btn btn-warning text-white">Update</a>
            <a href="#" data-bs-toggle="modal" data-bs-target="#delete-map-modal" class="btn btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>


{{-- Modal Update --}}
@include('map.modals.detail')

@section('script')
  <script src="{{ asset('JS/Map/index.js') }}" defer></script>
@endsection

@endsection