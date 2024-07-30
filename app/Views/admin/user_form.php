<?= $this->include('layout/header') ?>
<h1><?= isset($user) ? 'Edit User' : 'Add User' ?></h1>
<form action="<?= isset($user) ? '/users/update/'.$user['id'] : '/users/store' ?>" method="post">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" value="<?= isset($user) ? $user['username'] : '' ?>">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" value="<?= isset($user) ? $user['email'] : '' ?>">
    </div>
    <div class="form-group">
        <label for="role">Role</label>
        <select class="form-control" name="role">
            <option value="admin" <?= isset($user) && $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
            <option value="user" <?= isset($user) && $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
        </select>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?= $this->include('layout/footer') ?>
