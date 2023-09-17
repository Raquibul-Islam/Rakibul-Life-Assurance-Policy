<?php
	
	include'connection.php';
	$username = $_SESSION["username"];

	$sql = "SELECT client_id FROM client WHERE client_id = '$username'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
     
    }
    else {
	header("Location: clientHome.php");
   }
	
?>


<body>
    <div id="wrapper">
       
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">

                            <div class="inner-text">
                                
                            <br />
                              
                            </div>
                        </div>

                    </li>


               <li>
                      <a href="client.php"><i class="fa fa-users "></i>CLIENTS</a >  
                 </li  > 
                 <li>
                      <a href="CNotice.php"><i class="fa fa-users "></i>Notice</a >  
                 </li  > 
                 
                 <li>
                      <a href="Ccomplaints.php"><i class="fa fa-credit-card "></i>Complaints</a>
                            
                 </li>
                 
                 <li>
                      <a href="About.php"><i class="fa fa-credit-card "></i>About Us</a>
                            
                 </li>     
                    
                     
                </ul>

            </div>
		

        </nav>
		 
		  
	
   