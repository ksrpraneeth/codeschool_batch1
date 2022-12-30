<?
include 'header.php';
?>
<link rel="stylesheet" href="puma.css">
<h1>AJIO!!</h1>
<h2>PUMA BRANDS ARE HERE</h2>
    <div id="user_session"></div>
    <div id="nextpage"><a href="cart.php"><h3>view cart</h3></a>
<div id="left">
<div class="menu_item">
<a href="#man"><p>Exculsive sales offers</p></a></div>
        <div class="menu_item"><a href="#stores"></a></div>
    <div id="shopping_title">
    <div id="shopping_container">your bag is empty !!</div>
</div>
<div id="right"></div><div id="quick"></div>

<!--view templates-->
<script type="text/template" id="login_form_template">
    <div id="form_wrapper">
        <p>LOGIN FORM:</p>
        <div>Email_</div> 
        <div><input name="email" type="text" class="form_input"/></div>
        <div>Password_</div>
        <div><input name="password" type="password" class="form_input"/></div>
        <div id="login_btn">Login</div>
    </div>
</script><script type="text/template" id="register_form_template">
    <div id="form_wrapper3">
        <p>REGISTRATION FORM:</p>
        <div>Name_</div>
        <div><input name="name" type="text" class="form_input"/></div>
        <div>Last Name_</div>
        <div><input name="lastname" type="text" class="form_input"/></div>
        <div>Email_</div>
        <div><input name="email" type="text" class="form_input"/></div>
        <div>Password_</div>
        <div><input name="password" type="password" class="form_input"/></div>
        <div id="registration_btn">Register</div>
    </div>
</script>

<script type="text/template" id="session_summary">
    <div id="bag">
 <div id="bagqty"><h2>ITEMS: <%= qty %></h2></div>
   <div id="bagtotal"><h2>AMOUNT:<%= tot%></h2></div>
    </div>
</script>


<script type="text/template" id="checkout_form_template">
    <div id="form_wrapper2">
        <div>Name_</div>
        <div><input name="name" type="text" class="form_input"/></div>
        <div>Last Name_</div>
        <div><input name="lastname" type="text" class="form_input"/></div>
        <div>Email_</div>
        <div><input name="email" type="text" class="form_input"/></div>
        <div>Phone number_</div>
        <div><input name="phone" type="text" class="form_input"/></div>
        <div>Credit Card number_</div>
        <div><input name="creditcard" type="text" class="form_input"/></div>
        <div id="order_btn">Place Order</div>
    </div>
</script>

<script type="text/template" id="quick_view_template">
    <div class="quick_data animated bounceInRight">
        <div id="quick_view_picture">
        </div>
        <div><%= name %></div>
        <div>$_<%= price %></div>
        <div><%= description %></div>
    </div>
</script>

<script type="text/template" id="map_template">
    <div id="map"></div>
</script>

<script type="text/template" id="bag_item">
    <div class="cart_item">
        <div class="bag_item_name"><%= name %></div>
        <div class="bag_item_qty"><%= quantity %></div>
        <div class="bag_item_price">$<%= price %></div>
        <div class="remove_item">remove</div>
    </div>
</script>

<a href="http://s296.photobucket.com/user/massimopenzo/media/quick_view_zps9oinxbou.gif.html" target="_blank"></a>

<script type="text/template" id="product_template">
    <div class="product animated bounceInDown">
        <div class="picture">
            <div class="add">ADD 2 BAG</div>
        </div>
        </div>
        <div class="details">
            <div class="name"><%= name %></div>
            <div class="price">$<%= price %></div>
        </div>
    </div>
</script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.2/underscore-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.1.2/backbone-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.js"></script>
<script type="text/javascript" src="valid.js"></script>