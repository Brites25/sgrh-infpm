
<head>
    <!-- Include SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Dadus Diresaun</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">

                <input type="hidden" id="id_diresaun">

              <div class="form-group">
                  <label for="name" class="control-label">Naran Diresaun</label>
                  <input type="text" class="form-control" id="diresaun-edit">
                  <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Kansela</button>
                <button type="button" class="btn btn-primary" id="edit">Edit</button>
          </div>
      </div>
  </div>
</div>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Include Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Include SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>


<script>

        //define variable
        var diresaun_id;

        //button edit post event
        $('body').on('click', '#btn-edit-diresaun', function () {
           var diresaun_id = $(this).data('id');

            //fetch detail post with ajax
            $.ajax({
                url: 'diresaun/' + diresaun_id,
                type: "GET",
                cache: false,
                success:function(response){
                    //open modal
                    $('#modal-edit').modal('show');
                    //fill data to form
                    $('#diresaun-edit').val(response.data.naran_diresaun);
                    $('#id_diresaun').val(diresaun_id);
                }
            });
        });

        //action create post
        $('#edit').click(function(e) {
            e.preventDefault();

            //retrive munisipiu_id
            let diresaun_id = $('#id_diresaun').val();

            //define variable
            let naran_diresaun  = $('#diresaun-edit').val();
            let token   = $("meta[name='csrf-token']").attr("content");


            //ajax
            $.ajax({

                url: `/diresaun/${diresaun_id}`,
                type: "PUT",
                cache: false,
                data: {
                    "naran_diresaun": naran_diresaun,
                    _token: token
                },
                success:function(response){
                    //close modal
                    $('#modal-edit').modal('hide');
                    //refresh table
                    $('#index_' + diresaun_id + ' td:nth-child(2)').text(naran_diresaun);
                   //show alert with timer
                    Swal.fire({
                        type: 'success',
                        icon: 'success',
                        title: "Dadus Diresaun Editadu ho susesu!",
                        showConfirmButton: false,
                        timer: 5000
                    });

                    search();
                },
                error:function(response){
                    //show alert
                    Swal.fire(
                        'Error!',
                        'Iha problema iha dadus nee.',
                        'error'
                    );
                }
            });
        });
</script>

</body>
</html>

