@extends('layouts.app')

@section('content')
    <section id="main-wrapper">
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ $title }}</h4>
                            <hr>
                            <a href="{{ route('agenda.add') }}" class="btn btn-info btn-sm pull-right"><i class="mdi mdi-plus"></i> Tambah</a>
                            <div class="table-responsive">
                            
                                <table id="example23" class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Title</th>
                                            <th>Subtitle</th>
                                            <th width="30%">Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($result as $key => $value)
                                            <tr>
                                                <td width="2%"> {{ $key + 1 }}</td>
                                                <td>{{ $value['C_AGENDA_TITLE'] }}</td>
                                                <td>{{ $value['C_AGENDA_SUBTITLE'] }}</td>
                                                <td class="text">{{ strip_tags($value['C_AGENDA_DESCRIPTION']) }}</td>
                                                <td>{{ $value['C_AGENDA_ISACTIVE'] == 1 ? 'Active' : 'Not Active' }}</td>
                                                <td>
                                                    <a href="{{ route('agenda.edit', ['id' => $value->C_AGENDA_ID ]) }}" data-toggle="tooltip" data-original-title="Edit" > <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                    <a onclick="drop({{$value->C_AGENDA_ID}})" data-toggle="tooltip" data-original-title="Delete" > <i class="fa fa-trash-o text-danger m-r-10"></i> </a>
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
                "C_AGENDA_ID" : id};

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

                        url: '{{ route("agenda.delete")}}',
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
