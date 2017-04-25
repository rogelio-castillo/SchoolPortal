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

    <title>Homework</title>
	
	<!-- Bootstrap Date-Picker Plugin -->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
	
    </head>
	
    <body>
        <?php require_once("_files/menu.php");
            $sql="SELECT * FROM Homework JOIN class ON class.classid=Homework.classid ORDER by `dueDate` ASC";
            $result=$db->query($sql);
        ?>
        <div class ="container myContent">
            <h1>Homework</h1>
			<p>Homework assignments are listed below.</p>
            <table class ="table">
                    <thead>
					<tr>
                        <th>Subject</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Due Date</th>
                    <tr>
					</thead>
                    <!--Use a while loop to make a table row for every DB row-->
                    <?php 
                        while ($rows=$db->fetch_array($result)){
                            echo "<tr>";
                            echo "<td>".$rows['className']."</td>";
                            echo "<td>".$rows['title']."</td>";
                            echo "<td>".$rows['description']."</td>";
                            echo "<td>".$rows['dueDate']."</td>";
                            echo "</tr>";
                        }
                        ?>
            </table>


    <?php
        if($user->type==1){ ?>

            <h2>Assignment Posting</h2>
            <p>Create a new homework post with the form below.</p>
			<form action="helper.php?classid=<?php echo $classid; ?>" method= "POST">
		<div class="form-group">
			<label for="name">Title:</label>
			<input type="text" name="title" class="form-control" id="title" placeholder="Enter title of the homework">
		</div>
		<div class="form-group">
			<label for="msg">Description:</label>
			<textarea class="form-control" name="description" rows="2" id="msg" placeholder="Enter a short description of the assignment here"></textarea>
		</div>
		<div class="form-group bootstrap-iso"> <!-- Date input -->
			<label class= "control-label" for="dueDate">Due Date:</label>
			<input type="text" name="dueDate" class="form-control" id="dueDate" placeholder="YYYY/MM/DD">
		</div>
		<button type="submit" name= "add" class="btn btn-mainbutton">Send</button>
	</form>
    <?php } ?>

	</div> <!-- /.container -->
    <div class="footer">
	<p>&copy; 2017 CHR Portal</p>
	</div>
 
        <script>
            $(document).ready(function(){
                var date_input=$('input[name="dueDate"]'); //our date input has the name "date"
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