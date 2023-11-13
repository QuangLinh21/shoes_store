<div class="axil-section-gap">
    <div class="container">
        <div class="section-title-wrapper section-title-center">
            <span class="title-highlighter highlighter-primary"><i class="fas fa-fire"></i> Regular
                Post</span>
            <h3 class="title">Tin tức</h3>
        </div>
        <div class="row g-5">
            @foreach ($news as $item)
            <div class="col-lg-4">
                <div class="content-blog blog-grid">
                    <div class="inner">
                        <div class="thumbnail">
                            <a href="blog-details.html">
                                <img src="{{asset($item->new_img)}}" alt="Blog Images">
                            </a>
                            <div class="blog-category">
                                <a href="#" class="text-dark">Tin tức</a>
                            </div>
                        </div>
                        <div class="content">
                            <h5 class="title"><a href="blog-details.html">{{$item->new_title}}</a></h5>
                            <div class="read-more-btn">
                                <a class="axil-btn right-icon" href="blog-details.html">Read More <i
                                        class="fal fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
           
        </div>
    </div>
</div>