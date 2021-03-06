<?php

    include_once "../../system/session.php";

    if(!checkSession('admin')) {
        header("Location: ../../index.php");
    }

    
    $currentPage = 'subcategory';
    include_once "../template/header.php";
      
      if(isset($_POST['submit'])) {
          
          $name = $_POST['name'];
          $photo = $_FILES['photo'];
          $category = $_POST['category'];
        //   var_dump($category);

        if(empty($name)) {
            echo "Please fil subcategoy name!";
        }

        if(empty($photo['tmp_name'])) {
            echo "Please choose photo!";
        }


        $imageLink = mt_rand(time(), time()) + mt_rand(time(), time()) . "_" . $photo['name'];
        move_uploaded_file($photo['tmp_name'], "../uploads/". $imageLink);

    
        $sql = "INSERT INTO subcategories(name, photo, category_id) VALUES (?, ?, ?)";
        $res = myQuery($sql, [$name, $imageLink, $category]);
         
     }

    $cat = "SELECT * FROM categories";
    $category = getItems($cat);
?>

                <!--content Area Start-->
            <div class="row">
                  <div class="col-12">
                      <nav aria-label="breadcrumb">
                          <ol class="breadcrumb bg-white mb-4">
                              <li class="breadcrumb-item"><a href="dashboard.php" class="text-success">Home</a></li>
                              <li class="breadcrumb-item"><a href="subcategory_list.php" class="text-success">Subcategory</a></li>
                              <li class="breadcrumb-item text-success active" aria-current="page">Add Subcategory</li>
                          </ol>
                      </nav>
                  </div>
              </div>

              <?php if(isset($res)) { ?>

              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Message: </strong>Subcategory Added Successfully! <a href="subcategory_list.php"><u>Back to List</u></a>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>

            <?php } ?>

              <div class="row">
                  <div class="col-12">
                      <div class="card mb-4">
                          <div class="card-body">
                              <div class="d-flex justify-content-between align-items-center">
                                  <h4 class="mb-0">
                                    Add Subcategory
                                  </h4>
                                  <a href="subcategory_list.php" class="btn btn-outline-success">
                                      <i class="feather-list"></i>
                                  </a>
                              </div>
                              <hr>
                              <form action="<?php $_PHP_SELF ?>" method="post" enctype="multipart/form-data">
                                  <div class="row">
                                      <div class="col-12 col-md-6">
                                          <div class="form-group">
                                              <label for="photo">
                                                  Photo Upload
                                              </label>
                                              <i class="feather-info" data-container="body" data-toggle="popover" data-placement="top" data-content="Only Support jpg & png Format"></i>
  
                                              <input type="file" name="photo" id="photo" class="form-control p-1" required>
                                          </div>
                                          <div class="form-group">
                                              <label for="name">Subcategory Name</label>
                                              <input type="text" id="name" name="name" class="form-control" required>
                                          </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                          <div class="form-group">
                                                <label for="category">Category</label>
                                                <select name="category" class="form-control custom-select" id="category" required>
                                                <option value="" disabled selected>Select Category</option>
                                                <?php 
                                                    foreach($category as $cate){
                                                        echo "<option value='$cate->id'>$cate->name</option>";
                                                    }
                                                ?>
                                                </select>
                                          </div>
                                          <div class="my-5">
                                                <button class="btn btn-success" name="submit" type="submit"><i class="feather-save"></i>&nbsp; Save</button>
                                          </div>
                                    </div>
                              </div>
                              <hr>
                        </form>
                  </div>
            </div>
                  </div>
              </div>
              <!--content Area Start-->

            </div>
        </div>
<?php
    include_once "../template/footer.php";
?>
