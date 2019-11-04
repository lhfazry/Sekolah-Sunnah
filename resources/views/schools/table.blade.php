@section('css')
    @include('layouts.datatables_css')
@endsection

{!! $dataTable->table(['class' => 'display nowrap table table-striped table-bordered']) !!}

@section('scripts')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}
@endsection