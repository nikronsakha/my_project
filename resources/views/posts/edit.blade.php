@extends('layots.main')
@section('content')
    <div>
        <form action="{{ route('post.update', $post->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="title"
                       value="{{$post->title}}">
            </div>

            <div class="mb-3">
                <label for="content">Content</label>
                <textarea class="form-control" name="content" placeholder="content">{{$post->content}}</textarea>
            </div>

            <div class="mb-3">
                <label for="image">image</label>
                <input type="text" class="form-control" name="image" id="image" placeholder="image"
                       value="{{$post->image}}">
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category_id">
                    @foreach($categories as $category)
                        <option
                                {{ $category->id === $post->category-> id ? 'selected' : ''}}
                                value="{{$category->id }}">{{ $category -> title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tag_id">Tags</label>
                <select multiple class="form-control" id="tag_id" name="tag_id[]">
                    @foreach($tags as $tag)
                        <option
                                @foreach($post -> tags as $PostTag  )
                                    {{$tag->id === $PostTag -> id ? 'selected' : ''}}
                                @endforeach
                                value={{$tag->id}}>{{ $tag->title }}</option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection