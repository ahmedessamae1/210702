<?php
require "controllers/db_connection.php";

// GETTING CURRENT TODO
$todo_id = $_GET['id'];
$query = "SELECT * FROM todos WHERE id=$todo_id LIMIT 1";
$query_run = mysqli_query($conn, $query);
if (!$query_run)
    die("Query error.");

$result = mysqli_fetch_assoc($query_run);
$title = $result['title'];
$description = $result['description'];
$id = $result['id'];


?>

<!doctype html>
<html lang="en">
<head>
    <?php include "partials/_head.php" ?>
</head>
<body>
<?php include "partials/_navbar.php" ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2><i class="fa fa-edit"></i> Edit TODO</h2>
                </div>

                <div class="panel-body">
                    <form action="controllers/update.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id ?>">

                        <label for="title">Title:</label>
                        <input type="text" id="title" maxlength="255"
                               name="title" class="form-control"
                               value="<?php echo $title ?>"
                               placeholder="Enter your TODO list title" required>

                        <label for="description" class="mt-10">Description:</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control"
                                  placeholder="Enter your TODO list description" required><?php echo $description ?></textarea>

                        <button type="submit" class="btn btn-success btn-block mt-10"><i class="fa fa-edit"></i> Edit TODO</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "partials/_footer.php" ?>
<script>
    $('#title').keydown(function() {
        let val = $(this).val();
        if(val.length >= "255") {
            alert("Too much characters for a title");
        }
    });
</script>
</body>
</html>