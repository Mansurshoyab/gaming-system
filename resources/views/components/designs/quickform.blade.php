@props(['center' => false, 'scroll' => false, 'header' => 'Quick Form', 'footer' => null, 'theme' => 'primary', 'button' => 'Submit'])

<section class="modal fade" id="quickModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="quickModalLabel" aria-hidden="true" >
  <div class="modal-dialog @if ( $center ) modal-dialog-centered @endif @if ( $scroll ) modal-dialog-scrollable @endif" >
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
          @if ($footer)
            <p>{{ $footer }}</p>
          @endif
          <button type="submit" class="btn btn-{{ $theme }} px-5 py-1" id="quickButton" >
            <i class="fas fa-plus" id="quickIcon" ></i>
            <strong class="ms-1" id="quickLabel" >{{ $button }}</strong>
          </button>
        </div>
      </form>
    </div>
  </div>
</section>

@push('scripts')
  <script>
    $(document).ready(function () {
      $("#quickAdd").click(function () {
        var store = $(this).attr('store-route');
        var total = $(this).data('total');
        $("#quickForm #quickTitle").text("Quick Add");
        $("#quickForm #quickButton").removeClass('btn-success').addClass('btn-primary');
        $("#quickForm #quickIcon").removeClass('fa-check').addClass('fa-plus');
        $("#quickForm #quickLabel").text("Create");
        $('#quickForm').attr('action', store);
        $("#quickForm").find("input[name='_method']").remove();
        $("#quickModal .modal-footer").addClass('d-flex justify-content-between align-items-center');
        $("#quickModal .modal-footer #quickData").text(total);
      });

      $(".quick-edit").click(function () {
          var update = $(this).attr('update-route');
          var updated = $(this).data('updated');
          $("#quickForm #quickTitle").text("Quick Edit");
          $("#quickForm #quickButton").removeClass('btn-primary').addClass('btn-success');
          $("#quickForm #quickIcon").removeClass('fa-plus').addClass('fa-check');
          $("#quickForm #quickLabel").text("Update");
          $('#quickForm').attr('action', update);
          if ($("#quickForm").find("input[name='_method']").length === 0) {
            $("#quickForm").prepend('<input type="hidden" name="_method" value="put" />');
          }
          $("#quickModal .modal-footer").addClass('d-flex justify-content-between align-items-center');
          $("#quickModal .modal-footer #quickFooter").text("Last Updated");
          $("#quickModal .modal-footer #quickData").text(updated);
        });
    });
  </script>
@endpush
