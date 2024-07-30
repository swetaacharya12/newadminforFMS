<?= $this->include('layout/header') ?>
<h1>Users</h1>
<a href="/users/create" class="btn btn-primary">Add User</a>
<table class="table mt-4">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['username'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['role'] ?></td>
            <td>
                <a href="/users/edit/<?= $user['id'] ?>" class="btn btn-warning">Edit</a>
                <a href="/users/delete/<?= $user['id'] ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->include('layout/footer') ?>
