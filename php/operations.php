<?php

require_once("db.php");


$con = createdb();


if(isset($_POST['create'])){
    createData();
}

if(isset($_POST['scores'])){
    updateScores();
}



//create button click

function createData(){
    $team = $_POST['team'];
    $sql = "INSERT INTO teams(team_name)
                VALUES('$team')";

    if($team){

        $check=mysqli_query($GLOBALS['con'],"select * from teams where team_name='$team'");
        $checkrows=mysqli_num_rows($check);

   if($checkrows>0) {
    echo '<script>alert("Team already exists"); location = "http://localhost/league-table/add-teams.php"</script>';
      exit;
   } else {
    $sql = "INSERT INTO teams(team_name)
    VALUES('$team')";
    
   }

        if(mysqli_query($GLOBALS['con'], $sql)){

            TextNode("Success", "Record Successfully inserted...!");
            
        }else{
            echo "Error";
        }
    }else {
        TextNode("error", "Provide data in the text box");
    }
}



//messages function
function TextNode($classname, $msg){
    $element="<h6 class='$classname'>$msg</h6>";
    echo $element;
}


//retrieve data
function retrieveData(){
    $sql = "SELECT * from teams 
            ORDER BY points DESC, goal_difference DESC, team_name ASC";

    $result = mysqli_query($GLOBALS['con'],$sql);

    if(mysqli_num_rows($result)>0){
        return $result;
    }
}


//update scores

function updateScores(){  
        $homeTeam = $_POST['homeSelect'];  // Storing Selected Value In Variable
        $awayTeam = $_POST['awaySelect'];  // Storing Selected Value In Variable

        $homeTeamScore = $_POST['homeTeamScore'];
        $awayTeamScore = $_POST['awayTeamScore'];

        $retrievedHomeId = "";
        $retrievedAwayId ="";
        $retrievedHomePoints ="";
        $newHomePoints = "";
        $retrievedAwayPoints = "";
        $newAwayPoints = "";
        $homeGoalsFor = "";
        $retrievedHomeGoalsFor = "";
        $retrievedHomeGoalsAgainst = "";
        $newHomeGoalsFor = "";
        $newHomeGoalsAgainst = "";
        $homeGoalsAgainst = "";
        $homeGoalDifference = "";
        $newHomeGoalDifference = "";
        $awayGoalsFor = "";
        $awayGoalsAgainst = "";
        $awayGoalDifference = "";
        $newAwayGoalDifference = "";
        $retrievedHomeGoalDifference = "";
        $newHomeGoalDifference = "";
        $retrievedAwayGoalDifference = "";
        $newAwayGoalDifference = "";
        $retrievedHomeMatchesPlayed = "";
        $retrievedAwayMatchesPlayed = "";
        $newHomeMatchesPlayed = "";
        $newHomeMatchesPlayed = "";
        $retrievedHomeTeamMatchesWon = "";
        $newHomeTeamMatchesWon = "";
        $retrievedAwayTeamMatchesLost= "";
        $newAwayTeamMatchesLost = "";
        $retrievedAwayTeamMathesWon = "";
        $newAwayTeamMathesLost = "";
        $retrievedHomeTeamMatchesLost = "";
        $newHomeTeamMatchesLost = "";
        $retrievedHomeTeamMatchesDrawn = "";
        $newHomeTeamMatchesDrawn = "";
        $retrievedAwayTeamMatchesDrawn = "";
        $newAwayTeamMatchesDrawn = "";
        $retrievedCorrespondingHomeTeamMatchesLost= "";
        $newCorrespondingHomeTeamMatchesLost = "";
        $retrievedCorrespondingAwayTeamMatchesLost= "";
        $newCorrespondingAwayTeamMatchesLost = "";
        $retrievedCorrespondingHomeTeamMatchesWon= "";
        $newCorrespondingHomeTeamMatchesWon = "";

        //give the selected home team 3 points and away team 0 if it scored more goals and update their last_match to W (win) and Lose (Loss) respectively
        
        if($homeTeam != $awayTeam){
  
        if($homeTeamScore > $awayTeamScore && $awayTeamScore < $homeTeamScore && $homeTeam && $awayTeam && isset($_POST["homeTeamScore"]) && $_POST["homeTeamScore"] !== ""&& isset($_POST["awayTeamScore"]) && $_POST["awayTeamScore"] !== ""){
            
            $homeIdArray=mysqli_query($GLOBALS['con'],"select id FROM teams where team_name='$homeTeam'");
            while ($row = $homeIdArray->fetch_assoc()){
            $retrievedHomeId = $row['id'];
             }

             $awayIdArray=mysqli_query($GLOBALS['con'],"select id FROM teams where team_name='$awayTeam'");
            while ($row = $awayIdArray->fetch_assoc()){
            $retrievedAwayId = $row['id'];

             }
                
             $homePointsArray=mysqli_query($GLOBALS['con'],"select points FROM teams where team_name='$homeTeam'");
            while ($row = $homePointsArray->fetch_assoc()){
            $retrievedHomePoints= $row['points'];

            $newHomePoints = $retrievedHomePoints + 3;

             }
            
             $awayPointsArray=mysqli_query($GLOBALS['con'],"select points FROM teams where team_name='$awayTeam'");
             while ($row = $awayPointsArray->fetch_assoc()){
             $retrievedAwayPoints= $row['points'];

             $newAwayPoints = $retrievedAwayPoints + 0;
 
              }

            $homeGoalsForArray=mysqli_query($GLOBALS['con'],"select goals_for FROM teams where team_name='$homeTeam'");
             while ($row = $homeGoalsForArray->fetch_assoc()){
             $retrievedHomeGoalsFor= $row['goals_for'];

             $newHomeGoalsFor = $retrievedHomeGoalsFor + $homeTeamScore;
 
              }

            $awayGoalsForArray=mysqli_query($GLOBALS['con'],"select goals_for FROM teams where team_name='$awayTeam'");
            while ($row = $awayGoalsForArray->fetch_assoc()){
            $retrievedAwayGoalsFor= $row['goals_for'];

            $newAwayGoalsFor = $retrievedAwayGoalsFor + $awayTeamScore;

            }

            $homeGoalsAgainstArray=mysqli_query($GLOBALS['con'],"select goals_against FROM teams where team_name='$homeTeam'");
             while ($row = $homeGoalsAgainstArray->fetch_assoc()){
             $retrievedHomeGoalsAgainst= $row['goals_against'];

             $newHomeGoalsAgainst = $retrievedHomeGoalsAgainst + $awayTeamScore;
 
              }

            $awayGoalsAgainstArray=mysqli_query($GLOBALS['con'],"select goals_against FROM teams where team_name='$awayTeam'");
            while ($row = $awayGoalsAgainstArray->fetch_assoc()){
            $retrievedAwayGoalsAgainst= $row['goals_against'];

            $newAwayGoalsAgainst = $retrievedAwayGoalsAgainst + $homeTeamScore;

            }


            $homeGoalDifferenceArray=mysqli_query($GLOBALS['con'],"select goal_difference FROM teams where team_name='$homeTeam'");
             while ($row = $homeGoalDifferenceArray->fetch_assoc()){
             $retrievedHomeGoalDifference= $row['goal_difference'];

             $newHomeGoalDifference = $newHomeGoalsFor - $newHomeGoalsAgainst;
 
              }

            $awayGoalDifferenceArray=mysqli_query($GLOBALS['con'],"select goal_difference FROM teams where team_name='$awayTeam'");
            while ($row = $awayGoalDifferenceArray->fetch_assoc()){
            $retrievedAwayGoalDifference= $row['goal_difference'];

            $newAwayGoalDifference = $newAwayGoalsFor - $newAwayGoalsAgainst;

            $homeMatchesPlayedArray=mysqli_query($GLOBALS['con'],"select matches_played FROM teams where team_name='$homeTeam'");
            while ($row = $homeMatchesPlayedArray->fetch_assoc()){
            $retrievedHomeMatchesPlayed= $row['matches_played'];
            $newHomeMatchesPlayed = $retrievedHomeMatchesPlayed + 1;
            }


            $awayMatchesPlayedArray=mysqli_query($GLOBALS['con'],"select matches_played FROM teams where team_name='$awayTeam'");
            while ($row = $awayMatchesPlayedArray->fetch_assoc()){
            $retrievedAwayMatchesPlayed= $row['matches_played'];
            $newAwayMatchesPlayed = $retrievedAwayMatchesPlayed + 1;
            }

            $homeTeamMatchesWonArray=mysqli_query($GLOBALS['con'],"select won FROM teams where team_name='$homeTeam'");
            while ($row = $homeTeamMatchesWonArray->fetch_assoc()){
            $retrievedHomeTeamMatchesWon= $row['won'];
            $newHomeTeamMatchesWon = $retrievedHomeTeamMatchesWon + 1;
            }

            $correspondingHomeTeamMatchesLostArray=mysqli_query($GLOBALS['con'],"select lost FROM teams where team_name='$homeTeam'");
            while ($row = $correspondingHomeTeamMatchesLostArray->fetch_assoc()){
            $retrievedCorrespondingHomeTeamMatchesLost= $row['lost'];
            $newCorrespondingHomeTeamMatchesLost = $retrievedCorrespondingHomeTeamMatchesLost;
            }

            $awayTeamMatchesLostArray=mysqli_query($GLOBALS['con'],"select lost FROM teams where team_name='$awayTeam'");
            while ($row = $awayTeamMatchesLostArray->fetch_assoc()){
            $retrievedAwayTeamMatchesLost= $row['lost'];
            $newAwayTeamMatchesLost = $retrievedAwayTeamMatchesLost + 1;
            }

            $correspondingAwayTeamMatchesWonArray=mysqli_query($GLOBALS['con'],"select won FROM teams where team_name='$awayTeam'");
            while ($row = $correspondingAwayTeamMatchesWonArray->fetch_assoc()){
            $retrievedCorrespondingAwayTeamMatchesWon= $row['won'];
            $newCorrespondingAwayTeamMatchesWon = $retrievedCorrespondingAwayTeamMatchesWon;
            }
            

            }
            
            $sql = "
            INSERT INTO teams
            (id, team_name, matches_played, won, lost, points, goals_for, goals_against, goal_difference, last_match)
            VALUES 
                ('$retrievedHomeId', '$homeTeam', '$newHomeMatchesPlayed', '$newHomeTeamMatchesWon', '$newCorrespondingHomeTeamMatchesLost', '$newHomePoints', '$newHomeGoalsFor', '$newHomeGoalsAgainst', '$newHomeGoalDifference', 'W'),
                ('$retrievedAwayId', '$awayTeam', '$newAwayMatchesPlayed', '$newCorrespondingAwayTeamMatchesWon', '$newAwayTeamMatchesLost', '$newAwayPoints', '$newAwayGoalsFor', '$newAwayGoalsAgainst', '$newAwayGoalDifference', 'L')
          
            ON DUPLICATE KEY UPDATE 
                team_name = VALUES(team_name),
                matches_played = VALUES(matches_played),
                won = VALUES(won),
                lost = VALUES(lost),
                points = VALUES (points),
                goals_for = VALUES(goals_for),
                goals_against = VALUES(goals_against),
                goal_difference = VALUES(goal_difference),
                last_match = VALUES(last_match);
                

      ";
      if(mysqli_query($GLOBALS['con'],$sql)){
          TextNode("success", "Data successfully updated");
      }else{
          TextNode("error", "Unable to Update Data");
      }
              
              
        }

        
        //give the selected away team 3 points and home team 0 if it scored more goals and update their last_match to W (win) and Lose (Loss) respectively
        if($awayTeamScore > $homeTeamScore && $homeTeam && $awayTeam && isset($_POST["homeTeamScore"]) && $_POST["homeTeamScore"] !== ""&& isset($_POST["awayTeamScore"]) && $_POST["awayTeamScore"] !== ""){
            
            $homeIdArray=mysqli_query($GLOBALS['con'],"select id FROM teams where team_name='$homeTeam'");
            while ($row = $homeIdArray->fetch_assoc()){
            $retrievedHomeId = $row['id'];
             }

             $awayIdArray=mysqli_query($GLOBALS['con'],"select id FROM teams where team_name='$awayTeam'");
            while ($row = $awayIdArray->fetch_assoc()){
            $retrievedAwayId = $row['id'];

             }
                
             $homePointsArray=mysqli_query($GLOBALS['con'],"select points FROM teams where team_name='$homeTeam'");
            while ($row = $homePointsArray->fetch_assoc()){
            $retrievedHomePoints= $row['points'];

            $newHomePoints = $retrievedHomePoints + 0;

             }
            
             $awayPointsArray=mysqli_query($GLOBALS['con'],"select points FROM teams where team_name='$awayTeam'");
             while ($row = $awayPointsArray->fetch_assoc()){
             $retrievedAwayPoints= $row['points'];

             $newAwayPoints = $retrievedAwayPoints + 3;
 
              }

            $homeGoalsForArray=mysqli_query($GLOBALS['con'],"select goals_for FROM teams where team_name='$homeTeam'");
             while ($row = $homeGoalsForArray->fetch_assoc()){
             $retrievedHomeGoalsFor= $row['goals_for'];

             $newHomeGoalsFor = $retrievedHomeGoalsFor + $homeTeamScore;
 
              }

            $awayGoalsForArray=mysqli_query($GLOBALS['con'],"select goals_for FROM teams where team_name='$awayTeam'");
            while ($row = $awayGoalsForArray->fetch_assoc()){
            $retrievedAwayGoalsFor= $row['goals_for'];

            $newAwayGoalsFor = $retrievedAwayGoalsFor + $awayTeamScore;

            }

            $homeGoalsAgainstArray=mysqli_query($GLOBALS['con'],"select goals_against FROM teams where team_name='$homeTeam'");
             while ($row = $homeGoalsAgainstArray->fetch_assoc()){
             $retrievedHomeGoalsAgainst= $row['goals_against'];

             $newHomeGoalsAgainst = $retrievedHomeGoalsAgainst + $awayTeamScore;
 
              }

            $awayGoalsAgainstArray=mysqli_query($GLOBALS['con'],"select goals_against FROM teams where team_name='$awayTeam'");
            while ($row = $awayGoalsAgainstArray->fetch_assoc()){
            $retrievedAwayGoalsAgainst= $row['goals_against'];

            $newAwayGoalsAgainst = $retrievedAwayGoalsAgainst + $homeTeamScore;

            }


            $homeGoalDifferenceArray=mysqli_query($GLOBALS['con'],"select goal_difference FROM teams where team_name='$homeTeam'");
             while ($row = $homeGoalDifferenceArray->fetch_assoc()){
             $retrievedHomeGoalDifference= $row['goal_difference'];

             $newHomeGoalDifference = $newHomeGoalsFor - $newHomeGoalsAgainst;
 
              }

            $awayGoalDifferenceArray=mysqli_query($GLOBALS['con'],"select goal_difference FROM teams where team_name='$awayTeam'");
            while ($row = $awayGoalDifferenceArray->fetch_assoc()){
            $retrievedAwayGoalDifference= $row['goal_difference'];

            $newAwayGoalDifference = $newAwayGoalsFor - $newAwayGoalsAgainst;

            $homeMatchesPlayedArray=mysqli_query($GLOBALS['con'],"select matches_played FROM teams where team_name='$homeTeam'");
            while ($row = $homeMatchesPlayedArray->fetch_assoc()){
            $retrievedHomeMatchesPlayed= $row['matches_played'];
            $newHomeMatchesPlayed = $retrievedHomeMatchesPlayed + 1;
            }


            $awayMatchesPlayedArray=mysqli_query($GLOBALS['con'],"select matches_played FROM teams where team_name='$awayTeam'");
            while ($row = $awayMatchesPlayedArray->fetch_assoc()){
            $retrievedAwayMatchesPlayed= $row['matches_played'];
            $newAwayMatchesPlayed = $retrievedAwayMatchesPlayed + 1;
            }

            $awayTeamMatchesWonArray=mysqli_query($GLOBALS['con'],"select won FROM teams where team_name='$awayTeam'");
            while ($row = $awayTeamMatchesWonArray->fetch_assoc()){
            $retrievedAwayTeamMatchesWon= $row['won'];
            $newAwayTeamMatchesWon = $retrievedAwayTeamMatchesWon + 1;
            }

            $correspondingAwayTeamMatchesLostArray=mysqli_query($GLOBALS['con'],"select lost FROM teams where team_name='$awayTeam'");
            while ($row = $correspondingAwayTeamMatchesLostArray->fetch_assoc()){
            $retrievedCorrespondingAwayTeamMatchesLost= $row['lost'];
            $newCorrespondingAwayTeamMatchesLost = $retrievedCorrespondingAwayTeamMatchesLost;
            }


            $homeTeamMatchesLostArray=mysqli_query($GLOBALS['con'],"select lost FROM teams where team_name='$homeTeam'");
            while ($row = $homeTeamMatchesLostArray->fetch_assoc()){
            $retrievedHomeTeamMatchesLost= $row['lost'];
            $newHomeTeamMatchesLost = $retrievedHomeTeamMatchesLost + 1;
            }

            $correspondingHomeTeamMatchesWonArray=mysqli_query($GLOBALS['con'],"select won FROM teams where team_name='$homeTeam'");
            while ($row = $correspondingHomeTeamMatchesWonArray->fetch_assoc()){
            $retrievedCorrespondingHomeTeamMatchesWon= $row['won'];
            $newCorrespondingHomeTeamMatchesWon = $retrievedCorrespondingHomeTeamMatchesWon;
            }
            
            

            }
              
            $sql = "
            INSERT INTO teams
            (id, team_name, matches_played, won, lost, points, goals_for, goals_against, goal_difference, last_match)
            VALUES 
                
                ('$retrievedAwayId', '$awayTeam', '$newAwayMatchesPlayed', '$newAwayTeamMatchesWon', '$newCorrespondingAwayTeamMatchesLost', '$newAwayPoints', '$newAwayGoalsFor', '$newAwayGoalsAgainst', '$newAwayGoalDifference', 'W'),
                ('$retrievedHomeId', '$homeTeam', '$newHomeMatchesPlayed', '$newCorrespondingHomeTeamMatchesWon', '$newHomeTeamMatchesLost', '$newHomePoints', '$newHomeGoalsFor', '$newHomeGoalsAgainst', '$newHomeGoalDifference', 'L')

            ON DUPLICATE KEY UPDATE 
                team_name = VALUES(team_name),
                matches_played = VALUES(matches_played),
                won = VALUES(won),
                lost= VALUES(lost),
                points = VALUES (points),
                goals_for = VALUES(goals_for),
                goals_against = VALUES(goals_against),
                goal_difference = VALUES(goal_difference),
                last_match = VALUES(last_match);
                  

        ";
        if(mysqli_query($GLOBALS['con'],$sql)){
            TextNode("success", "Data successfully updated");
        }else{
            TextNode("error", "Unable to Update Data");
        }
              
        }



                //give both teams one point if they draw and update their last_match to D (Draw)
                if($awayTeamScore == $homeTeamScore && $homeTeam && $awayTeam && isset($_POST["homeTeamScore"]) && $_POST["homeTeamScore"] !== ""&& isset($_POST["awayTeamScore"]) && $_POST["awayTeamScore"] !== ""){
            
                    $homeIdArray=mysqli_query($GLOBALS['con'],"select id FROM teams where team_name='$homeTeam'");
                    while ($row = $homeIdArray->fetch_assoc()){
                    $retrievedHomeId = $row['id'];
                     }
        
                     $awayIdArray=mysqli_query($GLOBALS['con'],"select id FROM teams where team_name='$awayTeam'");
                    while ($row = $awayIdArray->fetch_assoc()){
                    $retrievedAwayId = $row['id'];
        
                     }
                        
                     $homePointsArray=mysqli_query($GLOBALS['con'],"select points FROM teams where team_name='$homeTeam'");
                    while ($row = $homePointsArray->fetch_assoc()){
                    $retrievedHomePoints= $row['points'];
        
                    $newHomePoints = $retrievedHomePoints + 1;
        
                     }
                    
                     $awayPointsArray=mysqli_query($GLOBALS['con'],"select points FROM teams where team_name='$awayTeam'");
                     while ($row = $awayPointsArray->fetch_assoc()){
                     $retrievedAwayPoints= $row['points'];
        
                     $newAwayPoints = $retrievedAwayPoints + 1;
         
                      }
        
                    $homeGoalsForArray=mysqli_query($GLOBALS['con'],"select goals_for FROM teams where team_name='$homeTeam'");
                     while ($row = $homeGoalsForArray->fetch_assoc()){
                     $retrievedHomeGoalsFor= $row['goals_for'];
        
                     $newHomeGoalsFor = $retrievedHomeGoalsFor + $homeTeamScore;
         
                      }
        
                    $awayGoalsForArray=mysqli_query($GLOBALS['con'],"select goals_for FROM teams where team_name='$awayTeam'");
                    while ($row = $awayGoalsForArray->fetch_assoc()){
                    $retrievedAwayGoalsFor= $row['goals_for'];
        
                    $newAwayGoalsFor = $retrievedAwayGoalsFor + $awayTeamScore;
        
                    }
        
                    $homeGoalsAgainstArray=mysqli_query($GLOBALS['con'],"select goals_against FROM teams where team_name='$homeTeam'");
                     while ($row = $homeGoalsAgainstArray->fetch_assoc()){
                     $retrievedHomeGoalsAgainst= $row['goals_against'];
        
                     $newHomeGoalsAgainst = $retrievedHomeGoalsAgainst + $awayTeamScore;
         
                      }
        
                    $awayGoalsAgainstArray=mysqli_query($GLOBALS['con'],"select goals_against FROM teams where team_name='$awayTeam'");
                    while ($row = $awayGoalsAgainstArray->fetch_assoc()){
                    $retrievedAwayGoalsAgainst= $row['goals_against'];
        
                    $newAwayGoalsAgainst = $retrievedAwayGoalsAgainst + $homeTeamScore;
        
                    }
        
        
                    $homeGoalDifferenceArray=mysqli_query($GLOBALS['con'],"select goal_difference FROM teams where team_name='$homeTeam'");
                     while ($row = $homeGoalDifferenceArray->fetch_assoc()){
                     $retrievedHomeGoalDifference= $row['goal_difference'];
        
                     $newHomeGoalDifference = $newHomeGoalsFor - $newHomeGoalsAgainst;
         
                      }
        
                    $awayGoalDifferenceArray=mysqli_query($GLOBALS['con'],"select goal_difference FROM teams where team_name='$awayTeam'");
                    while ($row = $awayGoalDifferenceArray->fetch_assoc()){
                    $retrievedAwayGoalDifference= $row['goal_difference'];
        
                    $newAwayGoalDifference = $newAwayGoalsFor - $newAwayGoalsAgainst;
        
                    $homeMatchesPlayedArray=mysqli_query($GLOBALS['con'],"select matches_played FROM teams where team_name='$homeTeam'");
                    while ($row = $homeMatchesPlayedArray->fetch_assoc()){
                    $retrievedHomeMatchesPlayed= $row['matches_played'];
                    $newHomeMatchesPlayed = $retrievedHomeMatchesPlayed + 1;
                    }
        
        
                    $awayMatchesPlayedArray=mysqli_query($GLOBALS['con'],"select matches_played FROM teams where team_name='$awayTeam'");
                    while ($row = $awayMatchesPlayedArray->fetch_assoc()){
                    $retrievedAwayMatchesPlayed= $row['matches_played'];
                    $newAwayMatchesPlayed = $retrievedAwayMatchesPlayed + 1;
                    }

                    $homeTeamMatchesDrawnArray=mysqli_query($GLOBALS['con'],"select drawn FROM teams where team_name='$homeTeam'");
                    while ($row = $homeTeamMatchesDrawnArray->fetch_assoc()){
                    $retrievedHomeTeamMatchesDrawn= $row['drawn'];
                    $newHomeTeamMatchesDrawn = $retrievedHomeTeamMatchesDrawn + 1;
                    }

                    $awayTeamMatchesDrawnArray=mysqli_query($GLOBALS['con'],"select drawn FROM teams where team_name='$awayTeam'");
                    while ($row = $awayTeamMatchesDrawnArray->fetch_assoc()){
                    $retrievedAwayTeamMatchesDrawn= $row['drawn'];
                    $newAwayTeamMatchesDrawn = $retrievedAwayTeamMatchesDrawn + 1;
                    }

                    
        
                    }
                      
                      $sql = "
                      INSERT INTO teams
                      (id, team_name, matches_played, drawn, points, goals_for, goals_against, goal_difference, last_match)
                      VALUES 
                          ('$retrievedHomeId', '$homeTeam', '$newHomeMatchesPlayed', '$newHomeTeamMatchesDrawn', '$newHomePoints', '$newHomeGoalsFor', '$newHomeGoalsAgainst', '$newHomeGoalDifference', 'D'),
                          ('$retrievedAwayId', '$awayTeam', '$newAwayMatchesPlayed', '$newAwayTeamMatchesDrawn', '$newAwayPoints', '$newAwayGoalsFor', '$newAwayGoalsAgainst', '$newAwayGoalDifference', 'D')
                    
                      ON DUPLICATE KEY UPDATE 
                          team_name = VALUES(team_name),
                          matches_played = VALUES(matches_played),
                          drawn = VALUES(drawn),
                          points = VALUES (points),
                          goals_for = VALUES(goals_for),
                          goals_against = VALUES(goals_against),
                          goal_difference = VALUES(goal_difference),
                          last_match = VALUES(last_match);
                          
        
                ";
                if(mysqli_query($GLOBALS['con'],$sql)){
                    TextNode("success", "Data successfully updated");
                }else{
                    TextNode("error", "Unable to Update Data");
                }
                                    
                }

                
            }else{    
            echo '<script>alert("You cannot select the same team twice"); location = "http://localhost/league-table/update-scores.php"</script>';
        }


                
            
}

