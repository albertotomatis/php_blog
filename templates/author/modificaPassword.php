<?php
if (!empty($errors)) :
?>
    <div class="errors">
        <h4>Ci sono i seguenti errori:
        </h4>
        <ul>
            <?php
            foreach ($errors as $error) :
            ?>
                <li><?= $error ?></li>
            <?php
            endforeach; ?>
        </ul>
    </div>
<?php
endif;
?>

<div class="page-body" style="margin-bottom: 25px;">
     <div class="container-tight py-4">
      <!-- Torna alla dashboard -->
      <h2 style="margin-bottom: 20px;"><a href="index.php?route=post/dashboard" class="btn btn-blue w-30">
                <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <polyline points="15 6 9 12 15 18" />
                </svg> Torna alla dashboard</a></h2>
                <!-- modifica password -->
<form class="card card-md" action="" method="post" >
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Modifica password</h2>
            <div class="mb-3">
              <label class="form-label">
                Password attuale
              </label>
              <div class="input-group input-group-flat">
                <input type="password" class="form-control password" placeholder="Password" name="password" required>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">
                Nuova password
              </label>
              <div class="input-group input-group-flat">
                <input type="password" class="form-control password" placeholder="Password" name="newPassword" id="pwd" required>
                <span class="input-group-text">
                  <a href="#" class="link-secondary" onclick="showPwd()">
                    <!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon " width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="2"></circle><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path></svg>
                  </a>
                </span>
              </div>
            </div>
  
            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-30" name="submit">Modifica</button>
            </div>
          </div>
        </form>
        <br>
        <h4>Al termine verrai disconesso.</h4>
</div></div>
