<?php 
  //require 'validator.php';
  session_start();
	require_once 'conn.php'
?>
<div class="col-md-3">
	<div class="panel panel-success" id="panel-margin">
		<div class="panel-heading">
			<center><h1 class="panel-title">Вхід у систему</h1></center>
		</div>
		<div class="panel-body">
			<form method="POST">
				<div class="form-group">
					<label for="username">Користувач</label>
          <select class="form-control" name="user_id">
                          <?php
                            $sql = "SELECT
                                      user_id,
                                      username,
                                      status
                                    FROM rm_user";
                            
                            $result = mysqli_query($conn,$sql ) or die(mysqli_error());
                            while($user = mysqli_fetch_array($result)){ ?>
                              <option value="<?php echo $user['username']?>"><?php echo $user['username']?></option>
                          <?php 
                            }
                          ?>               
                        </select>
				</div>
				<div class="form-group">
					<label for="password">Пароль</label>
					<input class="form-control" name="password" placeholder="Пароль" type="password" required="required" >
				</div>
<?php
	if(ISSET($_POST['login'])){
		$username = $_POST['user_id'];
		$password = $_POST['password'];

      $sql = "SELECT * FROM `rm_user` WHERE `username` = '$username' && `password` = '$password'";
      //echo " sql  = ".$sql;
		$query = mysqli_query($conn,$sql ) or die(mysqli_error());
		$fetch = mysqli_fetch_array($query);
		$row = $query->num_rows;
    if($row > 0){
      $_SESSION['status'] = $fetch['status'];
      $_SESSION['user_id'] = $fetch['user_id'];
      /*
      echo "<pre>";
          print_r($_SESSION);
          echo "</pre>";
      */
			echo "<script>window.location = './block/home.php'</script>";
		}else{
			echo "<center><label class='text-danger'>Невірне ім'я користувача або пароль</label></center>";
		}
	}
?>
				<?php //include 'login_query.php'?>
				<div class="form-group">
					<button class="btn btn-block btn-primary"  name="login"><span class="glyphicon glyphicon-log-in"></span> Увійти</button>
				</div>
			</form>
		</div>
	</div>
</div>	