<?php
/**
 * @var $user \classes\User
 * @var $error string
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <?php if (!empty($error)) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
    <?php endif; ?>
    <h1 class="text-center">Users Data</h1>
    <?php if (!$user->tableExist()) : ?>
    <div class="table-not-exist">
        <div class="alert alert-info">
            <h2 class="text-center text-warning">Table "Users" doesn't exist!</h2>
            <div class="row">
                <div class="col-8">
                    <p>If you want to create this table please click the button below!</p>
                </div>
                <div class="col-4">
                    <form method="post">
                        <button type="submit" name="action" value="create table" class="btn btn-info">Add table</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php elseif ($user->getId()) : ?>
        <div class="card" style="width: 18rem;">
            <img src="https://picsum.photos/200" class="card-img-top" alt="<?= "{$user->name} {$user->surname}" ?>">
            <div class="card-body">
                <h5 class="card-title"><?= "{$user->name} {$user->surname}" ?></h5>
                <p class="card-text">
                    Age: <?= $user->age ?><br>
                    Email: <?= $user->email ?>
                </p>
                <a href="/" class="btn btn-primary">Go back</a>
            </div>
        </div>
    <?php else: ?>
    <div class="table-exist">
        <form method="post">
            <div class="alert alert-warning" role="alert">
                <p>
                    If you want to drop table please click on the button!
                    <button type="submit" name="action" value="drop table" class="btn btn-warning">Drop Table</button>
                </p>
            </div>
            <table class="table table-striped">
                <tr class="table-dark">
                    <th>#id</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Age</th>
                    <th>Email</th>
                    <th>Action</th>
                    <th>Remove</th>
                </tr>
                <tr class="table-info">
                    <td>#</td>
                    <td>
                        <input type="text" name="name" class="form-control" value="<?= $_POST['name'] ?? ''?>">
                    </td>
                    <td>
                        <input type="text" name="surname" class="form-control" value="<?= $_POST['surname'] ?? ''?>">
                    </td>
                    <td>
                        <input type="text" name="age" class="form-control" value="<?= $_POST['age'] ?? ''?>">
                    </td>
                    <td>
                        <input type="text" name="email" class="form-control" value="<?= $_POST['email'] ?? ''?>">
                    </td>
                    <td>
                        <button type="submit" name="action" value="add user" class="btn btn-success">Add</button>
                    </td>
                    <td></td>
                </tr>

                <?php
                /**
                 * @var $item \classes\User
                 */
                foreach ($user->getAll() as $item) : ?>
                    <tr>
                        <td><?= $item->getId(); ?></td>
                        <td><?= $item->name ?></td>
                        <td><?= $item->surname ?></td>
                        <td><?= $item->age ?></td>
                        <td><?= $item->email ?></td>
                        <td>
                            <a href="/?id=<?= $item->getId() ?>" class="btn btn-info">Info</a>
                        </td>
                        <td>
                            <input type="checkbox" name="delete[]" class="form-check-input" value="<?= $item->getId() ?>">
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="6"></td>
                    <td>
                        <button type="submit" name="action" value="remove users" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <?php endif; ?>
</div>
</body>
</html>
