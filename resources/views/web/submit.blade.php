@extends('web.web')
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
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
            {!! Form::open(['route' => 'schools.store', 'class' => 'form-horizontal hero-form form', 'files' => true, 'autocomplete' => "autocomplete_off_hack_xfr4!k"]) !!}
                {!! Form::text('hidden', null, ['autocomplete' => "autocomplete_off_hack_xfr4!k", 'style'=> 'display:none;']) !!}
                {!! Form::hidden('city_id', null, ['class' => 'form-control', 'id' => 'city_id']) !!}
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
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('uang_masuk', 'Uang Masuk', ['class' => 'col-form-label']) !!}
                                    {!! Form::text('uang_masuk', null, ['class' => 'form-control', 'placeholder' => "Masukkan uang masuk..."]) !!}
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('biaya_spp', 'Biaya SPP', ['class' => 'col-form-label']) !!}
                                    {!! Form::text('biaya_spp', null, ['class' => 'form-control', 'placeholder' => "Masukkan biaya SPP.."]) !!}
                                    <!--<span class="geo-location input-group-addon" data-toggle="tooltip" data-placement="top" title="Find My Position"><i class="fa fa-map-marker"></i></span>-->
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    {!! Form::label('descrption', 'Keterangan Sekolah', ['class' => 'col-form-label']) !!}
                                    {!! Form::textarea('descrption', null, ['class' => 'form-control', 'placeholder' => "Masukkan keterangan sekolah...", 'rows' => 6]) !!}
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
                        <div class="form-row">
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    {!! Form::label('city', 'Kota', ['class' => 'col-form-label']) !!}
                                    {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => "Masukkan nama kota..."]) !!}
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
                            <div class="form-row">
                                <div class="col-md-3 col-sm-3">
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
    <script src="{{ asset('js/jquery-ui.min.js') }}" type="text/javascript" charset="utf-8"></script>

    <script>
        var uploadedPhotoMap = {}

        $(document).ready(function(){
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
                    $('form').append('<input type="hidden" name="logo" value="' + response.filePath + '">')
                },
                removedfile: function (file) {
                    file.previewElement.remove()
                    var name = ''

                    if (typeof file.file_name !== 'undefined') {
                        name = file.file_name
                    }

                    $('form').find('input[name="logo"][value="' + name + '"]').remove()
                },
                init: function () {

                }
            });

            $("#brochure").dropzone({
                url: "{{ route('media.store') }}?collection=brochures",
                maxFilesize: 5, // MB
                maxFiles: 1,
                addRemoveLinks: true,
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function (file, response) {
                    $('form').append('<input type="hidden" name="brochure" value="' + response.filePath + '">')
                },
                removedfile: function (file) {
                    file.previewElement.remove()
                    var name = ''

                    if (typeof file.file_name !== 'undefined') {
                        name = file.file_name
                    }

                    $('form').find('input[name="brochure"][value="' + name + '"]').remove()
                },
                init: function () {

                }
            });

            $("#photo").dropzone({
                url: "{{ route('media.store') }}?collection=photos",
                maxFilesize: 5, // MB
                maxFiles: 4,
                addRemoveLinks: true,
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function (file, response) {
                    $('form').append('<input type="hidden" name="photos[]" value="' + response.filePath + '">')
                    uploadedPhotoMap[file.name] = response.name
                },
                removedfile: function (file) {
                    file.previewElement.remove()
                    var name = ''

                    if (typeof file.file_name !== 'undefined') {
                        name = file.file_name
                    } else {
                        name = uploadedPhotoMap[file.name]
                    }

                    $('form').find('input[name="photos[]"][value="' + name + '"]').remove()
                },
                init: function () {

                }
            });
        });
      </script>
    @endsection

