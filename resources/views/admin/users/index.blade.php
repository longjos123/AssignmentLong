@extends('admin.layouts.main');

@section('content')
    <h1 style="font-family: 'Rubik', sans-serif; font-size: 30px;" >Quản lí User</h1>
    <table class="table mb-0">
        <thead>
        <tr>
            <th>#</th>
            <th>Avatar</th>
            <th>Tên</th>
            <th>Email</th>
            <th>SDT</th>
            <th>Địa chỉ</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Quyền</th>
            <th>
                <a class="btn btn-primary" style="width: 105px;" data-toggle="modal" data-target="#myModal">Thêm</a>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $key => $user)
            <tr>
                <td>{{$key + 1}}</td>
                <td>
                    <div class="round-img">
                        <a href=""><img width="40" src="{{asset('storage/' .$user->avatar_url)}}" style=""></a>
                    </div>
                </td>
                <td>{{$user->fullname}}</td>
                <td><span>{{$user->email}}</span></td>
                <td><span>{{$user->phone_number}}</span></td>
                <td style="width: 300px;">{{$user->address}}</td>
                <td>{{$user->birth_date}}</td>
                <td>
                    {{($user->gender==1)?'Nam':'Nữ'}}
                </td>
                <td>{{($user->role==1)?'Admin':'Customer'}}</td>
                <td>
                    <a class="btn btn-success" href="{{route('user.edit',['id' => $user->id])}}"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-danger"
                       href="{{route('user.delete',['id' => $user->id])}}"
                       onclick="return confirm('Xác nhận xóa?');"><i class="far fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Đặt tour</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{route('user.add')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Fullname</label>
                            <input name="fullname"  type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input name="email"  type="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input name="password"  type="password" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Số điện thoại</label>
                                    <input name="phone_number"  type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Giới tính</label>
                                    <select name="gender" style="" class="form-control">
                                        <option value="1">--Nam--</option>
                                        <option value="0">--Nữ--</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Ngày sinh</label>
                            <input name="birth_date"  type="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ</label>
                            <input name="address"  type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Avatar</label>
                            <input name="image"  type="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Chức năng</label>
                            <select name="role" style="" class="form-control">
                                <option value="1">--Admin--</option>
                                <option value="0">--Customer--</option>
                            </select>
                        </div>
                        <button
                            onclick="return confirm('Xác nhận thêm!!!');"
                            class="btn btn-success" type="submit"
                            style="width: 765px;"
                        >Lưu
                        </button>
                    </form>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
@endsection
