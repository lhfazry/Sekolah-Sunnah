@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Profile
        </h1>
    </section>
    <div class="content form-horizontal">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    <div class="form-group col-md-12 text-center" style="margin-top:20px"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Intel-logo.svg/200px-Intel-logo.svg.png" alt=""></div>
                </div>
                <hr>
                <div class="row">
                    <div id="lead_sender_ckb">
                        <!-- Lead Sender Division Field -->
                        <div class="form-group col-md-6">
                            {!! Form::label('name', 'Name', ['class' => 'col-sm-4 control-label']) !!}
                            <div class="col-sm-8">
                            {!! Form::text('name', $userEmployee->name, ['class' => 'form-control', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            {!! Form::label('email', 'Email', ['class' => 'col-sm-4 control-label']) !!}
                            <div class="col-sm-8">
                            {!! Form::text('email', $userEmployee->user->email, ['class' => 'form-control', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            {!! Form::label('manager_id', 'Manager', ['class' => 'col-sm-4 control-label']) !!}
                            <div class="col-sm-8">
                            {!! Form::text('manager_id', !empty($userEmployee->manager)?$userEmployee->manager->name:'', ['class' => 'form-control', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            {!! Form::label('role', 'Role', ['class' => 'col-sm-4 control-label']) !!}
                            <div class="col-sm-8">
                            {!! Form::text('role', $userEmployee->role, ['class' => 'form-control', 'readonly']) !!}
                            </div>
                        </div>

                        <!-- Lead Sender Department Field -->
                        <div class="form-group col-md-6">
                            {!! Form::label('division_id', 'Division', ['class' => 'col-sm-4 control-label']) !!}
                            <div class="col-sm-8">
                            {!! Form::text('division_id', !empty($userEmployee->division)?$userEmployee->division->name:'', ['class' => 'form-control', 'readonly']) !!}
                            </div>
                        </div>

                        <!-- Lead Sender Department Field -->
                        <div class="form-group col-md-6">
                            {!! Form::label('department_id', 'Department', ['class' => 'col-sm-4 control-label']) !!}
                            <div class="col-sm-8">
                            {!! Form::text('department_id', !empty($userEmployee->department)?$userEmployee->department->name:'', ['class' => 'form-control', 'readonly']) !!}
                            </div>
                        </div>

                        <!-- Lead Sender Area Field -->
                        <div class="form-group col-md-6">
                            {!! Form::label('area_id', 'Area', ['class' => 'col-sm-4 control-label']) !!}
                            <div class="col-sm-8">
                            {!! Form::text('area_id', !empty($userEmployee->area)?$userEmployee->area->name:'', ['class' => 'form-control', 'readonly']) !!}
                            </div>
                        </div>

                        <!-- Lead Sender Location Field -->
                        <div class="form-group col-md-6">
                            {!! Form::label('location_id', 'Location', ['class' => 'col-sm-4 control-label']) !!}
                            <div class="col-sm-8">
                            {!! Form::text('location_id', !empty($userEmployee->location)?$userEmployee->location->name:'', ['class' => 'form-control', 'readonly']) !!}
                            </div>
                        </div>

                        {!! Form::open(['route' => 'leads.store', 'class' => 'form-horizontal', 'files' => true]) !!}
                            <div class="form-group col-md-6">
                                {!! Form::label('profile_image', 'Ubah Profile Image', ['class' => 'col-sm-4 control-label']) !!}
                                <div class="col-sm-8">
                                {!! Form::file('profile_image', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group col-md-12 text-center">
                                <a href="{!! route('leads.index') !!}" class="btn btn-default">Cancel</a>
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
