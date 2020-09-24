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
		<div class="alert alert-info"><h3>Необхідне обладнання для робочого місьця</h3></div> 
		
		<table id = "table" class="table table-bordered">
			<thead>
				<tr>
        <th>Розділ</th>
        <th>Підрозділ</th>
        <th>Кількість</th>
        
				</tr>
			</thead>
			<tbody>
				<?php
					$query = mysqli_query($conn, "SELECT
                                          zajava_section.TIP_ZAJAVA_ID,
                                          COUNT(zajava_structure.STRUCTURE_ID) AS count_MT,
                                          doc_paragraph.PARAGRAPH_No,
                                          doc_paragraph.PARAGRAPH_NAME,
                                          zajava_section.SECTION_NAME
                                        FROM zajava_structure
                                          INNER JOIN doc_paragraph
                                            ON zajava_structure.PARAGRAPH_ID = doc_paragraph.PARAGRAPH_ID
                                          INNER JOIN zajava_section
                                            ON doc_paragraph.SECTION_ID = zajava_section.SECTION_ID
                                        WHERE zajava_section.TIP_ZAJAVA_ID = 1
                                        GROUP BY zajava_section.TIP_ZAJAVA_ID,
                                                doc_paragraph.PARAGRAPH_No,
                                                doc_paragraph.PARAGRAPH_NAME,
                                                zajava_section.SECTION_NAME
                                        ORDER BY doc_paragraph.PARAGRAPH_No") or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query)){
				?>
				<?php 
					if($fetch['status'] != "administrator" || $_SESSION['status'] == $fetch['status']){
				?>	
        <tr class="del_section<?php echo $fetch['SECTION_ID']?>">
          <td><?php echo $fetch['SECTION_NAME']?></td>
          <td><?php echo $fetch['PARAGRAPH_NAME']?></td>
          <td><?php echo $fetch['count_MT']?></td>
        </tr>
      
					<div class="modal fade" id="edit_modal<?php echo $fetch['SECTION_ID']?>" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<form method="POST" action="update_section.php">	
									<div class="modal-header">
										<h4 class="modal-title">Оновленя розділу</h4>
									</div>
									<div class="modal-body">
										<div class="col-md-3"></div>
										<div class="col-md-6">
											<div class="form-group">
												<label>№</label>
												<input type="hidden" name="SECTION_ID" value="<?php echo $fetch['SECTION_ID']?>"/>
												<input type="text" name="SECTION_No" value="<?php echo $fetch['SECTION_No']?>" class="form-control" required="required"/>
											</div>
											<div class="form-group">
												<label>Розділ</label>
												<input type="text" name="SECTION_NAME" value="<?php echo $fetch['SECTION_NAME']?>" class="form-control" required="required"/>
											</div>
                      <div class="form-group">
												<label>Тип заяви</label>
                        <select class="form-control" name="TIP_ZAJAVA_ID">
                          <?php
                            $sql = "SELECT tip_zajava.TIP_ZAJAVA_ID, tip_zajava.TIP_ZAJAVA_NAME FROM tip_zajava";
                            $result = mysqli_query($conn,$sql ) or die(mysqli_error());
                            while($tip = mysqli_fetch_array($result)){ ?>
                              <option value="<?php echo $tip['TIP_ZAJAVA_ID']?>"><?php echo $tip['TIP_ZAJAVA_NAME']?></option>
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
				<form method="POST" action="add_section.php">	
					<div class="modal-header">
						<h4 class="modal-title">Додати розділ</h4>
					</div>
					<div class="modal-body">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label>№</label>
								<input type="text" name="SECTION_No" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Розділ</label>
								<input type="text" name="SECTION_NAME" class="form-control" required="required"/>
							</div>
              <div class="form-group">
                <label>Тип заяви</label>
                <select class="form-control" name="TIP_ZAJAVA_ID">
                  <?php
                    $sql = "SELECT tip_zajava.TIP_ZAJAVA_ID, tip_zajava.TIP_ZAJAVA_NAME FROM tip_zajava";
                    $result = mysqli_query($conn,$sql ) or die(mysqli_error());
                    while($tip = mysqli_fetch_array($result)){ ?>
                      <option value="<?php echo $tip['TIP_ZAJAVA_ID']?>"><?php echo $tip['TIP_ZAJAVA_NAME']?></option>
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
		var SECTION_ID = $(this).attr('id');
		$("#modal_confirm").modal('show');
		$('#btn_yes').attr('name', SECTION_ID);
	});
	$('#btn_yes').on('click', function(){
		var id = $(this).attr('name');
		$.ajax({
			type: "POST",
			url: "delete_section.php",
			data:{
				SECTION_ID: id
			},
			success: function(){
				$("#modal_confirm").modal('hide');
				$(".del_section" + id).empty();
				$(".del_section" + id).html("<td colspan='6'><center class='text-danger'>Видалення...</center></td>");
				setTimeout(function(){
					$(".del_section" + id).fadeOut('slow');
				}, 1000);
			}
		});
	});
});
<?php include '../block/footer.php'?>