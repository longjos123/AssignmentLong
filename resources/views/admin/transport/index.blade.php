@extends('admin.layouts.main');

@section('content')
    <div class="row">
        <div class="col-6">
            <h1 style="font-family: 'Rubik', sans-serif; font-size: 30px;" >Quản lí phương tiện</h1>
            <table class="table mb-0">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>
                        <a  class="btn btn-primary" style="width: 105px;" data-toggle="modal" data-target="#myModal">Thêm</a>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($transports as $transport)
                    <tr>
                        <td>{{$transport->id}}</td>
                        <td>{{$transport->name}}</td>
                        <td>
                            <a class="btn btn-success" href="{{route('edit-transport',['id' => $transport->id])}}"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-danger"
                               href="{{route('delete-transport',['id' => $transport->id])}}"
                               onclick="return confirm('Xác nhận xóa?');"><i class="far fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thêm phương tiện</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{route('transport.add')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Tên phương tiện</label>
                            <input name="name" style="" type="text" class="form-control">
                        </div>
                        <button style="width:265px;"
                                onclick="return confirm('Xác nhận thêm!!!');"
                                class="btn btn-success"
                                type="submit">Lưu
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
@endsection
