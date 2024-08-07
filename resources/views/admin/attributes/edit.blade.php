@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-dark shadow text-center border-radius-xl mt-n4 me-3 float-start">
                    <i class="material-symbols-outlined">filter_alt</i>
                </div>
                <h6 class="mb-0">Add Attributes</h6>
            </div>
            <div class="card-body pt-0">
                <form id="" action="{{ route('attributes.update',['attribute'=>$attr->id]) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-sm-12 col-12">
                            <div class="input-group input-group-outline">
                                <label class="form-label"> Name</label>
                                <input type="text" class="form-control" value="{{ $attr->name }}" required="true" name="name">
                            </div>
                        </div>
                    </div>


                    <div class="row mt-3">
                        <div class="col-sm-12 col-12">
                            <div class="input-group input-group-outline">
                                <label class="form-label mt-4 ms-0"> </label>
                                <select class="form-control" name="parent_id" id="">
                                    <option value="">--Choose Parent--</option>
                                    @foreach($attributes as $attribute)
                                    @if($attr->parent_id == $attribute->id)
                                    <option value="{{ $attribute->id }}" selected="selected">{{ $attribute->name }} </option>
                                    @else
                                    <option class="" value="{{ $attribute->id }}">{{ $attribute->name }} </option>
                                    @include('includes.product_attr',['attribute'=>$attribute])
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="row mt-3">
                        <div class="col-sm-12 col-12">
                            <div class="input-group input-group-outline">
                                <label class="form-label mt-4 ms-0"> </label>
                                <select class="form-control" name="type" id="">
                                    <option required value="">--Choose Type--</option>
                                    @foreach($types as $type)
                                    <option class="" value="{{ $type }}" {{ $attr->type == $type ? 'selected' : null}}>{{ $type }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="bor my-3">
                                <div class="form-check p-0">
                                    <label class="custom-control-label" for="w">
                                        <input onclick="$('input[name*=\'years\']').prop('checked', this.checked)" class="form-check-input" value="" id="w" type="checkbox" name="">
                                        <span role="button" class="fw-bold">Years</span>
                                    </label>
                                </div>
                            </div>

                            <div class="well well-sm pb-5 border" style="height: 300px; background-color: #fff; color: black; overflow: auto;">
                                @foreach($helper->years() as $year)
                                <div class="parent" value="">
                                    <div class="form-check ">
                                        <label class="custom-control-label" for="{{ $year }}">
                                            <input class="form-check-input" value="{{ $year }}" id="{{ $year }}" {{  in_array($year, $years) ? 'checked' : '' }} type="checkbox" name="years[]">
                                            <span role="button" class="mt-4">{{ $year }}</span>
                                        </label>
                                    </div>
                                </div>
                                @endforeach
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

</div>
@endsection
@section('inline-scripts')
@stop