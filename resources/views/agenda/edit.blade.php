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

                        <form action="{{ route('agenda.save') }}" method="POST" class="form-material" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-body">

                                <input type="text" class="form-control form-control-line" placeholder="" name="C_AGENDA_ID" id="C_AGENDA_ID" value="{{ $result['C_AGENDA_ID'] }}" hidden> 
                                
                                <div class="form-group">
                                    <label><strong>Title</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan Title" name="C_AGENDA_TITLE" id="C_AGENDA_TITLE" value="{{ $result['C_AGENDA_TITLE'] }}" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Subtitle</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan Subtitle" name="C_AGENDA_SUBTITLE" id="C_AGENDA_SUBTITLE" value="{{ $result['C_AGENDA_SUBTITLE'] }}" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Description</strong></span></label>
                                    <textarea class="textarea_editor form-control" name="C_AGENDA_DESCRIPTION" rows="15" placeholder="Enter text ...">{{ $result['C_AGENDA_DESCRIPTION'] }}</textarea>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label><strong>Status</strong></span></label>
                                    <select class="select2 form-control custom-select" name="C_AGENDA_ISACTIVE" style="width: 100%; height:36px;" >
                                        <option {{ $result['C_AGENDA_ISACTIVE'] == 1 ? 'selected' : '' }} value="1">Aktif</option>
                                        <option {{ $result['C_AGENDA_ISACTIVE'] == 0 ? 'selected' : '' }} value="0">Tidak Aktif</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                <a type="button" href="{{ route('agenda') }}" class="btn btn-inverse">Cancel</a>
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
