@extends('admin.layouts.app')
@section('content')
<div class="row">
   @include('admin.errors.errors')

   <div class="col-md-7">
      <div class="card">
         <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-dark shadow text-center border-radius-xl mt-n4 me-3 float-start">
               <i class="material-symbols-outlined">list</i>
            </div>
            <h6 class="mb-0">Edit </h6>
         </div>
         <div class="card-body pt-0">
            <form action="{{ route('category.update',['category' => $cat->id ]) }}" method="post">
               @csrf
               @method('PATCH')
               <div class="row">
                  <div class="col-sm-12 col-12">
                     <div class="input-group input-group-outline">
                        <label class="form-label"> Name</label>
                        <input class="form-control" name="name" type="text" value="{{ $cat->name }}" required="true" />
                     </div>
                  </div>
               </div>
               <div class="row mt-3">
                  <div class="col-sm-12 col-12">
                     <div class="input-group input-group-outline">
                        <label class="form-label"> Sort order</label>
                        <input class="form-control" name="sort_order" type="text" value="{{ $cat->sort_order }}" />
                     </div>
                  </div>
               </div>
             
             
              
               <div class="row mt-3">
                  <div class="col-sm-12 col-12">
                     <div class="input-group input-group-outline">
                        <label class="form-label">Description</label>
                        <textarea type="text" class="form-control" name="description" rows="8">{{ $cat->description }}</textarea>
                     </div>
                  </div>
               </div>
               <div class="row mt-3">
                  <div class="col-sm-12 col-12">
                     <div class="input-group input-group-outline">
                        <label class="form-label mt-4 ms-0"> </label>
                        <select class="form-control" name="parent_id" id="">
                           <option value="">--Choose Parent--</option>
                           @foreach($categories as $category)
                           @if($cat->parent_id == $category->id )
                           <option class="" value="{{ $category->id }}" selected="selected">{{ $category->name }} </option>
                           @include('includes.children_options',['obj'=>$category,'space'=>'&nbsp;&nbsp;'])
                           @else
                           <option class="" value="{{ $category->id }}">{{ $category->name }} </option>
                           @include('includes.children_options',['model' => $cat,'obj'=>$category,'space'=>'&nbsp;&nbsp;'])
                           @endif
                           @endforeach
                        </select>
                     </div>
                  </div>
               </div>

               <div class="row mt-3">
                  <div class="col-sm-12 col-12">
                     <div class="input-group input-group-outline">
                        <label class="form-label mt-4 ms-0"> </label> {{$category}}
                        <select class="form-control" name="is_repairable" id="">
                           <option value=""  {{ $category->is_repaiarable == 0 ? 'selected' : '' }}>--Is repairable--</option>
                           <option  {{ $category->is_repaiarable == 1 ? 'selected' : '' }}  value="1">Yes</option>
                        </select>
                     </div>
                  </div>
               </div>

          
               @include('admin._partials.single_image',['model' => $cat])


               <div class="d-flex justify-content-end mt-4">
                  <button type="submit" name="button" class="btn bg-gradient-dark m-0 ms-2">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection

@section('page-scripts')
<script src="{{ asset('backend/products.js') }}"></script>
@stop

@section('inline-scripts')


@include('admin._partials.image_js',['folder' => 'category'])

@stop