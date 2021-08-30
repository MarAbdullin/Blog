<?php
if(empty($_SESSION)){
  header("Location:/auth");
 }
?>

<div class="left" id="content">
  <div id="content">
	  <div class="box-thought">
	
		  <div class="box-head">
			  <div id="head"><h2 class="head">Мои мысли</h2></div>
			  
			  <?php if(isset($_SESSION['admin'])){ ?>
			 <div id="add"><button class="btn_del" id="btn">( Добавить мысль )</button></div> 
			 <?php } ?>
		  </div>
		
		  <div class="list">
			
   <?php foreach($thoughts as $thought){?>
			
			  <div class='comment thou' id="<?='thought'.$thought['id']?>">
			    
			    <div id="headerThought">
			    
            <div class="ava"><img src="/project/webroot/picture/foto/avatar/avatar.jpg" class="ava_thought"></div> 
           
            <div class='fullname'>
              
              <strong><?=$thought['name'].' '.$thought['surname']?></strong>
              <br>
              <p>"<?=nl2br($thought['text'])?>"</p>
          
            </div> 
             
            <div id="date">
              
              <span><?=date("d.m.Y",strtotime($thought['date']))?></span>
            
    <?php if(isset($_SESSION['admin'])){ ?>
           
              <form action="/del_thought" method="POST" class="form_del">
                
                <input type="hidden" name='id' value="<?=$thought['id']?>" >
                <button class="btn_del" name="delet" value="удалить">удалить</button>
              
              </form>

      <?php }  ?>
            
            </div>
          </div>
        </div>
  <?php } ?>
  
      </div>
		</div>
  </div> 
</div> 

