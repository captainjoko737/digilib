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
                            @if (Session::get('adminUsers'))
                                <a href="{{ route('katalog.add') }}" class="btn btn-sm btn-info pull-right">TAMBAH</a>
                            @endif
                            <hr>
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
                                            <td width="15%;"><img src="{{ url($value->C_BUKU_COVER) }}" width="100px" alt="" class="light-logo" /></td>
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
                                                    <a href="{{ route('peminjaman_buku.add', ['id' => $value->C_BUKU_ID ]) }}" class="btn btn-sm btn-info pull-right">Pinjam Buku</a>
                                                @endif

                                                @if (Session::get('adminUsers'))
                                                    <a onclick="drop({{$value->C_BUKU_ID}})" class="btn btn-sm btn-danger text-white pull-right m-l-20">DELETE</a>
                                                    <a href="{{ route('katalog.edit', ['id' => $value->C_BUKU_ID ]) }}" class="btn btn-sm btn-info pull-right">EDIT</a>

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

<script type="text/javascript">
    function drop(id) {
        
        var data = {
                "C_BUKU_ID" : id};

        $(document).ready(function () {
            swal({   
                title: "Are you sure?",   
                text: "You will delete this data",   
                type: "warning",   
                showCancelButton: true,   
                confirmButtonColor: "#DD6B55",   
                confirmButtonText: "Yes, delete it !",   
                cancelButtonText: "No, cancel !",   
                closeOnConfirm: false,   
                closeOnCancel: false 
            }, function(isConfirm){   
                if (isConfirm) {    
                    
                    var href = $(this).attr('href');

                    $.ajax({

                        url: '{{ route("katalog.delete")}}',
                        data: data,
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

                        success: function (data) {
                            location.reload();
                            // console.log(data)
                        }, error: function (data) {
                            alert(data.responseText);
                        }

                    });
                } else {     
                    swal("Cancelled", "Your data is safe :)", "error");   
                } 
            });
        
        });
    }
</script>

@endsection
