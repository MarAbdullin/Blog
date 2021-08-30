<?php
if(isset($_SESSION)){
  if(empty($_SESSION['admin'])) header("Location:/");
}
else header("Location:/auth");
?>

<div class="left" id="content">
  
  <div id="back-btn">
    <div id="add_photo"><button class="btn_back" onclick="window.location='./redactor'" style="font-size: 14px; color:#660083;"><b>< Назад</b></button></div> 
  </div>
  
<div id="content">
  
  <div class="box">
					
		<div class="box-head">
			<h2 class="head">Информация обо мне</h2>
		</div>
					
					
		<form action="/about_me" method="POST" id='about' enctype="multipart/form-data">
						
			<div class="form">
				
				<p>
				 <label>Загрузить аватарку</label>
					<input type="file" name="file">
				</p>	
				
				<p>
					<span class="req"></span>
					<label>Ссылка Вконтакте <span></span></label>
					<input type="text" class="field size1" name="link" value="<?=$resume['link']?>"/>
				</p>
								
				<p>
				  <label>Обо мне <span></span></label>
					<textarea class="field size1" name='about_me' rows="10" cols="30"><?=$resume['about_me']?></textarea>
				</p>	
							
		  </div>
						
				<div class="buttons">
					<input type="submit" class="button" name="submit" value="Добавить" />
				</div>
					
		</form>
	
	</div>
			
</div>
</div>

