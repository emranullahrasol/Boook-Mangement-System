@extends("layouts.app")

@section("content")

@if(Session::has('success'))
<div class="alert alert-danger w-75 mx-auto">
    {{Session::get('success')}}
</div>
@endif
    
    <div class="card w-75 mt-5 mx-auto p-3">
        <h4 class="text-center bg-primary text-white p-1 my-2">{{$page}}</h4>
            <table class="table table-light text-center table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Published Year</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                    <tr>
                        <td>{{$book->id}}</td>
                        <td><img src="{{asset('upload/pic-4.jpg')}}" class="book--icon" alt=""></td>
                        <td>{{$book->name}}</td>
                        <td>{{$book->author}}</td>
                        <td>{{$book->genre}}</td>
                        <td>{{$book->published}}</td>
                        <td>{{$book->description}}</td>
                        <td>
                            <a href="{{route('book.edit', ['book' => $book->id])}}"><i class="fas fa-edit"></i></a> | <a href="{{route('delete', ['id' => $book->id])}}"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$books->links()}}
        </div>

@endsection