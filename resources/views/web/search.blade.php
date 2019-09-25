@extends('web.web')

@section('title')
<div class="page-title">
    <div class="container">
        <h1 class="center">
            Sekolah yang sesuai dengan kriteria pencarian Anda
        </h1>
    </div>
</div>
@endsection

@section('content')
    <section class="block">
        <div class="container">
            @if(sizeof($schools) == 0)
            <div class="row">
                <div class="col-md-12 text-center">
                    <span class="alert alert-info text-center"><i class="fa fa-search"></i>&nbsp;Tidak ada sekolah yang sesuai kriteria pencarian</span>
                </div>
            </div>
            @endif

            <div class="items grid grid-xl-4-items grid-lg-3-items grid-md-2-items">
                @foreach($schools as $school)
                <div class="item">
                    <div class="wrapper">
                        <div class="image">
                            <h3>{!!$school->getTags()!!}<a href="{{route('web.detail', $school->slug_sekolah)}}" class="title">{{$school->nama_sekolah}}</a></h3>
                            <a href="{{route('web.detail', $school->slug_sekolah)}}" class="image-wrapper background-image"><img src="{{$school->getPhotoCoverUrl()}}" alt=""></a>
                        </div>
                        <h4 class="location"><a href="{{route('web.search', ['city' => $school->city_id])}}">{{$school->city_province()}}</a></h4>
                        <div class="price">{{$school->displaySPP()}}</div>
                        <div class="meta">
                            {!!$school->getOtherFacilities()!!}
                            <figure><a href="#" title="Uang Pangkal"><i class="fa fa-money"></i>&nbsp;{{$school->displayBiayaPendaftaran()}}</a></figure>
                        </div>
                        <div class="description">
                            <p>{{$school->exceprt()}}</p>
                        </div><a href="{{route('web.detail', $school->slug_sekolah)}}" class="detail text-caps underline">Lihat Sekolah</a></div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
