<script>
    //button create post event
    $('body').on('click', '#btn-delete-diresaun', function () {

        let diresaun_id = $(this).data('id');
        let token   = $("meta[name='csrf-token']").attr("content");

        Swal.fire({
            title: 'Ita boot afirma?',
            text: "Hakarak apaga dadus refere!",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: "La'e",
            confirmButtonText: "Sim, Apaga"
        }).then((result) => {
            if (result.isConfirmed) {

                //fetch to delete data
                $.ajax({
                    url: `/diresaun/${diresaun_id}`,
                    type: "DELETE",
                    cache: false,
                    data: {
                        "_token": token
                    },
                    success:function(response){ 

                        //show success message
                        Swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 3000
                        });

                        //remove post on table
                        $(`#index_${diresaun_id}`).remove();
                    }
                });
                 //refresh table after search action delete 
                 search();
            }
           
        })
        
    });
</script>