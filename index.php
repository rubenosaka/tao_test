<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('src/config.php'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title .' | '. $author; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="Assets/css/styles.css" >

</head>
<body>

    <!-- Header -->
    <?php include_once($partials.'header.php'); ?>
    
    
    <div class="container">

        <!-- Filters or actions -->
        <?php include_once($partials.'/filters.php'); ?>

        <div class="row mt-5">
            <div class="col-sm-12">
                <div id="tao-users-cards">
                    <!-- We load the default data, in this case, USERS -->
                    <?php userList($users = dataFromCsv(), -1); ?>
                </div>                
            </div>            
        </div>       
    </div>
   
    <script src="Assets/js/scripts.js"></script>

</body>
</html>