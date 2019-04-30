@extends('layouts.master')
@section('historyOrder', 'active')

@section('content')

            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item active">History Order
                  </li>
                </ol>
              </div>

<section id="morris-charts">
 <!-- Smooth Area Chart -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">History Order</h4><br>
                    <div class="col-md-3">
                    <fieldset class="form-group position-relative has-icon-left">
                <select class="form-control">
                  <option value="">- Pilih Bulan -</option>  
                  <option value="">Januari</option>
                  <option value="">Februari</option>
                  <option value="">Maret</option>
                  <option value="">April</option>
                  <option value="">Mei</option>
                  <option value="">Juni</option>
                </select>
                <div class="form-control-position">
                <i class="icon-tag"></i>
                </div>
            </fieldset>
            </div>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <ul class="list-inline text-right pr-2">
                            <li>
                                <h6><i class="ft-circle purple"></i>Calcium</h6>
                            </li>
                            <li>
                                <h6><i class="ft-circle cyan"></i>SuperGrowUp</h6>
                            </li>
                            <li>
                                <h6><i class="ft-circle amber"></i>Spirulina</h6>
                            </li>
                        </ul>
                        <div id="line-chart" class="height-400"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

  @endsection

@section('customJS')
    <script src="../../../app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
    var table = $('#order').DataTable( {
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true
    } );
    </script>
@endsection
