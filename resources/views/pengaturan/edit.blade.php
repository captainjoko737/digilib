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
            <div class="col-lg-6">
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

                        <form action="{{ route('pengaturan.save') }}" method="POST" class="form-material" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-body">

                                <input type="text" class="form-control form-control-line" placeholder="" name="C_SETTING_ID" id="C_SETTING_ID" value="{{ $result['C_SETTING_ID'] }}" hidden> 
                                <div class="form-group">
                                    <label><strong>KEY</strong></span></label>
                                    <input readonly type="text" class="form-control form-control-line" placeholder="Masukan Kata Kunci" name="C_SETTING_KEY" id="C_SETTING_KEY" value="{{ $result['C_SETTING_KEY'] }}" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>VALUE</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan VALUE" name="C_SETTING_VALUE" id="C_SETTING_VALUE" value="{{ $result['C_SETTING_VALUE'] }}" required> 
                                </div>

                                <div class="form-group">
                                    <label for="C_SETTING_IMAGE"><span style="color:red;">*</span> File Image Max 1 mb</label>
                                  <div class="input-group">
                                    <input id="uploadFile" class="form-control" placeholder="Choose File" disabled="disabled" required>
                                    <div class="input-group-btn">
                                      <div class="fileUpload btn btn-success">
                                        <span><i class="glyphicon glyphicon-upload"></i> Upload</span>
                                        <input id="uploadBtn" name="file" type="file" accept="image/*" class="upload" />
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                <a type="button" href="{{ route('pengaturan') }}" class="btn btn-inverse">Cancel</a>
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
