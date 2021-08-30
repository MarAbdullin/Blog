<?php
if(empty($_SESSION)){
  header("Location:/auth");
 }
?>

<div class="left" id="content">

<?php if(isset($_SESSION['admin'])){ ?>
			 <div id="add_photo"><button class="btn_add" style="font-size: 14px; color:#660083;"><b>Добавить фото</b></button></div> 
			 <?php } ?>

<div class="gallery">
  <?php foreach($gallery as $foto ){ ?>
<div class="photos<?=$foto['id']?>" id="photos"> 
<img class="photo" src="
/project/webroot/picture/foto/<?=$foto['foto_name']?>"  width="130" height="90" alt="<?=$foto['header']?>" />
 <?php if(!empty($_SESSION['admin'])){ ?>
  <form action="/del_foto" method="POST" class="form_del">
    <input type="hidden" name='id' value="<?=$foto['id']?>" >
    <button class="btn_del" name="delet" value="удалить">( удалить )</button>
  </form>
 
 <?php } ?>
 </div> 
 <?php } ?>
 </div>
 </div>

