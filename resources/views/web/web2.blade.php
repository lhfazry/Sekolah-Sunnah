<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="ITSD">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Varela+Round" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('FrontEnd/assets/css/style.css')}}?t=12312312">
    <link rel="stylesheet" href="{{asset('FrontEnd/assets/css/site.css')}}?t=12312312">
    <title>{{$title}} | SekolahSunnah.com</title>

    @yield('css')
    <style>
        .select2-selection {
            transition: .3s ease;
            border-radius: .3rem !important;
            font-weight: 500;
            padding: 1.2rem;
            height: auto !important;
            background-image: none;
            background-color: #fff !important;
            position: relative;
            line-height: inherit;
            box-shadow: 0 0.2rem 1rem 0rem rgba(0,0,0, .1);
            border: .1rem solid rgba(0,0,0, .15) !important;
        }

        .select2-selection__arrow {
            height: 52px !important;
        }
    </style>
</head>

<body>
    <div class="page detail-page">
        <header class="hero has-dark-background">
            <div class="hero-wrapper">
                <div class="secondary-navigation">
                    <div class="container">
                        <ul class="left">
                            <li><span>
                                Direktori Sekolah Sunnah se-Indonesia
                            </span></li>
                        </ul>
                        <ul class="right">
                            <li><a href="#"><i class="fa fa-sign-in"></i>Masuk
                                </a></li>
                        </ul>
                    </div>
                </div>
                <div class="main-navigation">
                    <div class="container">
                        <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
                            <a class="navbar-brand" href="index.html"><img src="{{asset('FrontEnd/assets/img/logo-ss-c.png')}}" alt=""></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                            <div class="collapse navbar-collapse" id="navbar">
                                <ul class="navbar-nav">
                                    <li class="nav-item active"><a class="nav-link" href="{{URL::to('/')}}">Home</a></li>
                                    <!--<li class="nav-item has-child"><a class="nav-link" href="#">Sekolah</a>
                                        <ul class="child">
                                            <li class="nav-item has-child"><a href="#" class="nav-link">Ikhwan</a>
                                                <ul class="child">
                                                    <li class="nav-item"><a href="#" class="nav-link">Boarding School</a></li>
                                                    <li class="nav-item"><a href="#" class="nav-link">Fullday School</a></li>
                                                </ul>
                                            </li>
                                            <li class="nav-item has-child"><a href="#" class="nav-link">Akhwat</a>
                                                <ul class="child">
                                                    <li class="nav-item"><a href="#" class="nav-link">Boarding School</a></li>
                                                    <li class="nav-item"><a href="#" class="nav-link">Fullday School</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>-->
                                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                                    <li class="nav-item"><a href="{{route('web.submit')}}" class="btn btn-primary text-caps btn-rounded btn-framed">Submit Data</a></li>
                                </ul>
                            </div>
                            <a href="#collapseMainSearchForm" class="main-search-form-toggle collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="collapseMainSearchForm">
                                <i class="fa fa-search"></i>
                                <i class="fa fa-close"></i>
                            </a>
                        </nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Sekolah</a></li>
                            <li class="breadcrumb-item active">{{$title}}</li>
                        </ol>
                    </div>
                </div>
                <div class="collapse" id="collapseMainSearchForm" style="">
                    {!! Form::open(['route' => 'web.search', 'class' => 'hero-form form', 'method' => 'get']) !!}
                        <div class="container">
                            <div class="main-search-form">
                                <div class="form-row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            {!! Form::label('keyword', 'Cari Sekolah Apa?', ['class' => 'col-form-label']) !!}
                                            {!! Form::text('keyword', null, ['class' => 'form-control', 'placeholder' => "Masukkan nama sekolah..."]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            {!! Form::label('city', 'Dimana?', ['class' => 'col-form-label']) !!}
                                            {!! Form::select('city', $cities, ['class' => 'form-control width-100']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <button type="submit" class="btn btn-primary width-100">Tampilkan Pencarian</button>
                                    </div>
                                </div>
                            </div>
                            <div class="alternative-search-form"><a href="#collapseAlternativeSearchForm" class="icon" data-toggle="collapse" aria-expanded="false" aria-controls="collapseAlternativeSearchForm"><i class="fa fa-plus"></i>Detail Pencarian</a>
                                <div class="collapse" id="collapseAlternativeSearchForm">
                                    <div class="wrapper">
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 d-xs-grid d-flex align-items-center justify-content-between">
                                                @foreach($facilities as $facility)
                                                <label>
                                                    <input type="checkbox" name="facilities[]" value="{{$facility->id}}"> {{$facility->name}}
                                                </label>
                                                @endforeach
                                            </div>
                                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-row">
                                                    <div class="col-md-4 col-sm-4">
                                                        <div class="form-group">
                                                            <input name="min_price" type="text" class="form-control small" id="min-price" placeholder="Budget Minimal"><span class="input-group-addon small">Rp</span></div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4">
                                                        <div class="form-group">
                                                            <input name="max_price" type="text" class="form-control small" id="max-price" placeholder="Budget Maksimal"><span class="input-group-addon small">Rp</span></div>
                                                    </div>
                                                    <!--
                                                    <div class="col-md-4 col-sm-4">
                                                        <div class="form-group">
                                                            <select name="distance" id="distance" class="small" data-placeholder="Jarak">
                                                                <option value="">Jarak</option>
                                                                <option value="1">1km</option>
                                                                <option value="2">5km</option>
                                                                <option value="3">10km</option>
                                                                <option value="4">50km</option>
                                                                <option value="5">100km</option>
                                                            </select>
                                                        </div>
                                                    </div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
                @yield('title')
                <div class="background"></div>
            </div>
        </header>

        @yield('content')

        <footer class="footer">
            <div class="wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <a href="#" class="brand"><img src="{{asset('FrontEnd/assets/img/logo-ss-b.png')}}" alt=""></a>
                            <p>
                                SekolahSunnah.com adalah direktori yang memuat kumpulan informasi sekolah bermanhaj salaf yang ada di Indonesia. Informasi yang kami sajikan telah kami filter sehingga insyaAllah terjaga dari segi manhaj dan keberadaannya.
                            </p>
                        </div>
                        <div class="col-md-3">
                            <h2>Laman</h2>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <nav>
                                        <ul class="list-unstyled">
                                            <li><a href="{{URL::to('/')}}">Home</a></li>
                                            <!--<li><a href="#">Sekolah</a></li>
                                            <li><a href="#">Kategori</a></li>-->
                                            <li><a href="{{route('web.submit')}}">Submit Data</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <nav>
                                        <ul class="list-unstyled">
                                            <li><a href="#">Tentang</a></li>
                                            <li><a href="{{route('login')}}">Masuk</a></li>
                                            <!--<li><a href="#">Daftar</a></li>-->
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h2>Kontak</h2><address><figure>
                                    Yayasan IT Support Dakwah<br>
                                    Jonggol, Jawa Barat
                                </figure><br><strong>Email:</strong><a href="#">info@sekolahsunnah.com</a><br><strong>WhatsApp: </strong> <a target="_blank" href="https://wa.me/6287876335618">6287876335618</a>
                            </address></div>
                    </div>
                </div>
                <div class="background">
                    <div class="background-image original-size"><img src="{{asset('FrontEnd/assets/img/bg-footer-ss.jpg')}}" alt=""></div>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/popper.js@1.13.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyBEDfNcQRmKQEyulDN8nGWjLYPm8s4YB58&libraries=places"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/standalone/selectize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.0/masonry.pkgd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
    <script src="{{asset('FrontEnd/assets/js/site.js')}}?t=12312312"></script>

    <script>
        $(document).ready(function(){
            $('select').select2({'width': '100%'});
        });
    </script>
    @yield('scripts')
</body>

</html>
