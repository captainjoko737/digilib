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

                        <form action="{{ route('dynamic_form.question.create') }}" method="POST" class="form-material" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-body">


                                <div class="form-group">
                                    <label><strong>Title</strong></span> <span style="color:red;"> (Jangan Menggunakan Spasi)</span> </label>
                                    <input type="text" class="form-control form-control-line" placeholder="Masukan Title" name="C_DYNAMICFORM_TITLE" id="C_DYNAMICFORM_TITLE" value="" required> 
                                </div>

                                <div class="form-group">
                                    <label><strong>Type</strong></span></label>
                                    <select class="select2 form-control custom-select" name="C_DYNAMICFORM_TYPE" style="width: 100%; height:36px;" >
                                        <option value="TEXTFIELD">TEXTFIELD</option>
                                        <option value="RADIOBUTTON">RADIOBUTTON</option>
                                        <option value="DROPDOWN">DROPDOWN</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label><strong>Question</strong></span></label>
                                    <textarea class="form-control" name="C_DYNAMICFORM_QUESTION" rows="5" placeholder="Enter Question"></textarea>
                                </div>
                                <hr>

                                <label><strong>Type</strong></span></label>
                                <div class="multi-field-wrapper">
                                  <div class="multi-fields">
                                    <div class="multi-field">
                                      <input type="text" name="answer[]" class="form-control col-8">
                                      <button type="button" class="remove-field btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    </div>
                                  </div>
                                  <br>
                                    <button type="button" class="add-field btn-info btn-sm">Add field</button>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label><strong>Status</strong></span></label>
                                    <select class="select2 form-control custom-select" name="C_DYNAMICFORM_ISACTIVE" style="width: 100%; height:36px;" >
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                </div>


                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                <a type="button" href="{{ route('dynamic_form.question') }}" class="btn btn-inverse">Cancel</a>
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
