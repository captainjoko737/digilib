@extends('layouts.app')

@section('content')
    <section id="main-wrapper">
            
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card ">
                        <div class="card-header" style="background: linear-gradient(to right, #33ccff 0%, #ff0000 160%);">
                            
                            <h4 class="m-t-10 text-white font-weight-bold" width="50%" >KATALOG BUKU</h4>
                        </div>
                        <div class="card-body">
                             <table id="example23" class="table" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($result as $key => $value)
                                        <tr>
                                            <td width="15%;"><img src="{{ asset('/assets/images/logounibi.png') }}" width="100px" alt="" class="light-logo" /></td>
                                            <td width="70%;">
                                                <p><strong>Judul Buku : </strong> {{ $value->C_BUKU_JUDUL }}</p>
                                                <p><strong>Informasi Umum : </strong> {{ $value->C_BUKU_INFORMASI_UMUM }}</p>
                                                <p><strong>Pengarang : </strong> {{ $value->C_BUKU_PENGARANG }}</p>
                                                <p><strong>Tahun Terbit : </strong> {{ $value->C_BUKU_TAHUN_TERBIT }}</p>
                                                <p><strong>Penerbit : </strong> {{ $value->C_BUKU_PENERBIT }}</p>
                                                <p><strong>Lokasi Buku : </strong> {{ $value->C_BUKU_LOKASI }}</p>
                                                @if (Session::get('users'))
                                                    <p><strong>Status Ketersediaan : </strong> {{ $value->C_BUKU_STATUS_KETERSEDIAAN == 1 ? 'Tersedia' : 'Tidak Tersedia' }}</p>
                                                @endif
                                            </td>
                                            <td>    
                                                @if (Session::get('users'))
                                                    <a href="{{ route('peminjaman_buku.add', ['id' => $value->C_BUKU_ID ]) }}" class="btn btn-info pull-right">Pinjam Buku</a>
                                                @endif
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
    </section>
@endsection

@section('js')

@endsection
