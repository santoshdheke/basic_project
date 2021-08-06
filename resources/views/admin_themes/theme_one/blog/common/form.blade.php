<div class="form-group">
    <label for="">{{ $title }} Category</label>
        @php($oldCategoryId = old('category_id') ?? $row->category_id ?? '')
    <select name="category_id" class="form-control col-md-7 {{ $errors->has('category_id')?'is-invalid':'' }}">
        <option value="">Choose Category</option>
        @if(isset($categories) && count($categories)>0)
            @foreach($categories as $category)
        <option {{ $oldCategoryId == $category->id ? 'selected':'' }} value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
            @endif
    </select>
    @if($errors->has('category_id'))
        <code>{{ $errors->first('category_id') }}</code>
    @endif
</div>

<div class="form-group">
    <label for="">Title</label>
    <input type="text" class="form-control col-md-7 {{ $errors->has('title')?'is-invalid':'' }}" placeholder="Enter Title" name="title" value="{{ old('title') ?? $row->title ?? '' }}">
    @if($errors->has('title'))
        <code>{{ $errors->first('title') }}</code>
    @endif
</div>

<div class="form-group">
    <label for="">Description</label>
    <textarea class="form-control col-md-7 {{ $errors->has('description')?'is-invalid':'' }}" placeholder="Enter Description" name="description">{{ old('description') ?? $row->description ?? '' }}</textarea>
    @if($errors->has('description'))
        <code>{{ $errors->first('description') }}</code>
    @endif
</div>

@if(isset($row->image))
<div class="form-group">
    <label for="">Old Image</label>
    <br>
    <img src="{{ $row->image }}" alt="" width="100px">
</div>
@endif

<div class="form-group">
    <label for="">Image</label>
    <br>
    <input type="file" name="image">
    <br>
    @if($errors->has('image'))
        <code>{{ $errors->first('image') }}</code>
    @endif
    <p>Note: The file must be less than 2MB</p>
</div>