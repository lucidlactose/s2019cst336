<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <!--<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>-->
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <meta name="google-signin-client_id" content="771332740040-bst02ajh5o98uga1dk3e36sv30pjknuh.apps.googleusercontent.com">
        
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <script type="text/javascript" src="js/functions.js"></script>
        <!--<script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>-->

    </head>
    <body>
        <div class="container">
            <div id="logout">
                <div class="g-signin2" data-onsuccess="onSignIn"></div>
                <a id="logout-button" href="#" onclick="signOut()" >logout</a>
            </div>
    
            <div id="invitation">
                <input type="text" value="" id="invitation-link">
                <button onclick="copyInvitation()"><img style="height:25px;" src="img/copy_icon.png"></button>
            </div>
    
            <table id="appointment-times">
                <tr id="table-headers">
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>Duration</th>
                    <th>Booked By</th>
                    <th>Add Multiple Time Slots <button type="button" id="show-appointment">+</button></th>
                </tr>
            </table>
    
            <!-- Modal -->
            <div class="modal fade" id="add-appointment-modal" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Time Slot</h4>
                        </div>
                        <div class="modal-body">
                            <div>
                                <table id="modal-input">
                                    <tr>
                                        <td> Date: </td>
                                        <td> <input type="date" id="date" name="date"/> </td>
                                    </tr>
                                    <tr>
                                        <td> Start Time: </td>
                                        <td> <input type="time" id="start-time" name="start-time"/> </td>
                                    </tr>
                                    <tr>
                                        <td> End Time: </td>
                                        <td> <input type="time" id="end-time" name="end-time"/> </td>
                                    </tr>
                                </table>
                                <button id="cancel-button"> Cancel </button>
                                <button id="add-button"> Add </button>
                            </div>
                        </div>
                        <!--<div class="modal-footer">-->
                        <!--    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
            
            
            <div class="modal fade" id="delete-appointment-modal" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Time Slot</h4>
                        </div>
                        <div class="modal-body">
                            <div>
                                <table id="delete-table">
                                    <tr>
                                        <td> Start Time </td>
                                        <td id="delete-start-date"></td>
                                        <td id="delete-start-hour"></td>
                                    </tr>
                                    <tr>
                                        <td> End Time </td>
                                        <td id="delete-end-date"></td>
                                        <td id="delete-end-hour"></td>
                                    </tr>
                                </table>
                                <p> Are you sure you want to remove the time slot? 
                                    This cannot be undone. </p>
                                <button id="cancel-button"> Cancel </button>
                                <button id="delete-button"> Yes, Remove it! </button>
                            </div>
                        </div>
                        <!--<div class="modal-footer">-->
                        <!--    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>


<!--<html>-->
<!--<head>-->
<!--  <meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">-->
<!--  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>-->
<!--  <script type="text/javascript" src="js/functions.js"></script>-->

<!--</head>-->
<!--<body>-->
<!--  <div id="g-signin2"></div>-->
  

<!--  <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>-->
<!--</body>-->
<!--</html>-->