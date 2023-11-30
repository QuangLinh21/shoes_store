<div class="modal fade quick-view-product" id="quick-view-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="far fa-times"></i></button>
            </div>
            <div class="modal-body">
                <div class="single-product-thumb">
                   <form action="{{URL::to('add_to_cart')}}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-6 mb--40">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="product-large-thumbnail-2 single-product-thumbnail axil-product slick-layout-wrapper--15 axil-slick-arrow arrow-both-side-3">
                                        <div class="thumbnail">
                                            <img src="" id="product_images_1"  alt="Product Images">
                                        </div>
                                        <div class="thumbnail">
                                            <img src="" id="product_images_2"  alt="Product Images">
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="col-lg-12 d-none">
                                    <div class="small-thumb-wrapper product-small-thumb-2 small-thumb-style-two small-thumb-style-three">
                                        <div class="small-thumb-img ">
                                            <img src="" id="product_images_1" alt="samll-thumb">
                                        </div>
                                        <div class="small-thumb-img ">
                                            <img src="" id="product_images_2" alt="samll-thumb">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb--40">
                            <div class="single-product-content">
                                <div class="inner">
                                    <h2 class="product-title" id="product_name" ></h2>
                                   
                                    <span class="price-amount" id="product_price"></span>
                                    <ul class="product-meta">
                                        <li><i class="fal fa-check"></i>Chẩn hàng chính hãng</li>
                                        <li><i class="fal fa-check"></i>Free ship trong vòng bán kính 30km</li>
                                        <li><i class="fal fa-check"></i>Hỗ trợ đổi trả trong vòng 7 ngày</li>
                                        
                                    </ul>
                                    <p class="description" id="product_des"></p>
                                  
                                    <div class="product-variations-wrapper">


                                        <!-- Start Product Variation  -->
                                        <div class="product-variation product-size-variation">
                                            <h6 class="title">Size:</h6>
                                           <select name="size">
                                            <option value="36">26</option>
                                            <option value="37">37</option>
                                            <option value="38">38</option>
                                            <option value="39">39</option>
                                            <option value="40">40</option>
                                            <option value="41">41</option>
                                            <option value="42">42</option>
                                            <option value="43">43</option>
                                           </select>
                                        </div>
                                    </div>
                                    
                                    <div class="product-action-wrapper d-flex-center">
                                        <div class="pro-qty mr--20">
                                            {{-- <input type="number"  min="1" max="5"> --}}
                                            <input type="number" name="qty" min="1" max="5" step="1" value="1"></div>
                                             <input type="hidden" id="product_id" name="product_id">
                                             {{-- <h3 id="qty_product_kho"></h3> --}}
                                             <ul class="product-action d-flex-center mb--0">
                                            <li class="add-to-cart"><button class="axil-btn btn-bg-primary">Thêm vào giỏ hàng</button></li>
                                            <li class="wishlist"><a href="#" class="axil-btn wishlist-btn"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>

