@extends('layout.master_dashboard')

@section('title', 'Jenis matakuliah')
@section('data_master', 'active-sub active')
@section('jenismatakuliah', 'active-link')

@section('breadcrumb')
    @parent
    <li>Data Master</li>
    <li class="active">Jenis Matakuliah</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Data Jenis Matakuliah</h3>
                </div>

                <!--Data Table-->
                <div class="panel-body">
                    <div class="pad-btm form-inline">
                        <div class="row">
                            <div class="col-sm-6 table-toolbar-left">
                                <button class="btn btn-purple add-modal"><i class="demo-pli-add icon-fw"></i>
                                    Tambah</button>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#importExcel"><i
                                        class="fa fa-upload icon-lg"></i></button>
                                <a href="{{ route('dashboard.jenismatakuliah.export') }}" target="_blank"><button
                                        class="btn btn-success"><i class="fa fa-download icon-lg"></i></button></a>
                            </div>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Import Excel -->
                    <div class="modal fade" id="importExcel" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form method="post" action="{{ route('dashboard.jenismatakuliah.import') }}"
                                enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                                    </div>
                                    <div class="modal-body">
                                        @csrf
                                        <label>Pilih file excel</label>
                                        <div class="form-group">
                                            <input type="file" name="file" required="required">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <a href="{{ route('dashboard.jenismatakuliah.exportheading') }}"><button type="button"
                                                class="btn btn-success">Download Contoh Excel</button></a>
                                        <button type="submit" class="btn btn-primary">Import</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="jenismatakuliah-table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                    <!-- Modal -->
                    <div id="ajaxModel" class="modal fade" aria-hidden="true">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="title"></h4>
                                </div>
                                <form class="form-horizontal" id="form">
                                    <div class="modal-body">
                                        <div class="alert alert-danger d-none"></div>
                                        @csrf
                                        <input type="hidden" name="jenis_matakuliah_id" id="jenis_matakuliah_id">
                                        <div class="form-group">
                                            <label for="jenis_matakuliah_kode" class="col-md-3 ">Kode</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="jenis_matakuliah_kode"
                                                    id="jenis_matakuliah_kode">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_matakuliah_nama" class="col-md-3 ">Nama</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="jenis_matakuliah_nama"
                                                    id="jenis_matakuliah_nama">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                                        <button type="button" class="btn btn-primary" id="savedata">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('pages.admin.data_master.jenismatakuliah.script')
@endsection
