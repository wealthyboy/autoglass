@foreach($attribute->children as $product_attribute)
<option class="product_attribute" {{ isset($disabled) ? 'disabled' : '' }} value="{{ $product_attribute->id }}">&nbsp;&nbsp;&nbsp;{{ $product_attribute->name }} </option>
@include('includes.product_attr',['attribute'=>$product_attribute])
@endforeach