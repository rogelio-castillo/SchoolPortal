<?php 
	require_once("_includes/init.php");
	//printA($_POST);die;
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
    
	<title>To-do list</title>
	
		<!--  jQuery -->
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

		<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
		<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

		<!-- Bootstrap Date-Picker Plugin -->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
	
    </head>

  <body>
  
    <?php require_once("_files/menu.php"); 
		
		//Selects all table contents by class id
		$sql = "SELECT * FROM todolist 
				JOIN class ON class.classid=todolist.classid
				WHERE todolist.classid='{$classid}' AND date>NOW() ORDER BY date ASC";
		$result=$db->query($sql);
	?>
	
    <div class="container">
	
	<?php
		if($user->type==1){ ?>
		<h1>Teacher View</h1>
		
		<form action="task.php?classid=<?php echo $classid; ?>" method= "POST">

		  <div class="form-group">
			<label for="task">Task</label>
			<input name = "task" type="text" class="form-control" id="task" placeholder="Enter task(s) here">
		  </div>
		  
		  <div class="form-group bootstrap-iso"> <!-- Date input -->
			<label class="control-label" for="date">Due Date</label>
			<input class="form-control" id="date" name="date" placeholder="YYYY/MM/DD" type="text"/>
		  </div>
		  
		  <button name = "add" type="submit" class="btn btn-primary" style="margin: 10px auto;">Add to List</button> 
		</form>
		<?php } ?>
	
		<!--<h1>Common View</h1>-->
	
		<table class="table">
			  <thead class="thead-default">
				<tr>
				  <th>No.</th>
				  <th>Course</th>
				  <th>To-do-list</th>
				  <th>Due Date</th>
				</tr>
			  </thead>
				
			  <tbody>
				<?php
				//display task list	
				//Loops through table rows and prints the values
				$index =1;
				while($rows=$db->fetch_array($result)){
					?>		
						<td><?php echo $index++;?></td>
						<td><?php echo $rows['className'];?></td>
						<td><?php echo $rows['task'];?></td>
						<td><?php echo $rows['date'];?></td>
					</tr>
				<?php
					}
				?>
				</tbody>
			</table>     
    </div><!-- /.container -->
    
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
    })
	</script>		
  </body>
</html>
