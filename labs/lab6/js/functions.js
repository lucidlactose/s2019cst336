$(document).ready(function() {
    getCategories();
    $("#searchForm").on("click", searchForProduct);
    $(document).on("click", ".historyLink", getHistory);
    
    function getHistory() {
        $("#purchaseHistoryModal").modal("show");
        productId = $(this).attr("id");
        console.log(productId);
        $.ajax({
            type: "GET",
            url: "api/getPurchaseHistory.php",
            dataType: "json",
            data: {
                "productId": productId,
            },
            success: function(data, status) {
                if (data.length != 0 ){
                    $("#history").html("");
                    $("#history").append("<div>" + data[0]["productName"] + "</div>");
                    $("#history").append("<div><img src='" + data[0]['productImage'] + "' width='200' /> </div>");
                    data.forEach(function(key) {
                        $("#history").append("<p>Purchase Date: " + key["purchaseDate"] + "</p>");
                        $("#history").append("<p>Unit price: " + key["unitPrice"] + "</p>");
                        $("#history").append("<p>Quantity: " + key["quantity"] + "</p>");
                    });
                }
                else {
                    $("#history").html("No purchase history for this item.");
                }
            }
        });
        console.log("get history successful");
    };
    
    function searchForProduct() {
        $("#results").empty();
        product = $("[name=product]").val();
        category = $("[name=category]").val();
        priceFrom = $("[name=priceFrom]").val();
        priceTo = $("[name=priceTo]").val();
        orderBy = $("[name=orderBy]:checked").val();
        $.ajax({
            type:"GET",
            url: "api/getSearchResults.php",
            dataType: "json",
            data: {
                "product": product,
                "category": category,
                "priceFrom": priceFrom,
                "priceTo": priceTo,
                "orderBy": orderBy,
            },
            success: function(data, status) {
                $("#results").append("<h3> Products Found: </h3>");
                data.forEach(function(key){
                    $("#results").append(
                        $("<div>")
                            .append("<a href='#' class='historyLink' id='" + 
                                        key['productId'] + "'>History</a> ")
                            .append("<span>" + key["productName"] + " " + 
                                        key["productDescription"] + " $" + key["price"] + "</span></div>"))
                });
            }
        });
        console.log("search successful");
    }
    function getCategories() {
        $.ajax({
            type: "GET",
            url: "api/getCategories.php",
            dataType: "json",
            success: function(data, status) {
                data.forEach(function(key) {
                    $("[name=category]").append("<option value=" + key["catId"] + ">"
                                                + key["catName"] + "</option>");
                });
            }
        });
        console.log("get categories successful");
    }
});