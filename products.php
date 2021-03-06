<?php 

  include_once "template/header.php";
  include_once "system/function.php";


    $sql = "SELECT items.*, brand.name as bn FROM items INNER JOIN brand ON brand.id=items.brand_id";
    $items = itemsAll($sql);

?>

<!-- background image -->
<div class="bg_image">
    <!-- Breadcrumb -->
    <div class="bd_crumb text-center my-crumb">
        <h3 class="breadcrumb-item bc-item">All Products</h3>
    </div> 
</div>
  <!-- Products -->

  <section id="product">
        <div class="product-container">
              <div class="row mb-3">
                  <?php foreach($items as $item){
                  
                  $ai_id=$item['id'];
                  $ai_codeno=$item['codeno'];
                  $ai_name=$item['name'];
                  $ai_photo=$item['photo'];
                  $ai_price=$item['price'];
                  $ai_discount=$item['discount'];
                  $ai_description=$item['description'];
                  $brand_id = $item['brand_id'];
                  $brand_name=$item['bn'];

                  ?>
          
          <div class="col-md-4 col-lg-3 col-xl-2 my-3 p-0 set-p">
            <div class="product_card">
                <div class="buy">
                  <button type="button" title="Add to wishlist">
                  <i class="far fa-heart"></i>
                  </button>
                </div>

                <div class="img-frame">
                  <a href="product_details.php?id=<?= $ai_id?>" class="img-frame" type="button">
                    <img src="admin/uploads/<?= $ai_photo ?>" class="card-img p-3" height=160 alt="...">
                  </a>
                </div>

                <div class="card-body">
                  <h5 class="card-title"><?= $ai_name ?><a href="brand.php?bid=<?= $brand_id ?>" class="badge bg-info logo-brand"><?php echo $brand_name; ?></a></h5>
                  <p class="card-text"><?= substr($ai_description, 0, 50) ?>&nbsp;<a href="#" class="view_btn" data-id="<?= $ai_id ?>" data-name="<?= $ai_name ?>" data-photo="<?= $ai_photo ?>" data-description="<?= $ai_description ?>"
								data-price="<?= $ai_price ?>" data-discount="<?= $ai_discount ?>" data-photo="<?= $ai_photo ?>" data-codeno="<?= $ai_codeno ?>" data-bs-toggle="modal" data-bs-target="#cartModal">more...</a></p>
                  <div class="price">
                  <?php if($ai_discount) {?>
                    <span class="current_price"><?= $ai_discount ?> &nbsp;MMK</span><br>
                    <span class="old_price"><del><?= $ai_price ?> &nbsp;MMK</del></span>
                  <?php }else{?>
                    <span class="current_price"><?= $ai_price ?> &nbsp;MMK</span><br>
                  <?php } ?>
                  </div>
                </div>
                <div class="product_btn">
                  <button class="btn btn-danger btn-sm cart_btn addtocart" data-id="<?= $ai_id ?>" data-name="<?= $ai_name ?>" data-price="<?= $ai_price ?>" data-discount="<?= $ai_discount ?>" data-photo="<?= $ai_photo ?>" data-codeno="<?= $ai_codeno ?>" data-brand="<?= $brand_name ?>"><i class="fa fa-cart-arrow-down"></i></button>

                  <button class="btn btn-primary btn-sm cart_btn view_btn" data-id="<?= $ai_id ?>" data-name="<?= $ai_name ?>" data-photo="<?= $ai_photo ?>" data-description="<?= $ai_description ?>" data-price="<?= $ai_price ?>" data-discount="<?= $ai_discount ?>" data-photo="<?= $ai_photo ?>" data-codeno="<?= $ai_codeno ?>" data-brand="<?= $brand_name ?>" data-bs-toggle="modal" data-bs-target="#cartModal"><i class="fas fa-eye"></i></button>
                    </button>
                </div>
            </div>
          </div>
        <?php } ?>
      </div>
        </div>
  </section>

  <!-- View Cart Modal -->
  <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered my-model">
      <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title modal-codeno" id="exampleModalLabel"></h3>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modal-div">
              <div class="wrapper row">
                  <div class="preview col-lg-6">
                        <div class="image-box modal-photo"></div>
                  </div>
                  <div class="details col-lg-6">
                      <h3 class="product-title modal-name"></h3>
                      <div class="rating">
                          <div class="stars">
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                          </div>
                          <span class="review-no">41 reviews</span>
                      </div>
                      <p class="product-description modal-description"></p>

                        <div class="price-tab"></div>

                        <div class="action mb-3">
                          <button type="button" id="addtocart" class="btn btn-primary add-to-cart addtocart"><i class="fas fa-cart-arrow-down"></i>&nbsp;&nbsp;add to cart</button>
                          <button type="button" id="buynow" class="btn btn-success add-to-cart buynow"><i class="fas fa-credit-card"></i>&nbsp;&nbsp;Buy now</button>
                        </div>
                  </div>
              </div>
        </div>
      </div>
    </div>
  </div>

<?php 

  include_once "template/footer.php";

?>







