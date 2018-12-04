@extends('home1')

@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Create new book</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{route('book.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>title</label>
                        <input type="text" name="title" class="form-control"/>
                        @if($errors->has('title'))
                            <p class="help is-danger" style="color: red;">{{ $errors->first('title') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>descriptron</label>
                        <textarea name="descriptron" class="form-control"></textarea>
                        @if($errors->has('descriptron'))
                            <p class="help is-danger" style="color: red;">{{ $errors->first('descriptron') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>content</label>
                        <input type="text" name="content" class="form-control">
                        @if($errors->has('content'))
                            <p class="help is-danger" style="color: red;">{{ $errors->first('content') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>image</label>
                        <input type="file" name="image" class="form-control-file">
                        @if($errors->has('image'))
                            <p class="help is-danger" style="color: red;">{{ $errors->first('image') }}</p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection