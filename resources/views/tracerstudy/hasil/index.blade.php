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
                            <!-- <a href="{{ route('tracerstudy.kuesionare.add') }}" class="btn btn-info btn-sm pull-right"><i class="mdi mdi-plus"></i> Tambah</a> -->
                            <div class="table-responsive">
                            
                                <table id="result123" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>kdptimsmh</th>
                                            <th>kdpstmsmh</th>
                                            <th>nimhsmsmh</th>
                                            <th>nmmhsmsmh</th>
                                            <th>telpomsmh</th>
                                            <th>emailmsmh</th>
                                            <th>tahun_lulus</th>

                                            @foreach($result[0]['answers'] as $key => $value)
                                                <th>{{ $value['key'] }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($result as $key => $value)
                                            <tr>
                                                <td width="2%"> {{ $key + 1 }}</td>
                                                <td>{{ $value['C_QUESTIONNAIRE_KDPTIMSMH'] }}</td>
                                                <td>{{ $value['C_QUESTIONNAIRE_KDPSTMSMH'] }}</td>
                                                <td>{{ $value['C_QUESTIONNAIRE_NIMHSMSMH'] }}</td>
                                                <td>{{ $value['C_QUESTIONNAIRE_NMMHSMSMH'] }}</td>
                                                <td>{{ $value['C_QUESTIONNAIRE_TELPOMSMH'] }}</td>
                                                <td>{{ $value['C_QUESTIONNAIRE_EMAILMSMH'] }}</td>
                                                <td>{{ $value['C_QUESTIONNAIRE_TAHUN_LULUS'] }}</td>
                                                @foreach($value['answers'] as $keys => $values)
                                                    <th>{{ $values['value'] }}</th>
                                                @endforeach

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
    
    

    $('#result123').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        format: {
                            body: function (data, row, column, node ) {
                              return "\0" + data ;
                            }
                        }
                         
                    }
                }
            ],
            order: [ [0, 'asc'] ]
        });
</script>

@endsection
