
@foreach($schools as $school)
<div class="item">
    <div class="wrapper">
        <div class="image">
            <h3>{!!$school->getTags()!!}<a href="{{route('web.detail', $school->slug_sekolah)}}" class="title">{{$school->nama_sekolah}}</a></h3>
            <a href="{{route('web.detail', $school->slug_sekolah)}}" class="image-wrapper background-image"><img src="{{$school->getPhotoCoverUrl()}}" alt=""></a>
        </div>
        <h4 class="location"><a href="{{route('web.search', ['city'=>$school->city_id])}}"><small>{{$school->city_province()}}</small></a></h4>
        <div class="price" title="SPP">{{$school->displaySPP()}}</div>
        <div class="meta">
            {!!$school->getOtherFacilities()!!}
            <figure title="Uang Pendaftaran"><i class="fa fa-money"></i>&nbsp;{{$school->displayBiayaPendaftaran()}}</figure>
        </div>
        <div class="description">
            <p>{{$school->exceprt()}}</p>
        </div><a href="{{route('web.detail', $school->slug_sekolah)}}" class="detail text-caps underline">Lihat Sekolah</a></div>
</div>
@endforeach