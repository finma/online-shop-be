<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">
          <span data-feather="home"></span>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('products*') ? 'active' : '' }}" href="/products">
          <span data-feather="package"></span>
          Products
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('categories*') ? 'active' : '' }}" href="/categories">
          <span data-feather="grid"></span>
          Categories
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('payments*') ? 'active' : '' }}" href="/payments">
          <span data-feather="credit-card"></span>
          Payments
        </a>
      </li>
    </ul>

    <h6 class="sidebar-heading d-flex justify-content-beetwen align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Administrator</span>
    </h6>
    {{-- @can('admin')
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
            <span data-feather="grid"></span>
            Categories
          </a>
        </li>
      </ul>
    @elsecan('user')
      <ul class="nav flex-column">
        <li class="nav-item">
          <a style="cursor: not-allowed" class=" text-muted nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="#">
            <span data-feather="grid"></span>
            Categories
          </a>
        </li>
      </ul>
    @endcan --}}
    
  </div>
</nav>