<div class="axil-categorie-area bg-color-white axil-section-gap pb--0">
    <div class="container">
        <div class="product-area pb--50">
            <div class="section-title-wrapper">
                <span class="title-highlighter highlighter-secondary">Categories</span>
                <h2 class="title">Danh mục</h2>
            </div>
            <div
                class="categrie-product-activation-3 slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                @foreach ($brands as $item)
                <div class="slick-single-layout slick-slide rbt-feature">
                    <div class="categrie-product categrie-product-3" data-sal="zoom-out" data-sal-delay="100"
                        data-sal-duration="500">
                        <a href="{{route('brand.show',$item->brand_id)}}">
                            <img class="img-fluid" src="{{asset($item->brand_img)}}" alt="{{$item->brand_name}}">
                            <h6 class="cat-title">{{$item->brand_name}}</h6>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>