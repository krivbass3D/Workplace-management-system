<?php 
  session_start();
//require 'validator.php';
	require_once '../conn.php';
  include '../block/head.php';
  include '../block/header.php';
  include '../block/sidebar.php';
?>
	<div id = "content">
		<br /><br /><br />
		<div class="alert alert-info"><h3>Підрозділи заяви</h3></div> 
		<button class="btn btn-success" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Додати підрозділ</button>
		<br /><br />
		<table id = "table" class="table table-bordered">
			<thead>
				<tr>
        <th>Дія</th>
        <th>№</th>
        <th>Підрозділ</th>
        <th>Розділ</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$query = mysqli_query($conn, "SELECT    doc_paragraph.PARAGRAPH_ID,
                                          doc_paragraph.PARAGRAPH_No,
                                          doc_paragraph.PARAGRAPH_NAME,
                                          doc_paragraph.SECTION_ID,
                                          zajava_section.SECTION_NAME
                                        FROM doc_paragraph
                                          INNER JOIN zajava_section
                                            ON doc_paragraph.SECTION_ID = zajava_section.SECTION_ID
                                        ORDER BY doc_paragraph.PARAGRAPH_No") or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query)){
				?>
				<?php 
					if($fetch['status'] != "administrator" || $_SESSION['status'] == $fetch['status']){
				?>	
        <tr class="del_paragraph<?php echo $fetch['PARAGRAPH_ID']?>">
          <td>
            <center>
              <button class="btn btn-warning" data-toggle="modal"
                data-target="#edit_modal<?php echo $fetch['PARAGRAPH_ID']?>"><span
                  class="glyphicon glyphicon-edit"></span></button>
              <button class="btn btn-danger btn-delete" id="<?php echo $fetch['PARAGRAPH_ID']?>" type="button"><span
                  class="glyphicon glyphicon-trash"></span> </button>
            </center>
          </td>
          <td><?php echo $fetch['PARAGRAPH_No']?></td>
          <td><?php echo $fetch['PARAGRAPH_NAME']?></td>
          <td><?php echo $fetch['SECTION_NAME']?></td>
        </tr>
      
					<div class="modal fade" id="edit_modal<?php echo $fetch['PARAGRAPH_ID']?>" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<form method="POST" action="update_paragraph.php">	
									<div class="modal-header">
										<h4 class="modal-title">Оновленя підрозділу</h4>
									</div>
									<div class="modal-body">
										<div class="col-md-3"></div>
										<div class="col-md-6">
											<div class="form-group">
												<label>№</label>
												<input type="hidden" name="PARAGRAPH_ID" value="<?php echo $fetch['PARAGRAPH_ID']?>"/>
												<input type="text" name="PARAGRAPH_No" value="<?php echo $fetch['PARAGRAPH_No']?>" class="form-control" required="required"/>
											</div>
											<div class="form-group">
												<label>Розділ</label>
												<input type="text" name="PARAGRAPH_NAME" value="<?php echo $fetch['PARAGRAPH_NAME']?>" class="form-control" required="required"/>
											</div>
                      <div class="form-group">
												<label>Тип заяви</label>
                        <select class="form-control" name="SECTION_ID">
                          <?php
                            $sql = "SELECT zajava_section.SECTION_ID,
                                      zajava_section.SECTION_NAME,
                                      zajava_section.SECTION_No
                                    FROM zajava_section
                                    ORDER BY zajava_section.SECTION_No";
                            $result = mysqli_query($conn,$sql ) or die(mysqli_error());
                            while($tip = mysqli_fetch_array($result)){ ?>
                              <option value="<?php echo $tip['SECTION_ID']?>"><?php echo $tip['SECTION_NAME']?></option>
                          <?php 
                            }
                          ?>               
                        </select>
											</div>
										</div>
									</div>
									<div style="clear:both;"></div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Закрити</button>
										<button name="edit" class="btn btn-warning" ><span class="glyphicon glyphicon-save"></span> Оновити</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					
					
				<?php
					}
				?>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
	<div class="modal fade" id="modal_confirm" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">Система</h3>
				</div>
				<div class="modal-body">
					<center><h4 class="text-danger">Ви впевнені, що хочете видалити ці дані?</h4></center>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Закрити</button>
					<button type="button" class="btn btn-success" id="btn_yes">Так</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="form_modal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<form method="POST" action="add_paragraph.php">	
					<div class="modal-header">
						<h4 class="modal-title">Додати підрозділ</h4>
					</div>
					<div class="modal-body">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label>№</label>
								<input type="text" name="PARAGRAPH_No" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Підрозділ</label>
								<input type="text" name="PARAGRAPH_NAME" class="form-control" required="required"/>
							</div>
              <div class="form-group">
                <label>Тип заяви</label>
                <select class="form-control" name="SECTION_ID">
                  <?php
                    $sql = "SELECT zajava_section.SECTION_ID,
                                      zajava_section.SECTION_NAME,
                                      zajava_section.SECTION_No
                                    FROM zajava_section
                                    ORDER BY zajava_section.SECTION_No";
                    $result = mysqli_query($conn,$sql ) or die(mysqli_error());
                    while($tip = mysqli_fetch_array($result)){ ?>
                             <option value="<?php echo $tip['SECTION_ID']?>"><?php echo $tip['SECTION_NAME']?></option>
                  <?php 
                    }
                  ?>               
                </select>
              </div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Закрити</button>
						<button name="save" class="btn btn-success" ><span class="glyphicon glyphicon-save"></span> Зберегти</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php include '../block/script.php'?>

<script type="text/javascript">
$(document).ready(function(){
	$('.btn-delete').on('click', function(){
		var PARAGRAPH_ID = $(this).attr('id');
		$("#modal_confirm").modal('show');
		$('#btn_yes').attr('name', PARAGRAPH_ID);
	});
	$('#btn_yes').on('click', function(){
		var id = $(this).attr('name');
		$.ajax({
			type: "POST",
			url: "delete_paragraph.php",
			data:{
				PARAGRAPH_ID: id
			},
			success: function(){
				$("#modal_confirm").modal('hide');
				$(".del_paragraph" + id).empty();
				$(".del_paragraph" + id).html("<td colspan='6'><center class='text-danger'>Видалення...</center></td>");
				setTimeout(function(){
					$(".del_paragraph" + id).fadeOut('slow');
				}, 1000);
			}
		});
	});
});
<?php include '../block/footer.php'?>