<?= $this->include('layout/header') ?>
<h1>Folders</h1>
<a href="/folders/create" class="btn btn-primary">Add Folder</a>
<table class="table mt-4">
    <thead>
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($folders as $folder): ?>
        <tr>
            <td><?= $folder['id'] ?></td>
            <td><?= $folder['user_id'] ?></td>
            <td><?= $folder['name'] ?></td>
            <td>
                <a href="/folders/edit/<?= $folder['id'] ?>" class="btn btn-warning">Edit</a>
                <a href="/folders/delete/<?= $folder['id'] ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->include('layout/footer') ?>
