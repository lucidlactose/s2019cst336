	// Load google charts
//GET THE FIRST PIECHART (PIECHART1)

$(function() {

    //************************************************************
    //*********     THIS PART DISPLAYS THE TOP 1 STATS   *********
    //************************************************************
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart1);
    
    // Draw the chart and set the chart values
    function drawChart1() {
        var sortedArr = new Array();
        var finishArr = new Array();
        finishArr[0] = ["Username", "Stats"];
        
    	$.ajax({
            url:"API/getAllFollowingStats.php",
            type: "GET",
            dataType:"json",
            data:{
                "id": localStorage.userId
            },
            success:function(data,status){
                console.log(data);
                for(var i = 0; i<data.length; i++){
                    var one = String(data[i]['username']);
                    var two = parseInt(data[i]['place_top1']);
                    sortedArr[i] = [two,one];
                }
                for(var i =0 ; i<sortedArr.length; i++){
                    for(var j=0; j<sortedArr.length-1-i; j++){
                        if(sortedArr[j][0]<sortedArr[j+1][0]){
                            var temp = new Array();
                            temp = sortedArr[j];
                            sortedArr[j]= sortedArr[j+1];
                            sortedArr[j+1] = temp;
                        }
                    }
                }

                for(var i= 0; i < sortedArr.length; i++){
                    $("#tableBody3").append("<tr><td class='column32'>"+(i+1)+"</td><td class='column31'>"+sortedArr[i][1]+"</td><td class='column32'>"+sortedArr[i][0]+"</td></tr>");
                    finishArr[i+1] = [sortedArr[i][1],sortedArr[i][0]];
                }
                var data = google.visualization.arrayToDataTable(finishArr, false);
                
    	        // Optional; add a title and set the width and height of the chart
            	var options = {'title':'My Stats vs My Followers', 'width':300, 'height':300,backgroundColor: 'transparent',is3D: true};
    
    	        // Display the chart inside the <div> element with id="piechart"
    	        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
    	        chart.draw(data, options);
            },
        });
    }
    
    //************************************************************
    //*********     THIS PART DISPLAYS THE KILLS STATS   *********
    //************************************************************
    //GET THE SECOND PIECHART (PIECHART2)
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart2);
    function drawChart2() {

        var sortedArr = new Array();
        var finishArr = new Array();
        finishArr[0] = ["Username", "Stats"];
        
    	$.ajax({
            url:"API/getAllFollowingStats.php",
            type: "GET",
            dataType:"json",
            data:{
                "id": localStorage.userId
            },
            success:function(data,status){
                for(var i = 0; i<data.length; i++){
                    var one = String(data[i]['username']);
                    var two = parseInt(data[i]['kills']);
                    sortedArr[i] = [two,one];
                }
                for(var i =0 ; i<sortedArr.length; i++){
                    for(var j=0; j<sortedArr.length-1-i; j++){
                        if(sortedArr[j][0]<sortedArr[j+1][0]){
                            var temp = new Array();
                            temp = sortedArr[j];
                            sortedArr[j]= sortedArr[j+1];
                            sortedArr[j+1] = temp;
                        }
                    }
                }
                for(var i= 0; i < sortedArr.length; i++){
                    $("#tableBody2").append("<tr><td class='column22'>"+(i+1)+"</td><td class='column21'>"+sortedArr[i][1]+"</td><td class='column22'>"+sortedArr[i][0]+"</td></tr>");
                    finishArr[i+1] = [sortedArr[i][1],sortedArr[i][0]];
                }
                var data = google.visualization.arrayToDataTable(finishArr, false);
                
    	        // Optional; add a title and set the width and height of the chart
            	var options = {'title':'My Stats vs My Followers', 'width':300, 'height':300,backgroundColor: 'transparent',is3D: true};
    
    	        // Display the chart inside the <div> element with id="piechart"
    	        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
    	        chart.draw(data, options);
            },
        });
    }
    
    //************************************************************
    //*********     THIS PART DISPLAYS THE K/D STATS     *********
    //************************************************************
    //GET THE SECOND PIECHART (PIECHART3)
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart3);
    function drawChart3() {
    	var sortedArr = new Array();
        var finishArr = new Array();
        finishArr[0] = ["Username", "Stats"];
        $.ajax({
            url:"API/getAllFollowingStats.php",
            type: "GET",
            dataType:"json",
            data:{
                "id": localStorage.userId
            },
            success:function(data,status){
                for(var i = 0; i<data.length; i++){
                    var one = String(data[i]['username']);
                    var two = parseFloat(data[i]['kill_death_ratio']);
                    sortedArr[i] = [two,one];
                }
                for(var i =0 ; i<sortedArr.length; i++){
                    for(var j=0; j<sortedArr.length-1-i; j++){
                        if(sortedArr[j][0]<sortedArr[j+1][0]){
                            var temp = new Array();
                            temp = sortedArr[j];
                            sortedArr[j]= sortedArr[j+1];
                            sortedArr[j+1] = temp;
                        }
                    }
                }
                for(var i= 0; i < sortedArr.length; i++){
                    $("#tableBody4").append("<tr><td class='column42'>"+(i+1)+"</td><td class='column41'>"+sortedArr[i][1]+"</td><td class='column42'>"+sortedArr[i][0]+"</td></tr>");
                    finishArr[i+1] = [sortedArr[i][1],sortedArr[i][0]];
                }
                var data = google.visualization.arrayToDataTable(finishArr, false);
                // Optional; add a title and set the width and height of the chart
            	var options = {'title':'My Stats vs My Followers', 'width':300, 'height':300,backgroundColor: 'transparent',is3D: true};
    
            	// Display the chart inside the <div> element with id="piechart"
            	var chart = new google.visualization.PieChart(document.getElementById('piechart3'));
            	chart.draw(data, options);
            }
        });
    }
});