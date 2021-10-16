<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    @foreach($blogs as $blog)
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img height="365px" class="card-img rounded-0" src="{{asset('storage/'.$blog->image)}}" alt="">
                                <a href="#" class="blog_item_date">
                                    <p>{{$blog->created_at}}</p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="{{route('blog.detail',['id' => $blog->id])}}">
                                    <h2>{{$blog->title}}</h2>
                                </a>
                                <p>That dominion stars lights dominion divide years for fourth have don't stars is that
                                    he earth it first without heaven in place seed it second morning saying.</p>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="fa fa-user"></i> Du lịch, Phong cách sống</a></li>
                                    <li><a href="#"><i class="fa fa-comments"></i> 03 bình luận</a></li>
                                </ul>
                            </div>
                        </article>
                    @endforeach
                        {{$blogs->links()}}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form method="post" action="{{route('find_news')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input @isset($searchData['title']) value="{{$searchData['title']}}" @endisset name="title" type="text" class="form-control" placeholder='Search Keyword'>
                                    <div class="input-group-append">
                                        <button class="btn" type="button"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Search</button>
                        </form>
                    </aside>

                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Bài đăng gần đây</h3>
                        @foreach($blogLimits as $blog)
                            <div class="media post_item">
                                <img width="80" height="80" src="{{asset('storage/'.$blog->image)}}" alt="post">
                                <div class="media-body">
                                    <a href="{{route('blog.detail',['id' => $blog->id])}}">
                                        <h3>{{$blog->title}}</h3>
                                    </a>
                                    <p>{{$blog->created_at}}</p>
                                </div>
                            </div>
                        @endforeach
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
