<?php
  require_once("php/db.php");
  require_once("php/operations.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LBL</title>
    <!-- add icon link -->
    <link rel = "icon" href = "assets/logo.png" 
        type = "image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>
<body style="height: 100%;
  margin: 0;">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div id="logo"> 
	<img src="assets/logo2.png" height="30" width ="120" style="margin-left: 30px;"> 
</div> 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav" style=" width: 100%; text-align: center; margin-left: 100px; height:100%;">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Standings</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="top-scorers.php">Top Scorers</span></a>
      </li>
    </ul>
  </div>
</nav>
 
        
          <h3 class="top-scorers-header">Top Scorers</h3>
        <div class="d-flex top-scorers-div">
        <table class="top-scorers-table table-striped table-dark">
            <thead class="thead-dark">
                <tr>
                    <th>Rank</th>
                    <th>Name</th>
                    <th>Team</th>
                    <th>Goals</th>
                  
                </tr>
                </thead>

                <tbody id="tbody">
                                   
                <?php
                  
                        $result = retrieveScorers();

                        if($result){
                          $rank = 1;
                            while($rank<=20 && $row = mysqli_fetch_assoc($result)){

                                echo "<tr>";
                                    echo "<td>" .$rank. "</td>"; 
                                    $rank++;
                                    
                                    echo "<td>" .$row['player_name']. "</td>";
                                    echo "<td>" .$row['team_name']. "</td>";
                                    echo "<td>" .$row['goals']. "</td>";
   
                                echo "</tr>";
                                }

                                ?>
                            <?php
                            
                        }
                    
                    

                ?>
            </tbody>
            
          </table>
          </div>
        
                <p style="display: block; text-align: center; font-size: 12px;"><a href="index.php">View Standings Table</a></p>
                <p style="display: block; text-align: center; font-size: 11px;">© 2021 Copyright: Perfait Akaka</p>



        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" 
integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>
</body>



</html>
