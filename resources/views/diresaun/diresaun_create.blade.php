
<head>
    <!-- Include SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Aumenta Dadus Diresaun</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <div class="form-group">
                  <label for="name" class="control-label">Naran Diresaun</label>
                  <input type="text" class="form-control" id="naran_diresaun">
                  <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Taka</button>
              <button type="button" class="btn btn-primary" id="store">Rai Dadus</button>
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
  //button create post event
  $('body').on('click', '#btn-create-diresaun', function () {
      //open modal
      $('#modal-create').modal('show');
  });

 //action create post
 $('#store').click(function(e) {
      e.preventDefault();

      //define variable
      let naran_diresaun  = $('#naran_diresaun').val();
      let token   = $("meta[name='csrf-token']").attr("content");

      console.log(naran_diresaun);
      
      //ajax
      $.ajax({
          url: `/diresaun`,
          type: "POST",
          cache: false,
          data: {
              "naran_diresaun": naran_diresaun,
              "_token": token
          },
          success:function(response){

              //show success message
              Swal.fire({
                  type: 'success',
                  icon: 'success',
                  title: `${response.message}`,
                  showConfirmButton: false,
                  timer: 2000
              });

              let lastPage = response.total_rows;
              //wait until 3000 milliseconds, then redirect to last page
              setTimeout(function(){
                  window.location.href = `/diresaun?page=${lastPage}`;
              }, 2000);
              
              //clear form
              $('#naran_diresaun').val('');

              //close modal
              $('#modal-create').modal('hide');
              

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

