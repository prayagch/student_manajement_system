<?php 
include "db/db.php";
include "layout/head.php"; 
include "function/session.php";
include "function/function.php";
$Query ="SELECT * FROM `students` ORDER By id desc";
$result = mysqli_query($db,$Query);

?>

<div class="col-sm-10">
    <h1 class="text-center">Student List</h1>
<?php echo errorMsg();echo successMsg(); 
if(isset($_GET['delete'])){
$delete =$_GET['delete'];
$sqlDelete ="DELETE FROM `student` WHERE id='$delete'";
$result = mysqli_query($db,$sqlDelete);
		if($result){
			$_SESSION["successMessage"] = "Delete Successfully";
			header("Location:studentlist.php");
		}else{
			$_SESSION["errorMessage"]="Delete Faield";
			header("Location:studentlist.php");
		}
		
$result = "SELECT * FROM `student`";
$run=mysqli_query($db,$result);
$total=mysqli_num_rows($run);
$list=mysqli_fetch_assoc($run);
if($list!=0){
	echo "table has record";
}else{
	echo"no record";
}

} ?>
	<div class="container-fluid">
            <div class="row-fluid  table-responsive ">
			<table class="table table-striped table-bordered">
			<thead>
			<tr>
			<th>SL</th>
			<th>Name</th>
			<th>Roll</th>
			<th>Registrion</th>
			<th>Depatment</th>
			<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php $i=1;  while($DataRows = mysqli_fetch_array($result)):?>
			<tr>
			<td><?php echo $i++; ?></td>
			<td><a href="info.php?info=<?php echo $DataRows['id']; ?>"><?php echo $DataRows['name']?></a></td>
			<td><?php echo $DataRows['roll']?></td>
			<td><?php echo $DataRows['reg']?></td>
			<td><?php echo $DataRows['depatment']?></td>
			<td><a href="editstudent.php?edit=<?php echo $DataRows['id']; ?>"><span class="glyphicon glyphicon-edit re"></span></a><a href="studentlist.php?delete=<?php echo $DataRows['id']; ?>"><span class="glyphicon glyphicon-remove re"></span></a></td>
			</tr>
			<?php endwhile; ?>
			</tbody>
			</table>
			
            </div>
        </div>
	</div>
</div>
</div>
<?php include "layout/footer.php"; ?>