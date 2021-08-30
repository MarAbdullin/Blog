<!DOCTYPE html>
<html>
<html lang="ru">
	<meta charset="utf-8">
	<meta name="description" content=""/>
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<link rel="stylesheet" type="text/css" href="/project/webroot/css/style.css" media="screen" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> 
	<script src="/project/webroot/js/jquery.js" type="text/javascript"></script> 
	<title><?=$title?></title>
</head>
<body>
<div id="wrapper">
<div id="wrapper_inner">
	<div class="clearer">&nbsp;</div>
	<div id="header">
		<div id="header_inner">
		  <h1><a href="#">Блог Лилии</a></h1>
			<p><span>Мама хохотушка троих детей</span></p>
		</div>
	</div>
	<div id="navigation">
		<div id="navigation_inner">
			<ul>
			
			<?php if (isset($_SESSION['admin'])){?>
				       <li class="current_page_item"><a href="/" class="link">Главная</a></li>
				       <li><a href="/thoughts" class="link" >Мои мысли</a></li>
				       <li><a href="/articles" class="link" >Статьи</a></li>
				       <li><a href="/gallery" class="link" >Мои фото</a></li>
				       <li><a href="/redactor" class="link" >Редактор</a></li>
				       <li><a href="/exitSession" class="link" >Выход</a></li>
			<?php } 
		  
		        elseif (isset($_SESSION['user'])){?>
				       <li class="current_page_item"><a href="/" class="link">Главная</a></li>
				       <li><a href="/thoughts" class="link" >Мои мысли</a></li>
				       <li><a href="/articles" class="link" >Статьи</a></li>
				       <li><a href="/gallery" class="link" >Мои фото</a></li>
				       <li><a href="/exitSession" class="link" >Выход</a></li>
			<?php }
				
				   else{ ?>
				       <li class="current_page_item"><a href="/register" class="link">Регистрация</a></li>
				       <li><a href="/auth" class="link">Вход</a></li>
				<?php } ?>
				
			</ul>
		</div>
	</div>
	<div id="main"><div class="inner_copy"><div class="inner_copy"></div></div>
		
      <?=$content?>
      
  <div class="right" id="sidebar_outer">
    
		<div id="sidebar">
			<div class="box">
				<div class="box_title">Последняя мысль</div>
					<div class="box_content">
					  
					  <?php if(!empty($_POST['content']['thought'])) { ?>
					  
						<p id="last_thought">" <?=nl2br($_POST['content']['thought']['text'])?> "</p>
						<?php } ?>
					</div>
				</div>
				
				<div class="box">
					<div class="box_title">Последнии статьи</div>
					<div class="box_content">
						<ul>
						  
						  
						  <?php 
						  if(!empty($_POST['content']['articles'])){
						  
						  foreach($_POST['content']['articles'] as $article){ ?>
							<li ><a href="/article/<?=$article['id']?>/" class="link" style="text-decoration:none"><?=$article['header']?></a></li>
							<?php }
							} ?>
							
						</ul>
					</div>
				</div>

			<div class="box">
				<div class="box_title">Галерея</div>
				<div class="box_content">
						<div class="thumbnails">
						 
						  <?php 
						  if(!empty($_POST['content']['foto'])){
						    
						  foreach($_POST['content']['foto'] as $foto){ ?>
							<img class="photo" src="/project/webroot/picture/foto/<?=$foto['foto_name']?>" width="75" height="75" alt="" />
							<?php } 
							
							}?>
							
							<div class="clearer">&nbsp;</div>
						</div>
				</div>
			</div>
	</div>
</div>	
		<div class="clearer">&nbsp;</div>
		<div id="footer">
			<div id="footer_inner">
				<div class="left">&copy; Проект Абдуллина Марата Рамилевича</div>
				<div class="clearer">&nbsp;</div>

			</div>
		</div>

</div>
</div>
</body>
</html>