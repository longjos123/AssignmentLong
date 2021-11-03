@extends('admin.layouts.main');

@section('content')
    <h1 style="font-family: 'Rubik', sans-serif; font-size: 30px;" >Quản lí bài viết</h1>
    <table id="myTable" class="table mb-0">
        <thead>
        <tr>
            <th>#</th>
            <th>Ảnh</th>
            <th>Title</th>
            <th>Content</th>
            <th>
                <a class="btn btn-primary" style="width: 105px;" data-toggle="modal" data-target="#myModal">Thêm</a>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($news as $key => $new)
            <tr>
                <td>{{$key + 1}}</td>
                <td>
                    <div class="round-img">
                        <a href=""><img width="100" src="{{asset( 'storage/' . $new->image)}}" style=""></a>
                    </div>
                </td>
                <td>{{$new->title}}</td>
                <td  style="width: 300px;cursor:pointer}" ><a data-toggle="modal" data-target="#myModal1" onclick="detail({{$new->id}})">Xem chi tiết</a></td>
                <td>
                        <a href="{{route('news.edit',['id' => $new->id])}}"
                           class="btn btn-success"><i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger"
                           href="{{route('news.delete',['id' => $new->id])}}"
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
                    <h4 class="modal-title">Thêm bài viết</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{route('news.add')}}" method="post" enctype="multipart/form-data">
                        @csrf

                           <div class="form-group">
                               <label for="">Title</label>
                               <input name="title" style="" type="text" class="form-control">
                           </div>
                           <div class="form-group">
                               <label for="">Ảnh bài viết</label>
                               <input name="image" style="" type="file" class="form-control">
                           </div>
                           <div class="form-group">
                               <label for="">Content</label>
                               <textarea name="content" style="height: 300px" type="text" class="form-control" id="editor1"></textarea>
                           </div>
                           <button
                               onclick="return confirm('Xác nhận thêm!!!');"
                               class="btn btn-success" type="submit"
                               style="width: 765px;"
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
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Chi tiết bài viết</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" id="des">
                    <span style="text-align: center" id="des"></span>

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
        $.get('{{ route('news.detailDescription') }}', {"id": id}, function (news){
            document.getElementById('des').innerHTML = news.content;
        });
    }
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>

