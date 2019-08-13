@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @if(Request::is('admin/schools*'))
                    <h1>School</h1>
                    @elseif(Request::is('admin/unverified_schools*'))
                    <h1>Unverified School</h1>
                    @elseif(Request::is('admin/verified_schools*'))
                    <h1>Verified School</h1>
                    @endif
                </div>
                <div class="col-sm-6">
                    <h1 class="float-sm-right">
                        @if(Request::is('admin/schools*'))
                        <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('schools.create') !!}">Add New</a>
                        @endif
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
                    @include('schools.table')
                </div>
            </div>
            <div class="text-center">

            </div>
        </div>
    </div>
@endsection

