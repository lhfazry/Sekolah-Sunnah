<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Province Detail</h3>
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
        </div>
    </div>

    <div class="card-footer">
        <div class="row">
            <!-- Submit Field -->
            <div class="form-group col-sm-12 text-center">
                <a href="{!! route('provinces.index') !!}" class="btn btn-default">Cancel</a>
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>
</div>
