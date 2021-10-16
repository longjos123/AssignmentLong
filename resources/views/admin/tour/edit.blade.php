@extends('admin.layouts.main');

@section('content')
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Tên tour</label>
                    <input name="name" style="" type="text" class="form-control" value="{{$tour->name}}">
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Phương tiện</label>
                            <select name="transport_id" style="" class="form-control">
                                <option value="{{$tour->transport_id}}">{{$tour->tourTransport->name}}</option>
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
                                <option value="{{$tour->countries_id}}">{{$tour->tourCountries->name}}</option>
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
                            <input name="num_day"  type="text" class="form-control" value="{{$tour->num_day}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Giá</label>
                            <input name="price" style="" type="text" class="form-control" value="{{$tour->price}}">
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
                    <textarea id="editor1" name="description" style="height: 296px;" type="text" class="form-control" value="">{{$tour->description}}</textarea>
                </div>
            </div>
            <button
                class="btn btn-success" type="submit"
                style="margin-left: 9px;width: 100px;"
            >Lưu
            </button>
        </div>
    </form>
@endsection
