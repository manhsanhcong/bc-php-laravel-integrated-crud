@extends('home1')

@section('content')
    <div class="col-12 col-md-12" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
        <div class="row">
            <div class="col-12">
                <h1>Cập nhật Book</h1>
            </div>
            <div class="col-12">
                <form method="post" action="" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="<?php echo $book->id; ?>"/>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" value="<?php echo $book->title; ?>"
                               class="form-control"/>
                        @if($errors->has('title'))
                            <p class="help is-danger" style="color: red;">{{ $errors->first('title') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Descriptron</label>
                        <textarea name="descriptron" class="form-control"><?php echo $book->descriptron; ?></textarea>
                        @if($errors->has('descriptron'))
                            <p class="help is-danger" style="color: red;">{{ $errors->first('descriptron') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" class="form-control"><?php echo $book->content; ?></textarea>
                        @if($errors->has('content'))
                            <p class="help is-danger" style="color: red;">{{ $errors->first('content') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" value="<?php echo $book->image;?>"class="form-control-file"/>
                        @if($errors->has('image'))
                            <p class="help is-danger" style="color: red;">{{ $errors->first('image') }}</p>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>
            </div>
        </div>
    </div>
@endsection