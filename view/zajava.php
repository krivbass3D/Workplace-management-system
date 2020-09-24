<?php 
	//require 'validator.php';
	require_once '../conn.php';
  include '../block/head.php';
  include '../block/header.php';
  include '../block/sidebar.php';
?>
<!-- Для мульти выбора 
         <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />
         <link href="../css/MultiSelect/jquery.multiselect.css" rel="stylesheet" /> 
-->
<div id="content">
  <br /><br /><br />
  <div class="alert alert-info">
    <h3>Посада</h3>
  </div>
  <button class="btn btn-success" data-toggle="modal" data-target="#form_modal"><span
      class="glyphicon glyphicon-plus"></span> Додати посаду</button>
  <br /><br />
  <table id="table" class="table table-bordered">
    <thead>
      <tr>
        <th>Дія</th>
        <th>№</th>
        <th>Посада</th>
        <th>Підрозділ</th>
        <th>Місце</th>
        <th>Заява</th>
      </tr>
    </thead>
    <tbody>
      <?php
          $sql="SELECT
                  posada.POSADA_ID,
                  posada.POSADA_NAME,
                  posada.POSADA_PIDROZDIL,
                  posada.POSADA_MESTO,
                  COUNT(zajava_structure.STRUCTURE_ID) AS STRUCTURE_ID
                FROM zajava_structure
                  RIGHT OUTER JOIN posada
                    ON zajava_structure.POSADA_ID = posada.POSADA_ID
                GROUP BY posada.POSADA_ID,
                        posada.POSADA_NAME,
                        posada.POSADA_PIDROZDIL,
                        posada.POSADA_MESTO";
                        //echo "sql = ".$sql ;
					$query = mysqli_query($conn, $sql) or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query)){
						if($fetch['status'] != "administrator" || $_SESSION['status'] == $fetch['status']){?>
      <tr class="del_posada<?php echo $fetch['POSADA_ID']?>">
        <td>
          <center>
            <button class="btn btn-warning" data-toggle="modal"
              data-target="#edit_modal<?php echo $fetch['POSADA_ID']?>"><span
                class="glyphicon glyphicon-edit"></span></button>
            <button class="btn btn-danger btn-delete" id="<?php echo $fetch['POSADA_ID']?>" type="button"><span
                class="glyphicon glyphicon-trash"></span> </button>
          </center>
        </td>
        <td><?php echo $fetch['POSADA_ID']?></td>
        <td><?php echo $fetch['POSADA_NAME']?></td>
        <td><?php echo $fetch['POSADA_PIDROZDIL']?></td>
        <td><?php echo $fetch['POSADA_MESTO']?></td>
        <td>
          <center><?php if($fetch['STRUCTURE_ID']>0){?>
            <button class="btn btn-info btn-update" data-toggle="modal" 
              data-target="#update_modal<?php echo $fetch['POSADA_ID']?>"><span
                class="glyphicon glyphicon-eye-open"></span></button>
            <?php } else{?>
            <button class="btn btn-success btn-add" data-toggle="modal" id="<?php echo $fetch['POSADA_ID']?>"
              data-target="#form_modal_vacan"><span class="glyphicon glyphicon-plus"></span></button>
            <?php };?>
          </center>
        </td>
      </tr>

      <!-- Обновление посады -->
      <div class="modal fade" id="edit_modal<?php echo $fetch['POSADA_ID']?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <form method="POST" action="update_posada.php">
              <div class="modal-header">
                <h4 class="modal-title">Оновлення посади</h4>
              </div>
              <div class="modal-body">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Посада</label>
                    <input type="hidden" name="POSADA_ID" value="<?php echo $fetch['POSADA_ID']?>" />
                    <input type="text" name="POSADA_NAME" value="<?php echo $fetch['POSADA_NAME']?>"
                      class="form-control" required="required" />
                  </div>
                  <div class="form-group">
                    <label>Підрозділ</label>
                    <input type="text" name="POSADA_PIDROZDIL" value="<?php echo $fetch['POSADA_PIDROZDIL']?>"
                      class="form-control" required="required" />
                  </div>
                  <div class="form-group">
                    <label>Місце</label>
                    <input type="text" name="POSADA_MESTO" value="<?php echo $fetch['POSADA_MESTO']?>"
                      class="form-control" required="required" />
                  </div>
                </div>
              </div>
              <div style="clear:both;"></div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><span
                    class="glyphicon glyphicon-remove"></span> Закрити</button>
                <button name="edit" class="btn btn-warning"><span class="glyphicon glyphicon-save"></span>
                  Оновити</button>
              </div>
            </form>
          </div>
        </div>
      </div>

<!-- Обновление заявки -->
<div class="modal fade bd-example-modal-lg" id="update_modal<?php echo $fetch['POSADA_ID']?>" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <form method="POST" action="update_zajava.php">
        <div class="modal-header">
          <h4 class="modal-title">Редагувати заявку</h4>
        </div>
        <div class="modal-body">
    					<center><h2 class="text-warning">Посада: <?php echo $fetch['POSADA_NAME'];?></h2></center>
              <center><h3 class="text-warning">Підрозділ: <?php echo $fetch['POSADA_PIDROZDIL'];?></h3></center>
              <center><h4 class="text-warning">Місце: <?php echo $fetch['POSADA_MESTO'];?></h4></center>
				
          <!-- Абзацы и параграфы для вакансии-->
          <?php 
              $query1 = mysqli_query($conn, "SELECT * FROM zajava_section WHERE zajava_section.TIP_ZAJAVA_ID = 2") or die(mysqli_error());
              while($fetch1 = mysqli_fetch_array($query1)){
            ?>
          <div class="col-md-12">
            <div class="form-group">
              <label><?php echo $fetch1['SECTION_ID']." "; echo $fetch1['SECTION_NAME']?></label>
              <?php 
                    $sql= "SELECT * FROM doc_paragraph WHERE doc_paragraph.SECTION_ID = ".$fetch1['SECTION_ID'];
                    $query2 = mysqli_query($conn,$sql ) or die(mysqli_error());
                    while($fetch2 = mysqli_fetch_array($query2)){
                      //echo "<pre>";
                      //print_r($fetch2);
                      //echo "</pre>";
                      $sql= "SELECT 
                                zajava_structure.STRUCTURE_ID,
                                zajava_structure.STRUCTURE_NAME,
                                zajava_structure.PARAGRAPH_ID,
                                tip_zajava.TIP_ZAJAVA_ID,
                                zajava_structure.POSADA_ID,
                                doc_paragraph.PARAGRAPH_ID
                              FROM zajava_structure
                                INNER JOIN doc_paragraph
                                  ON zajava_structure.PARAGRAPH_ID = doc_paragraph.PARAGRAPH_ID
                                INNER JOIN zajava_section
                                  ON doc_paragraph.SECTION_ID = zajava_section.SECTION_ID
                                INNER JOIN tip_zajava
                                  ON zajava_section.TIP_ZAJAVA_ID = tip_zajava.TIP_ZAJAVA_ID
                              WHERE zajava_structure.POSADA_ID = ".$fetch['POSADA_ID'];
                      //echo " SQL = ".$sql;
                      $query3 = mysqli_query($conn,$sql ) or die(mysqli_error());
                      $STRUCTURE_NAME = "";
                      while($fetch3 = mysqli_fetch_array($query3)){
                        if ($fetch2['PARAGRAPH_ID']==$fetch3['PARAGRAPH_ID']){
                          $STRUCTURE_NAME = $fetch3['STRUCTURE_NAME'];
                        }
                        /*
                     echo "<pre>";
                     print_r($fetch3);
                     echo "</pre>";
                          $STRUCTURE_NAME = $fetch3['STRUCTURE_NAME'];
                          echo "<br>";
                          echo "STRUCTURE_NAME  = ".$STRUCTURE_NAME;
                          */
                        };
                        if ($STRUCTURE_NAME != "") {?>
                            <input type="text" name="<?php echo $fetch2['STRUCTURE_ID'];?>" value="<?php echo $STRUCTURE_NAME;?>" class="form-control" placeholder="<?php echo $fetch2['PARAGRAPH_NAME'];?>">
                          <?php } else {?>
                            <input type="text" name="<?php echo $fetch2['PARAGRAPH_ID'];?>" class="form-control" placeholder="<?php echo $fetch2['PARAGRAPH_NAME'];?>">
                        <?php }?>
                      <?php };?>
            </div>
          </div>
              <?php };//конец цикла параграфы вакансии ?>
          <!-- Абзацы и параграфы для Рабочего места начало-->
          <div class="form-check form-check-inline">
            <?php 
                $query1 = mysqli_query($conn, "SELECT * FROM zajava_section WHERE zajava_section.TIP_ZAJAVA_ID = 1") or die(mysqli_error());
                
                while($fetch1 = mysqli_fetch_array($query1)){?>
            <hr>
            <h3><label><?php echo $fetch1['SECTION_NAME'];?> : </label></h3>
            <?php 
                      $sql= "SELECT * FROM doc_paragraph WHERE doc_paragraph.SECTION_ID = ".$fetch1['SECTION_ID'];
                      $query2 = mysqli_query($conn,$sql ) or die(mysqli_error());
                      while($fetch2 = mysqli_fetch_array($query2)){
                       $sql= "SELECT 
                                zajava_structure.STRUCTURE_ID,
                                zajava_structure.STRUCTURE_NAME,
                                zajava_structure.PARAGRAPH_ID,
                                tip_zajava.TIP_ZAJAVA_ID,
                                zajava_structure.POSADA_ID,
                                doc_paragraph.PARAGRAPH_ID
                              FROM zajava_structure
                                INNER JOIN doc_paragraph
                                  ON zajava_structure.PARAGRAPH_ID = doc_paragraph.PARAGRAPH_ID
                                INNER JOIN zajava_section
                                  ON doc_paragraph.SECTION_ID = zajava_section.SECTION_ID
                                INNER JOIN tip_zajava
                                  ON zajava_section.TIP_ZAJAVA_ID = tip_zajava.TIP_ZAJAVA_ID
                              WHERE zajava_structure.POSADA_ID = ".$fetch['POSADA_ID'];
                      //echo " SQL = ".$sql;
                      $query3 = mysqli_query($conn,$sql ) or die(mysqli_error());
                      $STRUCTURE_NAME = "";
                      while($fetch3 = mysqli_fetch_array($query3)){
                        if ($fetch2['PARAGRAPH_ID']==$fetch3['PARAGRAPH_ID']){
                            $STRUCTURE_NAME = $fetch3['STRUCTURE_NAME'];
                        }
 
                      };
                      if ($STRUCTURE_NAME != "") {$checked = "checked";
                        } else {
                             $checked = "";
                      }?>
                      <input class="form-check-input" type="checkbox" <?php echo $checked;?> name="<?php echo $fetch2['PARAGRAPH_ID'];?>" value="1">
                      <label class="form-check-label" for="inlineCheckbox1"><?php echo $fetch2['PARAGRAPH_NAME'];?></label>
                <?php };//конец цикла параграфы вакансии ?>
              <?php }; //конец цикла обзацы вакансии?>
          </div>
          <!-- Абзацы и параграфы для Рабочего места конец-->
        </div>
        <div style="clear:both;"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><span
              class="glyphicon glyphicon-remove"></span> Закрити</button>
          <button class="btn btn-success "><span class="glyphicon glyphicon-save"></span> Зберегти</button>
          <input type='hidden' name='POSADA_ID' data-delORadd="Додати" value="<?php echo $fetch['POSADA_ID']?>">
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
<!-- Удаление посади начало-->
<div class="modal fade" id="modal_confirm" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Система</h3>
      </div>
      <div class="modal-body">
        <center>
          <h4 class="text-danger">Ви впевнені, що хочете видалити ці дані?</h4>
        </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Закрити</button>
        <button type="button" name="<?php echo $fetch['POSADA_ID']?>" class="btn btn-success" id="btn_yes_posada_del">Так</button>
      </div>
    </div>
  </div>
</div>
<!-- Добавление посади -->
<div class="modal fade" id="form_modal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form method="POST" action="add_posada.php">
        <div class="modal-header">
          <h4 class="modal-title">Додати посаду</h4>
        </div>
        <div class="modal-body">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Посада</label>
              <input type="text" name="POSADA_NAME" class="form-control" required="required" />
            </div>
            <div class="form-group">
              <label>Підрозділ</label>
              <input type="text" name="POSADA_PIDROZDIL" class="form-control" required="required" />
            </div>
            <div class="form-group">
              <label>Місце</label>
              <input type="text" name="POSADA_MESTO" class="form-control" required="required" />
            </div>
          </div>
        </div>
        <div style="clear:both;"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><span
              class="glyphicon glyphicon-remove"></span> Закрити</button>
          <button name="save" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> Зберегти</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!--Добавление заявки -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
  id="form_modal_vacan" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <form method="POST" action="add_zajava.php">
        <div class="modal-header">
          <h4 class="modal-title">Додати заявку</h4>
        </div>
        <div class="modal-body">

          <!-- Абзацы и параграфы для вакансии-->
          <?php 
              $query1 = mysqli_query($conn, "SELECT * FROM zajava_section WHERE zajava_section.TIP_ZAJAVA_ID = 2") or die(mysqli_error());
              while($fetch1 = mysqli_fetch_array($query1)){
            ?>
          <div class="col-md-12">
            <div class="form-group">
              <label><?php echo $fetch1['SECTION_ID']." "; echo $fetch1['SECTION_NAME']?></label>
              <?php 
                    $sql= "SELECT * FROM doc_paragraph WHERE doc_paragraph.SECTION_ID = ".$fetch1['SECTION_ID'];
                    $query2 = mysqli_query($conn,$sql ) or die(mysqli_error());
                    while($fetch2 = mysqli_fetch_array($query2)){?>
              <input type="text" name="<?php echo $fetch2['PARAGRAPH_ID'];?>" class="form-control"
                placeholder="<?php echo $fetch2['PARAGRAPH_NAME'];?>">
              <?php };//конец цикла параграфы вакансии ?>
            </div>
          </div>
          <?php }; //конец цикла обзацы вакансии?>

          <!-- Абзацы и параграфы для Рабочего места начало-->
          <div class="form-check form-check-inline">
            <?php 
                $query1 = mysqli_query($conn, "SELECT * FROM zajava_section WHERE zajava_section.TIP_ZAJAVA_ID = 1") or die(mysqli_error());
                
                while($fetch1 = mysqli_fetch_array($query1)){
                  //echo "SELECT * FROM zajava_section WHERE zajava_section.TIP_ZAJAVA_ID = 1";
                  ?>
            <hr>
            <h3><label><?php echo $fetch1['SECTION_NAME'];?> : </label></h3>

            <?php 
                      $sql= "SELECT * FROM doc_paragraph WHERE doc_paragraph.SECTION_ID = ".$fetch1['SECTION_ID'];
                      $query2 = mysqli_query($conn,$sql ) or die(mysqli_error());
                      while($fetch2 = mysqli_fetch_array($query2)){?>
            <input class="form-check-input" type="checkbox" name="<?php echo $fetch2['PARAGRAPH_ID'];?>"
              value="1">
            <label class="form-check-label" for="inlineCheckbox1"><?php echo $fetch2['PARAGRAPH_NAME'];?></label>

            <?php };//конец цикла параграфы вакансии ?>

            <?php }; //конец цикла обзацы вакансии?>
          </div>
          <!-- Абзацы и параграфы для Рабочего места конец-->
        </div> <!-- конец  modal-body -->
        <div style="clear:both;"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><span
              class="glyphicon glyphicon-remove"></span> Закрити</button>
          <button class="btn btn-success "><span class="glyphicon glyphicon-save"></span> Зберегти</button>
          <input id="addZajava" type='hidden' name='POSADA_ID' data-delORadd="Додати" value=''>
     
        </div>
      </form>
    </div>
  </div>
</div>




<?php include '../block/footer.php'?>
<?php include '../block/script.php'?>
<!-- Для мульти выбора 
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="../js/MultiSelect/jquery.multiselect.js"></script>
-->
<script type="text/javascript">
$(document).ready(function() {


  // Скрипт для мульти выбора 
  /*
  $('select[multiple].active.3col').multiselect({
              columns: 3,
              placeholder: 'Виберіть обладнення для робочого місьця',
              search: false,
              searchOptions: {
                  'default': 'Search States'
              },
              selectAll: false
          });
  */

  $('.btn-delete').on('click', function() {
    var POSADA_ID = $(this).attr('id');
    $("#modal_confirm").modal('show');
    $('#btn_yes_posada_del').attr('name', POSADA_ID);
  });

  //////////////////////////////////////////

  $('.btn-add').on('click', function() {
    var POSADA_ID = $(this).attr('id');
    $('#addZajava').attr('value', POSADA_ID);
    //alert ("POSADA_ID = ")+POSADA_ID;
  });

/*
$('.btn-update').on('click', function() {
    
    var POSADA_ID = $(this).data('id');
    $('#updateZajava').attr('value', POSADA_ID);
    alert ("POSADA_ID = ")+POSADA_ID;
  });
*/
  ////////////////////////////////////    

  $('#btn_yes_posada_del').on('click', function() {
    var id = $(this).attr('name');
    //alert ("id = ")+id;
    $.ajax({
      type: "POST",
      url: "../view/delete_posada.php",
      data: {
        POSADA_ID: id
      },
      success: function() {
        $("#modal_confirm").modal('hide');
        $(".del_posada" + id).empty();
        $(".del_posada" + id).html(
          "<td colspan='6'><center class='text-danger'>Видалення...</center></td>");
        setTimeout(function() {
          $(".del_posada" + id).fadeOut('slow');
        }, 1000);
      }
    });
  });
});
</script>
</body>

</html>