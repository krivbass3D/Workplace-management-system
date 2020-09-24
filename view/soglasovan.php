<?php 
  session_start();
//require 'validator.php';

	require_once '../conn.php';
  include '../block/head.php';
  include '../block/header.php';
  include '../block/sidebar.php';
?>
<div id="content">
  <br />
  <div class="alert alert-info">
  <?php 
  if(!ISSET($_SESSION['status'])){
  }
  ?>
    <h3>Узгодження організації робочого місця</h3>
    
  </div>
  
  <table id="table" class="table table-bordered">
    <thead>
      <tr>
        <th>№</th>
        <th>Посада</th>
        <th>Підрозділ</th>
        <th>Місце</th>
        <th>Узгодження</th>
      </tr>
    </thead>
    <tbody>
    <tr class="del_posada<?php echo $fetch['POSADA_ID']?>">
      <?php
          $sql="SELECT
                    posada.POSADA_ID,
                  posada.POSADA_NAME,
                  posada.POSADA_PIDROZDIL,
                  posada.POSADA_MESTO,
                  COUNT(zajava_structure.SOGLASOVANO) AS SOGLAS_TO,
                  COUNT(zajava_structure.STRUCTURE_ID) AS SOGLAS_ALL,
                  rm_user.status
                FROM zajava_structure
                  RIGHT OUTER JOIN posada
                    ON zajava_structure.POSADA_ID = posada.POSADA_ID
                  LEFT OUTER JOIN doc_paragraph
                    ON zajava_structure.PARAGRAPH_ID = doc_paragraph.PARAGRAPH_ID
                  LEFT OUTER JOIN zajava_section
                    ON doc_paragraph.SECTION_ID = zajava_section.SECTION_ID
                  LEFT OUTER JOIN rm_slugba_soglas
                    ON zajava_section.SOGLAS_SLUGBA_ID = rm_slugba_soglas.SLUGBA_SOGLAS_ID
                  INNER JOIN rm_user
                    ON rm_slugba_soglas.user_id = rm_user.user_id
                WHERE rm_user.user_id = '".$_SESSION['user_id']."'
              
                GROUP BY posada.POSADA_ID,
                        posada.POSADA_NAME,
                        posada.POSADA_PIDROZDIL,
                        posada.POSADA_MESTO,
                        rm_user.user_id";
                        //echo "sql = ".$sql ;
          $query = mysqli_query($conn, $sql) or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query)){?>
            <td><?php echo $fetch['POSADA_ID']?></td>
            <td><?php echo $fetch['POSADA_NAME']?></td>
            <td><?php echo $fetch['POSADA_PIDROZDIL']?></td>
            <td><?php echo $fetch['POSADA_MESTO']?></td>
            <td><center>
            <?php if($fetch['SOGLAS_TO'] == $fetch['SOGLAS_ALL']){?>
                <button class="btn btn-success btn-update"  data-toggle="modal" data-target="#view_modal<?php echo $fetch['POSADA_ID'];?>"><span class="glyphicon glyphicon-ok"></span></button>
              <?php }else{?>
                <button class="btn btn-warning btn-update" data-toggle="modal" data-target="#view_modal<?php echo $fetch['POSADA_ID']?>"><span class="glyphicon glyphicon-edit"></span></button>
              <?php }?>
            </td></center>
      </tr>



            <!-- Просмотр заяви start -->
    <div class="modal fade bd-example-modal-lg" id="view_modal<?php echo $fetch['POSADA_ID']?>" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
      
      <form method="POST" action="update_soglasovan.php">
      
        <div class="modal-header">
          <h4 class="modal-title">Перегляд заяви</h4>
        </div>
        <div class="modal-body">
    					<center><h1 class="text-warning">Посада: <?php echo $fetch['POSADA_NAME'];?></h1></center>
              <center><h2 class="text-warning">Підрозділ: <?php echo $fetch['POSADA_PIDROZDIL'];?></h2></center>
              <center><h3 class="text-warning">Місце: <?php echo $fetch['POSADA_MESTO'];?></h3></center>
				
          <!-- Абзацы и параграфы для вакансии-->
          <?php if ($_SESSION['status']=="administrator") {?>
            <center><h3 class="text-warning">Вимоги до вакансії</h3></center>
          <?php } else { ?>
          <center><h4 class="text-warning">Вимоги до робочого місця</h4></center>
          <?php }?>

            <?php 
                $sql= "SELECT 
                                  zajava_structure.STRUCTURE_ID,
                                  zajava_structure.STRUCTURE_NAME,
                                  zajava_structure.SOGLASOVANO,
                                  zajava_structure.POSADA_ID,
                                  rm_slugba_soglas.SLUGBA_SOGLAS_ID,
                                  rm_slugba_soglas.SLUGBA_SOGLAS_NAME,
                                  rm_user.status,
                                  rm_user.user_id,
                                  doc_paragraph.SECTION_ID,
                                  doc_paragraph.PARAGRAPH_ID,
                                  doc_paragraph.PARAGRAPH_NAME,
                                  zajava_section.SECTION_NAME,
                                  tip_zajava.TIP_ZAJAVA_ID
                                FROM zajava_structure
                                  INNER JOIN doc_paragraph
                                    ON zajava_structure.PARAGRAPH_ID = doc_paragraph.PARAGRAPH_ID
                                  INNER JOIN zajava_section
                                    ON doc_paragraph.SECTION_ID = zajava_section.SECTION_ID
                                  INNER JOIN rm_slugba_soglas
                                    ON zajava_section.SOGLAS_SLUGBA_ID = rm_slugba_soglas.SLUGBA_SOGLAS_ID
                                  INNER JOIN rm_user
                                    ON rm_slugba_soglas.user_id = rm_user.user_id
                                  INNER JOIN tip_zajava
                                    ON zajava_section.TIP_ZAJAVA_ID = tip_zajava.TIP_ZAJAVA_ID
                                WHERE zajava_structure.POSADA_ID = ".$fetch['POSADA_ID']."
                                AND rm_user.user_id = '".$_SESSION['user_id']."'
                                GROUP BY zajava_structure.STRUCTURE_ID,
                                  zajava_structure.STRUCTURE_NAME,
                                  zajava_structure.SOGLASOVANO,
                                  zajava_structure.POSADA_ID,
                                  rm_slugba_soglas.SLUGBA_SOGLAS_ID,
                                  rm_slugba_soglas.SLUGBA_SOGLAS_NAME,
                                  rm_user.status,
                                  doc_paragraph.SECTION_ID,
                                  doc_paragraph.PARAGRAPH_NAME,
                                  zajava_section.SECTION_NAME,
                                  doc_paragraph.PARAGRAPH_ID,
                                  tip_zajava.TIP_ZAJAVA_ID,
                                  rm_user.user_id";
                                  
                //echo " sql = ".$sql;
                $query1 = mysqli_query($conn, $sql) or die(mysqli_error());
                $SECTION_ID = "";?>
              <div class="card w-75">
                <div class="card-body">
                  
                
                  <?php
                  
                  while($fetch1 = mysqli_fetch_array($query1)){ // цикл службы согласования
                  $SOGL="";
                  if ($SECTION_ID != $fetch1['SECTION_ID']) {?>
                    <h3 class="card-header"><?php echo $fetch1['SECTION_NAME'];?></h3>
                    <?php $SECTION_ID = $fetch1['SECTION_ID'];
                    }
                  if ($fetch1['TIP_ZAJAVA_ID']==1) {
                  $SOGL = ($fetch1['SOGLASOVANO']=="1") ? "checked" : "" ;
                  $SOGL_VALUE = ($fetch1['SOGLASOVANO']=="1") ? "1" : "0" ;?>
                    <input type="hidden" name="<?php echo $fetch1['STRUCTURE_ID'];?>" value="0">
                    <label><input type="checkbox" <?php echo $SOGL;?> name="<?php echo $fetch1['STRUCTURE_ID'];?>" value="1" class="form-check-input"> <?php echo $fetch1['PARAGRAPH_NAME'];?></label>                  
                  <?php }?>
                  <?php 
                  if ($fetch1['TIP_ZAJAVA_ID']==2) {?>
                    <input type="hidden" name="<?php echo $fetch1['STRUCTURE_ID'];?>" value="1">
                    <label><?php echo $fetch1['PARAGRAPH_NAME'];?>: </label>                  
                    <leter><?php echo $fetch1['STRUCTURE_NAME'];?></leter>
                    <br>
                  <?php }?>
              <?php }; //конец цикла службы согласования ?>
                </div> <!-- card w-75 -->
              </div> <!-- card-body -->
        </div> <!--modal-body-->
        <!-- Абзацы и параграфы для Рабочего места конец-->
        <div style="clear:both;"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><span
              class="glyphicon glyphicon-remove"></span> Закрити</button>
          <button type="submit" name="update" class="btn btn-success "><span class="glyphicon glyphicon-thumbs-up"></span> 
Обновити</button>
          
        </div>
     
      </form>
     
          </div>
        </div>
      </div>
<!-- Просмотр заяви end -->  

     <?php } // Конец цикла посад  ?>


    </tbody>
  </table>
</div>




<?php include '../block/footer.php'?>
<?php include '../block/script.php'?>
<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script src="../js/bootstrap-switch/highlight.js"></script>
    <script src="../js/bootstrap-switch/bootstrap-switch.min.js"></script>
    <script src="../js/bootstrap-switch/main.js"></script>
-->
<script type="text/javascript">
$(document).ready(function() {
  
  $('.btn-delete').on('click', function() {
    var POSADA_ID = $(this).attr('id');
    $("#modal_confirm").modal('show');
    $('#btn_yes_posada_del').attr('name', POSADA_ID);
  });

  $('.btn-add').on('click', function() {
    var POSADA_ID = $(this).attr('id');
    $('#addZajava').attr('value', POSADA_ID);

  });

  $('#btn_yes_posada_del').on('click', function() {
    var id = $(this).attr('name');

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