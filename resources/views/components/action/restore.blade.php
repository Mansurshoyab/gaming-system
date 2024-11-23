@props(['href' => null, 'item' => null])

<button class="btn btn-sm btn-secondary btn-icon btn-round restore-data p-3" restore-route="{{ $href }}" restore-id="{{ $item }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Restore" >
  <i class="fas fa-undo-alt" ></i>
</button>

@push('scripts')
  <script>
    $(document).ready(function () {
      $('[data-bs-toggle="tooltip"]').tooltip();

      $('.restore-data').click(function (e) {
        e.preventDefault();
        let restoreURL = $(this).attr('restore-route');
        let restoreID = $(this).attr('restore-id');
        console.log("Restore URL: ", restoreURL);
        console.log("Restore ID: ", restoreID);

        Swal.fire({
          title: 'Are you sure?',
          text: "You want to restore this item!",
          icon: 'question',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, restore it!'
        }).then((result) => {
          if (result.isConfirmed) {
            axios.post(restoreURL, {
              id: restoreID
            }, {
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            }).then(response => {
              if (response.status === 200) {
                Swal.fire({
                  title: 'Restored!',
                  text: response.data.message || 'The item was restored successfully.',
                  icon: 'success',
                  showConfirmButton: false,
                  timer: 1500
                });
                location.reload();
              } else {
                Swal.fire('Warning!', response.data.message || 'Unexpected response.', 'warning');
              }
            }).catch(error => {
              console.error(error);
               Swal.fire({
                title: 'Error',
                text: error.response?.data?.message || 'An error occurred while restoring data.',
                icon: 'error',
                confirmButtonText: 'OK'
              });
            });
          }
        });
      });
    });
  </script>
@endpush

