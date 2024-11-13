<div class="main-header" >
  {{-- Logo Header --}}
  <div class="main-header-logo" >
    <div class="logo-header" data-background-color="dark" >
      <a href="{{ route('admin.dashboard') }}" class="logo" >
        <img src="{{ asset('images/company/' . config('company.logo') ) }}" alt="Logo" class="navbar-brand" height="35" />
      </a>
      <div class="nav-toggle" >
        <button class="btn btn-toggle toggle-sidebar" >
          <i class="gg-menu-right" ></i>
        </button>
        <button class="btn btn-toggle sidenav-toggler" >
          <i class="gg-menu-left" ></i>
        </button>
      </div>
      <button class="topbar-toggler more" >
        <i class="gg-more-vertical-alt" ></i>
      </button>
    </div>
  </div>
  {{-- Navbar Header --}}
  <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom" >
    <div class="container-fluid" >
      <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex" >
        <div class="input-group" >
          <div class="input-group-prepend" >
            <button type="submit" class="btn btn-search pe-1" >
              <i class="fas fa-search search-icon" ></i>
            </button>
          </div>
          <input type="text" placeholder="Search ..." class="form-control" />
        </div>
      </nav>

      <ul class="navbar-nav topbar-nav ms-md-auto align-items-center" >
        <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none" >
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);" role="button" aria-expanded="false" aria-haspopup="true" >
            <i class="fas fa-search" ></i>
          </a>
          <ul class="dropdown-menu dropdown-search animated fadeIn" >
            <form class="navbar-left navbar-form nav-search" >
              <div class="input-group" >
                <input type="text" placeholder="Search ..." class="form-control" />
              </div>
            </form>
          </ul>
        </li>
        <li class="nav-item topbar-icon dropdown hidden-caret" >
          <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="messageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
            <i class="fas fa-envelope"></i>
          </a>
          <ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown" >
            <li>
              <div class="dropdown-title d-flex justify-content-between align-items-center" >
              <span>{{ __('Messages') }}</span>
                <a href="javascript:void(0);" class="small" >{{ __('Mark all read') }}</a>
              </div>
            </li>
            <li>
              <div class="message-notif-scroll scrollbar-outer" >
                <div class="notif-center" >
                  <a href="javascript:void(0);" >
                    <div class="notif-img" >
                      <img src="{{ asset('backend/img/jm_denis.jpg') }}" alt="Img Profile" />
                    </div>
                    <div class="notif-content" >
                      <span class="subject" >{{ __('Jimmy Denis') }}</span>
                      <span class="block" >{{ __('How are you?') }}</span>
                      <span class="time" >{{ __('5 minutes ago') }}</span>
                    </div>
                  </a>
                </div>
              </div>
            </li>
            <li>
              <a class="see-all" href="javascript:void(0);" >
                <span>{{ __('See all messages') }}</span>
                <i class="fas fa-angle-right" ></i>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item topbar-icon dropdown hidden-caret" >
          <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notifDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
            <i class="fa fa-bell"></i>
            <span class="notification">{{ __('0') }}</span>
          </a>
          <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown" >
            <li>
              <div class="dropdown-title d-flex justify-content-between align-items-center" >
              <span>{{ __('Notifications') }}</span>
                <a href="javascript:void(0);" class="small" >{{ __('Mark all read') }}</a>
              </div>
            </li>
            <li>
              <div class="notif-scroll scrollbar-outer" >
                <div class="notif-center" >
                  <a href="javascript:void(0);" >
                    <div class="notif-icon notif-danger" >
                      <i class="fa fa-heart" ></i>
                    </div>
                    <div class="notif-content" >
                      <span class="block" >{{ __('Farrah liked Admin') }}</span>
                      <span class="time" >{{ __('17 minutes ago') }}</span>
                    </div>
                  </a>
                </div>
              </div>
            </li>
            <li>
              <a class="see-all" href="javascript:void(0);" >
                <span>{{ __('See all notifications') }}</span>
                <i class="fas fa-angle-right" ></i>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item topbar-icon dropdown hidden-caret" >
          <a href="javascript:void(0);" class="nav-link" data-bs-toggle="dropdown" aria-expanded="false" >
            <i class="fas fa-layer-group" ></i>
          </a>
          <div class="dropdown-menu quick-actions animated fadeIn" >
            <div class="quick-actions-header py-1" >
              <p class="mb-1" >
                <strong class="title" >{{ __('Quick Actions') }}</strong>
                <span class="subtitle op-7" >{{ __('(Shortcuts)') }}</span>
              </p>
            </div>
            <div class="quick-actions-scroll scrollbar-outer" >
              <div class="quick-actions-items" >
                  <div class="row m-0">
                    <a class="col-6 col-md-4 p-0" href="javascript:void(0);">
                      <div class="quick-actions-item">
                        <div class="avatar-item bg-danger rounded-circle">
                          <i class="far fa-calendar-alt"></i>
                        </div>
                        <span class="text">Calendar</span>
                      </div>
                    </a>
                    <a class="col-6 col-md-4 p-0" href="javascript:void(0);">
                      <div class="quick-actions-item">
                        <div
                          class="avatar-item bg-warning rounded-circle"
                        >
                          <i class="fas fa-map"></i>
                        </div>
                        <span class="text">Maps</span>
                      </div>
                    </a>
                    <a class="col-6 col-md-4 p-0" href="javascript:void(0);">
                      <div class="quick-actions-item">
                        <div class="avatar-item bg-info rounded-circle">
                          <i class="fas fa-file-excel"></i>
                        </div>
                        <span class="text">Reports</span>
                      </div>
                    </a>
                    <a class="col-6 col-md-4 p-0" href="javascript:void(0);">
                      <div class="quick-actions-item">
                        <div
                          class="avatar-item bg-success rounded-circle"
                        >
                          <i class="fas fa-envelope"></i>
                        </div>
                        <span class="text">Emails</span>
                      </div>
                    </a>
                    <a class="col-6 col-md-4 p-0" href="javascript:void(0);">
                      <div class="quick-actions-item">
                        <div
                          class="avatar-item bg-primary rounded-circle"
                        >
                          <i class="fas fa-file-invoice-dollar"></i>
                        </div>
                        <span class="text">Invoice</span>
                      </div>
                    </a>
                    <a class="col-6 col-md-4 p-0" href="javascript:void(0);">
                      <div class="quick-actions-item">
                        <div
                          class="avatar-item bg-secondary rounded-circle"
                        >
                          <i class="fas fa-credit-card"></i>
                        </div>
                        <span class="text">Payments</span>
                      </div>
                    </a>
                  </div>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item topbar-user dropdown hidden-caret" >
          <a
              class="dropdown-toggle profile-pic"
              data-bs-toggle="dropdown"
              href="javascript:void(0);"
              aria-expanded="false" >
              <div class="avatar-sm">
                <img
                  src="{{ asset('backend/img/profile.jpg') }}"
                  alt="..."
                  class="avatar-img rounded-circle"
                />
              </div>
              <span class="profile-username">
                <span class="op-7">{{ __('My') }}</span>
                <span class="fw-bold">{{ __('Account') }}</span>
              </span>
            </a>
            <ul class="dropdown-menu dropdown-user animated fadeIn">
              <div class="dropdown-user-scroll scrollbar-outer">
                <li>
                  <div class="user-box">
                    <div class="avatar-lg">
                      <img
                        src="{{ asset('backend/img/profile.jpg') }}"
                        alt="image profile"
                        class="avatar-img rounded"
                      />
                    </div>
                    <div class="u-text">
                      <h4>Hizrian</h4>
                      <p class="text-muted">hello@example.com</p>
                      <a
                        href="javascript:void(0);"
                        class="btn btn-xs btn-secondary btn-sm"
                        >View Profile</a
                      >
                    </div>
                  </div>
                </li>
                <li>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="javascript:void(0);">My Profile</a>
                  <a class="dropdown-item" href="javascript:void(0);">My Balance</a>
                  <a class="dropdown-item" href="javascript:void(0);">Inbox</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="javascript:void(0);">Account Setting</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="javascript:void(0);">Logout</a>
                </li>
              </div>
            </ul>
          </li>
      </ul>
    </div>
  </nav>
</div>
