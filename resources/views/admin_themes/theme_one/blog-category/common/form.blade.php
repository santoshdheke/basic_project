<div class="form-group">
    <label for="">Title</label>
    <input type="text" class="form-control col-md-7 {{ $errors->has('title')?'is-invalid':'' }}" placeholder="Enter Title" name="title" value="{{ old('title') ?? $row->title ?? '' }}">
    @if($errors->has('title'))
        <code>{{ $errors->first('title') }}</code>
    @endif
</div>
