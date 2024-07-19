@extends('layout.master_dashboard')

@section('title', 'Kelas')
@section('data_master', 'active-sub active')
@section('kelas', 'active-link')

@section('breadcrumb')
    @parent
    <li>Data Master</li>
    <li class="active">Kelas</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Data Kelas</h3>
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
                                <a href="{{ route('dashboard.kelas.export') }}" target="_blank"><button
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
                            <form method="post" action="{{ route('dashboard.kelas.import') }}"
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
                                        <a href="{{ route('dashboard.kelas.exportheading') }}"><button type="button"
                                                class="btn btn-success">Download Contoh Excel</button></a>
                                        <button type="submit" class="btn btn-primary">Import</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table id="kelas-table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Keterangan</th>
                                    <th>Kapasitas</th>
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
                                        <input type="hidden" name="kelas_id" id="kelas_id">
                                        <div class="form-group">
                                            <label for="kelas_kode" class="col-md-3 ">Kode</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="kelas_kode"
                                                    id="kelas_kode">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="kelas_nama" class="col-md-3 ">Nama</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="kelas_nama"
                                                    id="kelas_nama">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="kelas_keterangan" class="col-md-3 ">Keterangan</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="kelas_keterangan"
                                                    id="kelas_keterangan">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="kelas_kapasitas" class="col-md-3 ">Kapasitas</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control" name="kelas_kapasitas"
                                                    id="kelas_kapasitas">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Keluar</button>
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

    @include('pages.admin.data_master.kelas.script')
@endsection
