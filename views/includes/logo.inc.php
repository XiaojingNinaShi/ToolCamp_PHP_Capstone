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
                <?php 
                if(isset($_SESSION['priv_level']) && $_SESSION['priv_level'] == 0):
                echo '<a class="dropdown-item" href="/?page=profile">Profile</a>';
                echo '<a class="dropdown-item" href="?signout=true">Sign Out</a>';

                elseif(isset($_SESSION['priv_level']) && $_SESSION['priv_level'] == 1):
                echo '<a class="dropdown-item" href="/?page=admin_view_products">Admin</a>';
                echo '<a class="dropdown-item" href="?signout=true">Sign Out</a>';

                else:
                echo '<a class="dropdown-item" href="/?page=signin">Sign In</a>';
                echo '<a class="dropdown-item" href="/?page=register">Register</a>';

                endif;
                ?>
              </div>
            </li>

            <li class="nav-item"><a class="nav-link" href="/?page=shoppingbag"><i class="bi bi-bag-fill fs-4"></i></a></li>
          </ul>
        </div>
</div>

