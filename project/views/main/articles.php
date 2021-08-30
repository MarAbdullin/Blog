<?php
if(empty($_SESSION)){
  header("Location:/auth");
 }
?>

<div class="left" id="content">
  <div class="articles">
    <section class="grid">

<?php 

foreach($content as $article){

?>
        <article class="grid-item">
          <div class="image">

<?php if(empty($article['imgname'])){ ?>  

            <img src="/project/webroot/picture/image/no_img.jpg" alt="">

<?php }
      else{ ?>
            
            <img src="<?='/project/webroot/picture/image/'.$article['imgname']?>" />

<?php } ?>          
        
        
          </div>
            
          <div class="info">
            <h2><?=$article['header']?></h2>
            
            <div class="button-wrap">
                <a class="atuin-btn" href="article/<?=$article['id']?>/">Подробнее</a>
            </div>
            
          </div>
        </article>
<?php 
} ?>    
      </section>
    </div>
</div>

