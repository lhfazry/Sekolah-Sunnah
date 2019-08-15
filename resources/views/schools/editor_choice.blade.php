@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editor Choice</h1>
                </div>
                <div class="col-sm-6">
                    <h1 class="float-sm-right">
                    </h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="container-fluid">
            <div class="clearfix"></div>

            @include('flash::message')

            <div class="clearfix"></div>
            <div class="card card-primary">
                <div class="card-body">
                    @section('css')
                        @include('layouts.datatables_css')
                    @endsection

                    {!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']) !!}

                    @section('scripts')
                        @include('layouts.datatables_js')
                        {!! $dataTable->scripts() !!}
                    @endsection
                </div>
            </div>
            <div class="text-center">

            </div>
        </div>
    </div>
@endsection

