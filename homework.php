<?php
    require_once("_includes/init.php");

    if(!User::isLoggedIn()){
        redirect_to("index.php");
    }
    $user = User::userinfo();
    if (!isset($_GET["classid"]) || !_class::isvalid($_GET["classid"])){
        redirect_to("userinfo.php");
    }
    $classid = $_GET["classid"];
	
    require_once("_files/header.php");
    ?>

    <title>HOMEWORK</title>
    <body>
        <?php require_once("_files/menu.php");
            $sql="SELECT * FROM Homework";
            $result=$db->query($sql);
        ?>
        <div class ="container">
            <h1>Current Homework</h1>
            <table width = "800" border="1" cellpadding="1" cellspacing="1">
                    <tr>
                        <th>Subject</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Due Date</th>
                    <tr>
                    <!--Use a while loop to make a table row for every DB row-->
                    <?php
                        while ($rows=$db->fetch_array($result)){
                            echo "<tr>";
                            echo "<td>".$rows['subject']."</td>";
                            echo "<td>".$rows['title']."</td>";
                            echo "<td>".$rows['description']."</td>";
                            echo "<td>".$rows['dueDate']."</td>";
                            echo "</tr>";
                        }
                        ?>
            </table>

     <hr>

    <?php
        if($user->type==1){ ?>

        <div class ="container">
            <h1>HOMEWORK (Teacher Screen)</h1>
            <h2>Create new assignment</h2>
            <form action="helper.php" method="post">
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
                            <input type="text" id="dueDate" name="dueDate" class="form-control"placeholder="YYYY/MM/DD">
                            </div>
                
                  <button name = "add" type="submit" class="btn btn-primary" style="margin: 10px auto;">Send</button>
            </form>
    <?php } ?>
        
        <hr>
    <?php require_once("_files/footer.php"); ?>
        <script>
            $(document).ready(function(){
                var date_input=$('input[name="date"]'); //our date input has the name "date"
                var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                var options={
                    format: 'yyyy/mm/dd',
                    //format: 'mm/dd/yyyy',
                    container: container,
                    todayHighlight: true,
                    autoclose: true,
                };
                date_input.datepicker(options);
            });
        </script>
    </body>
</html>