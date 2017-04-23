<?php 
	require_once("_includes/init.php");
	//printA($_POST);die;
	if(!User::isLoggedIn()){
		redirect_to("index.php");
	}
	$user = User::userinfo();
	if (!isset($_GET["classid"]) || !_Class::isvalid($_GET["classid"])){
		redirect_to("userinfo.php");
		
	}
	
	
	//you will get all the to-do list from db
	//check if add todolist form is submited then validate and add everything to db
	//display all messages
	
	
	
  	require_once("_files/header.php"); ?>
    
  	<title>To-do list</title>
  </head>

  <body>
  
    <?php require_once("_files/menu.php"); ?>

	
	
    <div class="container myContent row">
	
       <h1>Teacher View</h1>
		<form>
		  <div class="form-group">
			<label for="teacher">Teacher</label>
			<input name = "teacher" type="text" class="form-control" id="teacher" placeholder="Enter name">
		
		  </div>
		  <div class="form-group">
			<label for="task">Task</label>
			<input name = "task" type="text" class="form-control" id="task" placeholder="Enter task(s) here">
		  </div>
		
		  <button name = "add" type="submit" class="btn btn-primary" style="margin: 10px auto;">Add to List</button>
		</form>
	
	<h1>Parent View</h1>
	
		<table class="table">
			  <thead class="thead-default">
				<tr>
				  <th>No.</th>
				  <th>To-do-list</th>
				  <th>Due Date</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <th scope="row">1</th>
				  <td></td>
				  <td></td>
				  
				</tr>
				<tr>
				  <th scope="row">2</th>
				  <td></td>
				  <td></td>
				  
				</tr>
				
			  </tbody>
			</table>
			
			
			<div class='col-sm-6'>
				<div class="form-group">
					<div class='input-group date' id='datetimepicker1'>
						<input type='text' class="form-control" />
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>
				</div>
			</div>
        
    </div><!-- /.container -->
    
	<?php require_once("_files/footer.php"); ?>
			<script type="text/javascript">
				$(function () {
					$('#datetimepicker1').datetimepicker();
				});
			</script>
			
  </body>
</html>
