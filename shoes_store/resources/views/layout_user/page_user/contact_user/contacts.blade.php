@extends('welcome')
@section('content')
<main class="main-wrapper">
    <!-- Start Breadcrumb Area  -->
    <div class="axil-breadcrumb-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="inner">
                        <ul class="axil-breadcrumb">
                            <li class="axil-breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="separator"></li>
                            <li class="axil-breadcrumb-item active" aria-current="page">Contact</li>
                        </ul>
                        <h1 class="title">Contact With Us</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                   
                </div>
             
              
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area  -->

    <!-- Start Contact Area  -->
    <div class="axil-contact-page-area axil-section-gap">
        <div class="container">
            <div class="axil-contact-page">
                <div class="row row--30">
                    <div class="col-lg-6">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.9556061544595!2d105.85145437365206!3d20.99441658896035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac12bfe0d817%3A0x33a7152bf93376b2!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBQaMawxqFuZyDEkMO0bmc!5e0!3m2!1svi!2s!4v1699759593988!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-form">
                            <h3 class="title mb--10">Liên hệ</h3>
                            <p>Liên hệ với chúng tôi để được tư vấn chi tiết hơn về các chính sách và chi tiết sản phẩm</p>
                            {{-- <form id="contact-form" method="POST" action="{{URL::to('send_contact')}}" class="axil-contact-form">
                                {{ csrf_field() }}
                                <div class="row row--10">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="contact-name">Name <span>*</span></label>
                                            <input type="text" name="name" required id="contact-name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="contact-phone">Phone <span>*</span></label>
                                            <input type="number" name="phone" required id="contact-phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="contact-email">E-mail <span>*</span></label>
                                            <input type="email" name="email" required id="contact-email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="contact-message">Your Message</label>
                                            <textarea name="subject" id="contact-message" cols="1" rows="2"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb--0">
                                            <button name="submit" type="submit" id="submit" class="axil-btn btn-bg-primary">Send Message</button>
                                        </div>
                                    </div>
                                </div>
                            </form> --}}
                            <form action="{{URL::to('send_contact')}}" method="post">
                            {{ csrf_field() }}
                            <div class="row row--10">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="contact-name">Name <span>*</span></label>
                                        <input type="text" name="name" required id="contact-name">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="contact-email">E-mail <span>*</span></label>
                                        <input type="email" name="email" required id="contact-email">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="contact-phone">Phone <span>*</span></label>
                                        <input type="number" name="phone" required id="contact-phone">
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="contact-message">Your Message</label>
                                        <textarea name="subject" id="contact-message" cols="1" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb--0">
                                        <button name="submit" type="submit" id="submit" class="axil-btn btn-bg-primary">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                  
                </div>
            </div>
          
        </div>
    </div>
    <!-- End Contact Area  -->
</main>
@endsection