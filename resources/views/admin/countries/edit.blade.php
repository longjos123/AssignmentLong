@extends('admin.layouts.main');

@section('content')

    <div class="row">
        <div class="col-6">
            <h1 style="font-family: 'Rubik', sans-serif; font-size: 30px;" >Sửa khách sạn</h1>
            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Tên</label>
                    <input class="form-control" name="name" value="{{$country->name}}">
                </div>
                <button type="submit" class="btn btn-success">Lưu</button>
                <a href="{{route('countries.index')}}" class="btn btn-danger">Hủy</a>
            </form>
        </div>
    </div>
@endsection
