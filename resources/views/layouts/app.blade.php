<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {{--  <link href="/css/app.css" rel="stylesheet">  --}}
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    
    <!-- Bootstrap Styles -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-theme.css')}}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                           
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                       

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                        
                                        
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
    <!-- Jquery -->
    <script src="{{ asset('js/jquery.min.js')}}" type="text/javascript"></script>
    
    <!-- Bootstrap Js -->
    <script src="{{asset('js/bootstrap.js')}}"  type="text/javascript"></script>
     
    <!-- Scripts -->
    <script src="js/app.js"  type="text/javascript"></script>
    
    <! -- Ajax -->
    
    <!-- Search -->
    <script>
        $('#search').on('click', function(){
        $.ajax({
        url : '/articles',
        type : 'GET',
        dataType : 'json',
        data : {
        'keywords' : $('#keywords').val()
        
        },
        success : function(data) {
        //menampilkan fungsi ajax
            $('#data-content').html(data['view']);
        
        },
        error : function(xhr, status) {
            console.log(xhr.error + " ERROR STATUS : " + status);
            },
            complete : function() {
            alreadyloading = false;
            }
            });
            });
    </script>
    
    <!-- pagination -->
    <script>
        $(document).ready(function() {
            $(document).on('click', '.pagination a', function(e) {
                get_page($(this).attr('href').split('page=')[1]);
                e.preventDefault();
            });
        });
        
        function get_page(page) {
            $.ajax({
                url : '/articles?page=' + page,
                type : 'GET',
                dataType : 'json',
                data : {
                'keywords' : $('#keywords').val(),
                
            },
            success : function(data) {
                $('#data-content').html(data['view']);
                
            },
            error : function(xhr, status, error) {
                console.log(xhr.error + "\n ERROR STATUS : " + status + "\n"+ error);
            },
            complete : function() {
                alreadyloading = false;
            }
            });
            }
        </script>

        <!-- Include Date Range Picker -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

        <script>
            $(document).ready(function(){
                var date_input=$('input[name="dob"]'); //our date input has the name "date"
                var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                date_input.datepicker({
                    format: 'yyyy/mm/dd',
                    container: container,
                    todayHighlight: true,
                    autoclose: true,
                })
            })
        </script>
        
    
</body>
</html>
