@extends('layouts.app')

@section('content')
    <section id="main-wrapper">
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ $title }}</h4>
                            <h6 class="card-subtitle"></h6>
                            <hr>
                           
                            <div class="table-responsive">
                            
                                <table id="example23" class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>JUDUL BUKU</th>
                                            <th>TANGGAL PINJAM</th>
                                            <th>DURASI PINJAM</th>
                                            <th>TANGGAL PENGEMBALIAN</th>
                                            <th>STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($list_pinjaman as $key => $value)
                                            <tr>
                                                <td width="2%"> {{ $key + 1 }}</td>
                                                <td>{{ $value->C_PEMINJAM_JUDUL_BUKU }}</td>
                                                <td>{{ \Carbon\Carbon::parse($value->C_PEMINJAM_TANGGAL_PEMINJAM)->format('d F Y') }}</td>
                                                <td>{{ $value->C_PEMINJAM_DURASI }} Hari</td>
                                                <td>{{ \Carbon\Carbon::parse($value->C_PEMINJAM_TANGGAL_PENGEMBALIAN)->format('d F Y') }}</td>
                                                <td>{{ $value->C_PEMINJAM_STATUS == 1 ? 'DIPINJAM' : 'DIKEMBALIKAN' }}</td>
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

@section('js')

<script type="text/javascript">
    
</script>

@endsection
