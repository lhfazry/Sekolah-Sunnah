
@foreach($schools as $school)
<div class="item">
    <div class="wrapper">
        <div class="image">
            <h3>{!!$school->getTags()!!}<a href="{{route('web.detail', $school->slug_sekolah)}}" class="title">{{$school->nama_sekolah}}</a></h3>
            <a href="{{route('web.detail', $school->slug_sekolah)}}" class="image-wrapper background-image"><img src="{{$school->getPhotoCoverUrl()}}" alt=""></a>
        </div>
        <h4 class="location"><a href="{{route('web.search', ['city'=>$school->city_id])}}">{{$school->city_province()}}</a></h4>
        <div class="price">{{$school->displaySPP()}}</div>
        <div class="meta">
            {!!$school->getOtherFacilities()!!}
            <figure><i class="fa fa-money"></i>&nbsp;{{$school->displayBiayaPendaftaran()}}</figure>
        </div>
        <div class="description">
            <p>{{$school->exceprt()}}</p>
        </div><a href="{{route('web.detail', $school->slug_sekolah)}}" class="detail text-caps underline">Lihat Sekolah</a></div>
</div>
@endforeach