@extends('layout.master')
@section('title', 'Skin Potions')
@section('content')

<!-- About -->
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 style="font-size:45px;color: #ff6699;font-family:GLAMOURGIRL;">About the brand</h2>
                    <p class="lead" style="color: #9d9797;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu elementum velit, non interdum lacus. Vivamus volutpat, nisi ullamcorper facilisis varius, odio elit commodo mi, vitae efficitur ligula neque eu metus. Aenean nibh nunc, varius nec diam a, vulputate consequat mi. Morbi efficitur leo a convallis semper</a>.</p>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Products -->
    <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
    <section id="products" class="services bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                    <h2 style="font-size:45px;font-family:GLAMOURGIRL;">Our Finest Products</h2>
                    <hr class="small">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="/shop">
                                    <img class="img-portfolio img-responsive" src="img/cat1.png">
                                     <span class="btn btn-dark btn-lg" style="font-family:Amber Shaie;">Category 1</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="img/cat2.png">
                                     <span class="btn btn-dark btn-lg" style="font-family:Amber Shaie;">Category 2</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="img/cat3.png">
                                    <span class="btn btn-dark btn-lg" style="font-family:Amber Shaie;">Category 3</span>
                                </a>       
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="img/cat4.png">
                                    <span class="btn btn-dark btn-lg" style="font-family:Amber Shaie;">Category 4</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
@endsection

