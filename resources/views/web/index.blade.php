@extends('web.web')

@section('title')
    <div class="page-title">
        <div class="container">
            <h1 class="center">
                Cari Sekolah Impian Bermanhaj Salaf Yang Sesuai Untuk Buah Hati Anda Hanya Di SekolahSunnah.com
            </h1>
        </div>
    </div>

    @component('web.searchform', [
    'keyword' => '', 
    'cities' => $cities, 
    'city' => '',
    'facilities' => $facilities,
    'min_price' => '',
    'max_price' => '',
    'facilities_form' => array(),
    'expand' => false
    ])@endcomponent
@endsection
@section('content')
    <section class="block">
        <div class="container">
            <h2>Jenjang Sekolah</h2>
            <ul class="categories-list clearfix row">
                @foreach($levels as $level)
                <li class="col-lg-2 col-md-4 col-sm-6 col-xs-12 ml-4"><i class="category-icon"><img src="{{asset('FrontEnd/assets/img/icon-sekolah.png')}}" alt=""></i>
                    <h3><a href="{{route('web.level', [$level->name])}}">{{$level->name}}</a>&nbsp;<span class="badge badge-primary badge-level-counter">{{$level->displayCountLevel()}}</span></h3> 
                    <div class="sub-categories">
                        {{$level->description}}
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </section>
    <section class="block">
        <div class="container">
            <h2>Sekolah Pilihan</h2>
            <div class="items grid grid-xl-3-items grid-lg-3-items grid-md-2-items">
            @component('web.schoolcard', ['schools' => $editor_choices])@endcomponent
        </div>
        <div class="background" data-background-color="#fff"></div>
    </section>
    <section class="block">
        <div class="container">
            <h2>Sekolah Terbaru</h2>
            <div class="items grid grid-xl-4-items grid-lg-3-items grid-md-2-items">
                @component('web.schoolcard', ['schools' => $latest_schools])@endcomponent
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script>
    function dropdownOpen($dropdown){
        $dropdown.addClass("opening");
    }
    function dropdownClose($dropdown){
        $dropdown.removeClass("opening");
    }

    $(document).ready(function(){
        $("#city").select2();

        /*$( "#city_name" ).autocomplete({
            source: "{{ route('cities.autocomplete') }}",
            minLength: 3,
            select: function(event, ui) {
                $('#city_name').val(ui.item.value);
                $('#city').val(ui.item.id);
            }
        });*/
    });
</script>
@endsection
</body>

</html>
