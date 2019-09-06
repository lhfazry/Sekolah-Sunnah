@extends('web.web2')

@section('title')
<div class="page-title">
    <div class="container clearfix">
        <div class="float-left float-xs-none">
            <h1>{{$school->nama_sekolah}}
                {!! $school->getTags()!!}
            </h1>
            <h4 class="location">
                <a href="#">{{$school->city->city_province()}}</a>
            </h4>
        </div>
        <div class="float-right float-xs-none price">
            <div class="number">{{$school->displaySPP()}}</div>
            <div class="id opacity-50">
                Per Bulan
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<section class="content">
    <section class="block detail">
        <div class="container">
            <section>
                <div class="gallery-carousel owl-carousel">
                    @foreach($school->getPhotos() as $k=>$photo)
                    <img src="{{$photo}}" alt="" data-hash="{{$k+1}}">
                    @endforeach
                </div>
                <div class="gallery-carousel-thumbs owl-carousel">
                    @foreach($school->getPhotos() as $k=>$photo)
                    <a href="#{{$k+1}}" class="owl-thumb active-thumb background-image">
                        <img src="{{$photo}}" alt="">
                    </a>
                    @endforeach
                </div>
            </section>
            <div class="row flex-column-reverse flex-md-row">
                <div class="col-md-8">
                    <section>
                        <h2>Tentang</h2>
                        <p>
                            {{$school->description}}
                        </p>
                    </section>
                    <section>
                        <h2>Fasilitas</h2>
                        <ul class="features-checkboxes columns-3">
                            @foreach($school->facilities as $facility)
                            @php
                            if(empty($facility)) {
                                continue;
                            }
                            @endphp
                            <li>{{$facility->name}}</li>
                            @endforeach
                        </ul>
                    </section>
                    <!--
                    <section>
                        <h2>Lokasi</h2>
                        <div class="map height-300px" id="map-small">
                            <iframe src="https://g.page/rumahcoding?share" width="730" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                        </div>
                    </section>-->
                </div>
                <div class="col-md-4">
                    <aside class="sidebar">
                        <section>
                            <h2>Hubungi</h2>
                            <div class="box">
                                <dl>
                                    <dt>Telepon</dt>
                                    <dd>{{$school->phone1}}</dd>
                                    <dt>Email</dt>
                                    <dd>{{$school->email}}</dd>
                                </dl>
                                <hr>
                                <form class="form email">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label">Nama</label>
                                        <input name="name" type="text" class="form-control" id="name" placeholder="Nama Lengkap">
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-form-label">Email</label>
                                        <input name="email" type="email" class="form-control" id="email" placeholder="Alamat Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="message" class="col-form-label">Pesan</label>
                                        <textarea name="message" id="message" class="form-control" rows="4" placeholder="Assalaamualaikum, ana tertarik dengan sekolah ini..."></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </form>
                            </div>
                        </section>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <section class="block related">
        <div class="container">
            <hr>
            <h2>Sekolah Lainnya</h2>
            <div class="items grid grid-xl-4-items grid-lg-3-items grid-md-2-items">
                @foreach($other_schools as $oschool)
                <div class="item">
                    <div class="wrapper">
                        <div class="image">
                            <h3>{!!$school->getTags()!!}<a href="{{route('web.detail', encrypt($school->id))}}" class="title">{{$oschool->nama_sekolah}}</a></h3>
                            <a href="#" class="image-wrapper background-image" style="background-image: url(&quot;{{$school->getPhotoCoverUrl()}}&quot;);"><img src="{{$school->getPhotoCoverUrl()}}" alt=""></a>
                        </div>
                        <h4 class="location"><a href="#">{{$oschool->city_province()}}</a></h4>
                        <div class="price">{{$oschool->displaySPP()}}</div>
                        <div class="meta">
                            {!!$school->getOtherFacilities()!!}
                            <figure><a href="#" title="Uang Pangkal"><i class="fa fa-money"></i>&nbsp;{{$school->displayBiayaPendaftaran()}}</a></figure>
                        </div>
                        <div class="description">
                            <p>{{$oschool->exceprt()}}</p>
                        </div><a href="{{route('web.detail', encrypt($school->id))}}" class="detail text-caps underline">Lihat Sekolah</a></div>
                </div>
                @endforeach
        </div>
    </section>
</section>
@endsection
