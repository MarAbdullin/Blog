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
			<h2 class="head">Добавить статью</h2>
		</div>
					
					
		<form action="/add_article" method="POST"  id="add/up" enctype="multipart/form-data">
						
			<div class="form">
				
				<p>
				 <label>Загрузить картинку</label>
					<input type="file" name="file">
				</p>
						  
				<p>
					<span class="req">не более 100 символов</span>
					<label>Название статьи <span>(обязательное поле)</span></label>
					<input type="text" class="field size1" name="header" />
				</p>	
								
				<p>
				  <label>Содержание <span>(обязательное поле)</span></label>
					<textarea class="field size1" name='article' rows="10" cols="30"></textarea>
				</p>	
							
		  </div>
						
				<div class="buttons">
					<input type="submit" class="button" name="submit" value="Добавить" />
				</div>
					
		</form>
	
	</div>
			
</div>
</div>

