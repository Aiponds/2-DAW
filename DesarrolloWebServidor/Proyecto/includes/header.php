<header class="row justify-content-around align-items-center g-2 mt-2">
    <div class="col">
        <h1>Tienda de videojuegos</h1>
    </div>
    <div class="col d-flex justify-content-end">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="formularioTema">
        <button type="submit" class="btn btn-primary" data-bs-toggle="button" aria-pressed="<?php echo $_COOKIE["tema"] == "dark"; ?>" autocomplete="off" name="cambiarTema" value="cambiarTema">
            <?php
            if ($_COOKIE["tema"] == "light") {
                echo "🌙";
            } else {
                echo "💡";
            }
            ?>
        </button>
        </form>
    </div>
</header>