 <?php 

  include_once "template/header.php";
  include_once "admin/system/function.php";
  include_once "system/function.php";


    $sql = "SELECT * FROM items";
    $items = itemsAll($sql);

    //for discount item
    $sql="SELECT * FROM items where discount != '' order by rand() LIMIT 8";
    $discountitems = itemsAll($sql);

    $sql = "SELECT * FROM subcategories";
    $subcategories = getItems($sql);
    // var_dump($subcategories);

    $sql = "SELECT * FROM brand";
    $brands = getItems($sql);
    
    
 ?>
 
 



  <!-- slider -->
  <div class="slider mb-5">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="assets/frontend/img/slider/slider1.png" class="d-block w-100" alt="slider image">
        </div>
        <div class="carousel-item">
          <img src="assets/frontend/img/slider/slider2.png" class="d-block w-100" alt="slider image">
        </div>
        <div class="carousel-item">
          <img src="assets/frontend/img/slider/slider-img.png" class="d-block w-100" alt="slider image">
        </div>
        <div class="carousel-item">
          <img src="assets/frontend/img/slider/slider4.jpg" class="d-block w-100" alt="slider image">
        </div>
        <div class="carousel-item">
          <img src="assets/frontend/img/slider/slider5.png" class="d-block w-100" alt="slider image">
        </div>
        <div class="carousel-item">
          <img src="assets/frontend/img/slider/slider6.jpg" class="d-block w-100" alt="slider image">
        </div>
        <div class="carousel-item">
          <img src="assets/frontend/img/slider/slider7.png" class="d-block w-100" alt="slider image">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <!-- Product -->
  <div class="product pt-5 pb-3 mb-3">
    <div class="container-sm">
      <div class="row mb-3">
        <h3 class="title text-center">Deals Of The Day</h3>
        <!-- <div class="line"></div> -->
      </div>
      <div class="row mb-3 card-slide" id="">
        <?php foreach($items as $item){
          
          $ai_id=$item['id'];
          $ai_name=$item['name'];
          $ai_photo=$item['photo'];
          $ai_price=$item['price'];
          $ai_discount=$item['discount'];
          $ai_description=$item['description'];

          ?>
          
          <div class="col-md-4 col-lg-2 my-3">
            <div class="card">
                <div class="buy">
                  <button type="button" title="Add to wishlist">
                  <i class="far fa-heart"></i>
                  </button>
                </div>
                <img src="admin/uploads/<?= $ai_photo ?>" class="card-img p-3" height=160 alt="...">
                <div class="card-body" style="height: 170px;">
                  <h5 class="card-title"><?= $ai_name ?></h5>
                  <p class="card-text"><?= substr($ai_description,0,50) ?>&nbsp;<a href="#">more...</a></p>
                  <div class="price">
                  <?php if($ai_discount) {?>
                    <span class="current_price"><?= $ai_discount ?> &nbsp;MMK</span><br>
                    <span class="old_price"><del><?= $ai_price ?> &nbsp;MMK</del></span>
                  <?php }else{?>
                    <span class="current_price"><?= $ai_price ?> &nbsp;MMK</span><br>
                  <?php } ?>
                  </div>
                </div>
                <div class="order_btn">
                  <a href="product_details.php?id=<?= $ai_id?>" type="button" class="btn btn-danger btn-sm cart_btn"><i class="fa fa-cart-arrow-down"></i></a>
                  <!-- <button type="button" data-id=" + data[i].id " data-title=" + data[i].productName " data-content=" + data[i].productDec " data-price=" + data[i].currentPrice " data-img="./assets/frontend/img/product/ + data[i].productImg "  class="btn btn-primary btn-sm btn-danger cart_btn click-cart" title="Add to cart" data-bs-toggle="modal" data-bs-target="#cartModal">
                  <i class="fa fa-cart-arrow-down"></i>
                  </button> -->
                  <button type="button" data-id=" + data[i].id " data-title=" + data[i].productName " data-content=" + data[i].productDec " data-price=" + data[i].currentPrice " data-img="./assets/frontend/img/product/ + data[i].productImg "  class="btn btn-primary btn-sm cart_btn" title="Order product">
                  <i class="fab fa-shopify">&nbsp;Order</i>
                  </button>
                </div>
            </div>
          </div>
        <?php } ?>
      </div>
    
      <!-- Pagination -->
      <div class="loading">
        <a href="products.php"><span>See More</span>
        </a>
      </div>
    
    </div>
  </div>

  <!-- Discount Product -->
  <div class="product pt-5 pb-3 mb-3">
    <div class="container-sm">
      <div class="row mb-3">
        <h3 class="title text-center">Discount Product</h3>
        <!-- <div class="line"></div> -->
      </div>
      <div class="row mb-3 card-slide" id="">
        <?php foreach($discountitems as $item){
          
          $ai_id=$item['id'];
          $ai_name=$item['name'];
          $ai_photo=$item['photo'];
          $ai_price=$item['price'];
          $ai_discount=$item['discount'];
          $ai_description=$item['description'];

          ?>
          
          <div class="col-md-4 col-lg-2 my-3">
            <div class="card">
                <div class="buy">
                  <button type="button" title="Add to wishlist">
                  <i class="far fa-heart"></i>
                  </button>
                </div>
                <img src="admin/uploads/<?= $ai_photo ?>" class="card-img p-3" height=160 alt="...">
                <div class="card-body" style="height: 170px;">
                  <h5 class="card-title"><?= $ai_name ?></h5>
                  <p class="card-text"><?= substr($ai_description,0,50) ?>&nbsp;<a href="#">more...</a></p>
                  <div class="price">
                  <?php if($ai_discount) {?>
                    <span class="current_price"><?= $ai_discount ?> &nbsp;MMK</span><br>
                    <span class="old_price"><del><?= $ai_price ?> &nbsp;MMK</del></span>
                  <?php }else{?>
                    <span class="current_price"><?= $ai_price ?> &nbsp;MMK</span><br>
                  <?php } ?>
                  </div>
                </div>
                <div class="order_btn">
                  <a href="product_details.php?id=<?= $ai_id?>" type="button" class="btn btn-danger btn-sm cart_btn"><i class="fa fa-cart-arrow-down"></i></a>
                  <!-- <button type="button" data-id=" + data[i].id " data-title=" + data[i].productName " data-content=" + data[i].productDec " data-price=" + data[i].currentPrice " data-img="./assets/frontend/img/product/ + data[i].productImg "  class="btn btn-primary btn-sm btn-danger cart_btn click-cart" title="Add to cart" data-bs-toggle="modal" data-bs-target="#cartModal">
                  <i class="fa fa-cart-arrow-down"></i>
                  </button> -->
                  <button type="button" data-id=" + data[i].id " data-title=" + data[i].productName " data-content=" + data[i].productDec " data-price=" + data[i].currentPrice " data-img="./assets/frontend/img/product/ + data[i].productImg "  class="btn btn-primary btn-sm cart_btn" title="Order product">
                  <i class="fab fa-shopify">&nbsp;Order</i>
                  </button>
                </div>
            </div>
          </div>
        <?php } ?>
      </div>
    
      <!-- Pagination -->
      <div class="loading">
        <a href="products.php"><span>See More</span>
        </a>
      </div>
    
    </div>
  </div>
  
  <!-- product ad -->
  <div class="product_ad pt-5 mb-3">
    <div class="container">
      <div class="row">
      <div class="ad ad_one">
        <img src="assets/frontend/img/promotion/fashion.jpg" alt="promotion" width="100%" height="100%" >
      </div>
      <div class="ad ad_two">
        <img src="assets/frontend/img/promotion/electronic.jpg" alt="promotion" width="100%" height="100%">
      </div>
      </div>
    </div>
    <!-- <div class="ad ad_three">
      <img src="assets/frontend/img/promotion/weekly_promo.jpg" alt="promotion" width="100%" height="100%">
    </div> -->
  </div>

  <!-- brand slide -->
  <div class="brand pt-5 pb-5">
    <div class="container-fluid">
      <!-- <div class="row mb-3">
        <h3 class="title">Top Brands</h3>
        <div class="line"></div>
      </div> -->
      <div class="row">
        <div class="your-class mb-5">
          <?php foreach($brands as $brand){ ?>
          <div>
            <img src="admin/uploads/<?= $brand->photo ?>" width="200" height="200" alt="">
          </div>
         <?php }?>
        </div>
      </div>
    </div>
  </div>
  
  <!-- View Cart Modal -->
  <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Your Shopping Cart</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fliud">
              <div class="wrapper row">
                
              </div>
          </div>
        </div>
        <div class="modal-footer d-flex">
          <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal" title="Close Box Modal">Close</button>
          <button type="button" class="btn btn-light btn_wishlist" title="Add to Wishlist"><i class="far fa-heart"></i></button>
          <button type="button" class="btn btn-primary btn_cart" title="Add to Cart"><i class="fas fa-cart-arrow-down"></i>&nbsp;Add to Cart</button>
        </div>
      </div>
    </div>
  </div>


<?php 

  include_once "template/footer.php";

?>