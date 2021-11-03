<div style="margin-bottom: 300px; margin-top: 30px" class="container">
    <div class="row">
        <table class="table mb-0">
            <thead>
            <tr>
                <th>#</th>
                <th>Người đặt</th>
                <th>Tour</th>
                <th>Số người</th>
                <th>Khách sạn</th>
                <th>Giá tổng</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th style="width: 110px;">Trạng thái</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($userTours as $key => $userTour)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$userTour->name}}</td>
                    <td><span>{{$userTour->tour->name}}</span></td>
                    <td><span>{{$userTour->num_people}}</span></td>
                    <td>{{empty($userTour->hotel->name)?'_':$userTour->hotel->name }}</td>
                    <td><span style="font-size: 15px;" class="badge badge-success">${{($userTour->tour->price)*($userTour->num_people)}}</span></td>
                    <td>{{$userTour->start_date}}</td>
                    <td>{{$userTour->end_date}}</td>
                    <td style="color: {{($userTour->status) == 0? '#c13a6b':'green'}}">
                        @if($userTour->confirm_tour == 1)
                            {{($userTour->status) == 0?'Đang xử lí':'Đã duyệt'}}
                        @endif
                    </td>
                    <td>
                        @if($userTour->confirm_tour == 0)
                            <a class="btn btn-primary" href="{{route('confirm_tour',['id'=>$userTour->id])}}">Đặt tour</a>
                        @endif
                    </td>
{{--                    <a class="btn btn-success" href="{{route('edit-booked-tour',['id' => $userTour->id])}}"><i class="fas fa-edit"></i></a>--}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
