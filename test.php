<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.js"></script>
    <title>Document</title>
    <style>
        body{
            background-color: #37414b;
            background-image: linear-gradient(315deg, #485461 0%, #28313b 74%);
        }

    .one{
  position:absolute;
  right:0%;
  top:0%;
  content: attr(data-count);
  font-size:40%;
  padding:.6em;
  border-radius:999px;
  line-height:.75em;
  color: white;
  color:$shopping-cart-red;
  text-align:center;
  min-width:2em;
  font-weight:bold;
  background: black;
  border-style:solid;
}
.overlay {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0, 0.9);
  overflow-x: hidden;
  transition: 0.5s;
}

.overlay-content {
  position: relative;
  top: 25%;
  width: 100%;
  text-align: center;
  margin-top: 30px;
}

.overlay a {
  padding: 8px;
  text-decoration: none;
  font-size: 36px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.overlay a:hover, .overlay a:focus {
  color: #f1f1f1;
}

.overlay .closebtn {
  position: absolute;
  top: 20px;
  right: 45px;
  font-size: 60px;
}
.shop-item {
    margin: 30px;
}

.shop-item-title {
    display: block;
    width: 100%;
    text-align: center;
    font-weight: bold;
    font-size: 1.5em;
    color: #333;
    margin-bottom: 15px;
}
.shop-item-details {
    display: flex;
    align-items: center;
    padding: 5px;
}

.shop-item-price {
    flex-grow: 1;
    color: white;
}

.shop-items {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.cart-header {
    font-weight: bold;
    font-size: 1.25em;
    color: white;

}

.cart-column {
    display: flex;
    align-items: center;
    border-bottom: 1px solid white;
    margin:20px;
    padding:30px;
}

.cart-row {
    display: flex;
    margin:1px solid white;
}

.cart-item {
    width: 35%;
}

.cart-price {
    width: 20%;
    font-size: 1.2em;
    color: white;
}

.cart-quantity {
    width: 35%;
}

.cart-item-title {
    color: white;
    margin-left:20px;
    font-size: 1.2em;
}
.btn-danger {
    color: white;
    background-color: #EB5757;
    border: none;
    border-radius: .3em;
    font-weight: bold;
}

.btn-danger:hover {
    background-color: #CC4C4C;
}

.cart-quantity-input {
    height: 34px;
    width: 50px;
    border-radius: 5px;
    border: 1px solid #56CCF2;
    background-color: #eee;
    color: #333;
    padding: 0;
    text-align: center;
    font-size: 1.2em;
    margin-right: 25px;
}

.cart-row:last-child {
    border-bottom: 1px solid black;
}

.cart-row:last-child .cart-column {
    border: none;
}

.cart-total {
    text-align: center;
    padding: 20px;
    font-size: 1.25em;
}

.cart-total-title {
    font-weight: bold;
    font-size: 1.5em;
    color: black;
    margin-right: 20px;
}

.cart-total-price {
    color: white;
    font-size: 1.1em;
    text-align: center;
}

.btn-purchase {
    display: block;
    margin: 40px auto 80px auto;
    font-size: 1.75em;
}


@media screen and (max-height: 450px) {
  .overlay a {font-size: 20px}
  .overlay .closebtn {
  font-size: 40px;
  top: 15px;
  right: 35px;
  }
}
</style>

</style>
</head>
<body>
    <div class="ui secondary menu navbar" style="padding:3px; background-color:white;">

        <a class="ui item" href="test.php">
        <h2><i class="shopping cart icon" size="big"></i>MedKart</h2></a>
        <div class="right menu">
            <a class="ui item" onclick="openNav()"><h2><span class="one" id="user">0</span><i class="shopping cart icon" name="cart"></i>
              cart</h2></a>
              <a href="search2.php" class="ui item">
              <h2>Search info</h2>
              </a>
            <a href="/" class="ui item">
            <h2>Logout</h2>
            </a>
        </div>
    </div>
    <div class="ui huge header" style="text-align:center;color:white;">WELCOME </div>
<center>
  <div class="ui huge header" style="text-align:center;color:white;">LIST OF MEDICINES</div>
    <div>
      <table class="ui celled table" style="width:75%;">
<thead>
  <tr><th>NAME</th>
  <th>COMPANY</th>
  <th>STOCK</th>
  <th>AVAILABLE</th>
  <th>PRICE</th>
  <th>ADD TO CART</th>
</tr></thead>
<tbody>
  <?php
  $conn=mysqli_connect("localhost:3307","root","","medicine");
  if($conn-> connect_error){
    die("connection failed:".$conn-> connect_error);
  }

  $sql="SELECT* FROM medicine";
  $result=$conn->query($sql);

  if($result-> num_rows >0){
    while ($row = $result-> fetch_assoc()){
      ?>
      <tr>
        <td ><?php echo $row["MNAME"];?></td>
        <td ><?php echo $row["MCOMPANY"];?></td>
        <td ><?php echo $row["MSTOCK"];?></td>
        <td ><?php echo $row["MAVAILABLE"];?></td>
        <td ><i class="rupee sign icon"></i><?php echo $row["MPRICE"];?></td>
        <td ><div class="shop-items">
            <div class="shop-item">
                <label class="shop-item-title ui field"><?php echo $row["MNAME"];?></label>
                <div class="shop-item-details">
                    <span class="shop-item-price ui field"><i class="rupee sign icon"></i><?php echo $row["MPRICE"];?></span>
                    <button class="btn btn-primary shop-item-button ui secondary button" type="button" onclick="buttonClick()" >ADD TO CART</button>
                </div>
            </div>
          </div>
          </td>
      </tr>
      <?php
    }

  }
  ?>
</table>
</div>
</center>

  <script>
  if (document.readyState == 'loading') {
      document.addEventListener('DOMContentLoaded', ready)
  } else {
      ready()
  }

  function ready() {
      var removeCartItemButtons = document.getElementsByClassName('btn-danger')
      for (var i = 0; i < removeCartItemButtons.length; i++) {
          var button = removeCartItemButtons[i]
          button.addEventListener('click', removeCartItem)
      }

      var quantityInputs = document.getElementsByClassName('cart-quantity-input')
      for (var i = 0; i < quantityInputs.length; i++) {
          var input = quantityInputs[i]
          input.addEventListener('change', quantityChanged)
      }

      var addToCartButtons = document.getElementsByClassName('shop-item-button')
      for (var i = 0; i < addToCartButtons.length; i++) {
          var button = addToCartButtons[i]
          button.addEventListener('click', addToCartClicked)
      }

      document.getElementsByClassName('btn-purchase')[0].addEventListener('click', purchaseClicked)
  }

  function purchaseClicked() {
      alert('Thank you for your purchase')
      var cartItems = document.getElementsByClassName('cart-items')[0]
      while (cartItems.hasChildNodes()) {
          cartItems.removeChild(cartItems.firstChild)
      }
      updateCartTotal()
  }

  function removeCartItem(event) {
      var buttonClicked = event.target
      buttonClicked.parentElement.parentElement.remove()
      updateCartTotal()
  }

  function quantityChanged(event) {
      var input = event.target
      if (isNaN(input.value) || input.value <= 0) {
          input.value = 1
      }
      updateCartTotal()
  }

  function addToCartClicked(event) {
      var button = event.target
      var shopItem = button.parentElement.parentElement
      var title = shopItem.getElementsByClassName('shop-item-title')[0].innerText
      var price = shopItem.getElementsByClassName('shop-item-price')[0].innerText
      addItemToCart(title, price)
      updateCartTotal()
  }

  function addItemToCart(title, price) {
      var cartRow = document.createElement('div')
      cartRow.classList.add('cart-row')
      var cartItems = document.getElementsByClassName('cart-items')[0]
      var cartItemNames = cartItems.getElementsByClassName('cart-item-title')
      for (var i = 0; i < cartItemNames.length; i++) {
          if (cartItemNames[i].innerText == title) {
              alert('This item is already added to the cart')
              return
          }
      }
      var cartRowContents = `
          <div class="cart-item cart-column">
              <span class="cart-item-title">${title}</span>
          </div>
        <span class="cart-price cart-column"><i class="rupee sign icon"></i>${price}</span>
          <div class="cart-quantity cart-column">
              <input class="cart-quantity-input" type="number" value="1" name="number">
              <button class="btn btn-danger" type="button" onclick="buttonClick1()">REMOVE</button>
          </div>`
      cartRow.innerHTML = cartRowContents
      cartItems.append(cartRow)
      cartRow.getElementsByClassName('btn-danger')[0].addEventListener('click', removeCartItem)
      cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', quantityChanged)
  }

  function updateCartTotal() {
      var cartItemContainer = document.getElementsByClassName('cart-items')[0]
      var cartRows = cartItemContainer.getElementsByClassName('cart-row')
      var total = 0
      for (var i = 0; i < cartRows.length; i++) {
          var cartRow = cartRows[i]
          var priceElement = cartRow.getElementsByClassName('cart-price')[0]
          var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0]
          var price = parseFloat(priceElement.innerText.replace('', ''))
          var quantity = quantityElement.value
          total = total + (price * quantity)
      }
      total = Math.round(total * 100) / 100
    document.getElementsByClassName('cart-total-price')[0].innerText = 'TOTAL RS:' + total +'/-';
  }
function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}

   function buttonClick() {
      window.alert('Medicine added to cart');
       var start=document.getElementById('user').innerHTML;
       start++;
       document.getElementById('user').innerHTML=start;
   }
   function buttonClick1() {
      window.alert('Medicine removed from cart');
       var start=document.getElementById('user').innerHTML;
       start--;
       document.getElementById('user').innerHTML=start;
   }
  </script>

  <div id="myNav" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="overlay-content">
      <section class="container content-section" style="color:white;">
          <h2 class="section-header">CART</h2>
          <div class="cart-row" >
              <span class="cart-item cart-header cart-column">MEDICINE</span>
              <span class="cart-price cart-header cart-column">PRICE</span>
              <span class="cart-quantity cart-header cart-column">QUANTITY</span>
          </div>
          <div class="cart-items">
          </div>
          <div class="cart-total">
              <span class="cart-total-title"></span>
              <span class="cart-total-price"></span>
          </div>

      </section>
      <a href="checkout.php"><button class="ui primary button" type="button">proceed to checkout</button></a>
    </div>
  </div>
</body>
</html>
