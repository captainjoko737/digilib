@extends('layouts.app')

@section('css')

<style type="text/css">

.fileUpload {
    position: relative;
    overflow: hidden;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}

</style>
@endsection

@section('content')
    <section id="main-wrapper">

        <div class="row">
            <div class="col-lg-8">
                <div class="card ">
                    <div class="card-header bg-info">
                        <h4 class="m-b-0 text-white">{{ $title }}</h4>
                    </div>
                    <div class="card-body">
                        @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            {{ $error }} <br/>
                            @endforeach
                        </div>
                        @endif

                        <form action="{{ route('peminjaman_buku.create') }}" method="POST" class="form-material" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-body">


                                <div class="form-group">
                                    <label><strong>Nama Peminjam</strong></span></label>
                                    <input type="text" class="form-control form-control-line"  name="C_PEMINJAM_NAMA" id="C_PEMINJAM_NAMA" value="{{ Session::get('users')->C_PENGGUNA_NAMA }}" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>NPM / NIDN</strong></span></label>
                                    <input type="text" class="form-control form-control-line" name="C_PEMINJAM_NOMOR_INDUK" id="C_PEMINJAM_NOMOR_INDUK" value="{{ Session::get('users')->C_PENGGUNA_NOMOR_INDUK }}" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>FAKULTAS</strong></span></label>
                                    <input type="text" class="form-control form-control-line" name="C_PEMINJAM_FAKULTAS" id="C_PEMINJAM_FAKULTAS" value="{{ Session::get('users')->C_PENGGUNA_FAKULTAS }}" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>JURUSAN</strong></span></label>
                                    <input type="text" class="form-control form-control-line" name="C_PEMINJAM_JURUSAN" id="C_PEMINJAM_JURUSAN" value="{{ Session::get('users')->C_PENGGUNA_JURUSAN }}" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>JUDUL BUKU</strong></span></label>
                                    <input type="text" class="form-control form-control-line" name="C_PEMINJAM_JUDUL_BUKU" id="C_PEMINJAM_JUDUL_BUKU" value="{{ $buku->C_BUKU_JUDUL }}" required> 
                                </div>
                                <div class="form-group hidden"hidden> 
                                    <label><strong>ID BUKU</strong></span></label>
                                    <input type="text" class="form-control form-control-line hidden" name="C_PEMINJAM_ID_BUKU" id="C_PEMINJAM_ID_BUKU" value="{{ $buku->C_BUKU_ID }}" hidden> 
                                </div>

                                <div class="form-group">
                                    <label><strong>TANGGAL PEMINJAMAN</strong></span></label>
                                    <input type="date" class="form-control form-control-line" name="C_PEMINJAM_TANGGAL_PEMINJAMAN" id="C_PEMINJAM_TANGGAL_PEMINJAMAN" value="" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Durasi Peminjaman</strong></span></label>
                                    <select class="select2 form-control custom-select" name="C_PEMINJAM_DURASI"  id="C_PEMINJAM_DURASI" style="width: 100%; height:36px;" required >
                                        <option value="">Pilih Waktu</option>
                                        <option value="3">3 Hari</option>
                                        <option value="7">7 Hari</option>
                                        <option value="10">10 Hari</option>
                                        <option value="14">14 Hari</option>
                                    </select>
                                </div>
                                
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                <a type="button" href="{{ route('dashboard') }}" class="btn btn-inverse">Cancel</a>
                                <hr>
                                
                            </div>
                            <div class="form-actions">
                                
                            </div>
                        </form>
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
