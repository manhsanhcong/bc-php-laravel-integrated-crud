@extends('home1')

@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12"><h1>My Book</h1></div>
            <div class="col-6">
                <form class="navbar-form navbar-right" action="{{ route('book.search') }}" method="get">
                    @csrf
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <input type="text" class="form-control" name="keyword" placeholder="Search">
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-default">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Descriptron</th>
                    <th scope="col">Content</th>
                    <th scope="col">Image</th>
                </tr>
                </thead>
                @if(count($books) == 0)
                    <tr>
                        <td colspan="4">Không có dữ liệu</td>
                    </tr>
                @else
                    @foreach($books as $key => $book)
                        <tr>
                            <th scope="row"{{++$key}}></th>
                            <td>{{$book->title}}</td>
                            <td>{{$book->descriptron}}</td>
                            <td>{{$book->content}}</td>
                            <td><img src="{{'/upload/images/' . $book->image}}" style="height:200px" , width=200px></td>

                            <td><a href="{{ route('book.edit', $book->id) }}">sửa</a></td>
                            <td><a href="{{ route('book.destroy', $book->id) }}" class="text-danger"
                                   onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                        </tr>
                    @endforeach
                @endif
            </table>
            <div>
                <a class="btn btn-primary" href="{{ route('book.create') }}">Thêm mới</a>
                <a class="btn btn-primary" href="{{route('book.index')}}">Cancel</a>
            </div>
        </div>
        <div class="col-6">
            <div class="pagination float-right">
                {{ $books->appends(request()->query()) }}
            </div>
        </div>
    </div>
    </div>
@endsection