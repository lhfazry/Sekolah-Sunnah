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
    <link rel="stylesheet" href="{{asset('FrontEnd/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('FrontEnd/assets/css/site.css')}}">
    <title>Direktori Sekolah Sunnah se-Indonesia | SekolahSunnah.com</title>
</head>

<body>
    <div class="page home-page">
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
                            <li><a href="#"><i class="fa fa-pencil-square-o"></i>Daftar
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
                                    <li class="nav-item active"><a class="nav-link" href="#">Home</a></li>
                                    <li class="nav-item has-child"><a class="nav-link" href="#">Sekolah</a>
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
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                                    <li class="nav-item"><a href="#" class="btn btn-primary text-caps btn-rounded btn-framed">Submit Data</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="page-title">
                    <div class="container">
                        <h1 class="center">
                            Cari Sekolah Impian Bermanhaj Salaf Yang Sesuai Untuk Buah Hati Anda Hanya Di SekolahSunnah.com
                        </h1></div>
                </div>
                <form class="hero-form form">
                    <div class="container">
                        <div class="main-search-form">
                            <div class="form-row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="what" class="col-form-label">Cari Sekolah Apa?</label>
                                        <input name="keyword" type="text" class="form-control" id="what" placeholder="Masukkan nama sekolah...">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <div class="form-group">
                                        <label for="input-location" class="col-form-label">Dimana?</label>
                                        <input name="location" type="text" class="form-control" id="input-location" placeholder="Masukkan lokasi..."><span class="geo-location input-group-addon" data-toggle="tooltip" data-placement="top" title="Find My Position"><i class="fa fa-map-marker"></i></span></div>
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
                                            <label>
                                                <input type="checkbox" name="ikhwan"> Ikhwan
                                            </label>
                                            <label>
                                                <input type="checkbox" name="akhwat"> Akhwat
                                            </label>
                                            <label>
                                                <input type="checkbox" name="boarding"> Boarding
                                            </label>
                                            <label>
                                                <input type="checkbox" name="fullday"> Fullday
                                            </label>
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="background">
                    <div class="background-image" style="background-image: url('{{asset('FrontEnd/assets/img/bg-ss-highlight.jpg')}}')"><img src="{{asset('FrontEnd/assets/img/bg-ss-highlight.jpg')}}" alt=""></div>
                </div>
            </div>
        </header>
        <section class="content">
            <section class="block">
                <div class="container">
                    <h2>Kategori Sekolah</h2>
                    <ul class="categories-list clearfix">
                        <li><i class="category-icon"><img src="{{asset('FrontEnd/assets/img/icon-sekolah.png')}}" alt=""></i>
                            <h3><a href="#">TK/Paud</a></h3>
                            <div class="sub-categories">
                                Pendidikan Anak Usia Dini
                            </div>
                        </li>
                        <li><i class="category-icon"><img src="{{asset('FrontEnd/assets/img/icon-sekolah.png')}}" alt=""></i>
                            <h3><a href="#">MI</a></h3>
                            <div class="sub-categories">
                                Madrasah Ibtidaiyah
                            </div>
                        </li>
                        <li><i class="category-icon"><img src="{{asset('FrontEnd/assets/img/icon-sekolah.png')}}" alt=""></i>
                            <h3><a href="#">MTs</a></h3>
                            <div class="sub-categories">
                                Madrasah Tsanawiyah
                            </div>
                        </li>
                        <li><i class="category-icon"><img src="{{asset('FrontEnd/assets/img/icon-sekolah.png')}}" alt=""></i>
                            <h3><a href="#">MA</a></h3>
                            <div class="sub-categories">
                                Madrasah Aliyah
                            </div>
                        </li>
                        <li><i class="category-icon"><img src="{{asset('FrontEnd/assets/img/icon-sekolah.png')}}" alt=""></i>
                            <h3><a href="#">TK/Paud</a></h3>
                            <div class="sub-categories">
                                Pendidikan Anak Usia Dini
                            </div>
                        </li>
                        <li><i class="category-icon"><img src="{{asset('FrontEnd/assets/img/icon-sekolah.png')}}" alt=""></i>
                            <h3><a href="#">MI</a></h3>
                            <div class="sub-categories">
                                Madrasah Ibtidaiyah
                            </div>
                        </li>
                        <li><i class="category-icon"><img src="{{asset('FrontEnd/assets/img/icon-sekolah.png')}}" alt=""></i>
                            <h3><a href="#">MTs</a></h3>
                            <div class="sub-categories">
                                Madrasah Tsanawiyah
                            </div>
                        </li>
                        <li><i class="category-icon"><img src="{{asset('FrontEnd/assets/img/icon-sekolah.png')}}" alt=""></i>
                            <h3><a href="#">MA</a></h3>
                            <div class="sub-categories">
                                Madrasah Aliyah
                            </div>
                        </li>
                    </ul>
                </div>
            </section>
            <section class="block">
                <div class="container">
                    <h2>Sekolah Pilihan</h2>
                    <div class="items grid grid-xl-3-items grid-lg-3-items grid-md-2-items">
                        <div class="item">
                            <div class="wrapper">
                                <div class="image">
                                    <h3><a href="#" class="tag category">Ikhwan</a><a href="#" class="title">Fitrah Islamic World Academy</a><span class="tag">Pilihan</span></h3>
                                    <a href="#" class="image-wrapper background-image"><img src="http://www.fiwa.sch.id/static_content/img/BasketBall5d454d6ab8989.jpg" alt=""></a>
                                </div>
                                <h4 class="location"><a href="#">Bogor, Jawa Barat</a></h4>
                                <div class="price">Rp3.000.000/Bulan</div>
                                <div class="meta">
                                    <figure><i class="fa fa-building"></i>Boarding School
                                    </figure>
                                    <figure><a href="#"><i class="fa fa-money"></i><span class="red">$$$</span>$$
                                        </a></figure>
                                </div>
                                <div class="description">
                                    <p>Fitrah Islamic World Academy atau dikenal dengan FIWA terletak di kabupaten Bogor...</p>
                                </div><a href="#" class="detail text-caps underline">Lihat Sekolah</a></div>
                        </div>
                        <div class="item">
                            <div class="wrapper">
                                <div class="image">
                                    <h3><a href="#" class="tag category">Ikhwan</a><a href="#" class="title">Fitrah Islamic World Academy</a><span class="tag">Pilihan</span></h3>
                                    <a href="#" class="image-wrapper background-image"><img src="http://www.fiwa.sch.id/static_content/img/BasketBall5d454d6ab8989.jpg" alt=""></a>
                                </div>
                                <h4 class="location"><a href="#">Bogor, Jawa Barat</a></h4>
                                <div class="price">Rp3.000.000/Bulan</div>
                                <div class="meta">
                                    <figure><i class="fa fa-building"></i>Boarding School
                                    </figure>
                                    <figure><a href="#"><i class="fa fa-money"></i><span class="red">$$$</span>$$
                                        </a></figure>
                                </div>
                                <div class="description">
                                    <p>Fitrah Islamic World Academy atau dikenal dengan FIWA terletak di kabupaten Bogor...</p>
                                </div><a href="#" class="detail text-caps underline">Lihat Sekolah</a></div>
                        </div>
                        <div class="item">
                            <div class="wrapper">
                                <div class="image">
                                    <h3><a href="#" class="tag category">Ikhwan</a><a href="#" class="title">Fitrah Islamic World Academy</a><span class="tag">Pilihan</span></h3>
                                    <a href="#" class="image-wrapper background-image"><img src="http://www.fiwa.sch.id/static_content/img/BasketBall5d454d6ab8989.jpg" alt=""></a>
                                </div>
                                <h4 class="location"><a href="#">Bogor, Jawa Barat</a></h4>
                                <div class="price">Rp3.000.000/Bulan</div>
                                <div class="meta">
                                    <figure><i class="fa fa-building"></i>Boarding School
                                    </figure>
                                    <figure><a href="#"><i class="fa fa-money"></i><span class="red">$$$</span>$$
                                        </a></figure>
                                </div>
                                <div class="description">
                                    <p>Fitrah Islamic World Academy atau dikenal dengan FIWA terletak di kabupaten Bogor...</p>
                                </div><a href="#" class="detail text-caps underline">Lihat Sekolah</a></div>
                        </div>
                    </div>
                </div>
                <div class="background" data-background-color="#fff"></div>
            </section>
            <section class="block">
                <div class="container">
                    <h2>Sekolah Terbaru</h2>
                    <div class="items grid grid-xl-4-items grid-lg-3-items grid-md-2-items">
                        <div class="item">
                            <div class="wrapper">
                                <div class="image">
                                    <h3><a href="#" class="tag category">Ikhwan</a><a href="#" class="title">Fitrah Islamic World Academy</a></h3>
                                    <a href="#" class="image-wrapper background-image"><img src="http://www.fiwa.sch.id/static_content/img/BasketBall5d454d6ab8989.jpg" alt=""></a>
                                </div>
                                <h4 class="location"><a href="#">Bogor, Jawa Barat</a></h4>
                                <div class="price">Rp3.000.000/Bulan</div>
                                <div class="meta">
                                    <figure><i class="fa fa-building"></i>Boarding School
                                    </figure>
                                    <figure><a href="#"><i class="fa fa-money"></i><span class="red">$$$</span>$$
                                        </a></figure>
                                </div>
                                <div class="description">
                                    <p>Fitrah Islamic World Academy atau dikenal dengan FIWA terletak di kabupaten Bogor...</p>
                                </div><a href="#" class="detail text-caps underline">Lihat Sekolah</a></div>
                        </div>
                        <div class="item">
                            <div class="wrapper">
                                <div class="image">
                                    <h3><a href="#" class="tag category">Ikhwan</a><a href="#" class="title">Fitrah Islamic World Academy</a></h3>
                                    <a href="#" class="image-wrapper background-image"><img src="http://www.fiwa.sch.id/static_content/img/BasketBall5d454d6ab8989.jpg" alt=""></a>
                                </div>
                                <h4 class="location"><a href="#">Bogor, Jawa Barat</a></h4>
                                <div class="price">Rp3.000.000/Bulan</div>
                                <div class="meta">
                                    <figure><i class="fa fa-building"></i>Boarding School
                                    </figure>
                                    <figure><a href="#"><i class="fa fa-money"></i><span class="red">$$$</span>$$
                                        </a></figure>
                                </div>
                                <div class="description">
                                    <p>Fitrah Islamic World Academy atau dikenal dengan FIWA terletak di kabupaten Bogor...</p>
                                </div><a href="#" class="detail text-caps underline">Lihat Sekolah</a></div>
                        </div>
                        <div class="item">
                            <div class="wrapper">
                                <div class="image">
                                    <h3><a href="#" class="tag category">Ikhwan</a><a href="#" class="title">Fitrah Islamic World Academy</a></h3>
                                    <a href="#" class="image-wrapper background-image"><img src="http://www.fiwa.sch.id/static_content/img/BasketBall5d454d6ab8989.jpg" alt=""></a>
                                </div>
                                <h4 class="location"><a href="#">Bogor, Jawa Barat</a></h4>
                                <div class="price">Rp3.000.000/Bulan</div>
                                <div class="meta">
                                    <figure><i class="fa fa-building"></i>Boarding School
                                    </figure>
                                    <figure><a href="#"><i class="fa fa-money"></i><span class="red">$$$</span>$$
                                        </a></figure>
                                </div>
                                <div class="description">
                                    <p>Fitrah Islamic World Academy atau dikenal dengan FIWA terletak di kabupaten Bogor...</p>
                                </div><a href="#" class="detail text-caps underline">Lihat Sekolah</a></div>
                        </div>
                        <div class="item">
                            <div class="wrapper">
                                <div class="image">
                                    <h3><a href="#" class="tag category">Ikhwan</a><a href="#" class="title">Fitrah Islamic World Academy</a></h3>
                                    <a href="#" class="image-wrapper background-image"><img src="http://www.fiwa.sch.id/static_content/img/BasketBall5d454d6ab8989.jpg" alt=""></a>
                                </div>
                                <h4 class="location"><a href="#">Bogor, Jawa Barat</a></h4>
                                <div class="price">Rp3.000.000/Bulan</div>
                                <div class="meta">
                                    <figure><i class="fa fa-building"></i>Boarding School
                                    </figure>
                                    <figure><a href="#"><i class="fa fa-money"></i><span class="red">$$$</span>$$
                                        </a></figure>
                                </div>
                                <div class="description">
                                    <p>Fitrah Islamic World Academy atau dikenal dengan FIWA terletak di kabupaten Bogor...</p>
                                </div><a href="#" class="detail text-caps underline">Lihat Sekolah</a></div>
                        </div>
                        <div class="item">
                            <div class="wrapper">
                                <div class="image">
                                    <h3><a href="#" class="tag category">Ikhwan</a><a href="#" class="title">Fitrah Islamic World Academy</a></h3>
                                    <a href="#" class="image-wrapper background-image"><img src="http://www.fiwa.sch.id/static_content/img/BasketBall5d454d6ab8989.jpg" alt=""></a>
                                </div>
                                <h4 class="location"><a href="#">Bogor, Jawa Barat</a></h4>
                                <div class="price">Rp3.000.000/Bulan</div>
                                <div class="meta">
                                    <figure><i class="fa fa-building"></i>Boarding School
                                    </figure>
                                    <figure><a href="#"><i class="fa fa-money"></i><span class="red">$$$</span>$$
                                        </a></figure>
                                </div>
                                <div class="description">
                                    <p>Fitrah Islamic World Academy atau dikenal dengan FIWA terletak di kabupaten Bogor...</p>
                                </div><a href="#" class="detail text-caps underline">Lihat Sekolah</a></div>
                        </div>
                        <div class="item">
                            <div class="wrapper">
                                <div class="image">
                                    <h3><a href="#" class="tag category">Ikhwan</a><a href="#" class="title">Fitrah Islamic World Academy</a></h3>
                                    <a href="#" class="image-wrapper background-image"><img src="http://www.fiwa.sch.id/static_content/img/BasketBall5d454d6ab8989.jpg" alt=""></a>
                                </div>
                                <h4 class="location"><a href="#">Bogor, Jawa Barat</a></h4>
                                <div class="price">Rp3.000.000/Bulan</div>
                                <div class="meta">
                                    <figure><i class="fa fa-building"></i>Boarding School
                                    </figure>
                                    <figure><a href="#"><i class="fa fa-money"></i><span class="red">$$$</span>$$
                                        </a></figure>
                                </div>
                                <div class="description">
                                    <p>Fitrah Islamic World Academy atau dikenal dengan FIWA terletak di kabupaten Bogor...</p>
                                </div><a href="#" class="detail text-caps underline">Lihat Sekolah</a></div>
                        </div>
                        <div class="item">
                            <div class="wrapper">
                                <div class="image">
                                    <h3><a href="#" class="tag category">Ikhwan</a><a href="#" class="title">Fitrah Islamic World Academy</a></h3>
                                    <a href="#" class="image-wrapper background-image"><img src="http://www.fiwa.sch.id/static_content/img/BasketBall5d454d6ab8989.jpg" alt=""></a>
                                </div>
                                <h4 class="location"><a href="#">Bogor, Jawa Barat</a></h4>
                                <div class="price">Rp3.000.000/Bulan</div>
                                <div class="meta">
                                    <figure><i class="fa fa-building"></i>Boarding School
                                    </figure>
                                    <figure><a href="#"><i class="fa fa-money"></i><span class="red">$$$</span>$$
                                        </a></figure>
                                </div>
                                <div class="description">
                                    <p>Fitrah Islamic World Academy atau dikenal dengan FIWA terletak di kabupaten Bogor...</p>
                                </div><a href="#" class="detail text-caps underline">Lihat Sekolah</a></div>
                        </div>
                        <div class="item">
                            <div class="wrapper">
                                <div class="image">
                                    <h3><a href="#" class="tag category">Ikhwan</a><a href="#" class="title">Fitrah Islamic World Academy</a></h3>
                                    <a href="#" class="image-wrapper background-image"><img src="http://www.fiwa.sch.id/static_content/img/BasketBall5d454d6ab8989.jpg" alt=""></a>
                                </div>
                                <h4 class="location"><a href="#">Bogor, Jawa Barat</a></h4>
                                <div class="price">Rp3.000.000/Bulan</div>
                                <div class="meta">
                                    <figure><i class="fa fa-building"></i>Boarding School
                                    </figure>
                                    <figure><a href="#"><i class="fa fa-money"></i><span class="red">$$$</span>$$
                                        </a></figure>
                                </div>
                                <div class="description">
                                    <p>Fitrah Islamic World Academy atau dikenal dengan FIWA terletak di kabupaten Bogor...</p>
                                </div><a href="#" class="detail text-caps underline">Lihat Sekolah</a></div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="block" style="padding-top:0;">
                <div class="container">
                    <div class="box has-dark-background newsletter-box">
                        <div class="row align-items-center justify-content-center d-flex">
                            <div class="col-md-10 py-5">
                                <h2>Dapatkan Info Sekolah Sunnah Terkini di Email Anda</h2>
                                <form class="form email">
                                    <div class="form-row">
                                        <div class="col-md-4 col-sm-4">
                                            <div class="form-group">
                                                <label for="newsletter_category" class="col-form-label">Kategori</label>
                                                <select name="newsletter_category" id="newsletter_category" data-placeholder="Pilih Kategori">
                                                    <option value="">Pilih Kategori</option>
                                                    <option value="1">TK/Paud</option>
                                                    <option value="2">Madrasah Ibtidaiyah</option>
                                                    <option value="3">Madrasah Tsanawiyah</option>
                                                    <option value="4">Madrasah Aliyah</option>
                                                    <option value="5">Sekolah Tinggi</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-sm-7">
                                            <div class="form-group">
                                                <label for="newsletter_email" class="col-form-label">Alamat Email</label>
                                                <input name="newsletter_email" type="email" class="form-control" id="newsletter_email" placeholder="Alamat Email">
                                            </div>
                                        </div>
                                        <div class="col-md-1 col-sm-1">
                                            <div class="form-group">
                                                <label class="invisible">.</label>
                                                <button type="submit" class="btn btn-primary width-100"><i class="fa fa-chevron-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="background">
                            <div class="background-image"><img src="{{asset('FrontEnd/assets/img/bg-ss-highlight.jpg')}}" alt=""></div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
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
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">Sekolah</a></li>
                                            <li><a href="#">Kategori</a></li>
                                            <li><a href="#">Submit Data</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <nav>
                                        <ul class="list-unstyled">
                                            <li><a href="#">Tentang</a></li>
                                            <li><a href="#">Masuk</a></li>
                                            <li><a href="#">Daftar</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h2>Kontak</h2><address><figure>
                                    Yayasan IT Support Dakwah<br>
                                    Jonggol, Jawa Barat
                                </figure><br><strong>Email:</strong><a href="#">info@sekolahsunnah.com</a><br><strong>WhatsApp: </strong> 62 821 123 4567
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>
    <script src="{{asset('FrontEnd/assets/js/site.js"')}}></script>
</body>

</html>
