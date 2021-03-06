@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Province</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="content">
        <div class="container-fluid">
            @include('adminlte-templates::common.errors')
            {!! Form::open(['route' => 'cities.store', 'class' => 'form-horizontal']) !!}
            @include('cities.fields')

            {!! Form::close() !!}
        </div>
    </div>
@endsection
