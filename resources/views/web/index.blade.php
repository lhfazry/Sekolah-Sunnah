@extends('web.web')

@section('title')
    <div class="page-title">
        <div class="container">
            <h1 class="center">
                Cari Sekolah Impian Bermanhaj Salaf Yang Sesuai Untuk Buah Hati Anda Hanya Di SekolahSunnah.com
            </h1>
        </div>
    </div>

    {!! Form::open(['route' => 'web.search', 'class' => 'hero-form form', 'method' => 'get']) !!}
    {!! Form::hidden('city', null, ['id' => 'city']) !!}
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
                            {!! Form::label('city_name', 'Dimana?', ['class' => 'col-form-label']) !!}
                            {!! Form::text('city_name', null, ['class' => 'form-control', 'placeholder' => "Masukkan kota..."]) !!}
                            <!--<span class="geo-location input-group-addon" data-toggle="tooltip" data-placement="top" title="Find My Position"><i class="fa fa-map-marker"></i></span>-->
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        {!! Form::submit('Tampilkan Pencarian', ['class' => 'btn btn-primary width-100']) !!}
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
@endsection
@section('content')
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
                @foreach($latest_schools as $school)
                <div class="item">
                    <div class="wrapper">
                        <div class="image">
                            <h3>{!!$school->getTags()!!}<a href="#" class="title">{{$school->nama_sekolah}}</a></h3>
                            <a href="#" class="image-wrapper background-image"><img src="{{$school->getPhotoCoverUrl()}}" alt=""></a>
                        </div>
                        <h4 class="location"><a href="#">{{$school->city_province()}}</a></h4>
                        <div class="price">{{$school->displaySPP()}}</div>
                        <div class="meta">
                            {!!$school->getOtherFacilities()!!}
                            <figure><a href="#" title="Uang Pangkal"><i class="fa fa-money"></i>&nbsp;{{$school->displayBiayaPendaftaran()}}</a></figure>
                        </div>
                        <div class="description">
                            <p>{{$school->exceprt()}}</p>
                        </div><a href="#" class="detail text-caps underline">Lihat Sekolah</a></div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $( "#city_name" ).autocomplete({
            source: "{{ route('cities.autocomplete') }}",
            minLength: 3,
            select: function(event, ui) {
                $('#city_name').val(ui.item.value);
                $('#city').val(ui.item.id);
            }
        });
    });
</script>
@endsection
</body>

</html>
