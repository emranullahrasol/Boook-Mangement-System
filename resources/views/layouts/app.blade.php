<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
          <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <span class="fs-4">Book Mangement System (B M S)</span>
          </a>
    
          <ul class="nav nav-pills">
            <li class="nav-item"><a href="{{route('book.index')}}" class="nav-link @if($page == 'All Book List') active @endif">Home</a></li>
            <li class="nav-item"><a href="{{route('book.create')}}" class="nav-link  @if($page == 'Add New Book') active @endif">Add Book</a></li>
            <li class="nav-item"><a href="#" class="nav-link  @if($page == '') active @endif">About</a></li>
          </ul>
        </header>
      </div>
    @yield('content')
</body>
</html>