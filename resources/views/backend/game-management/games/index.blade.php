<x-backend-layout :page="__('Manage Games')" >

  @push('breadcrumb')
    <x-backend-breadcrumb :module="__('Game Management')" :breadcrumbs="[['title' => 'Games', 'route' => 'games.index'], ['title' => 'List']]" />
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
        <button type="button" class="nav-link py-1" id="quickAdd" store-route="{{ route('games.store') }}" data-total="{{ $total }}" data-bs-toggle="modal" data-bs-target="#quickModal" >
          <span>{{ __('Quick Add') }}</span>
        </button>
      </li>
    </ul>
  </x-base-section>

  <section class="tab-content" id="pills-tabContent" >
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0" >
      <x-card-design :header="__('Manage Games')" :tool="__('nav-item topbar-icon')" :dropdowns="[['label' => 'Add New', 'icon' => 'plus', 'route' => route('games.create')]]" >
        <x-data-table :id="__('gameTable')" :striped="true" :hover="true" :theme="__('black')" :headers="['SL', 'Title', 'Genre', 'Status', 'Date Created', 'Action']" :datatable="true" >
          @foreach ($games as $key => $game)
            <tr>
              <td>{{ str_pad($loop->iteration, strlen(count($games)), '0', STR_PAD_LEFT) . '.' }}</td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                <a href="javascript:void(0);" class="text-dark quick-edit" update-route="{{ route('games.update', $game->id) }}" data-name="{{ $game->name }}" data-genre-id="{{ $game->genre_id }}" data-description="{{ $game->description }}" data-slug="{{ $game->slug }}" data-updated="{{ $game->updated_at->format('d M Y h:i A') }}" data-bs-toggle="modal" data-bs-target="#quickModal" >
                  <strong>{{ $game->name }}</strong>
                </a>
              </td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >{{ $game->genre->title ?: __('Not Found') }}</td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                <span class="badge bg-{{ $game->status === status('enable') ? 'success' : ( $game->status === status('disable') ? 'danger' : 'secondary' ) }}" >{{ ucfirst($game->status) }}</span>
              </td>
              <td style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >{{ $game->created_at->diffForHumans() }}</td>
              <td class="d-flex justify-content-between align-items-center" style="padding-top: 0.75rem !important; padding-bottom: 0.75rem !important;" >
                <x-toggle-switch :name="__('status')" :href="route('games.status', $game->id)" :id="$game->id" :enable="status('enable')" :disable="status('disable')" :value="$game->status" />
                <x-action-drawer>
                  <x-edit-action :href="route('games.edit', $game->id)" />
                  <x-show-action :href="route('games.show', $game->id)" :header="$game->title" :item="$game" />
                  <x-delete-action :href="route('games.destroy', $game->id)" :class="__('unique-id-') . $game->id" :id="$game->id" :title="__('Trash')" />
                </x-action-drawer>
              </td>
            </tr>
          @endforeach
        </x-data-table>
      </x-card-design>
    </div>
    <div class="tab-pane fade" id="pills-trash" role="tabpanel" aria-labelledby="pills-trash-tab" tabindex="0" >
      <x-card-design>
        <p>{{ __('Inner page content goes here.') }}</p>
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
      <x-form-input :label="__('Name')" :type="__('text')" :name="__('name')" :count="true" :max="__(25)" :required="true" />
    </div>
    <div class="col-6" >
      <x-form-input :label="__('Slug')" :type="__('text')" :name="__('slug')" :check="true" :count="true" :slug="__('title')" :max="__(25)" :required="true" />
    </div>
    <div class="col-12" >
      <x-form-select :label="__('Genre')" :name="__('genre_id')" :options="$genres" />
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
          $("#quickForm #name").val('');
          $("#quickForm #genreId").val('');
          $("#quickForm #description").val('');
          $("#quickForm #slug").val('');
          $("#quickModal .modal-footer #quickFooter").text("Total Games");
        });

        $(".quick-edit").click(function () {
          var name = $(this).data('name');
          var genre = $(this).data('genre-id');
          var description = $(this).data('description');
          var slug = $(this).data('slug');
          $("#quickForm #name").val(name);
          $("#quickForm #genreId").val(genre);
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
