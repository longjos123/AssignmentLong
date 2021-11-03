@extends('admin.layouts.main');

@section('content')
    <h1 style="font-family: 'Rubik', sans-serif; font-size: 30px;" >Tour đã đặt</h1>
    <table class="table mb-0">
        <thead>
        <tr>
            <th>#</th>
            <th>Avatar</th>
            <th>Tên</th>
            <th>Tour</th>
            <th>Số người</th>
            <th>Khách sạn</th>
            <th>Giá tổng</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Trạng thái</th>
            <th>
                <a class="btn btn-primary" style="width: 105px;" data-toggle="modal" data-target="#myModal">Thêm</a>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($userTours as $key => $userTour)
            <tr>
                <td>{{$key + 1}}</td>
                <td>
                    <div class="round-img">
                        <a href=""><img width="40" src="{{asset('storage/'.$userTour->user->avatar_url)}}" style=""></a>
                    </div>
                </td>
                <td>{{$userTour->user->fullname}}</td>
                <td><span>{{$userTour->tour->name}}</span></td>
                <td><span>{{$userTour->num_people}}</span></td>
                <td>{{empty($userTour->hotel->name)?'_':$userTour->hotel->name }}</td>
                <td><span style="font-size: 15px;" class="badge badge-success">${{($userTour->tour->price)*($userTour->num_people)}}</span></td>
                <td>{{$userTour->start_date}}</td>
                <td>{{$userTour->end_date}}</td>

                <td style="color: {{($userTour->status) == 0? '#c13a6b':'green'}}">
                    @if($userTour->confirm_tour == 1)
                        {{($userTour->status) == 0?'Đang xử lí':'Đã duyệt'}}
                    @else
                        Đang xử lí
                    @endif
                </td>
                <td>
                    <a class="btn btn-success" href="{{route('edit-booked-tour',['id' => $userTour->id])}}"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-danger"
                       href="{{route('delete-booked',['id' => $userTour->id])}}"
                       onclick="return confirm('Xác nhận xóa?');"><i class="far fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- The Modal -->
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
                    <form action="{{route('tour_user.add')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="">Tên Tour</label>
                                <select name="tour_id" style="" class="form-control">
                                    <option>--Tour--</option>
                                    @foreach($tours as $tour)
                                        <option value="{{$tour->id}}">{{$tour->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Người đặt</label>
                                <select name="user_id" style="" class="form-control">
                                    <option>--Nguời đặt--</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->fullname}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row" style="">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Số điện thoại</label>
                                        <input name="phone_number"  type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Số người</label>
                                        <input name="num_people" style="" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Khách sạn</label>
                                <select name="hotel_id" style="" class="form-control">
                                    <option>--Chọn khách sạn--</option>
                                    @foreach($hotels as $hotel)
                                        <option value="{{$hotel->id}}">{{$hotel->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Ngày khởi hành</label>
                                <input name="start_date" style="" type="date" class="form-control">
                            </div>
                        </div>
                        <button
                            onclick="return confirm('Xác nhận thêm!!!');"
                            class="btn btn-success" type="submit"
                            style="width: 765px;margin-left: 16px;"
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
