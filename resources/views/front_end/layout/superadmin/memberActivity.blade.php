@extends('layouts.master')
@section('home', 'active')
@section('page_title', 'Riwayat Member')

@section('content')
    <h3 class="mb-2 mt-1 content-header-title mb-0 d-inline-block">{{ $user->name }} - {{ $user->email }}</h3>
    <!-- Custom view start -->
    <section id="select-inputs">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Aktivitas Order</h4><br>
                        <div class="card-content collapse show">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered dt-responsive" id="tb1">
                                    <thead>
                                        <th>Nama Produk</th>
                                        <th>Jumlah Pembelian</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                    </thead>
                                    <tbody>
                                        @foreach($user->order as $item)
                                        <tr>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->qty }} {{ $item->product->type }}</td>
                                            <td>{{ substr($item->created_at, 0, 10) }}</td>
                                            <td>
                {{ $item->status == '1' ? 'Menunggu' : $item->status == '2' ? 'Selesai' : 'Dibatalkan' }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                          
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Aktivitas Pengiriman</h4><br>
                        <div class="card-content collapse show">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered dt-responsive" id="tb2">
                                    <thead>
                                        <th>ID Pengiriman</th>
                                        <th>Tanggal</th>
                                        <th>Nama Produk</th>
                                        <th>Jumlah Pengiriman</th>
                                        <th>Dipesan Lewat</th>
                                        <th>Kurir Pengiriman</th>
                                        <th>Tujuan Pengiriman</th>
                                        <th>Nama Penerima</th>
                                        <th>Alamat Penerima</th>
                                        <th>Status</th>
                                    </thead>
                                    <tbody>
                                        
                                        @php 
                                        $statues = [
                                            '1' => 'Menunggu Pembayaran',
                                            '2' => 'Pembayaran Dikonfirmasi',
                                            '3' => 'Barang telah dikirim',
                                            '4' => 'Pengiriman ditolak',
                                        ];
                                        @endphp

                                        @foreach($user->sending as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ substr($item->created_at, 0, 10) }}</td>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->qty }} {{ $item->product->type }}</td>
                                            <td>{{ $item->order_vias->name }} </td>
                                            <td>{{ $item->courier->name }} </td>
                                            <td>{{ $item->detail->country == null ? $item->detail->subdistrict.', '.$item->detail->city : $item->detail->country }} </td>
                                            <td>{{ $item->detail->receiver_name }} </td>
                                            <td>{{ $item->detail->address }} </td>
                                            <td>{{ $statues["$item->status"] }} </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                          
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </section>

@endsection

@section('customJS')
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/extensions/responsive.dataTables.min.css">
    <script src="../../../app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>

    <script type="text/javascript">
        $('#tb1').DataTable( {
            responsive: true,
            order : [[2,'desc']]    
        }); 
        $('#tb2').DataTable( {
            responsive: true,
            order : [[1,'desc']]    
        });                 
    </script>

@endsection