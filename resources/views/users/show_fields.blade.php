<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">User Detail</h3>
    </div>
    <div class="card-body">
        <div class="card-body">
            <div class="row">
                    <div class="form-group form-group-sm col-sm-6">
                        <div class="row">
                            {!! Form::label('name', 'Name', ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-9">
                            {!! Form::select('name', $user->name, null, ['class' => 'form-control', 'readonly']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-group-sm col-sm-6">
                        <div class="row">
                            {!! Form::label('email', 'Email', ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-9">
                            {!! Form::text('email',  $user->email, ['class' => 'form-control', 'readonly']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-group-sm col-sm-6">
                        <div class="row">
                            {!! Form::label('password', 'Password', ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-9">
                            {!! Form::password('password',  null, ['class' => 'form-control', 'readonly']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-group-sm col-sm-6">
                        <div class="row">
                            {!! Form::label('role', 'Role', ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::text('role',  $user->role, ['class' => 'form-control', 'readonly']) !!}
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
                            {!! Form::text('campaign_id', \Carbon\Carbon::parse($user->created_at)->format('d M Y H:i:s'), ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                </div>

                <!-- Updated At Field -->
                <div class="form-group col-sm-6">
                    <div class="row">
                        {!! Form::label('updated_at', 'Updated At', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('campaign_id', \Carbon\Carbon::parse($user->updated_at)->format('d M Y H:i:s'), ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                </div>

                <!-- Created At Field -->
                <div class="form-group col-sm-6">
                    <div class="row">
                        {!! Form::label('created_by', 'Created By', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('campaign_id', !empty($user->creator)?$user->creator->name:'-', ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                </div>

                <!-- Updated At Field -->
                <div class="form-group col-sm-6">
                    <div class="row">
                        {!! Form::label('updated_by', 'Updated By', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('campaign_id', !empty($user->editor)?$user->editor->name:'-', ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <!-- Submit Field -->
            <div class="form-group col-sm-12 text-center">
                <a href="{!! route('users.index') !!}" class="btn btn-default">Back</a>
                <a href="{!! route('users.edit', $city->id) !!}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
</div>


<div class="box box-primary">
    <div class="box-body">
        <div class="row">
            <div class="form-group col-md-12 text-center" style="margin-top:20px"><img width="140" src="{{ $userEmployee->get_profile_image() }}" alt=""></div>
        </div>
        <div class="row">
            <!-- Name Field -->
            <div class="form-group col-md-6">
                {!! Form::label('name', 'Name', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                {!! Form::text('name', $user->name, ['class' => 'form-control', 'readonly']) !!}
                </div>
            </div>

            <div class="form-group col-md-6">
                {!! Form::label('email', 'Email', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                {!! Form::text('email', $user->email, ['class' => 'form-control', 'readonly']) !!}
                </div>
            </div>

            <div class="form-group col-md-6">
                {!! Form::label('role', 'Role', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('role', !empty($userEmployee)?$userEmployee->role:'', ['class' => 'form-control', 'readonly']) !!}
                </div>
            </div>

            <div class="form-group col-md-6">
                {!! Form::label('manager_id', 'Superior', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('manager_id', !empty($userEmployee->manager)?$userEmployee->manager->name:'', ['class' => 'form-control', 'readonly']) !!}
                </div>
            </div>

            <div class="form-group col-md-6">
                {!! Form::label('division_id', 'Division', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('division_id', !empty($userEmployee->division)?$userEmployee->division->name:'', ['class' => 'form-control', 'readonly']) !!}
                </div>
            </div>

            <div class="form-group col-md-6">
                {!! Form::label('department_id', 'Department', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('department_id', !empty($userEmployee->department)?$userEmployee->department->name:'', ['class' => 'form-control', 'readonly']) !!}
                </div>
            </div>

            <div class="form-group col-md-6">
                {!! Form::label('area_id', 'Area', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('area_id', !empty($userEmployee->area)?$userEmployee->area->name:'', ['class' => 'form-control', 'readonly']) !!}
                </div>
            </div>

            <div class="form-group col-md-6">
                {!! Form::label('location_id', 'Location', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('location_id', !empty($userEmployee->location)?$userEmployee->location->name:'', ['class' => 'form-control', 'readonly']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <!-- Submit Field -->
        <div class="form-group col-sm-12 text-center">
            <a href="{!! route('users.index') !!}" class="btn btn-default">Back</a>
            <a href="{!! route('users.edit', [$user->id]) !!}" class="btn btn-primary">Edit</a>
        </div>
    </div>
</div>
