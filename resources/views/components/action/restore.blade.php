@props(['href' => null, 'item' => null])

<button class="btn btn-sm btn-secondary btn-icon btn-round restore-data p-3 ms-1" restore-route="{{ $href }}" restore-id="{{ $item }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Restore" >
  <i class="fas fa-trash-can-arrow-up" ></i>
</button>

@push('scripts')
  <script>
    $(docuement).ready(function () {
      $(document).on('click', '.restore-data', function (e) {
        e.preventDefault();
        let restoreURL = $(this).attr('restore-route');
        let restoreID = $(this).attr('restore-id');
        Swal.fire({
          title: 'Are you sure?',
          text: "You want to restore this!",
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
              if (response.data.code == 203) {
                Swal.fire('Warning!', 'Your status id must be numeric.', 'warning');
              } else if (response.data.code == 404) {
                Swal.fire('Warning!', 'Your status info not found.', 'warning');
              } else {
                Swal.fire({
                  title: 'Restored!',
                  text: response.data.message,
                  icon: 'success',
                  showConfirmButton: false
                });
                location.reload();
              }
            }).catch(error => {
              console.error(error);
              Swal.fire({
                title: 'Error',
                text: 'An error occurred while restoring data.',
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
