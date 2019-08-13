<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">General Information</h3>
    </div>
    <div class="card-body">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-sm-6">
                    <div class="row">
                        {!! Form::label('name', 'Name', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('name', $school->nama_sekolah, ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                </div>

                <div class="form-group col-sm-6">
                    <div class="row">
                        {!! Form::label('name', 'Level', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('name', $school->level->name, ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                </div>

                <div class="form-group col-sm-6">
                    <div class="row">
                        {!! Form::label('name', 'Biaya Pendaftaran', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('name', $school->formattedBiayaPendaftaran(), ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                </div>

                <div class="form-group col-sm-6">
                    <div class="row">
                        {!! Form::label('name', 'Biaya SPP', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('name', $school->formattedBiayaSPP(), ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                </div>

                <div class="form-group col-sm-6">
                    <div class="row">
                        {!! Form::label('name', 'Yayasan', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('name', $school->yayasan, ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <div class="row">
                                {!! Form::label('name', 'Short Description', ['class' => 'col-sm-3 col-form-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::textarea('name', $school->short_description, ['class' => 'form-control', 'readonly', 'rows' => 4]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <div class="row">
                                {!! Form::label('name', 'Description', ['class' => 'col-sm-3 col-form-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::textarea('name', $school->description, ['class' => 'form-control', 'readonly', 'rows' => 4]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Contact Information</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-group form-group-sm col-sm-6">
                <div class="row">
                    {!! Form::label('city', 'City', ['class' => 'col-sm-3 col-form-label']) !!}
                    <div class="col-sm-9">
                    {!! Form::text('city', (!empty($school) && !empty($school->city))?$school->city->name.', '.$school->city->province->name:null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="form-group form-group-sm col-sm-6">
                <div class="row">
                    {!! Form::label('address', 'Address', ['class' => 'col-sm-3 col-form-label']) !!}
                    <div class="col-sm-9">
                    {!! Form::textarea('address', $school->address, ['class' => 'form-control', 'rows' => 4, 'readonly']) !!}
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="row">
                    <div class="form-group form-group-sm col-sm-6">
                        <div class="row">
                            {!! Form::label('lat', 'Lat', ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-9">
                            {!! Form::text('lat', $school->lat, ['class' => 'form-control', 'readonly']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-group-sm col-sm-6">
                        <div class="row">
                            {!! Form::label('lng', 'Lng', ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-9">
                            {!! Form::text('lng', $school->lng, ['class' => 'form-control', 'readonly']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group form-group-sm col-sm-6">
                <div class="row">
                    {!! Form::label('map', 'Map', ['class' => 'col-sm-3 col-form-label']) !!}
                    <div class="col-sm-9">
                    {!! Form::text('map', $school->map, ['class' => 'form-control', 'readonly']) !!}
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="row">
                    <div class="form-group form-group-sm col-sm-6">
                        <div class="row">
                            {!! Form::label('email', 'Email', ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-9">
                            {!! Form::text('email', $school->email, ['class' => 'form-control', 'readonly']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-group-sm col-sm-6">
                        <div class="row">
                            {!! Form::label('website', 'Website', ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-9">
                            {!! Form::text('website', $school->website, ['class' => 'form-control', 'readonly']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="row">
                    <div class="form-group form-group-sm col-sm-6">
                        <div class="row">
                            {!! Form::label('phone1', 'Phone 1', ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-9">
                            {!! Form::text('phone1', $school->phone1, ['class' => 'form-control', 'readonly']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-group-sm col-sm-6">
                        <div class="row">
                            {!! Form::label('phone2', 'Phone 2', ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-9">
                            {!! Form::text('phone2', $school->phone2, ['class' => 'form-control', 'readonly']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Facilities</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-group">
                @foreach($school->facilities as $facility)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="facilities[]" checked disabled>
                    <label class="form-check-label"><i class="fas {{$facility->facility->icon}}"></i>&nbsp;<strong>{{ $facility->facility->name }}</strong></label> <br/>{{ $facility->facility->description }}
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Logo, Photos, Brochures and Videos</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-group form-group-sm col-sm-6">
                {!! Form::label('video_profil', 'Video Profile (Youtube)', ['class' => 'col-sm-6']) !!}
                @if(!empty($school->video_profil))
                <div class="col-sm-9">
                    <iframe width="100%" height="315" src="{{$school->getEmbeddedVideoProfileUrl()}}">
                    </iframe>
                </div>
                @endif
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group form-group-sm col-sm-6">
                        {!! Form::label('logo', 'Logo', ['class' => 'col-sm-3 ']) !!}
                        <div class="col-sm-12 dropzone" id="logo">
                            <img width="100%" src="{{ $school->getLogoUrl()}}" alt="">
                        </div>
                    </div>
                    <div class="form-group form-group-sm col-sm-6">
                        {!! Form::label('brochure', 'Brochure', ['class' => 'col-sm-3 ']) !!}
                        <div class="col-sm-12 dropzone" id="brochure">
                            <img width="100%" src="{{ $school->getBrochureUrl()}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group form-group-sm col-sm-12">
                {!! Form::label('photo', 'Photos', ['class' => 'col-sm-3 ']) !!}
                <div class="row">
                    @if(!empty($school->photo1))
                    <div class="col-sm-3 dropzone">
                        <img width="100%" src="{{ $school->getPhoto1Url()}}" alt="">
                    </div>
                    @endif
                    @if(!empty($school->photo2))
                    <div class="col-sm-3 dropzone">
                        <img width="100%" src="{{ $school->getPhoto2Url()}}" alt="">
                    </div>
                    @endif
                    @if(!empty($school->photo3))
                    <div class="col-sm-3 dropzone">
                        <img width="100%" src="{{ $school->getPhoto3Url()}}" alt="">
                    </div>
                    @endif
                    @if(!empty($school->photo4))
                    <div class="col-sm-3 dropzone">
                        <img width="100%" src="{{ $school->getPhoto4Url()}}" alt="">
                    </div>
                    @endif
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
                            {!! Form::text('campaign_id', \Carbon\Carbon::parse($school->created_at)->format('d M Y H:i:s'), ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                </div>

                <!-- Updated At Field -->
                <div class="form-group col-sm-6">
                    <div class="row">
                        {!! Form::label('updated_at', 'Updated At', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('campaign_id', \Carbon\Carbon::parse($school->updated_at)->format('d M Y H:i:s'), ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                </div>

                <!-- Created At Field -->
                <div class="form-group col-sm-6">
                    <div class="row">
                        {!! Form::label('created_by', 'Created By', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('campaign_id', !empty($school->creator)?$school->creator->name:'-', ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                </div>

                <!-- Updated At Field -->
                <div class="form-group col-sm-6">
                    <div class="row">
                        {!! Form::label('updated_by', 'Updated By', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('campaign_id', !empty($school->editor)?$school->editor->name:'-', ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <!-- Submit Field -->
            <div class="form-group col-sm-12 text-center">
                <a href="{!! route('schools.index') !!}" class="btn btn-default">Back</a>

                @if(\App\Models\Role::isAdmin())
                    <a href="{!! route('schools.edit', $school->id) !!}" class="btn btn-primary">Edit</a>
                    @if(!$school->isVerified())
                    <a href="{!! route('schools.verify', $school->id) !!}" class="btn btn-success">Verify</a>
                    @endif

                    @if($school->isVerified() && !$school->isPublished())
                    <a href="{!! route('schools.publish', $school->id) !!}" class="btn btn-success">Publish</a>
                    @endif

                    @if($school->isVerified() && $school->isPublished())
                    <a href="{!! route('schools.unpublish', $school->id) !!}" class="btn btn-danger">Unpublish</a>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
