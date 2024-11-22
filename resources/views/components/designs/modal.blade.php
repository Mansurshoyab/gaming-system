@props(['id' => 'staticBackdrop', 'center' => false, 'scroll' => false, 'header' => 'Modal title', 'footer' => null, 'theme' => 'primary', 'button' => 'Understood'])

<section class="modal fade" id="{{ $id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="{{ $id }}Label" aria-hidden="true" >
  <div class="modal-dialog @if ( $center ) modal-dialog-centered @endif @if ( $scroll ) modal-dialog-scrollable @endif" >
    <div class="modal-content" >
      <div class="modal-header py-2" >
        <h1 class="modal-title fs-5" id="{{ $id }}Label" >
          <strong id="modalTitle" >{{ $header }}</strong>
        </h1>
        <button type="button" class="btn btn-sm btn-danger btn-icon rounded-circle" data-bs-dismiss="modal" aria-label="Close" >
          <i class="fas fa-times" ></i>
        </button>
      </div>
      <div class="modal-body px-4" >
        <div class="row" >
          {{ $slot }}
        </div>
      </div>
      <div class="modal-footer py-1" >
        @if ($footer)
          <p>{{ $footer }}</p>
        @endif
        <div id="actionElement" >
          <button type="button" class="btn btn-sm btn-{{ $theme }}">
            <strong>{{ $button }}</strong>
          </button>
        </div>
      </div>
    </div>
  </div>
</section>

@push('scripts')
  <script>
    $(document).ready(function () {
      $(".show-action").click(function () {
        const dataId = $(this).data('id');
        const href = window.location.href + '/' + dataId + '/edit';
        $("#showModal .modal-footer").addClass('d-flex justify-content-between align-items-center');
        $("#actionElement").html(`
          <a href="${href}" class="btn btn-sm btn-success px-5" >
            <i class="fas fa-edit" ></i>
            <strong class="ms-1" >Edit</strong>
          </a>
        `);
      });
    });
  </script>
@endpush
