@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                {{--<div class="timeline-wrapper">--}}
                {{--<div class="timeline-item">--}}
                {{--<div class="animated-title">--}}
                {{--<div class="background-masker header-top"></div>--}}
                {{--<div class="background-masker header-left"></div>--}}
                {{--<div class="background-masker header-right"></div>--}}
                {{--<div class="background-masker header-bottom"></div>--}}
                {{--<div class="background-masker subheader-left"></div>--}}
                {{--<div class="background-masker subheader-right"></div>--}}
                {{--<div class="background-masker subheader-bottom"></div>--}}
                {{--<div class="background-masker content-top"></div>--}}
                {{--<div class="background-masker content-first-end"></div>--}}
                {{--<div class="background-masker content-second-line"></div>--}}
                {{--<div class="background-masker content-second-end"></div>--}}
                {{--<div class="background-masker content-third-line"></div>--}}
                {{--<div class="background-masker content-third"></div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                <div class="card" id="rootwizard">
                    <div class="card-heading">
                        <div class="form-wizard-nav">
                            <div class="progress" style="width: 75%;">
                                <div class="progress-bar" style="width: 0%;"></div>
                            </div>
                            <ul class="nav nav-justified nav-pills" style="padding: 8px 15px !important;">
                                <li class="done active"><a href="#tab1" data-toggle="tab" aria-expanded="true"><span
                                                class="step">1</span> <span class="title">Custom Declaration</span></a>
                                </li>
                                <li class=""><a href="#tab2" data-toggle="tab" aria-expanded="false"><span class="step">2</span>
                                        <span class="title">Custom Declared Goods</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <form action="{{ $action }}" method="post" id="customs_declarations_form" name="customs_declarations_form" autocomplete="off">
                            {{ csrf_field() }}
                            <div class="form-wizard form-wizard-horizontal">
                                <div class="tab-content clearfix">
                                    <div class="tab-pane active" id="tab1">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                                <div class="card p-b-20">
                                                    <header class="card-heading ">
                                                        <h3 class="card-title">Customs Declaration</h3>
                                                        <p><i>Pemberitahuan Pabean</i></p>
                                                    </header>
                                                    <div class="card-body">
                                                        <form>
                                                            <div class="form-group label-floating is-empty">
                                                                <label class="control-label label-slim">Arival Date in
                                                                    Indonesia</label>
                                                                <input type="text" class="form-control datepicker"
                                                                    id="md_input_date" data-dtp="dtp_fLvCW"
                                                                    name="customs[cd_arrival_date]" wajib="true">
                                                                <span class="help-customs">Tanggal kedatangan di Indonesia</span>
                                                            </div>
                                                            <div class="form-group label-floating is-empty">
                                                                <label class="control-label label-slim">Flight / Voyage
                                                                    Number</label>
                                                                <input type="text" class="form-control"
                                                                    name="customs[cd_voyage_number]" wajib="true" maxlength="5">
                                                                <span class="help-customs">Nomor Identitas Pengangkut</span>
                                                            </div>
                                                            <div class="form-group label-floating is-empty">
                                                                <label class="control-label label-slim">Full Name</label>
                                                                <input type="text" class="form-control"
                                                                    name="customs[cd_full_name]" wajib="true">
                                                                <span class="help-customs">Nama Lengkap</span>
                                                            </div>
                                                            <div class="form-group label-floating is-empty">
                                                                <label class="control-label label-slim">Nationality</label>
                                                                {{ Form::select('customs[cd_nationality]', $country, '', ['class' => 'select form-control', 'wajib' => 'true']) }}
                                                                <span class="help-customs">Kebangsaan</span>
                                                            </div>
                                                            <div class="form-group label-floating is-empty">
                                                                <label class="control-label label-slim">Passport
                                                                    Number</label>
                                                                <input type="text" class="form-control"
                                                                    name="customs[cd_passport_number]" wajib="true">
                                                                <span class="help-customs">Nomor Paspor</span>
                                                            </div>
                                                            <div class="form-group label-floating is-empty">
                                                                <label class="control-label label-slim">Occupation</label>
                                                                <input type="text" class="form-control"
                                                                    name="customs[cd_occupation]" wajib="true">
                                                                <span class="help-customs">Pekerjaan</span>
                                                            </div>
                                                            <div class="form-group label-floating is-empty">
                                                                <label class="control-label">Address in Indonesia</label>
                                                                <textarea class="form-control label-slim" rows="3"
                                                                        name="customs[cd_address_in]" wajib="true"></textarea>
                                                                <span class="help-customs">Alamat di Indonesia</span>
                                                            </div>
                                                            <div class="form-group label-floating is-empty">
                                                                <label class="control-label label-slim">Number of
                                                                    accompanying members (only for passenger)</label>
                                                                <input type="text" class="form-control"
                                                                    name="customs[cd_accompanying]" wajib="true">
                                                                <span class="help-customs">Jumlah keluarga yang berpergian bersama (khusus penumpang)</span>
                                                            </div>
                                                            <div class="form-group is-empty">
                                                                <label class="control-label label-slim"
                                                                    style="padding-bottom: 10px;">Number of accompanied
                                                                    baggages</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-btn">
                                                                        <button type="button"
                                                                                class="btn btn-danger btn-sm btn-number"
                                                                                data-type="minus" data-field="cd_accompanied_baggages">
                                                                            <span class="glyphicon glyphicon-minus"></span>
                                                                        </button>
                                                                    </span>
                                                                    <input type="text" name="cd_accompanied_baggages"
                                                                        class="form-control input-number" value="0"
                                                                        min="0" max="100" readonly wajib="true">
                                                                    <span class="input-group-btn">
                                                                        <button type="button"
                                                                                class="btn btn-success btn-sm btn-number"
                                                                                data-type="plus" data-field="cd_accompanied_baggages">
                                                                            <span class="glyphicon glyphicon-plus"></span>
                                                                        </button>
                                                                    </span>
                                                                </div>
                                                                <span class="help-customs">Jumlah koli barang yang dibawa</span>
                                                            </div>
                                                            <div class="form-group label-floating is-empty">
                                                                <label class="control-label label-slim">Email Confirmation</label>
                                                                <input type="text" class="form-control"
                                                                    name="customs[cd_email]" wajib="true">
                                                                <span class="help-customs">Konfirmasi email</span>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end #tab1 -->
                                    <div class="tab-pane" id="tab2">
                                        <div class="card">
                                            <header class="card-heading ">
                                                <h2 class="card-title">Custom Declared Goods</h2>
                                                <p><i>Barang yang Diberitahukan</i></p>
                                            </header>
                                            <div class="card-body" id="card-body-goods">
                                                <p>If you answered Yes to any of the previous questions please provide
                                                    details bellow.
                                                    <br><i>Jika anda menjawab Ya pada salah satu pertanyaan sebelumnya,
                                                        berikan rincian pada kolom di bawah ini</i></p>
                                                <br>
                                                <div class="row" id="row-clone-goods">
                                                    <div class="card p-10" id="<?= rand(); ?>">
                                                        <header class="card-heading ">
                                                            <ul class="card-actions icons right-top">
                                                                <li>
                                                                    <a href="javascript:void(0)" class="default-row">
                                                                        <i class="zmdi zmdi-dot-circle zmdi-hc-fw"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </header>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-12 col-lg-12">
                                                                    <input type="text" class="form-control" placeholder="Description / Uraian" name="goods[goods_description][]">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-6 col-sm-6 col-lg-6">
                                                                    <input type="text" class="form-control" placeholder="Quantity / Jumlah" name="goods[goods_quantity][]">
                                                                </div>
                                                                <div class="col-xs-6 col-sm-6 col-lg-6">
                                                                    <input type="text" class="form-control" placeholder="Value / Nilai" name="goods[goods_value][]">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-lg-12">
                                                        <button class="btn btn-block btn-info" id="<?= rand(); ?>" onclick="cloneGoods($(this)); return false;">Add New Goods</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!--end #tab2 -->

                                </div>
                            </div>
                        </form>
                        
                        
                    </div>
                    <div class="card-footer">
                        <ul class="pager wizard">
                            <li class="previous disabled"><a class="btn btn-primary btn-round"
                                                             href="javascript:void(0);">Previous
                                    <div class="ripple-container"></div>
                                </a></li>
                            <li class="next"><a class="btn btn-primary btn-round" href="javascript:void(0);">Next
                                    <div class="ripple-container"></div>
                                </a></li>
                            <li class="finish hidden">
                                <button class="btn btn-green btn-round pull-right" onclick="post('#customs_declarations_form', $(this)); return false;">Submit</button>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.btn-number').click(function (e) {
            e.preventDefault();
            fieldName = $(this).attr('data-field');
            type = $(this).attr('data-type');
            var input = $("input[name='" + fieldName + "']");
            var currentVal = parseInt(input.val());
            if (!isNaN(currentVal)) {
                if (type == 'minus') {
                    if (currentVal > input.attr('min')) {
                        input.val(currentVal - 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('min')) {
                        $(this).attr('disabled', true);
                    }
                } else if (type == 'plus') {

                    if (currentVal < input.attr('max')) {
                        input.val(currentVal + 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('max')) {
                        $(this).attr('disabled', true);
                    }
                }
            } else {
                input.val(0);
            }
        });
        $('.input-number').focusin(function () {
            $(this).data('oldValue', $(this).val());
        });
        $('.input-number').change(function () {
            minValue = parseInt($(this).attr('min'));
            maxValue = parseInt($(this).attr('max'));
            valueCurrent = parseInt($(this).val());
            name = $(this).attr('name');
            if (valueCurrent >= minValue) {
                $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                alert('Sorry, the minimum value was reached');
                $(this).val($(this).data('oldValue'));
            }
            if (valueCurrent <= maxValue) {
                $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                alert('Sorry, the maximum value was reached');
                $(this).val($(this).data('oldValue'));
            }
        });
        $(".input-number").keydown(function (e) {
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                (e.keyCode == 65 && e.ctrlKey === true) ||
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                return;
            }
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    </script>


@endsection