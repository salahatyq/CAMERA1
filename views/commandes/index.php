<div class="container mt-5">
    <h1>Liste des Commandes</h1>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Quantité</th>
                <th>Prix</th>
                <th>Statut</th>
                <th>Date Création</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($commandes as $commande): ?>
            <tr>
                <td><?= $commande->id_commande; ?></td>
                <td><?= $commande->quantite; ?></td>
                <td><?= $commande->prix; ?></td>
                <td><?= $commande->statut; ?></td>
                <td><?= $commande->date_creation; ?></td>
                <td>
                    <a href="<?= URI . 'commandes/supprimer/' . $commande->id_commande; ?>" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>