<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Challenge Being - Excel file converter</title>

    <!-- GLOBAL CSS -->
    <link href="/css/style.min.css" rel="stylesheet">
    <!-- CORE CSS -->
    <link href="/css/core.min.css" rel="stylesheet">
</head>

<body>

<?php include($GLOBALS['path_components'] . "header.php"); ?>

<!-- Begin page content -->
<div class="container">
    <div class="mt-3">
        <h1>Excel file converter</h1>
    </div>
    <div class="row-fluid">
        <hr>
        <form id="converterForm" class="converter-form" enctype="multipart/form-data">
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong class="success-msg"></strong>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="file">Excel file:</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">Converter</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include($GLOBALS['path_components'] . "footer.php"); ?>
<?php include($GLOBALS['path_components'] . "scripts.php"); ?>

</body>
</html>

