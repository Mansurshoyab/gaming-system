@props(['class' => null, 'href' => null, 'id' => null, 'title' => 'Delete'])

<button class="btn btn-sm btn-warning btn-icon btn-round text-white delete-data p-3" @class([$class]) delete-route="{{ $href }}" delete-id="{{ $id }}" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="{{ $title }}" >
  <i class="fas fa-trash-alt" ></i>
</button>

@push('scripts')
  <script>
    $(document).ready(function () {
      $(document).on('click', '.delete-data', function (e) {
        e.preventDefault();
        let deleteURL = $(this).attr('delete-route');
        let deleteID = $(this).attr('delete-id');
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'question',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            axios.post(deleteURL, {
              _method: 'DELETE',
              id: deleteID,
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
            }).then(response => {
                if (response.data.code == 203) {
                  Swal.fire( 'Warning!', 'Your status id must be numeric.', 'warning' );
                } else if (response.data.code == 404) {
                  Swal.fire( 'Warning!', 'Your status info not found.', 'warning' );
                } else {
                  $('.unique-id-' + deleteID).parents("tr").remove();
                  Swal.fire({
                    title: 'Deleted!',
                    text: response.data.message,
                    icon: 'success',
                    confirmButtonText: 'OK'
                  });
                  location.reload();
                }
            }).catch(error => {
              console.error(error);
              Swal.fire({
                title: 'Error',
                text: 'An error occurred while deleting data.',
                icon: 'error',
                showConfirmButton: false
              });
            });
          }
        });
      });
    });
  </script>
@endpush
