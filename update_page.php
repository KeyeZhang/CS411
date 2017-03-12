<?php
session_start();
include 'dbh.php';
$currid = $_SESSION['id'];
?>


<!DOCTYPE html>

<html>
    
    <head>
        
        <link href="https://fonts.googleapis.com/css?family=Raleway:400, 600" rel="stylesheet">
            
            <link href="style.css" type="text/css" rel="stylesheet">
                
                </head>
    
    <body>
        
        <div class="header">
            
            <div class="container">
                
                <ul class="nav">
                    
                        <?php
                            if (isset($_SESSION['id'])) {
                                ?>
                        <a class="afterlogin" href='./logout.php'><li>Log out</li></a>
                        <a href="./signup_page.php"><li>Sign up</li></a>
                        <a href="./index.php"><li>Search</li></a>
                        <li>Contact</li>
                        <a class="afterlogin" href='./update_page.php'><li>Profile</li></a>
                        <?php
                            }
                            else {
                                ?>
                        <a href ="./login_page.php"><li>Log in</li></a>
                        <a href="./signup_page.php"><li>Sign up</li></a>
                        <a href="./index.php"><li>Search</li></a>
                        <li>Contact</li>
                        <?php
                            }
                            ?>


                </ul>

            </div>

        </div>


        <div class="jumbotron2">

            <div class="container">

                <div class="main">

                    <h1>Update your Profile</h1>


                </div>

            </div>

        </div>

<br><br>
<br><br>



<div style="width: 100%; overflow:auto;">
<center>
<form action="update_preference.php" method="post" target="_blank">
<table style="border:dotted;border-color:#735450；margin-top:4px;margin-left:4px;margin-right:4px;margin-bottom:4px;">
<tr><th>Account Information</th></tr>


<tr><td>
Change username:
<input type="text" name="username" placeholder="
<?php
    $sql_user= "SELECT username FROM user WHERE id = $currid";
    $result=mysqli_query($conn, $sql_user);
    while($row=mysqli_fetch_assoc($result))
    {
        echo $row["username"];
        
    }
    mysqli_free_result($result);
    ?>

" class="searcher">
</td></tr>


<tr><td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Change email:
<input type="text" name="email" placeholder="
<?php
    
    $sql_email= "SELECT email FROM user WHERE id = $currid";
    $result1=mysqli_query($conn, $sql_email);
    while($row=mysqli_fetch_assoc($result1))
    {
        echo $row["email"];
        
    }
    mysqli_free_result($result1);
    ?>

"class="searcher">
</td></tr>


<tr><td>Change password:
<input type="password" name="password" class="searcher"></td></tr>

<tr><td>
Password confirm:
<input type="password" name="password" class="searcher"></td></tr>


</table>
<button type="submit" class = "btn-submit">update</button>
</form>
</center>
<br><br><br><br><br>

<center>
<form action="update_player.php" method="post" target="_blank">

<table style="border:dotted;border-color:#735450；margin-top:4px;margin-left:4px;margin-right:4px;margin-bottom:4px;">
<tr><th>Favorite Players</th></tr>
<?php
    $q= "SELECT Players_Name FROM Favorite_player WHERE Users_ID = $currid";
    $result=mysqli_query($conn,$q);
    $count = 0;
   
    while($row=mysqli_fetch_assoc($result))
    {
        $count++;
        if($row){
        echo"<tr><td><input type='text' name='fplayer" .$count. "' placeholder = ' " . $row["Players_Name"]. " ' class='searcher'>"."</td></tr>";
        }
        
        
    }
    
    ?>

</table>
<button type="submit" class = "btn-submit">update</button>
</form>
</center>
<br><br><br><br><br>

<center>
<form action="update_team.php" method="post" target="_blank">

<table style="border:dotted;border-color:#735450；margin-top:4px;margin-left:4px;margin-right:4px;margin-bottom:4px;">
<tr><th>Favorite Teams</th></tr>
<?php
    
    $q= "SELECT Teams_Name FROM Favorite_team WHERE Users_ID = $currid";
    $result=mysqli_query($conn,$q);
    $count = 0;
    
    while($row=mysqli_fetch_assoc($result))
    {
        $count++;
        if($row){
            echo"<tr><td><input type='text' name='fteam" .$count. "' placeholder = ' " . $row["Teams_Name"]. " ' class='searcher'>"."</td></tr>";
            
        }
    }
    ?>
</table>
<button type="submit" class = "btn-submit">update</button>
</form>
</center>

</div>


        <div class="supporting">

            <div class="container">



                <div class="col">

                    <img src="https://img.clipartfest.com/fe6512cbe424f39449e93e935992ddb9_basketball-black-and-white-basketball-black-and-white-clipart_843-688.jpeg">

                        <h2>NBA Official Site</h2>

                        <p>Make your projects look great and interact beautifully.</p>

                        <a class="btn-default" href="http://www.nba.com" target = "_blank">Learn more</a>

                        </div>



                <div class="col">

                    <img src="https://image.freepik.com/free-icon/quarter-pie-piece-in-circular-graph_318-28979.jpg">

                        <h2>Statistic</h2>

                        <p>Use modern tools to turn your design into a web site</p>

                        <a class="btn-default" href="http://sports.yahoo.com/nba/stats/" target = "_blank">Learn more</a>
                        
                        </div>
                
                
                
                <div class="col">
                    
                    <img src="https://pbs.twimg.com/profile_images/462244617321062400/ZU9gWQ4j_400x400.png" >
                        
                        <h2>Shaqtin' a Fool</h2>
                        
                        <p>Use modern tools to turn your design into a web site</p>
                        
                        <a class="btn-default" href="http://www.nba.com/fool" target = "_blank">Learn more</a>
                        
                        </div>
                
                
                
            </div>
            
            <div class="clearfix"></div>
            
        </div>
        
        
        
        <div class="footer">
            
            <div class="container">
                
                <p>&copy; NBA Game On 2017</p>
                
            </div>
            
        </div>
        


    </body>

</html>







