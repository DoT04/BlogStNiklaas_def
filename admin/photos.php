<?php
include('includes/header.php');
//dit kan je uit commentaar zetten maar dan moet je telkens opnieuw inloggen
/*if(!$session->is_signed_in()){
    redirect("login.php");
}*/


$photos = Photo::find_all();
?>

<?php include('includes/sidebar.php'); ?>
<?php include('includes/content-top.php'); ?>


<!--//html van alle foto's-->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2 class="page-header">
                PHOTOS
            </h2>
            <table class="table table-header">
                <thead>
                <tr>
                    <th>Photo</th>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Caption</th>
                    <th>File Name</th>
                    <th>Alternate Text</th>
                    <th>Size</th>
                    <th>Comments</th>
                    <th>View?</th>
                    <th>Edit?</th>
                    <th>Delete?</th>

                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($photos as $photo):
                    ?>
                    <tr>
                        <td><img src="<?php echo $photo->picture_path(); ?>" height="62" width="62" alt=""></td>

                        <td class="d-flex align-self-stretch"><?php echo $photo->id; ?></td>
                        <td><?php echo $photo->title; ?></td>
                        <td><?php echo $photo->caption; ?></td>
                        <td><?php echo $photo->filename; ?></td>
                        <td><?php echo $photo->alternate_text; ?></td>
                        <td><?php echo $photo->size; ?></td>
                        <td>
                            <a href="" comments_photo.php?id="<?php echo $photo->id; ?>">
                                <?php
                                $comments = Comment::find_the_comment($photo->id);
                                echo count($comments);
                                ?>
                            </a>
                        </td>
                        <td><a href="edit_photo.php?id=<?php echo $photo->id; ?>"
                               class="btn btn-danger rounded-0"><i class="far fa-edit"></i></a></td>
                        <td><a href="delete_photo.php?id=<?php echo $photo->id; ?>"
                               class="btn btn-danger rounded-0"><i class="far fa-trash-alt"></i></a></td>
                        <td><a href="../photo.php?id=<?php echo $photo->id; ?>"
                               class="btn btn-danger rounded-0"><i class="far fa-eye"></i></a></td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>
