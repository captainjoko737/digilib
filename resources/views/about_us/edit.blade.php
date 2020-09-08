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

                        <form action="{{ route('tentang_kami.save') }}" method="POST" class="form-material" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-body">
                                <input type="text" class="form-control form-control-line" placeholder="" name="C_ABOUT_ID" id="C_ABOUT_ID" value="{{ $result['C_ABOUT_ID'] }}" hidden> 
                                <div class="form-group">
                                    <label><strong>VISI</strong></span></label>
                                    <textarea class="form-control" name="C_ABOUT_VISI" rows="10" placeholder="Enter text ...">{{ $result['C_ABOUT_VISI'] }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label><strong>MISI</strong></span></label>
                                    <textarea class="form-control" name="C_ABOUT_MISI" rows="10" placeholder="Enter text ...">{{ $result['C_ABOUT_MISI'] }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                <a type="button" href="{{ route('tentang_kami') }}" class="btn btn-inverse">Cancel</a>
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
