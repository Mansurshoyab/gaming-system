<script>
  @if(session('created'))
    Swal.fire({
      title: 'Created',
      text: '{{ session('created') }}',
      icon: 'success',
      showConfirmButton: false
    });
  @endif
  @if(session('success'))
    Swal.fire({
      title: 'Success',
      text: '{{ session('success') }}',
      icon: 'success',
      showConfirmButton: false
    });
  @endif
  @if(session('cleared'))
    Swal.fire({
      title: 'Cleared',
      text: '{{ session('cleared') }}',
      icon: 'success',
      showConfirmButton: true
    });
  @endif
  @if(session('updated'))
    Swal.fire({
      title: 'Updated',
      text: '{{ session('updated') }}',
      icon: 'success',
      showConfirmButton: false
    });
  @endif
  @if(session('warning'))
    Swal.fire({
      title: 'Duplicate',
      text: '{{ session('warning') }}',
      icon: 'error',
      confirmButtonText: 'OK'
    });
  @endif
  @if(session('error'))
    Swal.fire({
      title: 'Error',
      text: '{{ session('error') }}',
      icon: 'error',
      confirmButtonText: 'OK'
    });
  @endif
</script>
