@extends("layouts.app")
@section("content")

<h4 class="text-center bg-info text-white p-1 my-2 w-75 mx-auto">{{$page}}</h4>
@if(Session::has('success'))
<div class="alert alert-success w-75 mx-auto">
    {{Session::get('success')}}
</div>
@endif
<form action="{{route('book.update', ['book' => $book->id])}}" method="post" class=" form">
    @csrf
    @method("PUT")
    <div class="form-inputs">
        <div class="form-input">
            <label for="book_name">Book Name</label>
            <input type="text" placeholder="Enter book name..." value="{{$book->name}}" name="book_name" id="book_name" class="form-control">
            @error('book_name')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        
        <div class="form-input">
            <label for="book_author">Book Author</label>
            <input type="text" placeholder="Enter book author" value="{{$book->author}}" name="book_author" id="book_author" class="form-control">
            @error('book_author')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        
        <div class="form-input">
            <label for="book_img">Book Image</label>
            <input type="file" name="book_img" id="book_img" class="form-control">
            @error('book_img')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-input">
            <label for="book_author">Book Genre</label>
            <input type="text" placeholder="Enter book genre" value="{{$book->genre}}" name="book_genre" id="book_genre" class="form-control">
            @error('book_genre')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-input">
            <label for="book_published">Book Published</label>
            <input type="text" placeholder="Enter book genre" value="{{$book->published}}" name="book_published" id="book_published" class="form-control">
            @error('book_published')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        
        <div class="form-input">
            <label for="book_description">Book Description:</label>
            <textarea name="book_description" id="book_description" class="form-control">{{$book->description}}</textarea>
            @error('book_description')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button class="btn btn-success" type="submit">Update The Book</button>
    </div>
</form>

@endsection