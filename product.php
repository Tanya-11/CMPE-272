<?php 

session_start();
include('components/head.inc.php');
include ('components/navbar.php');
include ('cookies.php');
include 'connection.php';
 ?>


<?php
 if (isset($_GET['id'])) {
     $id= $_GET['id'];
     $query = "select * from product where id='$id'";
        $result = $con->query($query);
        if($result){
            if ($result && mysqli_num_rows($result) > 0) {
                $row = $result->fetch_assoc();
                    $field1name = $row["id"];
                    $field2name = $row["name"];
                    $field3name = $row["image"];
                    addLastVisited($field1name); 

                    // $field4name = $row["home_phone"];
                    // $field5name = $row["cell_phone"];
                    // $field6name = $row["email"];

    
            }
            else{
                echo "No Results found!";
            }


        }
  }

?>

<html>

<body>
    <div>
        <div class="desc">
            <h4 class="name"> <?php if(isset( $field1name))
            echo   $field2name;
            ?></h4>
        </div>
        <div class="product-image">
            <img src="
            <?php if(isset( $field3name))
            echo   "./assets/".$field3name.".jpg";
            ?>" />
        </div>
        <!-- <br />
        <div>
            <form method="post">
                <div style="width: 22rem;">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="rating" class="col-sm-4">Rating</label>
                            <div class="col-sm-6">
                                <input id="text" type="number" name="rating" min="1" max="5">
                            </div>
                        </div><br><br>
                        <div class="form-group row">
                            <label for="review" class="col-sm-4">Review</label>
                            <div class="col-sm-6">
                                <input id="text" type="text" name="review"><br><br>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Submit</button><br><br>
                        </div>
                    </div>
                </div>
            </form>

        </div> -->


    </div>
</body>

</html>