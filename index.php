<?php
require "controllers/db_connection.php";
$color = '';
// GETTING THE TODO LISTS FROM THE DATABASE
if(!isset($_GET['search'])) {
    $query = "SELECT * FROM todos";
    $query_run = mysqli_query($conn, $query);
    if (!$query_run)
        die("Query error.");
} else {
    $search = $_GET['search'];
    $query = "SELECT * FROM todos WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
    if($search !== '')
        $color = 'red';
    else
        $color = '';
    $query_run = mysqli_query($conn, $query);
    if (!$query_run)
        die("Query error.");
}


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
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h2><i class="fa fa-list"></i> My TODOs</h2>
                        </div>

                        <div class="col-md-6">
                            <form action="index.php" method="GET">
                                <div class="input-group mt-10">
                                    <input type="text" class="form-control" value="<?php
                                    if(isset($_GET['search']))
                                        echo $_GET['search'];
                                    ?>" name="search" placeholder="Search">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit">
                                            <i class="glyphicon glyphicon-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center">TODO Title</th>
                            <th class="text-center">TODO Description</th>
                            <th class="text-center">Creation Date</th>
                            <th class="text-center"><i class="fa fa-cog"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($result = mysqli_fetch_assoc($query_run)) {
                            $checklist_btn = '';
                            if ($result['done'] == 0) {
                                $checklist_btn = "<a href='controllers/check.php?id=" . $result['id'] . "&done=1' class='btn btn-primary' title='Change todo to done'><i class='fa fa-check'></i></a>";
                            } else {
                                $checklist_btn = "<a href='controllers/check.php?id=" . $result['id'] . "&done=0' class='btn btn-warning' title='Change todo to undone'><i class='fa fa-times'></i></a>";
                            }

                            echo "
                                    <tr class='text-center' style='background-color: $color'>
                                        <td>" . $result['title'] . "</td>
                                        <td>" . $result['description'] . "</td>
                                        <td>" . date_create($result['created_at'])->format('d M Y') . "</td>
                                        <td>
                                            $checklist_btn
                                            <a href='edit.php?id=" . $result['id'] . "' class='btn btn-info' title='Edit todo'><i class='fa fa-edit'></i></a>
                                            <a href='controllers/delete.php?id=" . $result['id'] . "' class='btn btn-danger' title='Delete todo'><i class='fa fa-trash'></i></a>
                                        </td>
                                    </tr>
                                ";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "partials/_footer.php" ?>
</body>
</html>