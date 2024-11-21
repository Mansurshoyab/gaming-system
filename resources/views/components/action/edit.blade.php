@props(['href' => null])

<a href="{{ $href ?? 'javascript:void(0);' }}" class="btn btn-sm btn-info btn-icon btn-round text-white p-3" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Edit" >
  <i class="fas fa-edit" ></i>
</a>
