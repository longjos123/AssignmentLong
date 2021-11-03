@extends('admin.layouts.main');

@section('content')
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Fullname</label>
            <input name="fullname"  type="text" class="form-control" value="{{$user->fullname}}">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input name="email"  type="email" class="form-control" value="{{$user->email}}">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input name="password"  type="password" class="form-control" value="{{$user->password}}">
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input name="phone_number"  type="text" class="form-control" value="{{$user->phone_number}}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">Giới tính</label>
                    <select name="gender" style="" class="form-control">
                        <option value="{{$user->gender}}">--{{($user->gender == 1)?'Nam':'Nữ'}}--</option>
                        <option value="1">--Nam--</option>
                        <option value="0">--Nữ--</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="">Ngày sinh</label>
            <input name="birth_date"  type="date" class="form-control" value="{{$user->birth_date}}">
        </div>
        <div class="form-group">
            <label for="">Địa chỉ</label>
            <input name="address"  type="text" class="form-control" value="{{$user->address}}">
        </div>
        <div class="form-group">
            <label for="">Avatar</label>
            <input name="image"  type="file" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Chức năng</label>
            <select name="role" style="" class="form-control">
                <option value="{{$user->role}}">--{{($user->role == 1)?'Admin':'Customer'}}--</option>
                <option value="1">--Admin--</option>
                <option value="0">--Customer--</option>
            </select>
        </div>
        <button
            class="btn btn-success" type="submit"
            style="width: 200px;"
        >Lưu
        </button>
    </form>
@endsection
