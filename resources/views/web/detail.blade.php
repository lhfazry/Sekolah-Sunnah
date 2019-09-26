@extends('web.web2')
@section('css')
<link href='https://api.mapbox.com/mapbox-gl-js/v1.2.0/mapbox-gl.css' rel='stylesheet' />
<style>
    .box h3 {
        margin-bottom: 5px;
    }
</style>
@endsection

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
                            {!! $school->description !!}
                        </p>
                    </section>
                    <section>
                        <h2>Fasilitas</h2>
                        <ul class="features-checkboxes columns-3">
                            @foreach($school->facilities as $facility)
                            @php
                            if(empty($facility) || empty($facility->facility)) {
                                continue;
                            }
                            @endphp
                            <li>{{$facility->facility->name}}</li>
                            @endforeach
                        </ul>
                    </section>

                    @if($school->isLocationExists())
                    <section>
                        <h2>Lokasi</h2>
                        <div id='map' class="map height-500px"></div>
                    </section>
                    @endif
                </div>
                <div class="col-md-4">
                    <aside class="sidebar">
                        <section>
                            <h2>Data Lainnya</h2>
                            <div class="box">
                                <h3>Nama</h3>
                                <p>{{$school->nama_sekolah}}</p>

                                <h3>Jenjang</h3>
                                <p>{{$school->level->name}}</p>

                                <h3>Uang Masuk</h3>
                                <p>{{$school->displayBiayaPendaftaran()}}</p>

                                <h3>Biaya Bulanan</h3>
                                <p>{{$school->displaySPP()}}</p>

                                <h3>Alamat</h3>
                                <p>{{$school->address}}</p>

                                <h3>Kota</h3>
                                <p>{{$school->city_province()}}</p>

                                <h3>Telepon</h3>
                                <p>{{$school->phone1}}</p>

                                <h3>Email</h3>
                                <p>{{$school->email}}</p>

                                <h3>Website</h3>
                                <p>{{$school->website}}</p>

                                <!--<hr>
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
                                </form>-->
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
                @component('web.schoolcard', ['schools' => $other_schools])@endcomponent
        </div>
    </section>
</section>
@endsection

@section('scripts')
<script src='https://api.mapbox.com/mapbox-gl-js/v1.2.0/mapbox-gl.js'></script>


<script>
    $(document).ready(function(){
        @if($school->isLocationExists())
        mapboxgl.accessToken = 'pk.eyJ1IjoibGhmYXpyeSIsImEiOiJjazA5OGt0aDgwNDh3M29vYzF0YWpkNXI4In0.s5lg_BvXMi989GI2liegVg';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [{{$school->lng}}, {{$school->lat}}],
            zoom: 15
        });
        
        // disable map zoom when using scroll
        map.scrollZoom.disable();

        // Add zoom and rotation controls to the map.
        map.addControl(new mapboxgl.NavigationControl());

        var marker = new mapboxgl.Marker()
        .setLngLat([{{$school->lng}}, {{$school->lat}}])
        .addTo(map);
        @endif
    });
</script>
@endsection
