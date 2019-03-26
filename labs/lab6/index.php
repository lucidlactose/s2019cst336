<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Ottermart Product Search </title>
        <meta charset="utf-8">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <!--<script src="https://ajax.googleapis.com/ajax/libs/d3js/5.7.0/d3.min.js"></script>-->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    	        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
	            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
	            crossorigin="anonymous"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
	            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
	            crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/functions.js"></script>
    </head>
    <body>
        <div>
            <div class="jumbotron"><h1> Ottermart Product Search </h1></div>
        
            <form>
                <div class="product">
                    Product: <input type="text" name="product"/>
                </div>
        
                <div class="category">
                    Category:
                    <select name="category">
                        <option value=""> Select One </option>
                    </select>
                </div>
        
                <div class="price">
                    Price:  From <input type="text" name="priceFrom" size="7"/>  
                            To <input type="text" name="priceTo" size="7"/>
                </div>
        
                <div class="orderText">
                    Order result by:
                </div>
        
                <div class="orderBy">
                    <input type="radio" name="orderBy" value="price"/> Price
                </div>
        
                <div class="orderBy">
                    <input type="radio" name="orderBy" value="name"/> Name
                </div>
        
                <button type="button" id="searchForm"> Search </button>
            </form>
        </div>
        
        <hr>
        
        <div id="results">
        </div>
        
        <div class="modal fade" id="purchaseHistoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
        
                    <div class="modal-body">
                        <div id="history"></div>
                    </div>
        
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal" id="purchaseHistoryModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div id="history"></div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>