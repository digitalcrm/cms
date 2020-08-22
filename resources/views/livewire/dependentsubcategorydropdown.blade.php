
<div class="form-group">
    <label for="category_id">Category</label>
    <select class="form-control @error('category_id') is-invalid @enderror"
            wire:model="category"
            name="category_id"
            id="category">
        <option value="0">Select Category</option>
        @foreach ($categories as $cat)
        <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
    </select>
    @error('category_id')
    <small class="form-text text-red">{{ $message }}</small>
    @enderror
</div>

{{-- <div class="form-group">
    <label for="subcategory_id">SubCategory</label>
    <select class="form-control"
            wire:model="subcategory"
            name="subcategory_id"
            id="subcategory_id">
        <option value="0">select subcategory</option>
        @foreach ($subcategories as $subcat)
        <option value="{{$subcat->id}}">{{$subcat->name}}</option>
        @endforeach
    </select>

</div> --}}

