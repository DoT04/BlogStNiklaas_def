<?php include('includes/header.php');
include('includes/header.php');
//dit kan je uit commentaar zetten maar dan moet je telkens opnieuw inloggen
/*if(!$session->is_signed_in()){
    redirect("login.php");
}*/


$comments = Comment::find_all();
?>
<?php  include ('includes/sidebar.php'); ?>
<?php  include ('includes/content-top.php'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2 class="page-header">
                COMMENTS
            </h2>
            <table class="table table-header">
                <thead>
                <tr>


                    <th>Id</th>
                    <th>Author</th>
                    <th>Body</th>
                    <th>Delete?</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($comments as $comment):
                    ?>
                    <tr>
                        <td><?php echo $comment->id; ?></td>
                        <td><?php echo $comment->author; ?></td>
                        <td><?php echo $comment->body; ?></td>
                        <td><a  href="delete_comment.php?id=<?php echo $comment->id; ?>"
                                class="btn btn-danger rounded-0"><i class="far fa-trash-alt"></i></a></td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include ('includes/footer.php'); ?>
