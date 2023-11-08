<div class="axil-categorie-area bg-color-white axil-section-gap pb--0">
    <div class="container">
        <div class="product-area pb--50">
            <div class="section-title-wrapper">
                <span class="title-highlighter highlighter-secondary"><i
                        class="far fa-shopping-basket"></i>The Categories</span>
                <h2 class="title">Browse by Category</h2>
            </div>
            <div
                class="categrie-product-activation-3 slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                @foreach ($brands as $item)
                <div class="slick-single-layout slick-slide">
                    <div class="categrie-product categrie-product-3" data-sal="zoom-out" data-sal-delay="100"
                        data-sal-duration="500">
                        <a href="#">
                            <img class="img-fluid" src="assets/images/product/categories/cat-14.png"
                                alt="product categorie">
                            <h6 class="cat-title">Virtual World</h6>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>