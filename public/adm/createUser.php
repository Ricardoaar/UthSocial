<main>

    <div class="container my-5">
        <div class="row">
            <div class="col text-center">
                <h2>Agregar Usuario</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <form method="POST" action="/bin/admin/admin_methods.php?option=2?>">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password"
                        >
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name"
                        >
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                        >
                    </div>
                    <div class="mb-3">
                        <label for="alias" class="form-label">Alias</label>
                        <input type="text" class="form-control" id="alias" name="alias">
                    </div>
                    <div class=" mb-3">
                        <label>
                            <select class="form-control" name="id_user_type" required>
                                <option selected>Tipo de usuario</option>
                                <option value="1">
                                    Administrador
                                </option>
                                <option value="2">
                                    Analista
                                </option>
                                <option value="3">
                                    Usuario
                                </option>
                            </select>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Editar</button>
                    <a type="submit" class="btn btn-danger" href="/public/adm/">Volver</a>
                </form>
            </div>
        </div>
    </div>

</main>
<?php
require("../../partials/footer.php");