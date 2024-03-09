@extends('layout.layout')
@section('content')
    <style>
         .event-description {
        font-size: 16px;
        line-height: 1.6;
        color: #333;
        margin-top: 10px;
    }
        img {
            display: block;
            height: auto;
            width: 100%
        }

        .card-price {
            display: inline-block;
            width: auto;
            height: 38px;
            background-color: #6ab070;
            -webkit-border-radius: 3px 4px 4px 3px;
            -moz-border-radius: 3px 4px 4px 3px;
            border-radius: 3px 4px 4px 3px;
            border-left: 1px solid #6ab070;
            /* This makes room for the triangle */
            margin-left: 19px;
            position: relative;
            color: white;
            font-weight: 300;
            font-size: 22px;
            line-height: 38px;
            padding: 0 10px 0 10px;
        }

        /* Makes the triangle */
        .card-price:before {
            content: "";
            position: absolute;
            display: block;
            left: -19px;
            width: 0;
            height: 0;
            border-top: 19px solid transparent;
            border-bottom: 19px solid transparent;
            border-right: 19px solid #6ab070;
        }

        /* Makes the circle */
        .card-price:after {
            content: "";
            background-color: white;
            border-radius: 50%;
            width: 4px;
            height: 4px;
            display: block;
            position: absolute;
            left: -9px;
            top: 17px;
        }

        .lSSlideOuter .lSSlideWrapper {
            height: 450px;
        }
    </style>

    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-5 pr-2">
                    <div class="card">
                        <div class="demo">
                            <ul id="lightSlider">
                                <!-- Images will be dynamically loaded here -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="right-side-pro-detail pb-3 pe-3 ps-3 m-0">
                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-between">
                               
                            </div>
                            
                            <div class="m-6 col-lg-12">
                               {{ $event->title}}
                            </div>
                            <div class="col-lg-12  pb-0 mb-5">
                                <p class="card-price mb-0">$.{{$event->price}}</p>
                                <hr>
                            </div>
                            <div class="col-lg-12">
                                <h5 class="text-primary">Event Details</h5>
                                <p class="event-description">{{$event->description}}</p>
                                <hr class="m-0 pt-1 mt-2">
                            </div>
                            <div class="col-lg-12 mt-2">
                                <strong>Location : <i class="fa fa-map-marker-alt text-primary"></i>
                                </strong>
                                {{$event->place}}
                            </div>
                            <div class="col-lg-12">
                                {{$event->price}}
                            </div>
                            <div class="col-lg-12">
                                <strong>Starting at : </strong>
                                {{ $event->start_date }}
                            </div>
                            <div class="col-lg-12 mt-2">
                                <strong>Available Tickets :
                                </strong>
                                {{$event->available_places}}
                            </div>
                            <div class="col-lg-12 mt-3">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn text-black bg-gray-200 btn-success w-100">Buy Ticket</button>
                                    </div>
                                    <div class="container mt-4">
                                        <h5>Share it:</h5>
                                        <div
                                            class="bg-dark rounded mb-2 p-1 mt-2 d-flex align-items-center justify-content-around">
                                            
                                            <a class="btn btn-square mx-1 text-white border m-2" href=""><i
                                                    class="fab fa-facebook-f"></i></a>
                                            <a class="btn btn-square mx-1 text-white border m-2" href=""><i
                                                    class="fab fa-instagram"></i></a>
                                            <a class="btn btn-square mx-1 text-white border m-2" href=""><i
                                                    class="fab fa-twitter"></i></a>
                                            <a class="btn btn-square mx-1 text-white border m-2" href=""><i
                                                    class="fab fa-youtube"></i></a>
                                            <a class="btn btn-square mx-1 text-white border m-2" href=""><i
                                                    class="fab fa-linkedin"></i></a>
                                            <a class="btn btn-square mx-1 text-white border m-2" href=""><i
                                                    class="fab fa-pinterest"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script>
    <script src='https://sachinchoolur.github.io/lightslider/dist/js/lightslider.js'></script>
    <script>
        $('#lightSlider').lightSlider({
            gallery: true,
            item: 1,
            loop: true,
            slideMargin: 0,
            thumbItem: 9
        });
    </script>
@endsection
