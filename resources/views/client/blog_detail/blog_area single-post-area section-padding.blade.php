<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    <div class="single-post">
                        <div class="feature-img">
                            <img width="730" height="365" class="img-fluid" src="{{asset('storage/'.$blog->image)}}" alt="">
                        </div>
                        <div class="blog_details">
                            <h2>{{$blog->title}}</h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <li><a href="#"><i class="fa fa-user"></i> Du lịch, Đời sống</a></li>
                                <li><a href="#"><i class="fa fa-comments"></i> 03 bình luận</a></li>
                            </ul>
                           {!! $blog->content !!}
                        </div>
                    </div>

                    <nav class="blog-pagination justify-content-center d-flex">
                        <ul class="pagination">
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Previous">
                                    <i class="ti-angle-left"></i>
                                </a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link">1</a>
                            </li>
                            <li class="page-item active">
                                <a href="#" class="page-link">2</a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Next">
                                    <i class="ti-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form method="post" action="{{route('find_news')}}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input @isset($searchData['title']) value="{{$searchData['title']}}" @endisset name="title" type="text" class="form-control" placeholder='Search Keyword'
                                           onfocus="this.placeholder = ''"
                                           onblur="this.placeholder = 'Search Keyword'">
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
                        @foreach($blogLimits as $blogLimit)
                            <div class="media post_item">
                                <img width="80" height="80" src="{{asset('storage/'.$blogLimit->image)}}" alt="post">
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3>{{$blogLimit->title}}</h3>
                                    </a>
                                    <p>{{$blogLimit->created_at}}</p>
                                </div>
                            </div>
                        @endforeach
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
