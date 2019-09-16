<?php
    session_start();
    require_once('./Models/Todo.php');
    if (!isset($_SESSION['user'])) {
        header('Location: ./signup.html');
    }
    $user = $_SESSION['user'];
    $lastUserId = $_SESSION['user']['id'];
    function h($s)
{
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

    $todo = new Todo();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TODO APP</title>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./assets/js/app.js" defer></script>
</head>
<body>
    <header class="px-5 bg-primary">
        <nav class="navbar navbar-dark">
            <a href="index.php" class="navbar-brand">TODO APP</a>
            <div class="justify-content-end">
                <span class="text-light">
                    <?php echo h($user['username'] . 'さん');?>
                </span>
                <a class="btn btn-success" href="./logout.php">ログアウト</a>
            </div>
        </nav>
    </header>
    <main class="container py-5">

        <section>
            <form class="form-row" action="create.php" method="POST">
                <div class="col-12 col-md-9 py-2">
                    <input type="text" class="create-task form-control" placeholder="ADD TODO" name="task">
                </div>
                <div class="py-2 col-md-3 col-12">
                    <button type="submit" class="create-btn col-12 btn btn-primary btn-block">ADD</button>
                </div>
            </form>
        </section>

        <section class="mt-5">
            <table class="table table-hover">
                <thead>
                    <tr class="bg-primary text-light">
                        <th class=>TODO</th>
                        <th>DUE DATE</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach($todo->getAll($lastUserId) as $content) : 
                    ?>
                    <tr data-tr="<?php echo($content['id']); ?>">
                        <td><?php echo h($content['name']) ?></td>
                        <td><?php echo h(substr($content['due_date'], 0, 10)) ?></td>
                        <td>
                            <a class="text-success" href="./edit.php?id=<?php echo($content['id']); ?>" data-toggle="modal" data-target="#modal<?php echo($content['id']); ?>">EDIT</a>
                            <form action="./update.php" method="post">
                                <div class="modal fade" id="modal<?php echo($content['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="label1">edit</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                <?php echo h($content['name']) ?>
                                                <?php echo h(substr($content['due_date'], 0, 10)) ?><hr>
                                            </div>
                                            <div>
                                                <input type="text" name="task" placeholder="UPDATE TODO">
                                                <input type="hidden" name="id" value="<?php echo($content['id']); ?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </td>
                        <td>
                            <a class="delete-btn text-danger" href="delete.php?id=<?php echo($content['id']); ?>" data-id="<?php echo($content['id']); ?>">DELETE</a>
                        </td>
                    </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>