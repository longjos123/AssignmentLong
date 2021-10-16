<div class="popular_places_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="filter_result_wrap">
                    <h3>Lọc</h3>
                    <div class="filter_bordered">
                        <form action="{{route('filter_tour')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="filter_inner">
                                <div class="row">
                                    <div class="col-lg-12" style="margin-bottom: 10px">
                                        <label>Tên tour</label>
                                        <div class="single_select">
                                            <input @isset($searchData['name_tour']) value="{{$searchData['name_tour']}}" @endisset name="name_tour" class="form-control" placeholder="Tên">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label>Quốc gia</label>
                                        <select name="countries_id" style="" class="form-control">
                                            <option value="">--Quốc gia--</option>
                                            @foreach($countries as $country)
                                                <option @if(isset($searchData['countries_id']) && $country->id == $searchData['countries_id']) selected @endif value="{{$country->id}}">
                                                    {{$country->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="range_slider_wrap">
                                            <label>Giá</label>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input @isset($searchData['price_min']) value="{{$searchData['price_min']}}" @endisset name="price_min" type="text" class="form-control">
                                                </div>
                                                <div class="col-6">
                                                    <input @isset($searchData['price_max']) value="{{$searchData['price_max']}}" @endisset name="price_max" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="reset_btn" style="margin-top: 30px">
                                <button class="boxed-btn4" type="submit">Lọc</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8" id="show_tour">
                <div class="row">
                    @foreach($tours as $tour)
                        <div class="col-lg-6 col-md-6">
                            <div class="single_place">
                                <div class="thumb">
                                    <img href="" height="233" src="{{asset('storage/' .$tour->image)}}" alt="">
                                    <a href="#" class="prise">${{$tour->price}}</a>
                                </div>
                                <div class="place_info">
                                    <a href="{{route('tour_detail',['id' => $tour->id])}}"><h3>{{$tour->name}}</h3></a>
                                    <p>{{$tour->tourCountries->name}}</p>
                                    <div class="rating_days d-flex justify-content-between">
                                        <span class="d-flex justify-content-center align-items-center">
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                             <a href="#">(20 Review)</a>
                                        </span>
                                        <div class="days">
                                            <i class="fa fa-clock-o"></i>
                                            <a href="#">{{$tour->num_day}} Days</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="more_place_btn text-center">
                            {{$tours->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function (){
        $('#name_tour').keyup(function (){
            var name = $(this).val();
        })
    })
</script>
