<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('public/backend/images/favicon.ico') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">



    <title>BARNAMAALA - Dashboard</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('public/backend/css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('public/backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/backend/css/skin_color.css') }}">


    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

     <!-- firebase integration started -->

     <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase.js"></script>
     <!-- Firebase App is always required and must be first -->
     <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-app.js"></script>

     <!-- Add additional services that you want to use -->
     <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-auth.js"></script>
     <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-database.js"></script>
     <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-firestore.js"></script>
     <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-messaging.js"></script>
     <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-functions.js"></script>

     <!-- firebase integration end -->

     <!-- Comment out (or don't include) services that you don't want to use -->
     <!-- <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-storage.js"></script> -->

     <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase.js"></script>
     <script src="https://www.gstatic.com/firebasejs/7.8.0/firebase-analytics.js"></script>
</head>


<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

    <div class="wrapper">

        @include('admin.body.header')


        <!-- Left side column. contains the logo and sidebar -->
        @include('admin.body.sidebar')

        <!-- Content Wrapper. Contains page content -->

        @yield('admin')
        <!-- /.content-wrapper -->

        @include('admin.body.footer')

        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->

    <!-- Vendor JS -->
    <script src="{{ asset('public/backend/js/vendors.min.js') }}"></script>
    <script src="{{ asset('public/assets/icons/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
    <script src="{{ asset('public/assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }}"></script>
    <script src="{{ asset('public/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
    <script src="{{ asset('public/assets/vendor_components/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/pages/data-table.js') }}"></script>




    <!-- Sunny Admin App -->
    <script src="{{ asset('public/backend/js/template.js') }}"></script>
    <script src="{{ asset('public/backend/js/pages/dashboard.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>


    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#delete', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete this data ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            });

        });

    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
            }
        @endif

    </script>

     {{-- Sorting Js --}}
    <script type="text/javascript">
        $(document).ready(function() {


            //byanjan Sorting
            $('#tablecontents').sortable({
                update: function(event, ui) {

                    var token = $('meta[name="csrf-token"]').attr('content');
                    var id_order = $('.id_byanjans').map((_, el) => el.value).get().join();



                    $.ajax({
                        url: "byanjan-sortable",
                        method: "POST",
                        data: {
                            ids: id_order,
                            _token: token
                        },
                        dataType: "text",
                        success: function(data) {


                        }
                    });

                }
            });
            //barakhari Sorting
            $('#barakharitablecontents').sortable({
                update: function(event, ui) {

                    var token = $('meta[name="csrf-token"]').attr('content');
                    var id_order = $('.id_barakharis').map((_, el) => el.value).get().join();



                    $.ajax({
                        url: "barakhari-sortable",
                        method: "POST",
                        data: {
                            ids: id_order,
                            _token: token
                        },
                        dataType: "text",
                        success: function(data) {

                        }
                    });

                }
            });
            //k_mane_kachuwa Sroting
            $('#kmktablecontents').sortable({
                update: function(event, ui) {

                    var token = $('meta[name="csrf-token"]').attr('content');
                    var id_order = $('.id_kmks').map((_, el) => el.value).get().join();



                    $.ajax({
                        url: "kmk-sortable",
                        method: "POST",
                        data: {
                            ids: id_order,
                            _token: token
                        },
                        dataType: "text",
                        success: function(data) {

                        }
                    });

                }
            });
            //Swor Sorting
            $('#swortablecontents').sortable({
                update: function(event, ui) {

                    var token = $('meta[name="csrf-token"]').attr('content');
                    var id_order = $('.id_swors').map((_, el) => el.value).get().join();



                    $.ajax({
                        url: "swor-sortable",
                        method: "POST",
                        data: {
                            ids: id_order,
                            _token: token
                        },
                        dataType: "text",
                        success: function(data) {

                        }
                    });

                }
            });
            //Sankhya Sorting
            $('#sankhyatablecontents').sortable({
                update: function(event, ui) {

                    var token = $('meta[name="csrf-token"]').attr('content');
                    var id_order = $('.id_sankhyas').map((_, el) => el.value).get().join();



                    $.ajax({
                        url: "sankhya-sortable",
                        method: "POST",
                        data: {
                            ids: id_order,
                            _token: token
                        },
                        dataType: "text",
                        success: function(data) {

                        }
                    });

                }
            });
            //quiz Sorting
            $('#quiztablecontents').sortable({
                update: function(event, ui) {

                    var token = $('meta[name="csrf-token"]').attr('content');
                    var id_order = $('.id_quizs').map((_, el) => el.value).get().join();



                    $.ajax({
                        url: "quiz-sortable",
                        method: "POST",
                        data: {
                            ids: id_order,
                            _token: token
                        },
                        dataType: "text",
                        success: function(data) {

                        }
                    });

                }
            });
            //quiz_cat Sorting
            $('#quizcattablecontents').sortable({
                update: function(event, ui) {

                    var token = $('meta[name="csrf-token"]').attr('content');
                    var id_order = $('.id_quiz_cats').map((_, el) => el.value).get().join();

                    $.ajax({
                        url: "quizCategory-sortable",
                        method: "POST",
                        data: {
                            ids: id_order,
                            _token: token
                        },
                        dataType: "text",
                        success: function(data) {

                        }
                    });
                }
            });
            //infoMenu Sorting
            $('#infoMenutablecontents').sortable({
                update: function(event, ui) {

                    var token = $('meta[name="csrf-token"]').attr('content');
                    var id_order = $('.id_infoMenus').map((_, el) => el.value).get().join();

                    $.ajax({
                        url: "infoMenu-sortable",
                        method: "POST",
                        data: {
                            ids: id_order,
                            _token: token
                        },
                        dataType: "text",
                        success: function(data) {

                        }
                    });
                }
            });
            //infoMenuDetails Sorting
            $('#imdtablecontents').sortable({
                update: function(event, ui) {

                    var token = $('meta[name="csrf-token"]').attr('content');
                    var id_order = $('.id_imds').map((_, el) => el.value).get().join();

                    $.ajax({
                        url: "infoMenuDetails-sortable",
                        method: "POST",
                        data: {
                            ids: id_order,
                            _token: token
                        },
                        dataType: "text",
                        success: function(data) {

                        }
                    });
                }
            });

            //literature Category Sorting
            $('#literatureCategoryTableContents').sortable({
                update: function(event, ui) {

                    var token = $('meta[name="csrf-token"]').attr('content');
                    var id_order = $('.id_literatureCategory').map((_, el) => el.value).get().join();

                    $.ajax({
                        url: "literatureCategory-sortable",
                        method: "POST",
                        data: {
                            ids: id_order,
                            _token: token
                        },
                        dataType: "text",
                        success: function(data) {

                        }
                    });
                }
            });

            //Literature Category Details Sorting
            $('#literatureCategoryDetailsTableContents').sortable({
                update: function(event, ui) {

                    var token = $('meta[name="csrf-token"]').attr('content');
                    var id_order = $('.id_lcds').map((_, el) => el.value).get().join();

                    $.ajax({
                        url: "literatureCategoryDetails-sortable",
                        method: "POST",
                        data: {
                            ids: id_order,
                            _token: token
                        },
                        dataType: "text",
                        success: function(data) {

                        }
                    });
                }
            });
        });
    </script>


   {{-- Image Change JS on Edit --}}
    <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
     <script type="text/javascript">
        $(document).ready(function(){
            $('#image1').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage1').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
     <script type="text/javascript">
        $(document).ready(function(){
            $('#image2').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage2').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#image3').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage3').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#image4').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage4').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#image5').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage5').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#image6').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage6').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#image7').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage7').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#image8').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage8').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#image9').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage9').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#image10').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage10').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#image11').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage11').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

    <!-- Add Byanjan Part Popups-->
    @include('popup.byanjan')
    <!-- Add Swor Part Popups-->
    @include('popup.swor')
    <!-- Add Sankhya Part Popups-->
    @include('popup.sankhya')
     <!-- Add Informative Menu Part Popups-->
     @include('popup.informative_menu')
    <!-- Add Flip Games Part Popups-->
    @include('popup.flip_games')
    <!-- Add Quiz Category Part Popups-->
    @include('popup.quiz_category')
    <!-- Add Notification Part Popups-->
    @include('popup.notifications')
    <!-- Add Literature Category Part Popups-->
    @include('popup.literature_category')

    <script src="{{ asset('public/zoomImage/js/zooming.min.js') }}"></script>
    <script>
        new Zooming().listen('img')
    </script>


</body>
</html>
