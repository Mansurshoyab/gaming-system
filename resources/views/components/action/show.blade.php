@props(['href' => null, 'header' => 'Modal Title', 'item' => null])

<button type="button" class="btn btn-sm btn-success btn-icon btn-round show-action p-3 mx-1" show-route="{{ $href }}" data-id="{{ $item->id }}" data-header="{{ $header }}" data-updated-at="{{ $item->updated_at->format('d M Y h:i A') }}" data-bs-toggle="modal" data-bs-placement="bottom" title="Show" data-bs-target="#showModal" >
  <i class="fas fa-eye" ></i>
</button>

@push('scripts')
  <script>
    $(document).ready(function () {
      $('.show-action').click(function (e) {
        e.preventDefault();
        let header = $(this).data('header');
        let id = $(this).data('id');
        let updated = $(this).data('updated-at');
        $('#showModal #modalTitle').text(header);
        $('#showModal #footerData').text(updated);
      });
    });
  </script>
@endpush
