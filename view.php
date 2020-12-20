<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Banking System</title>
    <style type="text/css">
       table{
           border-collapse: collapse;
           width: 100%;
           color: black;
           font-family:monospace;
           font-size:25px;
           text-align: left;
       }
       th{
           background-color:green;
       }
       button{
          background-color:yellow;
       }
       header{
    width: 100%;
    height: 50px;
    background-color: black;
}

h1{
    position: absolute;
    padding: 3px;
    float: left;
    margin-left: 2%;
    margin-top: 10px;
    font-family:'Times New Roman', Times, serif;
    color:rebeccapurple;
}

span{
    color:white ;
}
ul{
    width: auto;
    float: right;
    margin-top: 8px;
}
li{
    display:inline-block;
    padding: 15px 15px;
}

a{
    text-align: center;
    color: white;
    text-decoration: none;
    font-family:Georgia, 'Times New Roman', Times, serif;
    font-size: 1.2vw;
}
a:hover{
    color:springgreen;
    transition: 0.5s;
    </style>
</head>
<header>
   <h1>MONEY<span>BANK</span></h1>
     <nav>
        <ul>
            <li><a href="transfer.php">Transfer Money</a></li>
            <li><a href="index.php">Home</a></li>
        </ul>
    </nav>
</header>
<body>
<table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>View</th>
    </tr>

   <?php
				$conn = mysqli_connect("localhost","root","","bank");
				if($conn -> connect_error){
					die("connection failed:".$conn->connect_error);
				}
				$sql = "SELECT * from customer";
				$result = $conn -> query($sql);
				if($result-> num_rows>0)
				{
					while($row = $result-> fetch_assoc())
					{
                    ?>
                    
                    <tr class="tablerow" id="tablerow">
							<td><?php echo $row["id"]; ?></td>
							<td><?php echo $row["name"]; ?></td>
							<td>
								<button type="button" class="btn btndet btn-info btn-lg" data-toggle="modal" data-target="#myModal<?php echo $row["id"]; ?>">View Details</button>
							</td>
						</tr>

						<!-- Modal -->
						<div id="myModal<?php echo $row["id"]; ?>" class="modal fade" role="dialog">
						  <div class="modal-dialog">

						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">Details of <?php echo $row["name"]; ?></h4>
						      </div>
						        <div class="modal-body">
						      	<div class="row">
								    <div class="col-sm-4" style="background-color:lavender;">Email:</div>
								    <div class="col-sm-8" style="background-color:lavenderblush;"><?php echo $row["email"]; ?></div>
							    </div> 
						        <div class="row">
								    <div class="col-sm-4" style="background-color:lavender;">Balance:</div>
								    <div class="col-sm-8"style="background-color:lavenderblush;"><?php echo $row["balance"];?></div>
								</div> 
						        </div>
						      </div>						     
						    </div>
						  </div>
						</div>


			<?php
                }	
            }
				else{
					echo "0 result";	
				}

				$conn -> close();
				?>
</table>
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>