@props(['centered' => false, 'scrollable' => false, 'header' => 'Quick Form', 'theme' => 'primary', 'button' => 'Submit'])

<section class="modal fade" id="quickModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="quickModalLabel" aria-hidden="true" >
  <div class="modal-dialog @if ( $centered ) modal-dialog-centered @endif @if ( $scrollable ) modal-dialog-scrollable @endif" >
    <div class="modal-content" >
      <form id="quickForm" method="POST" >
        @csrf
        <div class="modal-header py-2" >
          <h1 class="modal-title fs-5" id="quickModalLabel" >
            <strong id="quickTitle" >{{ $header }}</strong>
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
          <button type="submit" class="btn btn-{{ $theme }} px-5 py-1" id="quickButton" >
            <i class="fas fa-plus" id="quickIcon" ></i>
            <strong class="ms-1" id="quickLabel" >{{ $button }}</strong>
          </button>
        </div>
      </form>
    </div>
  </div>
</section>
