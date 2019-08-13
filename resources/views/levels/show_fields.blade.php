<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Level Detail</h3>
    </div>
    <div class="card-body">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-sm-6">
                    <div class="row">
                        {!! Form::label('name', 'Name', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('name', $level->name, ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Timestamps</h3>
    </div>
    <div class="card-body">
        <div class="card-body">
            <div class="row">
                <!-- Created At Field -->
                <div class="form-group col-sm-6">
                    <div class="row">
                        {!! Form::label('created_at', 'Created At', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('campaign_id', \Carbon\Carbon::parse($level->created_at)->format('d M Y H:i:s'), ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                </div>

                <!-- Updated At Field -->
                <div class="form-group col-sm-6">
                    <div class="row">
                        {!! Form::label('updated_at', 'Updated At', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('campaign_id', \Carbon\Carbon::parse($level->updated_at)->format('d M Y H:i:s'), ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                </div>

                <!-- Created At Field -->
                <div class="form-group col-sm-6">
                    <div class="row">
                        {!! Form::label('created_by', 'Created By', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('campaign_id', !empty($level->creator)?$level->creator->name:'-', ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                </div>

                <!-- Updated At Field -->
                <div class="form-group col-sm-6">
                    <div class="row">
                        {!! Form::label('updated_by', 'Updated By', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('campaign_id', !empty($level->editor)?$level->editor->name:'-', ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <!-- Submit Field -->
            <div class="form-group col-sm-12 text-center">
                <a href="{!! route('levels.index') !!}" class="btn btn-default">Back</a>
                <a href="{!! route('levels.edit', $level->id) !!}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
</div>
