<!DOCTYPE html>
<html lang="es">
<?php require_once "Vista/header.php"; ?>
        <div class="bodyContact">
            <form class="formContact" action="?c=Sesion&a=ApiContacto" method="POST">
                <div class="formCon">
                    <h1 class="h1Contact">Contactanos</h1>
                    <div class="grupo">
                        <input class="inputCon" type="text" name="nombre" id="" required><span class="barra"></span>
                        <label class="labelCon">Nombre</label>
                    </div>
                    <div class="grupo">
                        <input class="inputCon" type="email" name="correo" id="" required><span class="barra"></span>
                        <label class="labelCon">Email</label>
                    </div>
                    <div class="grupo">
                        <input class="inputCon" type="text" name="asunto" id="" required><span class="barra"></span>
                        <label class="labelCon">Asunto</label>
                    </div>
                    <div class="grupo">
                        <textarea class="txtAreaCon"name="mensaje" id="" rows="3" required></textarea><span class="barra"></span>
                        <label class="labelCon">Mensaje</label>
                    </div>
                    <button class="buttonCon" type="submit">Enviar</button>
                </div>
            </form>
        </div>
    <div class="footer-head">
        <?php require_once "Vista/footer.php"; ?>
    </div>
</body>
</html>
