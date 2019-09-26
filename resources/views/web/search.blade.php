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
                @component('web.schoolcard', ['schools' => $schools])@endcomponent
            </div>
        </div>
    </section>
@endsection
