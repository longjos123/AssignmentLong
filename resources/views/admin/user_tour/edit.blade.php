@extends('admin.layouts.main');

@section('content')
    <div class="container" style="margin-left: 10px">
        <h1 style="font-family: 'Rubik', sans-serif; font-size: 30px;" >Sửa tour đã đặt</h1>
        <div class="row">
            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Tên Tour</label>
                        <input style="width: 500px" type="text" class="form-control" value="{{$userTour->tour->name}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Người đặt</label>
                        <input style="width: 500px" type="text" class="form-control" value="{{$userTour->user->fullname}}" disabled>
                    </div>

                    <div class="row" style="width: 500px">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input name="phone_number"  type="text" class="form-control" value="{{$userTour->phone_number}}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Số người</label>
                                <input name="num_people" style="width: 245px" type="text" class="form-control" value="{{$userTour->num_people}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Khách sạn</label>
                        <select name="hotel_id" style="width: 500px" class="form-control">
                            <option value="{{empty($userTour->hotel->id)?'':$userTour->hotel->id }}">{{empty($userTour->hotel->name)?'_':$userTour->hotel->name }}</option>
                            @foreach($hotels as $hotel)
                                <option value="{{$hotel->id}}">{{$hotel->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Ngày khởi hành</label>
                        <input name="start_date" style="width: 500px" type="date" class="form-control" value="{{$userTour->start_date}}">
                    </div>
                </div>
                <button
                    onclick="return confirm('Xác nhận thay đổi!!!');"
                    class="btn btn-success" type="submit"
                    style="margin-left: 9px;width: 500px;margin-top: 30px;">Lưu
                </button>
                <br>
                <a style="margin-left: 9px;width: 500px;margin-top: 30px;" class="btn btn-danger" href="{{route('tour_user.index')}}">Hủy</a>
            </form>
            <div class="col-6">
                <div class="img-tour" >
                    <img style="border-radius: 10px; width: 675px;height: 290px;margin-left: 15px " src="{{asset('storage/'.$userTour->tour->image)}}">
                </div>
                <div class="detail-tour" style="margin-left: 15px;margin-top: 15px">
                    <label for="">Chi tiết</label><br>
                    <span>
                        Chi tiết tour {{$userTour->tour->name}}
                    </span>
                </div>
            </div>

        </div>
    </div>
@endsection
