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

                        <form action="{{ route('pengumuman.create') }}" method="POST" class="form-material" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-body">


                                <div class="form-group">
                                    <label><strong>Title</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan Title" name="C_ANNOUNCEMENT_TITLE" id="C_ANNOUNCEMENT_TITLE" value="" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Subtitle</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan Subtitle" name="C_ANNOUNCEMENT_SUBTITLE" id="C_ANNOUNCEMENT_SUBTITLE" value="" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Description</strong></span></label>
                                    <textarea class="textarea_editor form-control" name="C_ANNOUNCEMENT_DESCRIPTION" rows="15" placeholder="Enter text ..."></textarea>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label><strong>Status</strong></span></label>
                                    <select class="select2 form-control custom-select" name="C_ANNOUNCEMENT_ISACTIVE" style="width: 100%; height:36px;" >
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="C_ANNOUNCEMENT_IMAGE"><span style="color:red;">*</span> File Image Max 1 mb</label>
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

                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                <a type="button" href="{{ route('pengumuman') }}" class="btn btn-inverse">Cancel</a>
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
