<?php
if(empty($_SESSION)){
 header("Location:/auth");
}

?>

<div class="left" id="content">
  <div class="article">
  
    <div class="articleHeader">
      <div id="dateArticle"><span><?=date("d.m.Y",strtotime($content['date']))?></span></div>
      <div id="articleHeader"><h1><?=$content['header']?></h1></div>
    </div>
    
    <div id="img"> 
<?php if(empty($content['imgname'])){ ?>  
        
        <img src="/project/webroot/picture/image/no_img.jpg" alt="" class="picture">
        
<?php }
  
      else{ ?>
        
        <img src="<?='/project/webroot/picture/image/'.$content['imgname']?>" alt="" class="picture">
        
<?php } ?>
    </div>
  
    <div id="article">
      
      <p><?=nl2br($content['article'])?></p>
      
    </div>
  

    <div class="box">
					
		  <div class="box-head">
			  <h2 class="head">Комментарии</h2>
		  </div>
					
        <div id='commentBox'>
          <div class="comments">
            
            <form action="/add_comment" method="POST" class="form_com">
               
               <p>
                 <label>Имя:</label>
                 <input type="text"  name="name" value="<?=$name?>"/>
               </p>
               
               <p>
                 <label>Комментарий:</label>
                 <textarea id="text_comment" name="comment" style="resize: none;" rows="8"></textarea>
               </p>
               
               <p>
                 <input type="hidden"  name="id" value="<?=$params?>">
                 <input type="submit" class="com-btn" name="submit" value="Отправить">
               </p>
               
            </form>
          </div>
      
          <div class="commentBlock">
        
            <div id="commentBlock">
            <?php foreach($comments as $comment){ ?>
                
                   <div class='comment'>Автор: <strong><?=$comment['name']?></strong><div id="comment"><p><?=$comment['comment']?></p></div></div>
                   
            <?php } ?> 
            </div> 
        
          </div>
       </div>
     </div>
   </div>				
</div>

