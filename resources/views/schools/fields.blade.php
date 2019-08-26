@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}" type="text/css" charset="utf-8">
<!-- include summernote css/js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
<style>
    .boxzone {
        min-height: 150px;
        background: #dde3e8;
        background: white;
        padding: 20px 20px;
        border: 2px dashed #0087F7;
        border-radius: 5px;
    }
</style>
@endsection

{!! Form::text('hidden', null, ['autocomplete' => "autocomplete_off_hack_xfr4!k", 'style'=> 'display:none;']) !!}
{!! Form::hidden('city_id', !empty($school)?$school->city_id:null, ['class' => 'form-control', 'id' => 'city_id']) !!}
{!! Form::hidden('status', 'Unpublished', ['class' => 'form-control']) !!}

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">General Information</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-group form-group-sm col-sm-6">
                <div class="row">
                    {!! Form::label('nama_sekolah', 'Name', ['class' => 'col-sm-3 col-form-label']) !!}
                    <div class="col-sm-9">
                    {!! Form::text('nama_sekolah', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group form-group-sm col-sm-6">
                <div class="row">
                    {!! Form::label('level_id', 'Level', ['class' => 'col-sm-3 col-form-label']) !!}
                    <div class="col-sm-9">
                    {!! Form::select('level_id', $levels, null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="form-group form-group-sm col-sm-6">
                <div class="row">
                    {!! Form::label('yayasan', 'Yayasan', ['class' => 'col-sm-3 col-form-label']) !!}
                    <div class="col-sm-9">
                    {!! Form::text('yayasan', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="form-group form-group-sm col-sm-12">
                <div class="row">
                    <div class="form-group form-group-sm col-sm-6">
                        <div class="row">
                            {!! Form::label('biaya_pendaftaran', 'Uang Masuk', ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-9">
                            {!! Form::text('biaya_pendaftaran', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-group-sm col-sm-6">
                        <div class="row">
                            {!! Form::label('biaya_spp', 'Uang Bulanan', ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-9">
                            {!! Form::text('biaya_spp', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="row">
                    <div class="form-group form-group-sm col-sm-6">
                        <div class="row">
                            {!! Form::label('short_description', 'Short Description', ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-9">
                            {!! Form::textarea('short_description', null, ['class' => 'form-control', 'rows' => 4]) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-group-sm col-sm-6">
                        <div class="row">
                            {!! Form::label('description', 'Description', ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-9">
                            {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 4]) !!}
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
                    {!! Form::text('city', (!empty($school) && !empty($school->city))?$school->city->name.', '.$school->city->province->name:null, ['class' => 'form-control', 'autocomplete' => 'autocomplete_off_hack_xfr4!k']) !!}
                    </div>
                </div>
            </div>

            <div class="form-group form-group-sm col-sm-6">
                <div class="row">
                    {!! Form::label('address', 'Address', ['class' => 'col-sm-3 col-form-label']) !!}
                    <div class="col-sm-9">
                    {!! Form::textarea('address', null, ['class' => 'form-control', 'rows' => 4]) !!}
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="row">
                    <div class="form-group form-group-sm col-sm-6">
                        <div class="row">
                            {!! Form::label('lat', 'Lat', ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-9">
                            {!! Form::text('lat', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-group-sm col-sm-6">
                        <div class="row">
                            {!! Form::label('lng', 'Lng', ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-9">
                            {!! Form::text('lng', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group form-group-sm col-sm-6">
                <div class="row">
                    {!! Form::label('map', 'Map (Ex: https://goo.gl/maps/9vGtzHtNCG9waxvB6)', ['class' => 'col-sm-3 col-form-label']) !!}
                    <div class="col-sm-9">
                    {!! Form::text('map', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="row">
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
                            {!! Form::label('website', 'Website', ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-9">
                            {!! Form::text('website', null, ['class' => 'form-control']) !!}
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
                            {!! Form::text('phone1', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-group-sm col-sm-6">
                        <div class="row">
                            {!! Form::label('phone2', 'Phone 2', ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-9">
                            {!! Form::text('phone2', null, ['class' => 'form-control']) !!}
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
        <h3 class="card-title">Social Media</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-group form-group-sm col-sm-6">
                <div class="row">
                    {!! Form::label('facebook', 'Facebook', ['class' => 'col-sm-3 col-form-label']) !!}
                    <div class="col-sm-9">
                    {!! Form::text('facebook', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="form-group form-group-sm col-sm-6">
                <div class="row">
                    {!! Form::label('instagram', 'Instagram', ['class' => 'col-sm-3 col-form-label']) !!}
                    <div class="col-sm-9">
                    {!! Form::text('instagram', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="form-group form-group-sm col-sm-6">
                <div class="row">
                    {!! Form::label('twitter', 'Twitter', ['class' => 'col-sm-3 col-form-label']) !!}
                    <div class="col-sm-9">
                    {!! Form::text('twitter', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="form-group form-group-sm col-sm-6">
                <div class="row">
                    {!! Form::label('youtube', 'Youtube', ['class' => 'col-sm-3 col-form-label']) !!}
                    <div class="col-sm-9">
                    {!! Form::text('youtube', null, ['class' => 'form-control']) !!}
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
                @foreach($facilities as $facility)
                <div class="form-check">
                    {!! Form::checkbox('facilities[]', $facility->id, (!empty($school) && $school->hasFacility($facility->id))?true:false, ['class' => 'form-check-input']) !!}
                    <label class="form-check-label"><i class="fas {{$facility->icon}}"></i>&nbsp;<strong>{{ $facility->name }}</strong></label> <br/>{{ $facility->description }}
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
                <div class="col-sm-9">
                {!! Form::text('video_profil', null, ['class' => 'form-control',]) !!}
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group form-group-sm col-sm-6">
                        {!! Form::label('logo', 'Logo', ['class' => 'col-sm-3']) !!}
                        <div class="col-sm-12 boxzone" id="logo">
                            <div class="dz-message needsclick">
                                Drop files here or click to upload.<br>

                            </div>
                        </div>
                    </div>
                    <div class="form-group form-group-sm col-sm-6">
                        {!! Form::label('brochure', 'Brochure', ['class' => 'col-sm-3 ']) !!}
                        <div class="col-sm-12 boxzone" id="brochure">
                            <div class="dz-message needsclick">
                                Drop files here or click to upload.<br>
                                <!--<span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group form-group-sm col-sm-12">
                {!! Form::label('photo', 'Photos', ['class' => 'col-sm-3 ']) !!}
                <div class="col-sm-12 boxzone" id="photo">
                    <div class="dz-message needsclick">
                        Drop files here or click to upload.<br>
                        <!--<span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <div class="row">
            <!-- Submit Field -->
            <div class="form-group col-sm-12 text-center">
                <a href="{!! route('schools.index') !!}" class="btn btn-default">Cancel</a>
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/autonumeric@4.1.0"></script>

    <script>
        var uploadedPhotoMap = {}
        var uploadedBrochureMap = {}

        Dropzone.autoDiscover = false;
        var initFileUpload = function(name, field, url, dz) {
            if(name == '') { return }

            var file = {'size': 5400, 'name': name};
            var ss = dz.files.push(file);

            dz.options.addedfile.call(dz, file);
            dz.options.thumbnail.call(dz, file, url);
            file.previewElement.classList.add('dz-complete');
            $('#myForm').append('<input type="hidden" name="' + field + '" value="' + file.name + '">');
            console.log('<input type="hidden" name="' + field + '" value="' + file.name + '">');
        }

        $(document).ready(function(){
            $('#short_description').summernote({height: 200});
            $('#description').summernote({height: 200});

            var numericOption = {
                decimalPlaces: 0
            };

            AutoNumeric.multiple(['#biaya_pendaftaran', '#biaya_spp'], numericOption);

            $( "#city" ).autocomplete({
                source: "{{ route('cities.autocomplete') }}",
                minLength: 3,
                select: function(event, ui) {
                    $('#city').val(ui.item.value);
                    $('#city_id').val(ui.item.id);
                }
            });

            $("#logo").dropzone({
                url: "{{ route('media.store') }}?collection=logos",
                maxFilesize: 5, // MB
                maxFiles: 1,
                addRemoveLinks: true,
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function (file, response) {
                    $('#myForm').append('<input type="hidden" name="logo" value="' + response.filePath + '">')
                },
                removedfile: function (file) {
                    file.previewElement.remove()
                    var name = ''

                    if (typeof file.file_name !== 'undefined') {
                        name = file.file_name
                    }

                    $('#myForm').find('input[name="logo"]').remove()
                },
                init: function () {
                    @if((!empty($school) && !empty($school->logo)) || !empty(Input::old('logo')))
                        var file = {'size': 5300};
                        var url = "";

                        @if((!empty($school) && !empty($school->logo)))
                            file['name'] = '{!! $school->logo !!}';
                            url = "{!! $school->getLogoUrl() !!}";
                        @elseif(!empty(Input::old('logo')))
                            file['name'] = "{!! Input::old('logo') !!}";
                            url = "{!! \App\Helpers\S3Helper::getUrl(Input::old('logo')) !!}";
                        @endif

                        this.files.push(file);
                        this.options.addedfile.call(this, file);
                        this.options.thumbnail.call(this, file, url);
                        file.previewElement.classList.add('dz-complete');
                        $('#myForm').append('<input type="hidden" name="logo" value="' + file.name + '">');
                    @endif
                }
            });

            $("#brochure").dropzone({
                url: "{{ route('media.store') }}?collection=brochures",
                maxFilesize: 5, // MB
                maxFiles: 8,
                addRemoveLinks: true,
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function (file, response) {
                    $('#myForm').append('<input type="hidden" name="brochures[]" value="' + response.filePath + '">')
                    console.log(file);
                    uploadedBrochureMap[file.name] = response.filePath
                },
                removedfile: function (file) {
                    console.log(file);
                    file.previewElement.remove()
                    var name = ''

                    if (typeof file.file_name !== 'undefined') {
                        name = file.file_name
                    } else {
                        name = uploadedBrochureMap[file.name]
                    }

                    console.log('deleting: ' + name);

                    $('#myForm').find('input[name="brochures[]"][value="' + name + '"]').remove()
                },
                init: function () {
                    @php
                        $files = [];
                        $urls = [];

                        for($i=0; $i<8; $i++) {
                            if(!empty($school) && !empty($school->{"brochure".($i + 1)})) {
                                $files[$i] = $school->{"brochure".($i + 1)};
                                $urls[$i] = \App\Helpers\S3Helper::getUrl($school->{"brochure".($i + 1)});
                            }
                            elseif(!empty(Input::old('brochures')) && sizeof(Input::old('brochures')) > $i) {
                                $files[$i] = Input::old("brochures")[$i];
                                $urls[$i] = \App\Helpers\S3Helper::getUrl(Input::old("brochures")[$i]);
                            }
                            else {
                                $files[$i] = "";
                                $urls[$i] = "";
                            }
                        }
                    @endphp

                    @foreach($files as $k=>$file)
                        initFileUpload('{!! $file !!}', 'brochures[]', '{!! $urls[$k] !!}', this);
                        uploadedBrochureMap['{!! $file !!}'] = '{!! $file !!}';
                    @endforeach
                }
            });

            $("#photo").dropzone({
                url: "{{ route('media.store') }}?collection=photos",
                maxFilesize: 5, // MB
                maxFiles: 8,
                addRemoveLinks: true,
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function (file, response) {
                    $('#myForm').append('<input type="hidden" name="photos[]" value="' + response.filePath + '">')
                    uploadedPhotoMap[file.name] = response.filePath
                },
                removedfile: function (file) {
                    console.log(file);
                    file.previewElement.remove()
                    var name = ''

                    if (typeof file.file_name !== 'undefined') {
                        name = file.file_name
                    } else {
                        name = uploadedPhotoMap[file.name]
                    }

                    console.log('deleting: ' + name);

                    $('#myForm').find('input[name="photos[]"][value="' + name + '"]').remove()
                },
                init: function () {
                    @php
                        $files = [];
                        $urls = [];

                        for($i=0; $i<8; $i++) {
                            if(!empty($school) && !empty($school->{"photo".($i + 1)})) {
                                $files[$i] = $school->{"photo".($i + 1)};
                                $urls[$i] = \App\Helpers\S3Helper::getUrl($school->{"photo".($i + 1)});
                            }
                            elseif(!empty(Input::old('photos')) && sizeof(Input::old('photos')) > $i) {
                                $files[$i] = Input::old("photos")[$i];
                                $urls[$i] = \App\Helpers\S3Helper::getUrl(Input::old("photos")[$i]);
                            }
                            else {
                                $files[$i] = "";
                                $urls[$i] = "";
                            }
                        }
                    @endphp

                    @foreach($files as $k=>$file)
                        initFileUpload('{!! $file !!}', 'photos[]', '{!! $urls[$k] !!}', this);
                        uploadedPhotoMap['{!! $file !!}'] = '{!! $file !!}';
                    @endforeach
                }
            });
        });
      </script>
@endsection
