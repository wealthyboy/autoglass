@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-dark shadow text-center border-radius-xl mt-n4 me-3 float-start">
                    <i class="material-symbols-outlined">filter_alt</i>
                </div>
                <h6 class="mb-0">Add Shipping</h6>
            </div>
            <div class="card-body pt-0">
                <form action="{{ route('shipping.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row mt-3">
                        <div class="col-sm-12 col-12">
                            <div class="input-group input-group-outline">
                                <label class="form-label"> Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-12 col-12">
                            <div class="input-group input-group-outline">
                                <label class="form-label"> Price</label>
                                <input type="text" class="form-control" name="price">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="">
                            <div class="row mt-3">
                                <div class="col-sm-12 col-12">
                                    <div class="input-group input-group-outline">
                                        <label class="form-label mt-4 ms-0"> </label>
                                        <select required class="form-control" name="location_id" id="">
                                            <option value="">--Choose Type--</option>
                                            @foreach($locations as $location)
                                            <option class="" value="{{ $location->id }}">{{ $location->name }} </option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="">
                            <div class="row mt-3">
                                <div class="col-sm-12 col-12">
                                    <div class="input-group input-group-outline">
                                        <label class="form-label mt-4 ms-0"> </label>
                                        <select class="form-control" name="parent_id" id="">
                                            <option value="">--Choose Type--</option>
                                            @foreach($shippings as $shipping)
                                            <option class="" value="{{ $shipping->id }}">{{ $shipping->name }} </option>
                                            @include('includes.children_options',['obj'=>$shipping,'disabled' => true,'space'=>'&nbsp;&nbsp;'])
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" name="button" class="btn bg-gradient-dark m-0 ms-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-5">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-dark shadow text-center border-radius-xl mt-n4 me-3 float-start">
                    <i class="material-symbols-outlined">list</i>
                </div>
                <h6 class="mb-0">Shipping</h6>
            </div>

            <div class="d-flex justify-content-between p-2">
                <div class="parent" value="">
                    <div class="form-check ">
                        <label class="custom-control-label" for="delete">
                            <input class="form-check-input" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" type="checkbox" id="delete" name="optionsCheckboxes">
                            <span role="button" class="mt-4">Select All</span>
                        </label>
                    </div>
                </div>

                <div class="mr-3">
                    <a href="javascript:void(0)" onclick="confirm('Are you sure?') ? $('#form-attributes').submit() : false;" rel="tooltip" title="Remove" class="btn btn-outline-primary btn-sm mb-0">
                        <i class="material-icons"></i> Delete
                    </a>
                </div>
            </div>
            <div class="clearfix"></div>

            <form action="{{ route('shipping.destroy',['shipping'=>1]) }}" method="post" enctype="multipart/form-data" id="form-attributes">
                @csrf
                @method('DELETE')
                <div class="material-datatables">
                    <div class="well well-sm pb-5" style="height: 350px; background-color: #fff; color: black; overflow: auto;">
                        @foreach($shippings as $shipping)
                        <div class="parent" value="{{ $shipping->id }}">
                            <div class="form-check ">
                                <label class="custom-control-label" for="{{ optional($shipping->location)->name }}">
                                    <input class="form-check-input" value="{{ $shipping->id }}" type="checkbox" id="{{ optional($shipping->location)->name }}" name="selected[]">
                                    <span role="button">{{ optional($shipping->location)->name }} | {{ $shipping->price }} </span>
                                    <a href="{{ route('shipping.edit',['shipping'=>$shipping->id]) }}">
                                        <i class="fa fa-pencil"></i> Edit</a>
                                </label>
                            </div>
                            @include('includes.children',['obj'=>$shipping,'space'=>'&nbsp;&nbsp;','model' => 'shipping','url' => 'shipping'])
                        </div>
                        @endforeach
                    </div>
                </div>
            </form>
        </div><!--  end card  -->
    </div>
</div>
@endsection
@section('inline-scripts')
var parent_id = document.getElementById('parent_id');
setTimeout(function () {
const example = new Choices(parent_id);
}, 1);

@stop