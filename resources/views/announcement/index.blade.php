@extends('layouts.app')

@section('content')
    <section id="main-wrapper">
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ $title }}</h4>
                            <h6 class="card-subtitle">Rekomendasi Ukuran Image : <code>1920 × 900 </code></h6>
                            <hr>
                            <a href="{{ route('pengumuman.add') }}" class="btn btn-info btn-sm pull-right"><i class="mdi mdi-plus"></i> Tambah</a>
                            <div class="table-responsive">
                            
                                <table id="example23" class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Title</th>
                                            <th>Subtitle</th>
                                            <th width="30%">Description</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($result as $key => $value)
                                            <tr>
                                                <td width="2%"> {{ $key + 1 }}</td>
                                                <td>{{ $value['C_ANNOUNCEMENT_TITLE'] }}</td>
                                                <td>{{ $value['C_ANNOUNCEMENT_SUBTITLE'] }}</td>
                                                <td class="text">{{ strip_tags($value['C_ANNOUNCEMENT_DESCRIPTION']) }}</td>
                                                <td><a target="_blank" href="{{ url($value['C_ANNOUNCEMENT_IMAGE']) }}"><img src="{{ url($value['C_ANNOUNCEMENT_IMAGE']) }}" width="50"> </a></td>
                                                <td>{{ $value['C_ANNOUNCEMENT_ISACTIVE'] == 1 ? 'Active' : 'Not Active' }}</td>
                                                <td>
                                                    <a href="{{ route('pengumuman.edit', ['id' => $value->C_ANNOUNCEMENT_ID ]) }}" data-toggle="tooltip" data-original-title="Edit" > <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                    <a onclick="drop({{$value->C_ANNOUNCEMENT_ID}})" data-toggle="tooltip" data-original-title="Delete" > <i class="fa fa-trash-o text-danger m-r-10"></i> </a>
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
        </div>
    </section>
@endsection

@section('js')

<script type="text/javascript">
    
    function drop(id) {
        
        var data = {
                "C_ANNOUNCEMENT_ID" : id};

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

                        url: '{{ route("pengumuman.delete")}}',
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
