<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">City Detail</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-group form-group-sm col-sm-6">
                <div class="row">
                    {!! Form::label('name', 'Name', ['class' => 'col-sm-3 col-form-label']) !!}
                    <div class="col-sm-9">
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group form-group-sm col-sm-6">
                <div class="row">
                    {!! Form::label('email', 'Email', ['class' => 'col-sm-3 col-form-label']) !!}
                    <div class="col-sm-9">
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group form-group-sm col-sm-6">
                <div class="row">
                    {!! Form::label('password', 'Password', ['class' => 'col-sm-3 col-form-label']) !!}
                    <div class="col-sm-9">
                    {!! Form::password('password', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="form-group form-group-sm col-sm-6">
                <div class="row">
                    {!! Form::label('role', 'Role', ['class' => 'col-sm-3 col-form-label']) !!}
                    <div class="col-sm-9">
                        {!! Form::select('role', ['Admin' => 'Admin', 'Contributor' => 'Contributor'], null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="card-footer">
        <div class="row">
            <!-- Submit Field -->
            <div class="form-group col-sm-12 text-center">
                <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        $(document).ready(function(e){


        });
    </script>
@endsection
