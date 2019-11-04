@extends('web.web')

@section('title')
<div class="page-title">
    <div class="container">
        <h1 class="center">
            Sekolah yang sesuai dengan kriteria pencarian Anda
        </h1>
    </div>
</div>
@component('web.searchform', [
    'keyword' => $keyword, 
    'cities' => $cities, 
    'city' => $city,
    'facilities' => $facilities,
    'min_price' => $min_price,
    'max_price' => $max_price,
    'facilities_form' => count($facilities_form) > 0 ? $facilities_form : array(),
    'expand' => $expand
    ])@endcomponent
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

            @if(sizeof($schools) > 0)
            <div class="col-md-12">
                <h2 class="lead">Halaman <strong class="text-danger">{{ $schools->currentPage() }}</strong> dari <strong class="text-danger">{{ $schools->total() }}</strong> hasil pencarian</h2>
            </div>
            <div class="items grid grid-xl-4-items grid-lg-3-items grid-md-2-items">
                @component('web.schoolcard', ['schools' => $schools])@endcomponent
            </div>
            <div style="text-align:center">{{ $schools->links() }}</div>
            @endif
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

        @if($expand)
        /* 
        * Jika user mencari menggunakan filter di detail pencarian,
        * maka detail pencarian akan ter-expand
        */
        $('#collapseAlternativeSearchForm').collapse({
            toggle: true
        })
        @endif

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