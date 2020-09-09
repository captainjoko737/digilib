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

                        <form action="{{ route('katalog.save') }}" method="POST" class="form-material" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-body">

                                <input type="text" class="form-control form-control-line" placeholder="" name="C_BUKU_ID" id="C_BUKU_ID" value="{{ $result['C_BUKU_ID'] }}" hidden> 
                                
                                <div class="form-group">
                                    <label><strong>JUDUL BUKU</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan Title" name="C_BUKU_JUDUL" id="C_BUKU_JUDUL" value="{{ $result['C_BUKU_JUDUL'] }}" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>INFORMASI UMUM</strong></span></label>
                                    <textarea class="form-control" name="C_BUKU_INFORMASI_UMUM" rows="10" placeholder="Enter text ...">{{ $result['C_BUKU_INFORMASI_UMUM'] }}</textarea>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label><strong>PENGARANG BUKU</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan Title" name="C_BUKU_PENGARANG" id="C_BUKU_PENGARANG" value="{{ $result['C_BUKU_PENGARANG'] }}" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>TAHUN TERBIT</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan Title" name="C_BUKU_TAHUN_TERBIT" id="C_BUKU_TAHUN_TERBIT" value="{{ $result['C_BUKU_TAHUN_TERBIT'] }}" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>LOKASI BUKU</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan Title" name="C_BUKU_LOKASI" id="C_BUKU_LOKASI" value="{{ $result['C_BUKU_LOKASI'] }}" required> 
                                </div>

                                <div class="form-group">
                                    <label for="C_BUKU_COVER"><span style="color:red;">*</span> File Image Max 1 mb </label>
                                  <div class="input-group">
                                    <input id="uploadFile" class="form-control" placeholder="Choose File" disabled="disabled" required>
                                    <div class="input-group-btn">
                                      <div class="fileUpload btn btn-success">
                                        <span><i class="glyphicon glyphicon-upload"></i> Upload</span>
                                        <input id="uploadBtn" name="file" type="file" accept="image/*" class="upload" required />
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                    <label><strong>Status Ketersediaan</strong></span></label>
                                    <select class="select2 form-control custom-select" name="C_BUKU_STATUS_KETERSEDIAAN" style="width: 100%; height:36px;" >
                                        <option {{ $result['C_BUKU_STATUS_KETERSEDIAAN'] == 1 ? 'selected' : '' }} value="1">Tersedia</option>
                                        <option {{ $result['C_BUKU_STATUS_KETERSEDIAAN'] == 0 ? 'selected' : '' }} value="0">Tidak Tersedia</option>
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
    document.getElementById("uploadBtn").onchange = function () {
        document.getElementById("uploadFile").value = this.value.substring(12);
    };
</script>
@endsection
