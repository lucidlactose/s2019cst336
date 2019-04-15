<?php
    session_start();
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/functions.js"></script>

    <script>
        $(document).ready(function() {
            getProducts();
            $("[name=delete]").on("click", deleteProduct);
            $("[name=insert]").on("click", insertProduct);
            
            function insertProduct() {
                productName = $("[name=productNameInsert]").val();
                $.ajax({
                    type: "POST",
                    url: "api/insertProduct.php",
                    dataType: "json",
                    data : {
                        "name": productName
                    },
                    success : function(data, status) {
                        console.log("success")
                        console.log(data)
                        if (data.reason === "works") {
                            $(".products")
                                    .append(
                                        $("<div>")
                                            .attr("class", "product-container")
                                            .append(
                                                $("<input>")
                                                    .attr("type", "button")
                                                    .attr("name", "delete")
                                                    .attr("class", "btn btn-info btn-md")
                                                    .attr("value", "delete")
                                            )
                                            .append(
                                                $("<span>")
                                                    .html(productName)
                                                    .attr("name", "name")
                                                    .attr("class", "product-name")
                                            )
                                    )
                            $("#reason")
                                .html("product inserted")
                                .css("color", "green");
                        }
                        else {
                            $("#reason")
                                .html(data.reason)
                                .css("color", "red");
                        }
                    },
                    complete : function(data, status) {
                        // console.log(data);
                    }
                });
            }
            function deleteProduct() {
                productName = $("")
                $.ajax({
                    type: "POST",
                    url: "api/editProduct.php",
                    dataType: "json",
                    data : {
                        
                    },
                    success : function(data, status) {
                        console.log(data)
                    },
                    complete : function(data, status) {
                        // console.log(data);
                    }
                });
            }
            function getProducts() {
                $.ajax({
                    type: "GET",
                    url: "api/getProducts.php",
                    dataType: "json",
                    success : function(data, status) {
                        data.forEach(function(key) {
                            $(".products")
                                .append(
                                    $("<div>")
                                        .attr("class", "product-container")
                                        .append(
                                            $("<input>")
                                                .attr("type", "button")
                                                .attr("name", "delete")
                                                .attr("class", "btn btn-info btn-md")
                                                .attr("value", "delete")
                                        )
                                        .append(
                                            $("<span>")
                                                .html(key.product_id + " ")
                                                .attr("name", "id")
                                                .attr("class", "product-id")
                                        )
                                        .append(
                                            $("<span>")
                                                .html(key.name)
                                                .attr("name", "name")
                                                .attr("class", "product-name")
                                        )
                                )
                        })
                    },
                });
            }
        })  
    </script>
    <style>
        .product-container {
            border: 1px black solid;
            margin: .5em 2em;
            padding: .2em;
        }
        .products {
            border: 1px black solid;
            margin-top: 1em;
            margin-bottom: 1.5rem;
        }
        .product-name {
            font-weight: bold;
            font-size: 1.5em;
        }
        .product-id {
            margin: 1.5em;
        }
        [name=delete], [name=edit] {
            margin: .2em;
        }
        [name=edit] {
            margin-right: 4em;
        }
    </style>
    <!------ Include the above in your HEAD tag ---------->
  </head>
  <body>
  <div id="login">
      <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
          <div id="login-column" class="col-md-6">
            <div id="login-box" class="col-md-12">
            <form id="login-form" class="form" action="" method="post">
              <h3 class="text-center text-info">Products</h3>
              
              <input type="button" name= "insert" class="btn btn-info btn-md" value="insert">
              <input type="text" name="productNameInsert">
              <span id="reason"></span>
              <div class="products">
              </div>
              <div class="form-group">
                <input type="button" name="logout" class="btn btn-info btn-md" value="logout">
              </div>
              
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>