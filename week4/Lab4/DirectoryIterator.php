<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="../Lab4/css/css/bootstrap.css" />


    </head>
    <body> 
        
        <nav>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li >  <a href="upload-form.php">Upload File</a></li>
                    <li><a href="DirectoryIterator.php">View Files</a></li>
                    <a href=""></a>
                </ul></div></div>
        <div class="jumbotron" style="text-align: center"><h2>View Files</h2></div>
    </nav>
    <?php
    // http://php.net/manual/en/class.directoryiterator.php
    //DIRECTORY_SEPARATOR 
    $delete = "";
    $folder = './uploads';
    if (!is_dir($folder)) {
        die('Folder <strong>' . $folder . '</strong> does not exist');
    }
    $directory = new DirectoryIterator($folder);
    ?>

    <?php $i = 0; ?>
    <?php foreach ($directory as $fileInfo) : ?> 


        <?php if ($fileInfo->isFile()) : ?>

            <h3> File Number: <?php $i++;
        echo $i;
            ?></h3>

            <h2><?php echo $fileInfo->getFilename(); ?></h2>

            <a href="file-reader.php?name=<?php echo $fileInfo->getFilename(); ?>">Details</a>     
            <a href="?delete=./uploads/<?php echo $fileInfo->getFilename(); ?>">Delete</a>

        <?php endif; ?>
    <?php
    endforeach;
    error_reporting(E_ERROR);
    $delete = $_GET['delete'];
    unlink($delete);
    ?>



</body>
</html>