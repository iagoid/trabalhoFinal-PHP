<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h2 class="card-title">Delete Profile</h2>
                        <h3>Deseja excluir o usuário <strong>
                                <?= $objUsuario->username ?></strong>?</h3>
                    </div>

                    <form method="post">
                        <div class="row mt-3">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-5">
                                <a href="usuarios.php">
                                    <button type="button" class="btn btn-lg btn-block btn-success">Voltar</button>
                                </a>
                            </div>
                            <div class="col-md-5">
                                <button type="submit" name="excluir" class="btn btn-lg btn-block btn-danger">Excluir</button>
                            </div>
                            <div class="col-md-1">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>