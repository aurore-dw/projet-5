<?php $title = 'Formulaire inscription'; ?>
<?php ob_start(); ?>

<div class="container register-form" style="margin-top:120px">

    <div class="form">
        <div class="note">
            <p>Créer un compte</p>
        </div>

        <form action="index.php?action=addMember" id="myForm" method="POST">
            <div class="form-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="Pseudo *" value=""/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name ="password" placeholder="Mot de passe *" value=""/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="mail" placeholder="Email *" value=""/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name ="confirmpassword" placeholder="Confirmer mot de passe *" value=""/>
                        </div>
                    </div>
                </div>
                <input type="submit" class="btnSubmit" value="S'inscrire">
            </div>
        </form>

    </div>

</div>
  
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>