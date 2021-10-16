<div class="popular_places_area" style="padding-top: 30px;">
    <div class="container">
        <div class="row" style="margin-bottom: 300px;margin-top: 50px">
            <h4>Tìm kiếm: {{$searchData['key']}}</h4><br>
            @foreach($dataTours as $tour)
                <div class="col-lg-4 col-md-6">
                    <div class="single_place">
                        <div class="thumb">
                            <img height="233px" src="{{asset('storage/'. $tour->image)}}" alt="">
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
    </div>
</div>
