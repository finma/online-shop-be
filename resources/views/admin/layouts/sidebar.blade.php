<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
  <div class="position-sticky pt-3 px-2">

    <h6 class="sidebar-heading d-flex justify-content-beetwen align-items-center px-3 mt-4 mb-2 text-muted">
      <span>Administrator</span>
    </h6>

    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="/" class="nav-link text-light {{ Request::is('/') ? 'active' : '' }}" aria-current="page">
          <span data-feather="home" class="text-light"></span>
          Dashboard
        </a>
      </li>
      <li>
        <a href="/products" class="nav-link text-light {{ Request::is('products*') ? 'active' : '' }}">
          <span data-feather="package" class="text-light"></span>
          Produk
        </a>
      </li>
      <li>
        <a href="/categories" class="nav-link text-light {{ Request::is('categories*') ? 'active' : '' }}">
          <span data-feather="grid" class="text-light"></span>
          Kategori
        </a>
      </li>
      <li>
        <a href="/payments" class="nav-link text-light {{ Request::is('payments*') ? 'active' : '' }}">
          <span data-feather="credit-card" class="text-light"></span>
          Pembayaran
        </a>
      </li>
      <li>
        <a href="/transactions" class="nav-link text-light {{ Request::is('transactions*') ? 'active' : '' }}">
          <span data-feather="shopping-bag" class="text-light"></span>
          Transaksi
        </a>
      </li>
    </ul>

    
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