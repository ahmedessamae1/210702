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
                    <h2><i class="fa fa-plus"></i> Add New TODO</h2>
                </div>

                <div class="panel-body">
                    <form action="controllers/store.php" method="POST">
                        <label for="title">Title:</label>
                        <input type="text" id="title" maxlength="255" name="title" class="form-control" placeholder="Enter your TODO list title" required>

                        <label for="description" class="mt-10">Description:</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control"
                                  placeholder="Enter your TODO list description" required></textarea>

                        <button type="submit" class="btn btn-success btn-block mt-10"><i class="fa fa-plus"></i> Add List</button>
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