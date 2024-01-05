@extends('layots.main')
@section('content')
    <div>
        <form action="{{ route('post.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title">Title</label>
                <input value="{{old('title')}}" type="text" name="title" class="form-control" id="title"
                       placeholder="title">
                @error('title')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content">Content</label>
                <textarea class="form-control" name="content"
                          placeholder="content">{{old('content')}}</textarea>
                @error('content')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image">image</label>
                <input value="{{old('image')}}" type="text" class="form-control" name="image" id="image"
                       placeholder="image">
                @error('image')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>


            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category_id">
                    @foreach($categories as $category)

                        <option value="{{$category->id }}">{{ $category -> title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tag_id">Tags</label>
                <select multiple class="form-control" id="tag_id" name="tag_id[]">
                    @foreach($tags as $tag)
                        <option value={{$tag->id}}>{{ $tag->title }}</option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection