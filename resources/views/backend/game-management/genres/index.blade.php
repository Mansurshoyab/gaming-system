<x-backend-layout :page="__('Manage Genre')" >

  @push('breadcrumb')
    <x-backend-breadcrumb :module="__('Game Management')" :breadcrumbs="[['title' => 'Genres', 'route' => 'genres.index'], ['title' => 'List']]" />
  @endpush

  <x-base-section>
    <ul class="nav nav-pills mb-5" id="pills-tab" role="tablist" >
      <li class="nav-item" role="presentation" >
        <button class="nav-link py-1 active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true" >
          <span>{{ __('Home') }}</span>
        </button>
      </li>
      <li class="nav-item" role="presentation" >
        <button class="nav-link py-1" id="pills-trash-tab" data-bs-toggle="pill" data-bs-target="#pills-trash" type="button" role="tab" aria-controls="pills-trash" aria-selected="false" >
          <span>{{ __('Trash') }}</span>
        </button>
      </li>
      <li class="nav-item" role="presentation" >
        <button type="button" class="nav-link py-1" id="quickAdd" store-route="{{ route('genres.store') }}" data-total="{{ $total }}" data-bs-toggle="modal" data-bs-target="#quickModal" >
          <span>{{ __('Quick Add') }}</span>
        </button>
      </li>
    </ul>
  </x-base-section>

  <section class="tab-content" id="pills-tabContent" >
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0" >
      <x-card-design :header="__('Manage Genre')" :tool="__('nav-item topbar-icon')" :dropdowns="[['label' => 'Add New', 'icon' => 'plus', 'route' => route('genres.create')]]" >
        <x-data-table :id="__('genreTable')" :striped="true" :hover="true" :theme="__('black')" :headers="['SL', 'Title', 'Games', 'Status', 'Date Created', 'Action']" :datatable="true" >
          @foreach ($genres as $key => $genre)
            <tr>
              <td>{{ str_pad($loop->iteration, strlen(count($genres)), '0', STR_PAD_LEFT) . '.' }}</td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                <a href="javascript:void(0);" class="text-dark quick-edit" update-route="{{ route('genres.update', $genre->id) }}" data-title="{{ $genre->title }}" data-description="{{ $genre->description }}" data-slug="{{ $genre->slug }}" data-updated="{{ $genre->updated_at->format('d M Y h:i A') }}" data-bs-toggle="modal" data-bs-target="#quickModal" >
                  <strong>{{ $genre->title }}</strong>
                </a>
              </td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >{{ $genre->games->count() ?: __('0') }}</td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                <span class="badge bg-{{ $genre->status === status('enable') ? 'success' : ( $genre->status === status('disable') ? 'danger' : 'secondary' ) }}" >{{ ucfirst($genre->status) }}</span>
              </td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >{{ $genre->created_at->diffForHumans() }}</td>
              <td class="d-flex justify-content-between align-items-center" style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                <x-toggle-switch :name="__('status')" :href="route('genres.status', $genre->id)" :id="$genre->id" :enable="status('enable')" :disable="status('disable')" :value="$genre->status" />
                <x-action-drawer>
                  <x-edit-action :href="route('genres.edit', $genre->id)" />
                  <x-show-action :href="route('genres.show', $genre->id)" :header="$genre->title" :item="$genre" />
                  <x-delete-action :href="route('genres.destroy', $genre->id)" class="mx-1" :id="$genre->id" :title="__('Trash')" />
                  <x-delete-action :href="route('genres.remove', $genre->id)" :theme="__('danger')" :icon="__('times')" :id="$genre->id" :title="__('Remove')" />
                </x-action-drawer>
              </td>
            </tr>
          @endforeach
        </x-data-table>
      </x-card-design>
    </div>
    <div class="tab-pane fade" id="pills-trash" role="tabpanel" aria-labelledby="pills-trash-tab" tabindex="0" >
      <x-card-design :header="__('Trashed Genre')" :tool="__('nav-item topbar-icon')" :dropdowns="[['label' => 'Add New', 'icon' => 'plus', 'route' => route('genres.create')]]" >
        <x-data-table :id="__('trashTable')" :striped="true" :hover="true" :theme="__('black')" :headers="['SL', 'Title', 'Games', 'Date Deleted', 'Action']" :datatable="true" >
              @foreach ($trashes as $key => $trash)
                <tr>
                  <td>{{ str_pad($loop->iteration, strlen(count($trashes)), '0', STR_PAD_LEFT) . '.' }}</td>
                  <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                    <a href="javascript:void(0);" class="text-dark" >
                      <strong>{{ $trash->title }}</strong>
                    </a>
                  </td>
                  <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >{{ $trash->games->count() ?: __('0') }}</td>
                  <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >{{ $trash->created_at->diffForHumans() }}</td>
                  <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                    <x-restore-action :href="route('genres.restore', $trash->id)" :item="$trash->id" />
                    <x-delete-action :href="route('genres.remove', $trash->id)" :theme="__('danger')" :icon="__('times')" :id="$trash->id" :title="__('Remove')" />
                  </td>
                </tr>
              @endforeach
        </x-data-table>
      </x-card-design>
    </div>
  </section>

  <x-modal-design :id="__('showModal')" :center="true" :scroll="true" >
    <p id="description" style="text-align: justify !important;" ></p>
    <x-slot name="footer" >
      <strong id="footerTitle" >{{ __('Last Updated') }}</strong>
      <span>{{ __(':') }}</span>
      <span id="footerData" >{{ __('Update Time') }}</span>
    </x-slot>
  </x-modal-design>

  <x-quick-form :center="true" :scroll="true" >
    <div class="col-6" >
      <x-form-input :label="__('Title')" :type="__('text')" :name="__('title')" :count="true" :max="__(25)" :required="true" />
    </div>
    <div class="col-6" >
      <x-form-input :label="__('Slug')" :type="__('text')" :name="__('slug')" :check="true" :count="true" :slug="__('title')" :max="__(25)" :required="true" />
    </div>
    <div class="col-12" >
      <x-form-textarea :label="__('Description')" :name="__('description')" :rows="__('4')" :count="true" :max="__(250)" />
    </div>
    <x-slot name="footer" >
      <strong id="quickFooter" >{{ __('Footer Title') }}</strong>
      <span>{{ __(':') }}</span>
      <span id="quickData" >{{ __('Footer Data') }}</span>
    </x-slot>
  </x-quick-form>

  @push('scripts')
    <script>
      $(document).ready(function () {
        $("#quickAdd").click(function () {
          $("#quickForm #title").val('');
          $("#quickForm #description").val('');
          $("#quickForm #slug").val('');
          $("#quickModal .modal-footer #quickFooter").text("Total Genres");
        });

        $(".quick-edit").click(function () {
          var title = $(this).data('title');
          var description = $(this).data('description');
          var slug = $(this).data('slug');
          $("#quickForm #title").val(title);
          $("#quickForm #description").val(description);
          $("#quickForm #slug").val(slug);
        });

        $(".show-action").click(function (e) {
          e.preventDefault();
          const url = $(this).attr("show-route");
          axios.get(url).then(function (response) {
            if (response.data) {
              const description = response.data.description || "No description available";
              $("#showModal #description").html(description);
            }
          }).catch(function (error) {
            console.error("Error fetching data:", error);
            $("#showModal #description").html("<p class='text-danger'>Error loading content.</p>");
          });
        });
      });
    </script>
  @endpush

</x-backend-layout>
