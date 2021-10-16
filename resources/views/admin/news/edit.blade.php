@extends('admin.layouts.main');

@section('content')
    <h1 style="font-family: 'Rubik', sans-serif; font-size: 30px;" >Sửa bài viết</h1>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <form action="" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="">Title</label>
                <input name="title" style="" type="text" class="form-control" value="{{$news->title}}">
            </div>
            <div class="form-group">
                <label for="">Ảnh bài viết</label>
                <input name="image" style="" type="file" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Content</label>
                <textarea id="editor1" name="content" style="" type="text" class="form-control">{{$news->content}}</textarea>
            </div>
            <button
                class="btn btn-success" type="submit"
                style="width: 200px;"
            >Lưu
            </button>

        </form>
    </form>
@endsection
