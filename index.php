<?php
    require_once('./Models/Todo.php');
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./assets/js/app.js" defer></script>
</head>
<body>
    <header class="px-5 bg-primary">
        <nav class="navbar navbar-dark">
            <a href="index.php" class="navbar-brand">TODO APP</a>
            <div class="justify-content-end">
                <span class="text-light">
                    SeedKun
                </span>
            </div>
        </nav>
    </header>
    <main class="container py-5">

        <section>
            <form class="form-row" action="create.php" method="POST">
                <div class="col-12 col-md-9 py-2">
                    <input type="text" class="form-control" placeholder="ADD TODO" name="task">
                </div>
                <div class="py-2 col-md-3 col-12">
                    <button type="submit" class="col-12 btn btn-primary btn-block">ADD</button>
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
                    foreach($todo->getAll() as $content) : 
                    ?>
                    <tr>
                        <td><?php echo h($content['name']) ?></td>
                        <td><?php echo h(substr($content['due_date'], 0, 10)) ?></td>
                        <td>
                            <a class="text-success" href="edit.php?id=<?php echo($content['id']); ?>">EDIT</a>
                        </td>
                        <td>
                            <a id="<?php echo($content['id']); ?>" class="delete_btn text-danger" value="" href="">DELETE</a>
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