<?php
    mysql_connect('localhost', 'root', '');
    mysql_select_db('parent_teacher');
$sql="SELECT * FROM homework";
$contents=mysql_query($sql);
?>
    <!DOCTYPE html>

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
        
      
        

    </body>
</html>