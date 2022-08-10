<?php include "header.php";
include "model/dataBase.php";

$posts=$db->query("SELECT * FROM posts");

$userId=$_SESSION["userID"];
$user=$db->query("SELECT * FROM users WHERE id=$userId")->fetch_assoc();


?>



    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </form>
            <?php if(isset($_SESSION["userID"])):?>
                <ul class="navbar-nav" style="margin-right: 90px">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php

                            echo $user["user_name"];
                            ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="logOut">Log Out</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>
            <?php endif;?>

        </div>
    </nav>



<div class="container ">
    <div class="row mt-3 d-flex justify-content-center">
    <div class="col-lg-9 col-md-10 col-sm-10 ">
    <div class="card border-0 shadow ">
        <div class="card-header bg-light">
            Make a new post...
        </div>
        <div class="card-body">

            <form method="post" action="new_post" id="newPostForm" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">caption</label>
                    <textarea class="form-control" name="caption" id="exampleFormControlTextarea1" rows="2" placeholder="Enter your caption" required></textarea>
                </div>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01"
                               aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                    <input type="hidden" value="<?php echo $user["id"]; ?>" name="user_id">
                </div>

            </form>

        </div>
        <div class="card-footer bg-light ">
<button class="btn btn-info" type="submit" form="newPostForm">Publish your new post </button>
        </div>
    </div>

    </div>
    </div>

<?php foreach ($posts as $post):
    $post_user_id=$post["user_id"];
    $user=$db->query("SELECT * FROM users WHERE id=$post_user_id")->fetch_assoc();
    ?>
<div class="row mt-3 d-flex justify-content-center">
    <div class="col-lg-9 col-md-10 col-sm-10 ">

        <div class="card ">
            <div class="card-header">
               <div class="row">
                   <div class="col-lg-2 col-md-2 col-sm-2 d-flex justify-content-center">
                       <a href="#" class="aTagPost">
<img src="<?php echo $user["image"];?>" class="img-fluid rounded-circle">
                       </a>
                   </div>

                   <div class="col-lg-10 col-md-10 col-sm-10 d-flex ">
                       <a href="#" class="aTagPost">
                       <b>
                           <h4><?php

                               echo $user["name"];?></h4>
                           <small><p><?php echo  date('H:i',strtotime($post["time"])); ?></p></small>
                       </b>
                       </a>

                   </div>

               </div>
            </div>
            <div class="card-body">

                <p><?php echo $post["caption"];?></p>

                <img src="<?php echo $post["media"];?>" class="img-fluid ">
            </div>
            <div class="card-footer text-muted">
               <button class="btn btn-info">
                   <i class="material-icons "><mat-icon>thumb_up_alt</mat-icon></i>
                   <span class="badge text-bg-secondary">4</span>
               </button>
            </div>
        </div>



    </div>
</div>

<?php endforeach;?>







</div>


<?php include "footer.php"; ?>