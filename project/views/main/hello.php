<?php
if(empty($_SESSION)){
	header("Location:/auth");
   }
?>

<div class="left" id="content">

  <div class="about">
	   
	   <div class='img'>
         <img src="/project/webroot/picture/foto/avatar/<?= $content['avatar']?>" alt="Avatar" class="avatar">
     </div>
		
		 <div class="about_me">
		      <h1>Привет дорогие гости моего блога!</h1>
		   
					<p><?=nl2br($content['about_me'])?></p>
					
					<div class="">
		 	          
		 	          <ul class="">
       
		 	         <?php if(isset($content['link'])){?>
		 	          
		 	           <li>
							<span class="first-block">Website: </span><a href="<?=$content['link']?>"><span class="second-block"><?=$content['link']?></span></a> 
					   </li>
		 	            
		 	     <?php } ?>
		 	     
		 	          </ul>
		 	          
		 	     </div>
		  </div>
	</div>
	  <div class="box" id="feedback">
					
		<div class="box-head">
			<h2 class="head">Обратная связь</h2>
		</div>
					
					
		<form action="/feedback" method="POST" class="feedback" id="add/up" enctype="multipart/form-data">
						
						
			<div class="form">

			    <div id="error"></div>
						  
				<p>
					<label>Имя:</label>
					<input type="text" class="field size4" name="name" value="<?=$name?>"/>
				</p>	
				
				<p>
					<label>Email:</label>
					<input type="email" class="field size4" name="email" />
				</p>
				
				<p>
					<label>Тема:</label>
					<input type="text" class="field size4" name="header" />
				</p>
								
				<p>
				  <label>Сообщение:</label>
					<textarea class="field size4" name='message' style="resize: none;" rows="10" cols="30"></textarea>
				</p>	
							
		  </div>
						
				<div class="buttons">
					<input type="submit" class="button" name="submit" value="Отправить" />
				</div>
					
		</form>
	
	</div>
	
</div>
	
