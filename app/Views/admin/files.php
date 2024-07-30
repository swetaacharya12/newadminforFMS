<?= $this->include('layout/header') ?>
<h1>Files</h1>
<a href="/files/create" class="btn btn-primary">Add File</a>
<table class="table mt-4">
    <thead>
        <tr>
            <th>ID</th>
            <th>Folder ID</th>
            <th>Name</th>
            <th>Path</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($files as $file): ?>
        <tr>
            <td><?= $file['id'] ?></td>
            <td><?= $file['folder_id'] ?></td>
            <td><?= $file['name'] ?></td>
            <td><?= $file['path'] ?></td>
            <td>
                <a href="/files/edit/<?= $file['id'] ?>" class="btn btn-warning">Edit</a>
                <a href="/files/delete/<?= $file['id'] ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->include('layout/footer') ?>
