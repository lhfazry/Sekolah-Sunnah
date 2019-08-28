<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Facility Detail</h3>
    </div>
    <div class="card-body">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-sm-6">
                    <div class="row">
                        {!! Form::label('name', 'Name', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('name', $facility->name, ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                </div>

                @if(!empty($facility->icon))
                <div class="form-group col-sm-6">
                    <div class="row">
                        {!! Form::label('icon', 'Icon', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            <i style="font-size:40px" class="fas {{$facility->icon}}"></i>
                        </div>
                    </div>
                </div>
                @endif

                <div class="form-group col-sm-6">
                    <div class="row">
                        {!! Form::label('display', 'Display', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('dislay', $facility->display?'Yes':'No', ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                </div>

                <div class="form-group col-sm-6">
                    <div class="row">
                        {!! Form::label('name', 'Description', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::textarea('name', $facility->description, ['class' => 'form-control', 'readonly', 'rows' => 4]) !!}
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
                            {!! Form::text('campaign_id', \Carbon\Carbon::parse($facility->created_at)->format('d M Y H:i:s'), ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                </div>

                <!-- Updated At Field -->
                <div class="form-group col-sm-6">
                    <div class="row">
                        {!! Form::label('updated_at', 'Updated At', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('campaign_id', \Carbon\Carbon::parse($facility->updated_at)->format('d M Y H:i:s'), ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                </div>

                <!-- Created At Field -->
                <div class="form-group col-sm-6">
                    <div class="row">
                        {!! Form::label('created_by', 'Created By', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('campaign_id', !empty($facility->creator)?$facility->creator->name:'-', ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                </div>

                <!-- Updated At Field -->
                <div class="form-group col-sm-6">
                    <div class="row">
                        {!! Form::label('updated_by', 'Updated By', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('campaign_id', !empty($facility->editor)?$facility->editor->name:'-', ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <!-- Submit Field -->
            <div class="form-group col-sm-12 text-center">
                <a href="{!! route('facilities.index') !!}" class="btn btn-default">Back</a>
                <a href="{!! route('facilities.edit', $facility->id) !!}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
</div>
