<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img/mini_logo.png" type="image/png">
    <link rel="stylesheet" href="{{asset('backend/css/bootstrap1.min.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendors/themefy_icon/themify-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendors/niceselect/css/nice-select.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendors/owl_carousel/css/owl.carousel.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendors/gijgo/gijgo.min.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendors/font_awesome/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendors/tagsinput/tagsinput.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendors/datepicker/date-picker.css')}}" />
    {{-- <link rel="stylesheet" href="{{asset('backend/vendors/vectormap-home/vectormap-2.0.2.css')}}" /> --}}
    <link rel="stylesheet" href="{{asset('backend/vendors/scroll/scrollable.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendors/datatable/css/jquery.dataTables.min.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendors/datatable/css/responsive.dataTables.min.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendors/datatable/css/buttons.dataTables.min.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendors/text_editor/summernote-bs4.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendors/morris/morris.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/material_icon/material-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/style1.css')}}" />
    {{-- <link rel="stylesheet" href="{{asset(backend/css/colors/default.css)}}" id="colorSkinCSS"> --}}
    <title>Document</title>
</head>
<body>
   @include('layout_admin.common_page.sidebar')
    <section class="main_content dashboard_part large_header_bg">

       @include('layout_admin.common_page.header')
        <div class="main_content_iner overly_inner ">
            <div class="container-fluid p-0 ">
                <div class="row ">
                    <div class="col-xl-12">
                        <div class="white_card  mb_30">
                            <div class="white_card_header">
                                <div class="row align-items-center">
                                   @yield('content')
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layout_admin.common_page.footer')
    </section>
    <script src="{{asset('backend/js/jquery1-3.4.1.min.js')}}"></script>
    <script src="{{asset('backend/js/popper1.min.js')}}"></script>
    <script src="{{asset('backend/js/bootstrap1.min.js')}}"></script>
    <script src="{{asset('backend/js/metisMenu.js')}}"></script>
    <script src="{{asset('backend/vendors/count_up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('backend/vendors/chartlist/Chart.min.js')}}"></script>
    <script src="{{asset('backend/vendors/count_up/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('backend/vendors/niceselect/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('backend/vendors/owl_carousel/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatable/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('backend/js/dashboard_init.js')}}"></script>
    <script src="{{asset('backend/js/custom.js')}}"></script>
    <script src="{{asset('backend/js/ckeditor5-build-classic/ckeditor.js')}}"></script>
    {{-- <script src="{{asset('backend/js/jquery1-3.4.1.min.js')}}"></script>
    <script src="{{asset('backend/js/popper1.min.js')}}"></script>
    <script src="{{asset('backend/js/bootstrap1.min.js')}}"></script>
    <script src="{{asset('backend/js/metisMenu.js')}}"></script>
    <script src="{{asset('backend/vendors/count_up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('backend/vendors/chartlist/Chart.min.js')}}"></script>
    <script src="{{asset('backend/vendors/count_up/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('backend/vendors/niceselect/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('backend/vendors/owl_carousel/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatable/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatable/js/jszip.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{asset('backend/vendors/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datepicker/datepicker.js')}}"></script>
    <script src="{{asset('backend/vendors/datepicker/datepicker.en.js')}}"></script>
    <script src="{{asset('backend/vendors/datepicker/datepicker.custom.js')}}"></script>
    <script src="{{asset('backend/js/chart.min.js')}}"></script> --}}
   
    {{-- <script src="{{asset('backend/vendors/scroll/scrollable-custom.js')}}"></script>
    <script src="{{asset('backend/vendors/vectormap-home/vectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('backend/vendors/vectormap-home/vectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('backend/vendors/apex_chart/apex-chart2.js')}}"></script>
    <script src="{{asset('backend/vendors/apex_chart/apex_dashboard.js')}}"></script>
    <script src="{{asset('backend/vendors/chart_am/core.js')}}"></script>
    <script src="{{asset('backend/vendors/chart_am/charts.js')}}"></script>
    <script src="{{asset('backend/vendors/chart_am/animated.js')}}"></script>
    <script src="{{asset('backend/vendors/chart_am/kelly.js')}}"></script>
    <script src="{{asset('backend/vendors/chart_am/chart-custom.js')}}"></script> --}}
 
    <script>
		ClassicEditor
		.create(document.querySelector('#ckeditor_product'))
		.catch(error=>{
			console.error(error);
		})

	</script>
     <script>
		ClassicEditor
		.create(document.querySelector('#ckeditor_new'))
		.catch(error=>{
			console.error(error);
		})

	</script>
    
</body>
</html>