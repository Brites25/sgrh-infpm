@extends('main')


@section('titulu')
    Diresaun
@endsection



@section('konteudu')
   
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      
    @include('components.navbar')
    @include('components.sidebar')

    
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">

              <h1>Dadus Diresaun</h1>

              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                  <li class="breadcrumb-item active">Dadus Diresaun</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
    
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <a href="javascript:void(0)" class="btn btn-primary mb-2" id="btn-create-diresaun">Aumenta</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">

                  <table id="tabela-dir" class="table table-bordered table-striped">

                      <thead>
                      <tr>
                        <th>No</th>
                        <th>Naran Diresaun</th>
                        <th>Asaun</th>
                      </tr>
                      </thead>
                      <tbody id="table-diresaun">

                    
                        @foreach ($diresaun as $item)
                      <tr id="index_{{ $item->id_diresaun }}">
                        <td>{{ ($diresaun->currentPage() - 1) * $diresaun->perPage() + $loop->iteration }}</td>
                        <td>{{ $item->naran_diresaun }}</td>
                        <td class="text-center">
                          <a href="javascript:void(0)" id="btn-edit-diresaun" data-id="{{ $item->id_diresaun }}" class="btn btn-warning btn-sm">EDIT</a>
                          <a href="javascript:void(0)" id="btn-delete-diresaun" data-id="{{ $item->id_diresaun }}" class="btn btn-danger btn-sm">DELETE</a>
                        </td>
                      </tr>
                        @endforeach
                       
                
                      
                      </tbody>

                    </table>
                    <div class="mt-3">
                      {{ $diresaun->links() }}
                    </div>
                   
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>

    </div>
    <!-- ./wrapper -->

    {{-- Modal include --}}
    @include('diresaun.diresaun_create')
    @include('diresaun.diresaun_update')
    @include('diresaun.diresaun_delete')

</body>

<script>
  $('#search').on('keyup', function(){
      search();
  });
  search();
  function search(){
       var keyword = $('#search').val();
       
       //if the keyword is empty cache the inital table data and return it if keyword is empty
        if(keyword === ''){
            $.get('{{ route("diresaun.index") }}', function(data){
                table_post_row(data);
            });
            return;
        }

       $.post('{{ route("diresaun.search") }}',
        {
           _token: $('meta[name="csrf-token"]').attr('content'),
           keyword:keyword
         },
         function(data){
          table_post_row(data);
            console.log(data);
         });
  }
  // table row with ajax
  function table_post_row(res){
  let htmlView = '';
  if(res.diresaun_data.length <= 0){
      htmlView+= `
         <tr>
            <td colspan="4">Dadus La existe.</td>
        </tr>`;
  }
  for(let i = 0; i < res.diresaun_data.length; i++){
      htmlView += `
          <tr>
             <td>`+ (i+1) +`</td>
                <td>`+res.diresaun_data[i].naran_diresaun+`</td>
                <td class="text-center">
                    <a href="javascript:void(0)" id="btn-edit-diresaun" data-id="`+res.diresaun_data[i].id_diresaun+`" class="btn btn-warning btn-sm">EDIT</a>
                    <a href="javascript:void(0)" id="btn-delete-diresaun" data-id="`+res.diresaun_data[i].id_diresaun+`" class="btn btn-danger btn-sm">DELETE</a>
          </tr>`;
  }
       $('tbody').html(htmlView);
  }
  </script>

@endsection



