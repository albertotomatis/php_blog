<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./css/style.css">
  <!-- Tabler -->
  <link href="./dist/css/tabler.min.css" rel="stylesheet"/>
</head>

<body>
<div class="navbar navbar-expand-md navbar-light d-print-none sticky-top" style="box-shadow: none;">
    <div class="container-xl">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
        <a href="./">
          Code Lab
        </a>
      </h1>
      <div class="navbar-nav flex-row order-md-last">
        <div class="nav-item dropdown d-none d-md-flex me-3">
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-card">
            <div class="card">
            </div>
          </div>
        </div>
        <div class="nav-item dropdown">
                <span class="nav-link-title">
                <?php if ($loggedIn) : ?>
              <a class="nav-link" href="index.php?route=logout">
                <span class="nav-link-title">
                Logout
                </span>
              </a>
          <?php else : ?>
              <a class="nav-link"href="index.php?route=login">
                <span class="nav-link-title">
                Login
                </span>
              </a>
          <?php endif; ?>
                </span>
              </a>
          </a>
        </div>
      </div>
      <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
          <ul class="navbar-nav">
            <?php if ($loggedIn) : ?>
            <li class="nav-item">
            <a class="nav-link" href="index.php?route=post/dashboard">
                <span class="nav-link-title">
                Dashboard
                </span>
              </a>
            </li>
            <?php endif; ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?route=post/list" >
                <span class="nav-link-title">
                  Blog
                </span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
          </div>


  <script src="./js/script.js"></script>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>