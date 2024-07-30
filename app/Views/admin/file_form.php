<?= $this->include('layout/header') ?>
<h1><?= isset($file) ? 'Edit File' : 'Add File' ?></h1>
<form action="<?= isset($file) ? '/files/update/'.$file['id'] : '/files/store' ?>" method="post">
    <div class="form-group">
        <label for="folder_id">Folder ID</label>
        <input type="text" class="form-control" name="folder_id" value="<?= isset($file) ? $file['folder_id'] : '' ?>">
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" value="<?= isset($file) ? $file['name'] : '' ?>">
    </div>
    <div class="form-group">
        <label for="path">Path</label>
        <input type="text" class="form-control" name="path" value="<?= isset($file) ? $file['path'] : '' ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?= $this->include('layout/footer') ?>
