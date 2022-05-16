<html>
    <head>
        <title>DK Online Shopping in Nepal</title>
        <link rel="stylesheet" href="Style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="header">
            <?php require 'Navigation.php'; ?>
        </div>

        <!-- Body  -->

            <div class="cart-container">
                <div class="small-container">
                    <table>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </tr>
                        <tr>
                            <td>
                                <div class="cart-info">
                                    <img src="Images/product-1.jpg">
                                    <div>
                                        <h4>Red Printed T-Shirt</h4>
                                        <small>Price: NRP 50</small>
                                        <br>
                                        <a href="">Remove</a>
                                    </div>
                                </div>
                            </td>
                            <td><input type="number" value="1"></td>
                            <td>NRP 50</td>   
                        </tr>
                        <tr>
                            <td>
                                <div class="cart-info">
                                    <img src="Images/product-2.jpg">
                                    <div>
                                        <p>Red Printed T-Shirt</p>
                                        <small>Price: NRP 50</small>
                                        <br>
                                        <a href="">Remove</a>
                                    </div>
                                </div>
                            </td>
                            <td><input type="number" value="1"></td>
                            <td>NRP 50</td>   
                        </tr>
                        <tr>
                            <td>
                                <div class="cart-info">
                                    <img src="Images/product-3.jpg">
                                    <div>
                                        <p>Red Printed T-Shirt</p>
                                        <small>Price: NRP 50</small>
                                        <br>
                                        <a href="">Remove</a>
                                    </div>
                                </div>
                            </td>
                            <td><input type="number" value="1"></td>
                            <td>NRP 50</td>   
                        </tr>
                    </table>
                    <div class="total-price">
                        <table style="width: 350px; margin-top: 5px;">
                            <tr>
                                <td>Subtotal</td>
                                <td>NRP 150</td>
                            </tr>
                            <tr>
                                <td>Delivery</td>
                                <td>NRP 100</td>
                            </tr>
                            <tr style="border-top: 1.5px solid grey">
                                <td>Total</td>
                                <td>NRP 250</td>
                            </tr>
                        </table>
                    </div>
                    <div id="checkoutBtn">
                        <button>Checkout</button>
                    </div>
                </div>
            </div>

        <!--- Footer --->
        
        <footer class="footer">
            <center>
                <p>Copyright &copy DK </a> Store. All Rights Reserved.</p>
                <p>WELCOME</p>
            </center>
        </footer>

        <!--- JS for toggle menu --->

        <script>
            var MenuItems = document.getElementById("menuItems");

            MenuItems.style.maxHeight = "0px";

            function menutoggle(){
                if(MenuItems.style.maxHeight == "0px")
                {
                    MenuItems.style.maxHeight = "200px";
                }
                else
                {
                    MenuItems.style.maxHeight = "0px";
                }
            }
        </script>
    </body>
</html>