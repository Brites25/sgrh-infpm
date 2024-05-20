@extends('main')


@section('titulu')
    Munisipiu
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
                <h1>Dadus Munisipiu</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                  <li class="breadcrumb-item active">Dadus Munisipiu</li>
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
                    <a href="javascript:void(0)" class="btn btn-primary mb-2" id="btn-create-munisipiu">Aumenta</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="tabela-mun" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Naran Munisipiu</th>
                        <th>Asaun</th>
                      </tr>
                      </thead>
                      <tbody id="table-munisipiu">

                    
                        @foreach ($munisipiu as $item)
                      <tr id="index_{{ $item->id_munisipiu }}">
                        <td>{{ ($munisipiu->currentPage() - 1) * $munisipiu->perPage() + $loop->iteration }}</td>
                        <td>{{ $item->naran_munisipiu }}</td>
                        <td class="text-center">
                          <a href="javascript:void(0)" id="btn-edit-munisipiu" data-id="{{ $item->id_munisipiu }}" class="btn btn-warning btn-sm">EDIT</a>
                          <a href="javascript:void(0)" id="btn-delete-munisipiu" data-id="{{ $item->id_munisipiu }}" class="btn btn-danger btn-sm">DELETE</a>
                        </td>
                      </tr>
                        @endforeach
                       
                
                      
                      </tbody>

                    </table>
                    <div class="mt-3">
                      {{ $munisipiu->links() }}
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

    @include('munisipiu.munisipiu_create')
    @include('munisipiu.munisipiu_update')
    @include('munisipiu.munisipiu_delete')

</body>

<script>
  $('#search').on('keyup', function(){
      search();
  });
  search();
  function search(){
       var keyword = $('#search').val();
       $.post('{{ route("munisipiu.search") }}',
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
  if(res.munisipiu.length <= 0){
      htmlView+= `
         <tr>
            <td colspan="4">Dadus La existe.</td>
        </tr>`;
  }
  for(let i = 0; i < res.munisipiu.length; i++){
      htmlView += `
          <tr>
             <td>`+ (i+1) +`</td>
                <td>`+res.munisipiu[i].naran_munisipiu+`</td>
                <td class="text-center">
                    <a href="javascript:void(0)" id="btn-edit-munisipiu" data-id="`+res.munisipiu[i].id_munisipiu+`" class="btn btn-warning btn-sm">EDIT</a>
                    <a href="javascript:void(0)" id="btn-delete-munisipiu" data-id="`+res.munisipiu[i].id_munisipiu+`" class="btn btn-danger btn-sm">DELETE</a>
          </tr>`;
  }
       $('tbody').html(htmlView);
  }
  </script>

@endsection



