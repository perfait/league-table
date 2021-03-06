<?php
  require_once("php/db.php");
  require_once("php/operations.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akaka's League</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Soccer League</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Standings</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="update-scores.php">Update scores</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add-teams.php">Add Teams</span></a>
      </li>
    </ul>
  </div>
</nav>




<div class="d-flex table-data pt-5">
        <table class="table table-striped table-dark">
            <thead class="thead-dark">
                <tr>
                    <th>Rank</th>
                    <th>Team</th>
                    <th>MP</th>
                    <th>W</th>
                    <th>D</th>
                    <th>L</th>
                    <th>GF</th>
                    <th>GA</th>
                    <th>GD</th>
                    <th>Pts</th>
                    <th>Last Match</th>
                </tr>
                </thead>

                <tbody id="tbody">
                                   
                <?php
                  
                        $result = retrieveData();

                        if($result){
                          $rank = 1;
                            while($rank<=20 && $row = mysqli_fetch_assoc($result)){

                                echo "<tr>";
                                    echo "<td>" .$rank. "</td>"; 
                                    $rank++;
                                    
                                    echo "<td>" .$row['team_name']. "</td>";
                                    echo "<td>" .$row['matches_played']. "</td>";
                                    echo "<td>" .$row['won']. "</td>";
                                    echo "<td>" .$row['drawn']. "</td>";
                                    echo "<td>" .$row['lost']. "</td>";
                                    echo "<td>" .$row['goals_for']. "</td>";
                                    echo "<td>" .$row['goals_against']. "</td>";
                                    echo "<td>" .$row['goal_difference']. "</td>";
                                    echo "<td>" .$row['points']. "</td>";
                                    echo "<td>" .$row['last_match']. "</td>";
   
                                echo "</tr>";
                                }

                                ?>
                            <?php
                            
                        }
                    
                    

                ?>
            </tbody>
            
          </table>
        </div>


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
