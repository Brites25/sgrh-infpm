
<head>
    <!-- Include SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Dadus Munisipiu</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">

                <input type="hidden" id="id_munisipiu">

              <div class="form-group">
                  <label for="name" class="control-label">Naran Munisipiu</label>
                  <input type="text" class="form-control" id="munisipiu-edit">
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
        var munisipiu_id;

        //button edit post event
        $('body').on('click', '#btn-edit-munisipiu', function () {
           var munisipiu_id = $(this).data('id');

            //fetch detail post with ajax
            $.ajax({
                url: 'municipio/' + munisipiu_id,
                type: "GET",
                cache: false,
                success:function(response){
                    //open modal
                    $('#modal-edit').modal('show');
                    //fill data to form
                    $('#munisipiu-edit').val(response.data.naran_munisipiu);
                    $('#id_munisipiu').val(munisipiu_id);
                }
            });
        });

        //action create post
        $('#edit').click(function(e) {
            e.preventDefault();

            //retrive munisipiu_id
            let munisipiu_id = $('#id_munisipiu').val();

            //define variable
            let naran_munisipiu  = $('#munisipiu-edit').val();
            let token   = $("meta[name='csrf-token']").attr("content");

            console.log(munisipiu_id);

            //ajax
            $.ajax({

                url: `/municipio/${munisipiu_id}`,
                type: "PUT",
                cache: false,
                data: {
                    "naran_munisipiu": naran_munisipiu,
                    _token: token
                },
                success:function(response){
                    //close modal
                    $('#modal-edit').modal('hide');
                    //refresh table
                    $('#index_' + munisipiu_id + ' td:nth-child(2)').text(naran_munisipiu);
                   //show alert with timer
                    Swal.fire({
                        type: 'success',
                        icon: 'success',
                        title: "Dadus Munisipiu Editadu ho susesu!",
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

