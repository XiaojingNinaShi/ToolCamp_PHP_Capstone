<div class="d-flex justify-content-between">
        <div class="d-inline-flex" id="logo">
          <a class="text-white nav-link fs-1 fw-bold fst-italic lh-1" href="/">NINAsTEA</a>
        </div>

        <div class="d-inline-flex justify-content-between" id="user-icons">
          <ul class="nav">
            <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-search fs-4"></i></a></li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="bi bi-person-circle fs-4"></i></a>
              <div class="dropdown-menu">
                <?php if(!empty($_SESSION['priv_level'])) :?>
                <a class="dropdown-item" href="/?page=profile">Profile</a>
                <a class="dropdown-item" href="?signout=true">Sign Out</a>

                <?php else :?>
                <a class="dropdown-item" href="/?page=signin">Sign In</a>
                <a class="dropdown-item" href="/?page=register">Register</a>
                <?php endif ;?>
              </div>
            </li>

            <li class="nav-item"><a class="nav-link" href="/?page=shoppingbag"><i class="bi bi-bag-fill fs-4"></i></a></li>
          </ul>
        </div>
</div>
