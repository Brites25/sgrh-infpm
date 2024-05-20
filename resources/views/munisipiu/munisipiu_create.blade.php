
<head>
      <!-- Include SweetAlert2 CSS -->
      <link href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Aumenta Dadus Munisipiu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name" class="control-label">Naran Munisipiu</label>
                    <input type="text" class="form-control" id="naran_munisipiu">
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
    $('body').on('click', '#btn-create-munisipiu', function () {
        //open modal
        $('#modal-create').modal('show');
    });

   //action create post
   $('#store').click(function(e) {
        e.preventDefault();

        //define variable
        let naran_munisipiu  = $('#naran_munisipiu').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `/municipio`,
            type: "POST",
            cache: false,
            data: {
                "naran_munisipiu": naran_munisipiu,
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
                    window.location.href = `/municipio?page=${lastPage}`;
                }, 2000);
                
                //clear form
                $('#naran_munisipiu').val('');

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

