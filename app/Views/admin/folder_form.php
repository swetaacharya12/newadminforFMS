<?= $this->include('layout/header') ?>
<h1><?= isset($folder) ? 'Edit Folder' : 'Add Folder' ?></h1>

<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<form action="<?= base_url(isset($folder) ? '/folders/update/'.$folder['id'] : '/folders/store') ?>" method="post">
    <div class="form-group">
        <label for="user_id">User ID</label>
        <input type="text" class="form-control" name="user_id" value="<?= isset($folder) ? $folder['user_id'] : old('user_id') ?>">
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" value="<?= isset($folder) ? $folder['name'] : old('name') ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?= $this->include('layout/footer') ?>
