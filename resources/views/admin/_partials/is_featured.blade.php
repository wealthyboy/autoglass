<div class="form-check form-switch">
    <input class="form-check-input" name="is_featured" value="1" {{ isset($model) && $model->is_featured ?  'checked' : '' }} type="checkbox" id="is_featured">
    <label class="form-check-label" for="is_featured">Featured</label>
</div>

<div class="form-check form-switch">
    <input class="form-check-input" name="in_stock" value="1" {{ isset($model) && $model->in_stock ?  'checked' : '' }} type="checkbox" id="in_stock">
    <label class="form-check-label" for="in_stock">In Stock</label>
</div>