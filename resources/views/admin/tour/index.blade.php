@extends('admin.layouts.main');

@section('content')
    <h1 style="font-family: 'Rubik', sans-serif; font-size: 30px;" >Quản lí tour</h1>
    <table class="table mb-0">
        <thead>
        <tr>
            <th>#</th>
            <th>Avatar</th>
            <th>Tên tour</th>
            <th>Số ngày đi</th>
            <th>Miêu tả</th>
            <th>Phương tiện</th>
            <th>Quốc gia</th>
            <th>Giá/người</th>
            <th>
                <a class="btn btn-primary" style="width: 105px;" data-toggle="modal" data-target="#myModal">Thêm</a>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($tours as $key => $tour)
            <tr>
                <td>{{$key + 1}}</td>
                <td>
                    <div class="round-img">
                        <a href=""><img width="200" src="{{asset( 'storage/' . $tour->image)}}" style=""></a>
                    </div>
                </td>
                <td>{{$tour->name}}</td>
                <td><span>{{$tour->num_day}}</span></td>
                <td  style="width: 300px;cursor:pointer}" ><a data-toggle="modal" data-target="#myModal1" onclick="detail({{$tour->id}})">Xem chi tiết</a></td>
                <td>{{$tour->tourTransport->name}}</td>
                <td>{{$tour->tourCountries->name}}</td>
                <td><span style="font-size: 15px;" class="badge badge-success">${{$tour->price}}</span></td>
                <td>
                        <a href="{{route('tour.edit',['id' => $tour->id])}}"
                           class="btn btn-success"><i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger"
                           href="{{route('tour.delete',['id' => $tour->id])}}"
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
                    <h4 class="modal-title">Thêm tour</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{route('tour.add')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Tên tour</label>
                                    <input name="name" style="" type="text" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Phương tiện</label>
                                            <select name="transport_id" style="" class="form-control">
                                                <option>--Phương tiện--</option>
                                                @foreach($transports as $transport)
                                                    <option value="{{$transport->id}}">{{$transport->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Quốc gia</label>
                                            <select name="countries_id" style="" class="form-control">
                                                <option>--Quốc gia--</option>
                                                @foreach($countries as $country)
                                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Số ngày</label>
                                            <input name="num_day"  type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Giá</label>
                                            <input name="price" style="" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Ảnh</label>
                                    <input name="image" style="" type="file" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Miêu tả</label>
                                    <textarea id="editor1" name="description" style="height: 296px;" type="text" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>

                        <button
                            onclick="return confirm('Xác nhận thêm!!!');"
                            class="btn btn-success" type="submit"
                            style="width: 765px;margin-left: 16px;"
                        >Lưu
                        </button>
                    </form>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Chi tiết tour</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" id="des">

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>



@endsection
<script>
    function detail(id) {
        $.get('{{ route('tour.detailDescription') }}', {"id": id}, function (tour){

            // console.log(tour.name);
            {{--$("#des").load("{{ route('viewDetail') }} #des");--}}
            document.getElementById('des').innerHTML = tour.description;
        });
    }
</script>


