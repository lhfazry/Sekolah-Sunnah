@extends('layouts.app')

@section('css')
<style>

</style>
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">

        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $all_schools }}</h3>

                    <p>All Schools</p>
                </div>
                <div class="icon">
                    <i class="fas fa-school"></i>
                </div>
                <a href="{{route('schools.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$verified_schools}}</h3>

                    <p>Verified Schools</p>
                </div>
                <div class="icon">
                    <i class="fas fa-check-double"></i>
                </div>
                <a href="{{route('schools.verified')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$unverified_schools}}</h3>

                    <p>Unverified Schools</p>
                </div>
                <div class="icon">
                    <i class="fas fa-cubes"></i>
                </div>
                <a href="{{route('schools.unverified')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$published_schools}}</h3>

                    <p>Published Schools</p>
                </div>
                <div class="icon">
                    <i class="fas fa-crown"></i>
                </div>
                <a href="{{route('schools.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title p-3">
                            <i class="fas fa-graduation-cap mr-1"></i>
                            Latest Schools
                        </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th width="10">No</th>
                                        <th width="120">Added Date</th>
                                        <th>Name</th>
                                        <th>City</th>
                                        <th width="100">Level</th>
                                        <th width="130" class="actions">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($schools as $k=>$school)
                                    <tr>
                                        <td>{{ $k+1 }}</td>
                                        <td>{{ $school->created_at }}</td>
                                        <td><a href="{{route('schools.show', $school->id)}}">{{ $school->nama_sekolah }}</a></td>
                                        <td>{{ $school->city_province() }}</td>
                                        <td>{{ $school->level->name }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('schools.show', ['id'=>$school->id]) }}" title="View school" class="btn btn-sm btn-danger"><i class="fas fa-eye"></i></a>
                                                <a href="{{ route('schools.edit', ['id'=>$school->id]) }}" title="Edit school" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                    </div><!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection
