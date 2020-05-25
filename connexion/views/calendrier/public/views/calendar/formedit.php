<div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Titre</label>
                    <input id="name" type="text" required class="form-control" readonly="readonly" name="name" value="<?= isset($data['name']) ? h($data['name']) : ''; ?>">
                    <?php if(isset($errors['name'])): ?>
                        <p class="help-block"><?= $errors['name']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="date">Date</label>
                    <input id="date" type="date" required class="form-control" name="date" value="<?= isset($data['date']) ? h($data['date']) : ''; ?>">
                    <?php if(isset($errors['date'])): ?>
                        <p class="help-block"><?= $errors['date']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="start">Démarrage</label>
                    <input id="start" type="time" required class="form-control" name="start" placeholder="HH:MMM" value="<?= isset($data['start']) ? h($data['start']) : ''; ?>"">
                    <?php if(isset($errors['start'])): ?>
                        <small class="form-text text-muted"><?= $errors['start']; ?></small>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" readonly="readonly" class="form-control"><?= isset($data['description']) ? h($data['description']) : ''; ?></textarea>
            </div>