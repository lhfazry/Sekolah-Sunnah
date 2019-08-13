@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Roles</h1>
                </div>
                <div class="col-sm-6">
                    <h1 class="float-sm-right">
                        <!--<a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('roles.create') !!}">Add New</a>-->
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
                    @include('roles.table')
                </div>
            </div>
            <div class="text-center">

            </div>
        </div>
    </div>
@endsection

