@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between p-3 pt-2">
            <div>
                <div class="icon icon-lg icon-shape bg-gradient-dark shadow text-center border-radius-xl mt-n4 me-3 float-start">
                    <i class="material-symbols-outlined">filter_alt</i>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card-body">
                    <div class="border-bottom  mb-2"><h4>Contact Details</h4></div>
                    <ul>
                        <li><b>First Name:</b> {{$appointment->first_name}}</li>
                        <li><b>Last Name:</b> {{$appointment->last_name}}</li>
                        <li><b>Email:</b> {{$appointment->email}}</li>
                        <li><b>Phone Number:</b> {{$appointment->phone_number}}</li>
                        <li><b>Make:</b> {{$appointment->make}}</li>
                        <li><b>Model:</b> {{$appointment->model}}</li>
                        <li><b>Year:</b> {{$appointment->year}}</li>
                        <li><b>Comment:</b> {{$appointment->comment}}</li>

                    </ul>
                </div>
            </div>
            <div class="col-6">
                <div class="card-body">
                <div class="border-bottom mb-2" ><h4>Fix Details</h4></div>

                    <div class="image-container mb-3">
                        <img src="{{ optional($appointment->parent_category)->image }}" alt="First Image" class="img-fluid">
                        <p class="mt-2">{{ optional($appointment->parent_category)->name }}</p>
                    </div>

                    @if($appointment->child_category)
                    <div class="image-container">
                        <img src="{{ optional($appointment->child_category)->image }}" alt="Second Image" class="img-fluid">
                        <p class="mt-2">{{ optional($appointment->child_category)->name }}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-scripts')
<script src="{{ asset('backend/products.js') }}"></script>
@stop
@section('inline-scripts')
@stop
