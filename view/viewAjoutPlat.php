<?php ob_start(); ?>
<h2>Ajouter un plat</h2>
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nom du plat</label>
        <input type="text" class="form-control" name="nomP" required>
    </div>
    <div class="form-group">
        <label>Prix du plat (€)</label>
        <input type="number" class="form-control" name="prixP" min="0" step="0.01" required>
    </div>
    <div class="form-group">
        <label>Description du plat</label>
        <input type="text" class="form-control" name="descP" required>
    </div>
    <div class="form-group">
        <label>Image du plat</label>
        <input type="file" class="form-control" name="imgP" required>
    </div>
    <!-- Ajout du champ caché -->
    <input type="hidden" name="idR" value="<?php echo htmlspecialchars($_GET['idR']) ?>">
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>


<?php $content = ob_get_clean(); ?>
