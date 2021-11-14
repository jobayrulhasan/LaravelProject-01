<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Restaurant Laravel Project</title>
    <!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
    <!-- google jquery cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>
                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li>
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li>

                            <!-- external menu to show how many data added in the cart -->
                            <li class="scroll-to-section bg bg-success rounded-circle" style="width: 85px; height:40px;">

                                <!-- if logged in it will work -->
                                @auth
                                <a href="{{url('/showcart',Auth::user()->id)}}">
                                    Cart[{{$count}}]
                                </a>
                                @endauth
                                <!-- if not logged in it will work -->
                                @guest
                                Cart[0]
                                @endguest

                            </li>
                            <li>
                                @if (Route::has('login'))
                                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                    @auth


                                    <!-- this is for uere login and logout after login -->
                            <li>
                                <x-app-layout>

                                </x-app-layout>
                            </li>
                            @else
                            <li> <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                            </li>

                            @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            </li>
                            @endif
                            @endauth
                </div>
                @endif
                </li>
                </ul>
                <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
        </div>
    </header>
    <div class="container">
        <div id="top">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Food Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{url('/orderconfirm')}}" method="post">
                        @csrf
                        @foreach($data as $item)
                        <tr>
                            <td>
                                <input type="text" name="foodname[]" value=" {{$item->title}}" hidden="">
                                {{$item->title}}
                            </td>
                            <td>
                                <input type="text" name="price[]" value="{{$item->price}}" hidden="">
                                {{$item->price}}
                            </td>
                            <td>
                                <input type="text" name="quantity[]" value="{{$item->quantity}}" hidden="">
                                {{$item->quantity}}
                            </td>
                        </tr>
                        @endforeach

                        @foreach($data2 as $item2)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="{{url('/remove',$item2->id)}}" class="btn btn-warning" onclick="return confirm('Are you sure to delete this data')">Remove</a>
                            </td>
                        </tr>
                        @endforeach

                </tbody>
            </table>
        </div>

        <div style="padding: 10px;">
            <button class="btn btn-primary" id="order" type="button">Order now</button>
        </div>
        <div style="width: 400px;padding:10px; display:none;" id="appear">
            <div class="form-group">
                <label for=""><strong>Name:</strong></label>
                <input type="text" name="name" class="form-control" placeholder="Add your name">
            </div>
            <div class="form-group">
                <label for=""><strong>Phone:</strong></label>
                <input type="number" name="phone" class="form-control" placeholder="Phone number">
            </div>
            <div class="form-group">
                <label for=""><strong>Address:</strong></label>
                <input type="text" name="address" class="form-control" placeholder="Address">
            </div>
            <input type="submit" value="Order Confirm" class="btn btn-success my-1">
            <button id="close" class="btn btn-danger" type="button">Close</button>
        </div>
        </form>
    </div>

    <!-- this code is for show order now details -->
    <script>
        $("#order").click(
            function() {
                $("#appear").show();
            }
        );
        $("#close").click(
            function() {
                $("#appear").hide();
            }
        );
    </script>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/isotope.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script>
        $(function() {
            var selectedClass = "";
            $("p").click(function() {
                selectedClass = $(this).attr("data-rel");
                $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("." + selectedClass).fadeOut();
                setTimeout(function() {
                    $("." + selectedClass).fadeIn();
                    $("#portfolio").fadeTo(50, 1);
                }, 500);

            });
        });
    </script>

</body>

</html>