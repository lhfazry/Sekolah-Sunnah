@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            School Facility
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($schoolFacility, ['route' => ['schoolFacilities.update', $schoolFacility->id], 'method' => 'patch']) !!}

                        @include('school_facilities.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection