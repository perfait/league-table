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
<body>

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
      <li class="nav-item">
        <a class="nav-link" href="top-scorers.php">Top Scorers</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="update-scores.php">Update scores</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add-teams.php">Add Teams</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="add-players.php">Add Players</span></a>
      </li>
    </ul>
  </div>
</nav>



<div class="d-flex justify-content-center pt-5">
<form action="" method="post" class="w-50">

<div class="form-group">
  <label for="player">Player:</label>
  <input type="text" class="form-control" name="player">
</div>

<div class="form-group">
  <label for="playerTeam">Player's Team:</label>
  <select class="browser-default custom-select" name = "playerTeamSelect">
    <option disabled selected>-- Select home team --</option>
    <?php
        $records = mysqli_query($con, "SELECT team_name FROM `teams` ORDER BY team_name ASC");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['team_name'] ."'>" .$data['team_name'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>

</div>


<button type="submit" class="btn btn-primary" name="createPlayer">Submit</button>
</form>
</div>

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
