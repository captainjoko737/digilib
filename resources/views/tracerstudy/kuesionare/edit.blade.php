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

                        <form action="{{ route('tracerstudy.kuesionare.save') }}" method="POST" class="form-material" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-body">

                                <input type="text" class="form-control form-control-line hidden" placeholder="Masukan Title" name="C_QUESTIONS_ID" id="C_QUESTIONS_ID" value="{{ $result['C_QUESTIONS_ID'] }}" hidden>
                                <div class="form-group">
                                    <label><strong>Title</strong></span></label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan Title" name="C_QUESTIONS_TITLE" id="C_QUESTIONS_TITLE" value="{{ $result['C_QUESTIONS_TITLE'] }}" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Type</strong></span></label>
                                    <select class="select2 form-control custom-select" name="C_QUESTIONS_TYPE" style="width: 100%; height:36px;" >
                                        <option {{ $result['C_QUESTIONS_TYPE'] == 'TEXTFIELD' ? 'selected' : '' }} value="TEXTFIELD">TEXTFIELD</option>
                                        <option {{ $result['C_QUESTIONS_TYPE'] == 'RADIOBUTTON' ? 'selected' : '' }} value="RADIOBUTTON">RADIOBUTTON</option>
                                        <option {{ $result['C_QUESTIONS_TYPE'] == 'DROPDOWN' ? 'selected' : '' }} value="DROPDOWN">DROPDOWN</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label><strong>Question</strong></span></label>
                                    <textarea class="form-control" name="C_QUESTIONS_QUESTION" rows="5" placeholder="Enter Question">{{ $result['C_QUESTIONS_QUESTION'] }}</textarea>
                                </div>
                                <hr>

                                <label><strong>Type</strong></span></label>
                                <div class="multi-field-wrapper">
                                    @foreach($result['C_QUESTIONS_ANSWER'] as $key => $value)
                                        <div class="multi-fields">
                                            <div class="multi-field">
                                              <input type="text" name="answer[]" class="form-control col-8" value="{{ $value }}">
                                              <button type="button" class="remove-field btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    @endforeach
                                    <br>
                                    <button type="button" class="add-field btn-info btn-sm">Add field</button>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label><strong>Status</strong></span></label>
                                    <select class="select2 form-control custom-select" name="C_QUESTIONS_ISACTIVE" style="width: 100%; height:36px;" >
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                </div>


                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                <a type="button" href="{{ route('tracerstudy.kuesionare') }}" class="btn btn-inverse">Cancel</a>
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

    $('.multi-field-wrapper').each(function() {
        var $wrapper = $('.multi-fields', this);
        $(".add-field", $(this)).click(function(e) {
            $('.multi-field:first-child', $wrapper).clone(true).appendTo($wrapper).find('input').val('').focus();
        });
        $('.multi-field .remove-field', $wrapper).click(function() {
            if ($('.multi-field', $wrapper).length > 1)
                $(this).parent('.multi-field').remove();
        });
    });
</script>
@endsection
