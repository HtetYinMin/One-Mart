<?php 

  include_once "template/header.php";

?>

<!-- background image -->
  <div class="bg_image">

    <!-- Breadcrumb -->
    <div class="bd_crumb my-crumb">
        <div class="container">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-bc">
              <!-- <li class="breadcrumb-item">
                <a href="index.php" class="link-item">Home</a>
              </li> -->
              <li class="breadcrumb-item" style="color: #fff;" aria-current="page">
              <?php

                $unixTime = time();
                $timeZone = new \DateTimeZone('Asia/Rangoon');

                $time = new \DateTime();
                $time->setTimestamp($unixTime)->setTimezone($timeZone);

                $formattedTime = $time->format('M d Y H:i a');
                echo $formattedTime;

              ?>
              </li>
            </ol>
          </nav>
          <!-- <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
          </nav>-->
        </div>
    </div> 
  </div>


<div class="hasitem">
  <!-- My Cart -->
  <div class="carts">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-sm-12 mb-3">
              <div class="card prod-cart">
                <table class="table table-hover rounded-3">
                  <thead class="text-muted">
                    <tr class="small">
                      <th>No.</th>
                      <th>Products</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Remove</th>
                    </tr>
                  </thead>
          
                  <tbody id="carts_table">
                    
                  </tbody>
                </table>
              </div>
          </div>
    
        <div class="col-lg-3 col-sm-12">
          <div class="card mb-3 prod-cart">
            <div class="card-body">
                <form>
                  <label for="region">Region</label>
                  <div class="form-group"> 
                    <select name="region" class="form-select form-select-md" aria-label=".form-select-sm example" id="region" required>
                      <option value="" selected disabled>select your region</option>
                      <option value="aya">Ayeyarwady</option>
                      <option value="bgo">Bago</option>
                      <option value="mdy">Mandalay</option>
                      <option value="mgw">Magway</option>
                      <option value="mlm">Mawlamyine</option>
                      <option value="sgg">Sagaing</option>
                      <option value="tty">Tanintharyi</option>
                      <option value="ygn">Yangon</option>
                    </select>
                  </div>
                </form>
            </div>
          </div>
          <div class="card prod-cart">
              <div class="card-body">
                  <dl class="dlist-align">
                      <dt>price:</dt>
                      <dd><span class="subtotal"></span> Ks</dd>
                  </dl>
                  <dl class="dlist-align">
                    <dt>Shipping:</dt>
                    <dd><span class="shipping">0</span> Ks</dd>
                  </dl>
                  <dl class="dlist-align">
                      <dt>Total Price:</dt>
                      <dd><strong><span class="total"></span> Ks</strong></dd>
                  </dl>
                  <hr> 
                  <div class="payment">
                    <a href="index.php" class="btn btn-success btn-main"><i class="fa fa-shopping-cart"></i> Shopping</a>
                    <a href="#" class="btn btn-primary btn-main ordernow"><i class="fab fa-shopify"></i>&nbsp;&nbsp;Order</a> 
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="noitem">
  <h4 class="text-center mt-5 pt-5"> There is no item in this cart! </h4>
  <div class="text-center">
    <a href="products.php" class="btn btn-danger m-5">Go Shopping Now</a>
  </div>
</div>
  
<?php 

  include_once "template/footer.php";

?>


<?php 

if(checkSession('user')) {

  echo "<script>

  $(document).ready(function() {
    $('.ordernow').click(function(){

      var city = $('#region option:selected').val();

      if(city == '') {

        Swal.fire({
          icon: 'error',
          text: 'Please Select Your Destination!',
          confirmButtonColor: '#0d6efd'
        })   
        
      }else {
  
  
        var total = $('.total').text();
        var city = $('#region option:selected').text().trim();
        var action = 'order';
  
        var cart_str = localStorage.getItem('onemart');
        var cart_arr = JSON.parse(cart_str);
  
        Swal.fire({
          icon: 'question',
          title: 'Are you sure?',
          confirmButtonText: 'Yes',
          confirmButtonColor: '#0d6efd',
          showCancelButton: true,
        }).then((result) => {
          if (result.isConfirmed) {
  
  
            $.ajax({
                url: 'system/order.php',
                method: 'POST',
                data: {'action':action, 'cart':cart_arr, 'total': total, 'city': city},
                success: function(response) {

                    Swal.fire({
                      icon: 'success',
                      title: 'Order Success!<br>Thank you for shopping with us, Please check your email!',
                      confirmButtonText: 'Got it',
                      confirmButtonColor: '#0d6efd',
                    }).then((result) => {
                      if (result.isConfirmed) {

                          localStorage.clear();
                          window.location.href='index.php';

                      }
                    })
                }
            });
          }
        })
      }


  
    });
  });
  </script>";
}else {

  echo "<script>

  $(document).ready(function() {
    $('.ordernow').click(function(){
  
       window.location.href='login.php';
  
    });
  });
  </script>";
}

?>













