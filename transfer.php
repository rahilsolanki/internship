<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Banking System</title>
   
  <style>
  
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
          <li><a href="index.php">Home</a></li>
      </ul>
    </nav>
</header>
<body>
    <div class="container" style="text-align: center;">
    <form action="config.php" method="POST">
       <input type="text" name="sender" >
       <label class="sender">Sender_Id</label>
        <input type="text" name="receiver" >
       <label class="receiver">Receiver_Id</label>
       <input type="text" name="amount" >
       <label class="amount">Amount</label>
       <button type="submit" class="btn btndet btn-info btn-lg" data-toggle="modal">Transfer Money</button> 
     </form>   
    </div>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>

