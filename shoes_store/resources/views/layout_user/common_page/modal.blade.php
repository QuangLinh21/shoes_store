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
                                        <!-- End Product Variation  -->

                                    </div>

                                    <!-- Start Product Action Wrapper  -->
                                    <div class="product-action-wrapper d-flex-center">
                                        <!-- Start Quentity Action  -->
                                        <div class="pro-qty mr--20"><input type="text" value="1" name="qty"></div>
                                       <input type="hidden" id="product_id" name="product_id">
                                        <!-- End Quentity Action  -->

                                        <!-- Start Product Action  -->
                                        <ul class="product-action d-flex-center mb--0">
                                            <li class="add-to-cart"><button class="axil-btn btn-bg-primary">Add to Cart</button></li>
                                            <li class="wishlist"><a href="wishlist.html" class="axil-btn wishlist-btn"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <!-- End Product Action  -->

                                    </div>
                                    <!-- End Product Action Wrapper  -->

                                    {{-- <div class="product-desc-wrapper pt--80 pt_sm--60">
                                        <h4 class="primary-color mb--40 desc-heading">Description</h4>
                                        <div class="single-desc mb--30">
                                            <h5 class="title">Specifications:</h5>
                                            <p>We’ve created a full-stack structure for our working workflow processes, were from the funny the century initial all the made, have spare to negatives. But the structure was from the funny the century rather,
                                                initial all the made, have spare to negatives.</p>
                                        </div>
                                        <div class="single-desc mb--5">
                                            <h5 class="title">Care & Maintenance:</h5>
                                            <p>Use warm water to describe us as a product team that creates amazing UI/UX experiences, by crafting top-notch user experience.</p>
                                        </div>
                                        <ul class="pro-des-features pro-desc-style-two pt-10">
                                            <li class="single-features">
                                                <div class="icon">
                                                    <img src="assets/images/product/product-thumb/icon-3.png" alt="icon">
                                                </div>
                                                Easy Returns
                                            </li>
                                            <li class="single-features">
                                                <div class="icon">
                                                    <img src="assets/images/product/product-thumb/icon-2.png" alt="icon">
                                                </div>
                                                Quality Service
                                            </li>
                                            <li class="single-features">
                                                <div class="icon">
                                                    <img src="assets/images/product/product-thumb/icon-1.png" alt="icon">
                                                </div>
                                                Original Product
                                            </li>
                                        </ul>
                                        <!-- End .pro-des-features -->
                                    </div> --}}
                                    <!-- End .product-desc-wrapper -->
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

