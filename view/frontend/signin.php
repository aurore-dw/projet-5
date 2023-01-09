<?php $title = 'Connexion'; ?>
<?php ob_start(); ?>

<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
        class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form id="login-form" class="form" action="index.php?action=connexion" method="POST">
          <!-- Pseudo input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3">Pseudo</label>
            <input type="text" name="username" id="form3Example3" class="form-control form-control-lg"/>
          </div>
          <!-- Password input -->
          <div class="form-outline mb-3">
            <label class="form-label" for="form3Example4">Mot de passe</label>
            <input type="password" name="password" id="form3Example4" class="form-control form-control-lg"/>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <input type="submit" class="btn btn-primary btn-lg" value="Se connecter" style="padding-left: 2.5rem; padding-right: 2.5rem;">
            <p class="small fw-bold mt-2 pt-1 mb-0">Vous n'avez pas de compte? <a href="index.php?action=displFormulContact"
              class="link-danger">S'enregistrer</a></p>
              <br>
            </div>

          </form>
        </div>
      </div>
    </div>
  </section>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?> 