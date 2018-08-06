@extends('layouts.base')

@section('up')
 <!-- DataTables -->
        <link href="/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
        <link href="/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="/plugins/magnific-popup/css/magnific-popup.css" />
        <link href="/plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />

@endsection

@section('dashboard')
<div class="content">
                    <div class="container">
                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Dashboard</h4>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

                   <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>Karyawan</b></h4>
                                    <table id="datatable" class="table table-striped table-colored table-info">
                                      <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                     
                                        @isset($karyawan[0]->users)
                                            @foreach($karyawan[0]->users as $kary)
                                            <tr>
                                            <td>{{$kary->name}}</td>
                                            <td>{{$kary->email}}</td>
                                            <td> <a onclick="$('#tambah').hide();$('#update').show()" class="editBtn" href="#form-update" 
                                                     id="{{$kary->id}}" ><i class="fa fa-pencil"></i></a>
                                                    <a href="#dialog" class="on-default remove-row" id="{{$kary->id}}"><i class="fa fa-trash-o"></i></a></td>
                                           </tr>
                                            @endforeach
                                        @endisset
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                         <div class="row">
                            <div class="col-xs-12">
                                <div class="card-box table-responsive" style="text-align: center;">
                                   <h4 class="m-t-0 header-title">Tambah/Edit</h4><br>
                                                 <button class="btn btn-info waves-effect waves-light" onclick="$('#tambah').show();$('#update').hide();$('#nama').val('');$('#tinggi').val('');$('#sulit').val('')">Tambah</button>
                                    <br>
                                    <div class="row" >
                                        <div class="col-md-8">
                                           
                                            <form class="form-horizontal" method="POST" action="/karyawan/tambahedit">

                                                 
                                                @csrf
                                                <input type="hidden" id="id" name="id" value="">
                                                 <div class="form-group">
                                                    <label class="col-md-2 control-label">Nama</label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" value="{{ old('name') }}" required>
                                                         @if ($errors->has('name'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Email</label>
                                                    <div class="col-md-10">
                                                        <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" value="{{ old('email') }}" required>
                                                         @if ($errors->has('email'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Password</label>
                                                    <div class="col-md-10">
                                                     <input type="password" class="form-control" name="password" id="password" autocomplete="off">
                                                     @if ($errors->has('password'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label for="password-confirm" class="col-md-2 control-label">{{ __('Confirm Password') }}</label>

                                                    <div class="col-md-10">
                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                                    </div>
                                                </div>
                                                <button class="btn btn-orange waves-effect waves-light" type="submit" id="update" name="aksi" value="Update">Update</button>
                                                <button class="btn btn-info waves-effect waves-light" type="submit" id="tambah" name="aksi" value="Tambah">Tambah</button>
                                            </form>
                                        </div>

                                </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- container -->

                </div> <!-- content -->


@endsection

@section('modal')
<div id="dialog" class="modal-block mfp-hide">
                <section class="panel panel-info panel-color">
                    <header class="panel-heading">
                        <h2 class="panel-title">Apakah Anda Yakin?</h2>
                    </header>
                    <div class="panel-body">
                        <div class="modal-wrapper">
                            <div class="modal-text">
                                <p id="dialogHapus"></p>
                            </div>
                        </div>

                        <div class="row m-t-20">
                            <form method="POST" action="/karyawan/hapus" >
                                @csrf
                                <input id="idhapus" name="id" type="hidden">
                            <div class="col-md-12 text-right">
                                <button typeid="dialogConfirm" class="btn btn-primary waves-effect waves-light">Confirm</button>
                                <button id="dialogCancel" class="btn btn-default waves-effect">Cancel</button>
                            </div>
                             </form>
                        </div>
                    </div>

                </section>
            </div>
@endsection

@section('down')

        <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="/plugins/datatables/dataTables.bootstrap.js"></script>
        <script src="/plugins/magnific-popup/js/jquery.magnific-popup.min.js"></script>
        <script src="/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="/plugins/datatables/buttons.bootstrap.min.js"></script>
       
        <script src="/plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="/plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="/plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="/plugins/datatables/dataTables.scroller.min.js"></script>
        <script src="/plugins/datatables/dataTables.colVis.js"></script>
        <script src="/plugins/datatables/dataTables.fixedColumns.min.js"></script>


        <script src="/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
        <script src="/plugins/multiselect/js/jquery.multi-select.js"></script>
        <script src="/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
        <script src="/plugins/select2/js/select2.min.js"></script>
        <script src="/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>

        <!-- init -->
        <script src="/assets/pages/jquery.datatables.init.js"></script>
        <script>
            $(document).ready(function () {
                 $('#datatable').dataTable({

                 });
                $(".select2").select2();
                $('#tambah').hide();
                $('#update').hide();
                $('.editBtn').click(function(){
                    console.log('test');
                    $.ajax({
                        url: "/karyawan/get/" + this.id,
                        dataType: "json",
                        contentType: "application/json; charset=utf-8",
                        success: function (data) {
                        $("#id").val(data.id);
                           $("#name").val(data.name);
                           $("#email").val(data.email);
                            $("#password").val();
                         }
                        
                     });
                });
             $('.remove-row').magnificPopup({
                        type: 'inline',
                        preloader: false,
                        modal: true
                    });

             $('.remove-row').click(function(e){
                $('#idhapus').val(this.id);
             });

            $(document).on('click', '#dialogCancel', function (e) {
                    e.preventDefault();
                    $.magnificPopup.close();
                });
           
            });
        </script>
@endsection