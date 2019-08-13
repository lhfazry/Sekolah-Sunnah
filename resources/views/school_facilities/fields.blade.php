<!-- School Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('school_id', 'School Id:') !!}
    {!! Form::select('school_id', ['s' => 's'], null, ['class' => 'form-control']) !!}
</div>

<!-- Facility Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('facility_id', 'Facility Id:') !!}
    {!! Form::select('facility_id', ['s' => 's'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('schoolFacilities.index') !!}" class="btn btn-default">Cancel</a>
</div>
