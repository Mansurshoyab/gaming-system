@props(['name' => 'status', 'href' => null, 'id' => null, 'enable' => null, 'disable' => null, 'value' => null])

<div class="form-check form-switch pt-1 mt-1" >
  <input type="checkbox" name="{{ $name }}" class="form-check-input status-switch" id="{{ $name . $id }}" status-route="{{ $href }}" data-id="{{ $id }}" data-status-enable="{{ $enable }}" data-status-disable="{{ $disable }}" @if ( $value === $enable ) checked @endif />
</div>

@push('scripts')
  <script>
    $(document).ready(function () {
      $(document).on('change', '.status-switch', function () {
        const $this = $(this);
        const id = $this.data('id');
        console.log('role id : ' + id);
        const status = this.checked ? $this.data('status-enable') : $this.data('status-disable');
        const statusURL = $this.attr('status-route');
        Swal.fire({
          title: 'Are you sure?',
          text: 'You want to change the status?',
          icon: 'question',
          showCancelButton: true,
          confirmButtonText: 'Yes, change it!',
          cancelButtonText: 'Cancel'
        }).then((result) => {
          if (result.isConfirmed) {
            axios.post(statusURL, { id, status }).then(function (response) {
              Swal.fire({
                title: 'Changed',
                text: response.data.message,
                icon: 'success',
                showConfirmButton: false
              });
              location.reload();
            }).catch(function (error) {
              Swal.fire('Error', 'Failed to change status!', 'error');
              $this.prop('checked', !this.checked);
              console.error(error.response?.data || error.message);
            });
          } else {
            $this.prop('checked', !this.checked);
          }
        });
      });
    });
  </script>
@endpush


