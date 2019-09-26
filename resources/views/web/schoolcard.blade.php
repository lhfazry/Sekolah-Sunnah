
@foreach($schools as $school)
<div class="item">
    <div class="wrapper">
        <div class="image">
            <h3>{!!$school->getTags()!!}<a href="{{route('web.detail', encrypt($school->id))}}" class="title">{{$school->nama_sekolah}}</a></h3>
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
        </div><a href="{{route('web.detail', encrypt($school->id))}}" class="detail text-caps underline">Lihat Sekolah</a></div>
</div>
@endforeach