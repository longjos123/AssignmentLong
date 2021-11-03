<div class="recent_trip_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>Bài viết</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($news as $new)
                <div class="col-lg-4 col-md-6">
                    <div class="single_trip">
                        <div class="thumb">
                            <img height="233px" src="{{asset('storage/'. $new->image)}}" alt="">
                        </div>
                        <div class="info">
                            <div class="date">
                                <span>{{$new->created_at}}</span>
                            </div>
                            <a href="{{route('blog.detail',['id' => $new->id])}}">
                                <h3>{{$new->title}}</h3>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
