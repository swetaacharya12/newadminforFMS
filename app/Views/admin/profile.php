<?= $this->include('layout/header') ?>
<h1>Profile</h1>
<table class="table">
    <tr>
        <th>ID</th>
        <td><?= $user['id'] ?></td>
    </tr>
    <tr>
        <th>Username</th>
        <td><?= $user['username'] ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?= $user['email'] ?></td>
    </tr>
    <tr>
        <th>Role</th>
        <td><?= $user['role'] ?></td>
    </tr>
</table>
<a href="/users/edit/<?= $user['id'] ?>" class="btn btn-warning">Edit Profile</a>
<?= $this->include('layout/footer') ?>
