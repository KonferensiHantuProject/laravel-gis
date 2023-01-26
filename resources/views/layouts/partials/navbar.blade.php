<nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary mb-3">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="#">Laravel GIS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link @if($title == 'Index')active @endif text-white" href="/">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="text-white nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Menu
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item @if($title == 'Map')active @endif" href="/map">Map</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item @if($title == 'Location')active @endif" href="/map/location">Location</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item @if($title == 'Saved Location')active @endif" href="/map/saved">List Location</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
</nav>