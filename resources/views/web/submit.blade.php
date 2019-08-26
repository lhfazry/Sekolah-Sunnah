@extends('web.web')
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}" type="text/css" charset="utf-8">
    <style>
        .form-row {
            margin-bottom: 40px;
        }

        .section-header {
            width: 100%;
            height: 20px;
            border-bottom: 1px solid #12a771;
            text-align: center;
            margin-bottom: 40px;
        }

        .section-title {
            font-size: 24px;
            background-color: #F3F5F6;
            color: #12a771;
            padding: 0 10px;
        }

        .boxzone {
            min-height: 150px;
            background: #dde3e8;
            background: white;
            padding: 20px 20px;
            border: 2px dashed #0087F7;
            border-radius: 5px;
        }

        #myform {
            background: #f2f2f2 !important;
            border: none !important;
        }
    </style>
@endsection

@section('title')
<div class="page-title">
    <div class="container">
        <h1 class="center">
            Bantu kami submit data sekolah di sekitar anda
        </h1>
    </div>
</div>
@endsection

@section('content')
    <section class="block">
        <div class="container">
            @include('adminlte-templates::common.errors')
            @include('flash::message')

            {!! Form::open(['route' => 'web.store', 'class' => 'form-horizontal hero-form form dropzone', 'files' => true, 'autocomplete' => "autocomplete_off_hack_xfr4!k", 'id' => 'myform']) !!}
                {!! Form::text('hidden', null, ['autocomplete' => "autocomplete_off_hack_xfr4!k", 'style'=> 'display:none;']) !!}

                <div class="main-search-form">
                    <div class="section">
                        <div class="form-row">
                            <div class="col-md-12 col-sm-12">
                                <div class="section-header">
                                    <span class="section-title">Informasi Umum</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 col-sm-12">
                                <div class="alert alert-info"><strong>Perhatian</strong> Jika lembaga pendidikan memiliki lebih dari satu jenjang (SD, SMP, SMA, dst), mohon diisikan secara terpisah.</div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('nama_sekolah', 'Nama Sekolah', ['class' => 'col-form-label']) !!}
                                    {!! Form::text('nama_sekolah', null, ['class' => 'form-control', 'placeholder' => "Masukkan nama sekolah..."]) !!}
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-3">
                                <div class="form-group">
                                    {!! Form::label('level_id', 'Jenjang', ['class' => 'col-form-label']) !!}
                                    {!! Form::select('level_id', $levels, null, []) !!}
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="form-group">
                                    {!! Form::label('yayasan', 'Nama Yayasan', ['class' => 'col-form-label']) !!}
                                    {!! Form::text('yayasan', null, ['class' => 'form-control', 'placeholder' => "Masukkan nama yayasan..."]) !!}
                                    <!--<span class="geo-location input-group-addon" data-toggle="tooltip" data-placement="top" title="Find My Position"><i class="fa fa-map-marker"></i></span>-->
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 col-sm-12">
                                <div class="alert alert-info"><strong>Perhatian</strong> Uang masuk dan Biaya bulanan tidak boleh pakai titik dan koma. Cukup ditulis dengan angka saja</div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('biaya_pendaftaran', 'Uang Masuk', ['class' => 'col-form-label']) !!}
                                    {!! Form::text('biaya_pendaftaran', null, ['class' => 'form-control', 'placeholder' => "Masukkan uang masuk..."]) !!}
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('biaya_spp', 'Biaya Bulanan', ['class' => 'col-form-label']) !!}
                                    {!! Form::text('biaya_spp', null, ['class' => 'form-control', 'placeholder' => "Masukkan biaya SPP.."]) !!}
                                    <!--<span class="geo-location input-group-addon" data-toggle="tooltip" data-placement="top" title="Find My Position"><i class="fa fa-map-marker"></i></span>-->
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    {!! Form::label('description', 'Keterangan Sekolah', ['class' => 'col-form-label']) !!}
                                    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => "Masukkan keterangan sekolah...", 'rows' => 6]) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section">
                        <div class="form-row">
                            <div class="col-md-12 col-sm-12">
                                <div class="section-header">
                                    <span class="section-title">Informasi Kontak</span>
                                </div>
                            </div>
                        </div>


                        <!--<div class="form-row">
                            <div class="col-md-12 col-sm-12">
                                <div class="alert alert-info"><strong>Perhatian</strong> Harap memilih provinsi dulu sebelum Kota. Pilihan daftar kota akan muncul setelah memilih provinsi.</div>
                            </div>
                        </div>-->

                        <div class="form-row">
                            <!--<div class="col-md-3 col-sm-3">
                                <div class="form-group">
                                    {!! Form::label('province_id', 'Provinsi', ['class' => 'col-form-label']) !!}
                                    {!! Form::select('province_id', [], null, []) !!}
                                </div>
                            </div>-->

                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    {!! Form::label('city_id', 'Kabupaten/Kota', ['class' => 'col-form-label']) !!}
                                    {!! Form::select('city_id', $cities, null, ['placeholder' => 'Pilih Kabupaten/Kota']) !!}
                                </div>
                            </div>

                            <div class="col-md-8 col-sm-8">
                                <div class="form-group">
                                    {!! Form::label('address', 'Alamat', ['class' => 'col-form-label']) !!}
                                    {!! Form::textarea('address', null, ['class' => 'form-control', 'placeholder' => "Masukkan alamat...", 'rows' => 4]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    {!! Form::label('map', 'URL Map (Jika Ada)', ['class' => 'col-form-label']) !!}
                                    {!! Form::text('map', null, ['class' => 'form-control', 'placeholder' => "Contoh: https://goo.gl/maps/9vGtzHtNCG9waxvB6"]) !!}
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    {!! Form::label('email', 'Email', ['class' => 'col-form-label']) !!}
                                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => "Masukkan email..."]) !!}
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    {!! Form::label('website', 'Website', ['class' => 'col-form-label']) !!}
                                    {!! Form::text('website', null, ['class' => 'form-control', 'placeholder' => "Masukkan website.."]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    {!! Form::label('phone1', 'Telpon 1', ['class' => 'col-form-label']) !!}
                                    {!! Form::text('phone1', null, ['class' => 'form-control', 'placeholder' => "Masukan Telpon ..."]) !!}
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    {!! Form::label('phone2', 'Telpon 2', ['class' => 'col-form-label']) !!}
                                    {!! Form::text('phone2', null, ['class' => 'form-control', 'placeholder' => "Masukkan Telpon ..."]) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section">
                        <div class="form-row">
                            <div class="col-md-12 col-sm-12">
                                <div class="section-header">
                                    <span class="section-title">Sosial Media</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('facebook', 'Facebook', ['class' => 'col-form-label']) !!}
                                    {!! Form::text('facebook', null, ['class' => 'form-control', 'placeholder' => "Masukkan url facebook..."]) !!}
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('instagram', 'Instagram', ['class' => 'col-form-label']) !!}
                                    {!! Form::text('instagram', null, ['class' => 'form-control', 'placeholder' => "Masukkan url instagram..."]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('twitter', 'Twitter', ['class' => 'col-form-label']) !!}
                                    {!! Form::text('twitter', null, ['class' => 'form-control', 'placeholder' => "Masukkan url twitter..."]) !!}
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('youtube', 'Youtube', ['class' => 'col-form-label']) !!}
                                    {!! Form::text('youtube', null, ['class' => 'form-control', 'placeholder' => "Masukkan url youtube..."]) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section">
                        <div class="form-row">
                            <div class="col-md-12 col-sm-12">
                                <div class="section-header">
                                    <span class="section-title">Fasilitas</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            @foreach($facilities as $facility)
                            <div class="col-md-6 col-sm-6">
                                <label>
                                    <input type="checkbox" name="facilities[]" value="{{$facility->id}}"> <i class="fa {{$facility->icon}}"></i>&nbsp;<strong>{{ $facility->name }}</strong> ({{ $facility->description }})
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="section">
                        <div class="form-row">
                            <div class="col-md-12 col-sm-12">
                                <div class="section-header">
                                    <span class="section-title">Logo, Foto, Brosur dan Video Sekolah</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 col-sm-12">
                                <div class="alert alert-info"><strong>Perhatian</strong> Brosur dan Photo Sekolah bisa lebih dari satu</div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('video_profil', 'Video Profile (Youtube)', ['class' => 'col-form-label']) !!}
                                    {!! Form::text('video_profil', null, ['class' => 'form-control', 'placeholder' => "Masukkan url youtube ..."]) !!}
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('logo', 'Logo Sekolah', ['class' => 'col-form-label']) !!}
                                    <div class="col-sm-12 boxzone" id="logo">
                                        <div class="dz-message needsclick">
                                            Drop files here or click to upload.<br>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    {!! Form::label('brochure', 'Brosur Sekolah', ['class' => 'col-form-label']) !!}
                                    <div class="col-sm-12 boxzone" id="brochure">
                                        <div class="dz-message needsclick">
                                            Drop files here or click to upload.<br>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    {!! Form::label('photo', 'Photo Sekolah', ['class' => 'col-form-label']) !!}
                                    <div class="col-sm-12 boxzone" id="photo">
                                        <div class="dz-message needsclick">
                                            Drop files here or click to upload.<br>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 col-sm-12">
                                {!! Form::submit('Submit', ['class' => 'btn btn-primary width-100']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </section>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/autonumeric@4.1.0"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}" type="text/javascript" charset="utf-8"></script>

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
            $('select').select2();
            var numericOption = {
                decimalPlaces: 0
            };

            AutoNumeric.multiple(['#biaya_pendaftaran', '#biaya_spp'], numericOption);
            //new AutoNumeric('#biaya_spp', numericOption);
            //$('#description').summernote({height: 200});

            /*$( "#city" ).autocomplete({
                source: "{{ route('cities.autocomplete') }}",
                minLength: 3,
                select: function(event, ui) {
                    $('#city').val(ui.item.value);
                    $('#city_id').val(ui.item.id);
                }
            });*/

            /*$('#province_id').on('change', function() {
                var province_id = this.value;

                $.get("{{ route('provinces.cities') }}?id=" + province_id, function(data, status){
                    $('#city_id')
                        .find('option')
                        .remove()
                        .end();

                    $.each(data.cities, function(index, value) {
                        //console.log(value);
                        var option = document.createElement("option");
                        option.text = value.name;
                        option.value = value.id;
                        document.getElementById("city_id").appendChild(option);
                        //$('#city_id').appendChild();
                        //$('#city_id').append("<option value='"+value.id+"'>"+value.name+"</>");
                        //$('#city_id').append(new Option(value.name, value.id));
                    });
                });
            });*/

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

