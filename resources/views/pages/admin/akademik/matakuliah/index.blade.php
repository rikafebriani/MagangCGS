@extends('layout.master_dashboard')

@section('title', 'Mata kuliah')
@section('akademik', 'active-sub active')
@section('matakuliah', 'active-link')

@section('breadcrumb')
    @parent
    <li>Akademik</li>
    <li class="active">Mata Kuliah</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Data Matakuliah</h3>
                </div>

                <!--Data Table-->
                <div class="panel-body">
                    <div class="pad-btm form-inline">
                        <div class="row">
                            <div class="col-sm-6 table-toolbar-left">
                                <button class="btn btn-purple"><i class="demo-pli-add icon-fw"></i>Add</button>
                                <button class="btn btn-default"><i class="demo-pli-printer icon-lg"></i></button>
                                <div class="btn-group">
                                    <button class="btn btn-default"><i class="demo-pli-information icon-lg"></i></button>
                                    <button class="btn btn-default"><i class="demo-pli-trash icon-lg"></i></button>
                                </div>
                            </div>
                            <div class="col-sm-6 table-toolbar-right">
                                <div class="form-group">
                                    <input type="text" autocomplete="off" class="form-control" placeholder="Search"
                                        id="demo-input-search2">
                                </div>
                                <div class="btn-group">
                                    <button class="btn btn-default"><i
                                            class="demo-pli-download-from-cloud icon-lg"></i></button>
                                    <div class="btn-group dropdown">
                                        <button class="btn btn-default btn-active-primary dropdown-toggle"
                                            data-toggle="dropdown">
                                            <i class="demo-pli-dot-vertical icon-lg"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                            <li><a href="#">Action</a></li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">Separated link</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Invoice</th>
                                    <th>User</th>
                                    <th>Order date</th>
                                    <th>Amount</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Tracking Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="#" class="btn-link"> Order #53431</a></td>
                                    <td>Steve N. Horton</td>
                                    <td><span class="text-muted">Oct 22, 2014</span></td>
                                    <td>$45.00</td>
                                    <td class="text-center">
                                        <div class="label label-table label-success">Paid</div>
                                    </td>
                                    <td class="text-center">-</td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="btn-link"> Order #53432</a></td>
                                    <td>Charles S Boyle</td>
                                    <td><span class="text-muted">Oct 24, 2014</span></td>
                                    <td>$245.30</td>
                                    <td class="text-center">
                                        <div class="label label-table label-info">Shipped</div>
                                    </td>
                                    <td class="text-center">CGX0089734531</td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="btn-link"> Order #53433</a></td>
                                    <td>Lucy Doe</td>
                                    <td><span class="text-muted">Oct 24, 2014</span></td>
                                    <td>$38.00</td>
                                    <td class="text-center">
                                        <div class="label label-table label-info">Shipped</div>
                                    </td>
                                    <td class="text-center">CGX0089934571</td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="btn-link"> Order #53434</a></td>
                                    <td>Teresa L. Doe</td>
                                    <td><span class="text-muted">Oct 15, 2014</span></td>
                                    <td>$77.99</td>
                                    <td class="text-center">
                                        <div class="label label-table label-info">Shipped</div>
                                    </td>
                                    <td class="text-center">CGX0089734574</td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="btn-link"> Order #53435</a></td>
                                    <td>Teresa L. Doe</td>
                                    <td><span class="text-muted">Oct 12, 2014</span></td>
                                    <td>$18.00</td>
                                    <td class="text-center">
                                        <div class="label label-table label-success">Paid</div>
                                    </td>
                                    <td class="text-center">-</td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="btn-link">Order #53437</a></td>
                                    <td>Charles S Boyle</td>
                                    <td><span class="text-muted">Oct 17, 2014</span></td>
                                    <td>$658.00</td>
                                    <td class="text-center">
                                        <div class="label label-table label-danger">Refunded</div>
                                    </td>
                                    <td class="text-center">-</td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="btn-link">Order #536584</a></td>
                                    <td>Scott S. Calabrese</td>
                                    <td><span class="text-muted">Oct 19, 2014</span></td>
                                    <td>$45.58</td>
                                    <td class="text-center">
                                        <div class="label label-table label-warning">Unpaid</div>
                                    </td>
                                    <td class="text-center">-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr class="new-section-xs">
                    <div class="pull-right">
                        <ul class="pagination text-nowrap mar-no">
                            <li class="page-pre disabled">
                                <a href="#">&lt;</a>
                            </li>
                            <li class="page-number active">
                                <span>1</span>
                            </li>
                            <li class="page-number">
                                <a href="#">2</a>
                            </li>
                            <li class="page-number">
                                <a href="#">3</a>
                            </li>
                            <li>
                                <span>...</span>
                            </li>
                            <li class="page-number">
                                <a href="#">9</a>
                            </li>
                            <li class="page-next">
                                <a href="#">&gt;</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--End Data Table-->

            </div>
        </div>
    </div>
@endsection
