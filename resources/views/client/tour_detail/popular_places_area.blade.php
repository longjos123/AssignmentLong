<div class="popular_places_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>More Places</h3>
                </div>
            </div>
        </div>
        <div class="row">
           @foreach($tourLimits as $tourLimit)
                <div class="col-lg-4 col-md-6">
                    <div class="single_place">
                        <div class="thumb">
                            <img height="233px" src="{{asset('storage/'.$tourLimit->image)}}" alt="">
                            <a href="#" class="prise">${{$tourLimit->price}}</a>
                        </div>
                        <div class="place_info">
                            <a href="{{route('tour_detail',['id' => $tourLimit->id])}}"><h3>{{$tourLimit->name}}</h3></a>
                            <p>{{$tourLimit->tourCountries->name}}</p>
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
                                    <a href="#">{{$tourLimit->num_day}} Days</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
