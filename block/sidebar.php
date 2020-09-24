<div id="sidebar">
	<ul id = "menu" class = "nav menu">
		<li><a href = "../block/home.php"><i class = "glyphicon glyphicon-dashboard"></i> Dashboard</a></li>
   <br>
    
<?php 
switch ($_SESSION['status']) {
    case "administrator":?>
      <li><a href = "../view/posada.php"><i class = "fa fa-users"></i> Посади</a></li>
      <li><a href = "../view/soglasovan.php"><i class = "fa fa-thumbs-o-up"></i> Узгодження</a></li>
      <li><a href = ""><i class = "glyphicon glyphicon-list-alt"></i> Довідники</a>
          <ul>
            <li><a href = "../view/section.php"><i class = "glyphicon glyphicon-text-width"></i> Розділи заяви</a></li>
            <li><a href = "../view/paragraph.php"><i class = "glyphicon glyphicon-text-width"></i> Підрозділи заяви</a></li>
          </ul>
      </li>
        <?php break;
    case "user":?>
        <li><a href = "../view/posada.php"><i class = "fa fa-users"></i> Посади</a></li>
        <?php break;
    case "soglasovan":?>
      <li><a href = "../view/soglasovan.php"><i class = "fa fa-thumbs-o-up"></i> Узгодження</a></li>
      <li><a href = "../view/pm.php"><i class = "fa fa-wrench"></i> Комплектація робочого місця</a></li>
        <?php break;
} ?>
	</ul>
</div>