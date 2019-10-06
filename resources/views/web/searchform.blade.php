{!! Form::open(['route' => 'web.search', 'class' => 'hero-form form', 'method' => 'get']) !!}
    <div class="container">
        <div class="main-search-form">
            <div class="form-row">
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        {!! Form::label('keyword', 'Cari Sekolah Apa?', ['class' => 'col-form-label']) !!}
                        {!! Form::text('keyword', $keyword, ['class' => 'form-control', 'placeholder' => "Masukkan nama sekolah..."]) !!}
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="form-group">
                        {!! Form::label('city', 'Dimana?', ['class' => 'col-form-label']) !!}
                        {!! Form::select('city', $cities, $city, ['class' => 'form-control']) !!}
                        <!--<span class="geo-location input-group-addon" data-toggle="tooltip" data-placement="top" title="Find My Position"><i class="fa fa-map-marker"></i></span>-->
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    {!! Form::submit('Tampilkan Pencarian', ['class' => 'btn btn-primary width-100']) !!}
                </div>
            </div>
        </div>
        <div class="alternative-search-form"><a href="#collapseAlternativeSearchForm" class="icon" data-toggle="collapse" aria-expanded="false" aria-controls="collapseAlternativeSearchForm"><i class="fa fa-plus"></i>Detail Pencarian</a>
            <div class="collapse" id="collapseAlternativeSearchForm">
                <div class="wrapper">
                    <div class="form-row">
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 d-xs-grid d-flex align-items-center justify-content-between">
                            @foreach($facilities as $facility)
                            <label>
                                <input type="checkbox" name="facilities[]" value="{{$facility->id}}" 
                                @if (in_array($facility->id, $facilities_form)) checked @endif> {{$facility->name}}
                            </label>
                            @endforeach
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                            <div class="form-row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <input value="{{ $min_price }}" name="min_price" type="text" class="form-control small" id="min-price" placeholder="SPP Minimal"><span class="input-group-addon small">Rp</span></div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <input value="{{ $max_price }}" name="max_price" type="text" class="form-control small" id="max-price" placeholder="SPP Maksimal"><span class="input-group-addon small">Rp</span></div>
                                </div>
                                <!--
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <select name="distance" id="distance" class="small" data-placeholder="Jarak">
                                            <option value="">Jarak</option>
                                            <option value="1">1km</option>
                                            <option value="2">5km</option>
                                            <option value="3">10km</option>
                                            <option value="4">50km</option>
                                            <option value="5">100km</option>
                                        </select>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}