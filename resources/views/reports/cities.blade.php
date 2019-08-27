@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>School by City</h1>
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
                <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                    <h3 class="card-title p-3">
                        <i class="fas fa-table mr-1"></i>
                        School by City
                    </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    {!! Form::open(['route' => 'reports.cities', 'method'=> 'get', 'class' => 'form-horizontal']) !!}
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <div class="row">
                                {!! Form::label('city_id', 'Kabupaten/Kota', ['class' => 'col-sm-4 col-form-label']) !!}
                                <div class="col-sm-8">
                                    {!! Form::select('city_id', $cities, $city_id, ['placeholder' => 'Pilih Kabupaten/Kota']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <div class="row">
                                {!! Form::submit('Show', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}

                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th width="10">No</th>
                                    <th>Name</th>
                                    <th width="180" >City</th>
                                    <th width="130" >Level</th>
                                    <th width="120" >Facility</th>
                                    <th width="80" >Status</th>
                                    <th width="50" class="actions">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($schools as $k=>$school)
                                <tr>
                                    <td>{{ $k+1 }}</td>
                                    <td><a href="{{route('schools.show', $school->id)}}">{{ $school->nama_sekolah }}</a></td>
                                    <td>{{ $school->city_province() }}</td>
                                    <td class="text-center">{{ $school->level->name }}</td>
                                    <td class="text-center">{!! $school->displayFacilities() !!}</td>
                                    <td>{!! $school->displayStatus() !!}</td>

                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('schools.show', ['id'=>$school->id]) }}" title="View school" class="btn btn-sm btn-danger"><i class="fas fa-eye"></i></a>
                                            @if($school->isVerified())
                                            @if(\App\Models\Role::isAdmin())
                                            <a href="{{ route('schools.edit', ['id'=>$school->id]) }}" title="Edit school" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                            @endif
                                            @else
                                            @if(\App\Models\Role::isAdmin() || $school->isMySchool())
                                            <a href="{{ route('schools.edit', ['id'=>$school->id]) }}" title="Edit school" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                            @endif
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="text-center">

            </div>
        </div>
    </div>
@endsection

