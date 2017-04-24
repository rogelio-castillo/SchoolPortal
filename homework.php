<?php
    mysql_connect('localhost', 'root', '');
    mysql_select_db('parent_teacher');
$sql="SELECT * FROM homework";
$contents=mysql_query($sql);
?>
    <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
                    <title>Bootstrap 101 Template</title>
                    
                    <!-- Bootstrap -->
                    <link href="_css/bootstrap.min.css" rel="stylesheet">
                        
                        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
                        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
                        <!--[if lt IE 9]>
                         <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
                         <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                         <![endif]-->
                        </head>
    <body>
        
        <div class ="container">
            <h1>Parent Screen</h1>
            <table width = "600" border="1" cellpadding="1" cellspacing="1">
                    <tr>
                        <th>Subject</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Due Date</th>
                    <tr>
                    <!--Use a while loop to make a table row for every DB row-->
                    <?php
                        while ($homework =mysql_fetch_assoc($contents)){
                            echo "<tr>";
                            echo "<td>".$homework['subject']."</td>";
                            echo "<td>".$homework['title']."</td>";
                            echo "<td>".$homework['description']."</td>";
                            echo "<td>".$homework['dueDate']."</td>";
                            echo "</tr>";
                        }
                    ?>
            </table>
            
     <hr>
     
        <div class ="container">
            <h1>HOMEWORK (Teacher Screen)</h1>
            <h2>Create new assignment</h2>
            <form action="homework.php" method="post">
                  <div class="form-group">
                        <label for="name">Subject:</label>
                        <input type="text" id="subject" name="subject" class="form-control"placeholder="Enter the subject of the homework (eg. 'Math')">
                        </div>
                <div class="form-group">
                        <label for="name">Title:</label>
                            <input type="text" id="title" name="title" class="form-control"placeholder="Enter title of the homework">
                            </div>
                  <div class="form-group">
                        <label for="msg">Description:</label>
                        <input type= "text" class="form-control" textarea id="msg" name="description" placeholder="Enter a short description of the assignment here"></textarea>
                    </div>
                <div class="form-group">
                        <label for="name">Due Date:</label>
                            <input type="text" id="dueDate" name="dueDate" class="form-control"placeholder="(day/month/year)">
                            </div>
                
                  <button name = "add" type="submit" class="btn btn-primary" style="margin: 10px auto;">Send</button>
            </form>
        
        <hr>
        
      
        
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="_js/bootstrap.min.js"></script>
    </body>
</html>