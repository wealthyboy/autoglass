@extends('admin.layouts.app')
@section('content')
<div class="row">
   @include('admin._partials.t', ['models' => $appointments, 'name' => 'Appointment'])
</div>
@endsection
@section('page-scripts')
<script src="{{ asset('backend/products.js') }}"></script>
@stop
@section('inline-scripts')
@stop