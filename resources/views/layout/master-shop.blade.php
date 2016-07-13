<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
     <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/stylesheets-shop/bootstrap.min.css') }}">
   
    <!-- Custom CSS SHOP-->
    <link href="{{ asset('assets/stylesheets/shop-homepage.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/fonts/fonts.css')}}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-cart">
                    <span data-target="#myModal" data-toggle="modal" class="glyphicon"><img src="img/cart2.png" style="height:16px;width:16px;margin-top:-15px;"></span>
                </button>
                <a class="navbar-brand" href="#" style="color:#fff;font-size:24px;font-family: GLAMOURGIRL;">Skin Potions</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/" style="color:#fff;">Home</a>
                    </li>
                </ul>
                <div id="navbar-cart">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a data-target="#myModal" data-toggle="modal" class="btn" data-placement="bottom" title="Shopping Cart">
                            <label style="color:#fff;">Cart</label> <span class="glyphicon"><img src="img/cart2.png" style="height:32px;width:32px;margin-top:-10px;"></span>
                        </a>
                    </li>
                </ul>
            </div>
            </div>
             
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

            @yield('content')
       
        @yield('scripts')
    
    @include('layout.footer')
    <!--modal part-->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

            <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color: #333;">Items purchased</h4>
                        <div align="right">Total Amount: &#x20B1; <span id="totalAmtPurchase" style="font-weight: bold;color: #333;">0.00</span></div>
                    
                        <div class="modal-body">
                            <div class="table-responsive">          
                                <table class="table" style="color: #333;">
                                    <thead>
                                        <tr>
                                            <th>Quantity</th>
                                            <th>Items Name</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                        <tbody id="renderPurchased">
                                        <tr>
                                        <td style="width: 130px;">
                                        <div class="input-group" style="width: 125px;">
                                        <span class="input-group-btn">
                                        <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quant[2]">
                                        <span class="glyphicon glyphicon-minus"></span>
                                        </button>
                                        </span>
                                        <input disabled type="text" name="quant[2]" class="form-control input-number" value="10" min="1" max="100">
                                        <span class="input-group-btn">
                                        <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]">
                                        <span class="glyphicon glyphicon-plus"></span>
                                        </button>
                                        </span>
                                        </div>
                                        </td>
                                        <td>Make-up</td>
                                        <td>99.75</td>
                                        </tr>
                                        </tbody>
                                </table>
                            </div>
                            <div align="right">
                                <button type="button" class="btn btn-success">Submit order</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

     <!-- jQuery -->
    <script type="text/javascript" src="{{ asset('assets/js-shop/jquery.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="{{ asset('assets/js-shop/bootstrap.min.js')}}"></script>

</html>