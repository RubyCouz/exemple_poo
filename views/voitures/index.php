<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <?php
            if (!empty($success)) {
                ?>
                <div class="row">
                    <div class="col-sm-6 offset-sm-3">
                        <div class="alert alert-success" role="alert">
                            <?= $success ?>
                        </div>
                    </div>
                </div>
                <?php
            } elseif (!empty($error)) {
                ?>
                <div class="row">
                    <div class="col-sm-6 offset-sm-3">
                        <div class="alert alert-danger" role="alert">
                            <?= $error ?>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 mt-5">
            <table class="table table-dark table-hover table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Modèle</th>
                    <th>Marque</th>
                    <th>Prix</th>
                    <th colspan="2">
                        <a href="/voitures/addCar" title="Ajout d'une voiture" class="btn btn-success btn-sm">Ajout</a>
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($voitures as $voiture) {
                    ?>
                    <tr>
                        <td><?= $voiture->id ?></td>
                        <td><?= $voiture->voit_model ?></td>
                        <td><?= $voiture->marque_nom ?></td>
                        <td><?= $voiture->voit_prix ?> €</td>
                        <td>
                            <a href="/voitures/updateCar/<?= $voiture->id ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-pen" viewBox="0 0 16 16">
                                    <path d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                </svg>
                            </a>
                        </td>
                        <td>
                            <a href="/voitures/delCar" data-bs-toggle="modal"
                               data-bs-target="#delModal<?= $voiture->id ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd"
                                          d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="delModal<?= $voiture->id ?>" tabindex="-1"
                         aria-labelledby="delModal<?= $voiture->id ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <p class="modal-title h5" id="delModal<?= $voiture->id ?>">Suppression du
                                        véhicule <?= $voiture->voit_model ?></p>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Etes-vous sûr de vouloir supprimer la voiture <?= $voiture->voit_model ?> ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer
                                    </button>
                                    <a href="/voitures/delCar/<?= $voiture->id ?>" type="button"
                                       class="btn btn-primary">Supprimer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
