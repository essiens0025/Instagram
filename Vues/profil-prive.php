<?php
include("../CodePHP/script-profil-prive.php");
include("navbar.php");
?>

<div class="div-profil">
    <div class="row">
        <div style="text-align: center;" class="col mt-5">
            Avatar
        </div>
        <div class="col d-flex justify-content-center mt-5">
            <?php echo $user['pseudo']; ?>
        </div>
    </div>
    <div class="row">
        <div style="text-align: center;margin-top:240px" class="col">
            <?php echo $user['nom'] . ' ' . $user['prenom']; ?>
        </div>
        <div style="margin-top:140px" class="col">
            <button>Modifier votre profil</button><br><br>
            <form action="../CodePHP/script-ajout-photo.php?id_u=<?= $user['id_u'] ?>" method="post" enctype="multipart/form-data">

                <h3>Ajoutez une photo</h3><br>
                <input type="file" name="file" id="file"></input>
                <button>Valider</button>
            </form>
        </div>
    </div>


</div>


</body>

</html>