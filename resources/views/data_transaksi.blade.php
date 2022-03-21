@extends('layouts.app')

<?php
$page = 'Data Transaksi';
?>

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                Transaction
                            </div>
                            <div class="col d-flex justify-content-end">
                                <button type="button" class="btn btn-primary btn-sm" onclick="window.print()">
                                    Generate Laporan
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>User</th>
                                    <th>Invoice ID</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksis as $key => $transaksi)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $transaksi->user->name }}</td>
                                        <td>{{ $transaksi->invoice_id }}</td>
                                        <td>
                                            @if ($transaksi->status == 1)
                                                ON CART
                                            @endif
                                            @if ($transaksi->status == 2)
                                                PENDING
                                            @endif
                                            @if ($transaksi->status == 3)
                                                COMPLETED
                                            @endif
                                            @if ($transaksi->status == 4)
                                                FINISHED
                                            @endif
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#detail-{{ $transaksi->invoice_id }}">
                                                Detail
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="detail-{{ $transaksi->invoice_id }}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Detail
                                                                Transaksi{{ $transaksi->invoice_id }}</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Name : {{ $transaksi->user->name }} <br />
                                                            Status :
                                                            @if ($transaksi->status == 1)
                                                                ON CART
                                                            @endif
                                                            @if ($transaksi->status == 2)
                                                                PENDING
                                                            @endif
                                                            @if ($transaksi->status == 3)
                                                                COMPLETED
                                                            @endif
                                                            @if ($transaksi->status == 4)
                                                                FINISHED
                                                            @endif
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Order Name</th>
                                                                        <th>Quantity</th>
                                                                        <th>Price</th>
                                                                        <th>Amount</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php $total_harga = 0; ?>
                                                                    @foreach ($details as $detail)
                                                                        @if ($detail->invoice_id == $transaksi->invoice_id)
                                                                            <?php $total_harga += $detail->jumlah * $detail->barang->price; ?>
                                                                            <tr>
                                                                                <td>{{ $detail->barang->name }}</td>
                                                                                <td>{{ $detail->jumlah }}</td>
                                                                                <td>{{ $detail->barang->price }}</td>
                                                                                <td>{{ $detail->jumlah * $detail->barang->price }}
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                            Total : {{ $total_harga }}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
