@extends('web.web')

@section('title')
<div class="page-title">
    <div class="container">
        <h1 class="center">
            {{$level->description}}
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

            <div class="col-md-12">
                <h2 class="lead">Halaman <strong class="text-danger">{{ $schools->currentPage() }}</strong> dari <strong class="text-danger">{{ $schools->total() }}</strong> hasil pencarian</h2>
            </div>
            <div class="items grid grid-xl-4-items grid-lg-3-items grid-md-2-items">
            @component('web.schoolcard', ['schools' => $schools])@endcomponent
            </div>
            <div style="text-align:center">{{ $schools->links() }}</div>
        </div>
    </section>
@endsection
