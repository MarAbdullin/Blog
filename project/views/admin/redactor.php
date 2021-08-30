<?php
if(isset($_SESSION)){
  if(empty($_SESSION['admin'])) header("Location:/");
}
else header("Location:/auth");
?>


<div class="left" id="content">
<div id="content">
				
	<div class="box">
					
		<div class="box-head">
			<h2 class="head">Текущие статьи</h2>
		</div>
					
    <div class="table">
			
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					
					<tr>
						<th>Загаловок</th>
						<th>Дата</th>
						<th></th>
						<th></th>
					</tr>
					
					
				<?php

foreach($articles as $article){ 
$date = $article['date'];

?>				
          <tr class="article<?=$article['id']?>">
					
						<td id="td"><h3 class="left"><a id="link" href="article/<?=$article['id']?>/" style="text-decoration: none;"><?=$article['header']?></a></h3></td>
						<td id="td" align="center"><?=date("d.m.Y",strtotime($date))?></td>
						
						<td align="center"><form action="/del_article" method="POST" class="form_del">
              <input type="hidden" name='id' value="<?=$article['id']?>" >
              <input type="submit" class="button" name ="delet" value=" удалить ">
            </form></td>
							
						<td align="center"><form action="/update_article" method="POST">
              <input type="hidden" name='id_article' value="<?=$article['id']?>" >
              <input type="submit"  class="button" name ="update" value=" изменить ">
            </form></td>
					
					</tr>
					
<?php
  
}
?>

				</table>
						
			</div>
				
		</div>
					
</div>
				


<div id="content">
				
	<div class="box">
					
		<div class="box-head">
			<h2 class="head">Зарегистрированные пользователи</h2>
		</div>
					
    <div class="table">
			
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					
					<tr>
						<th>Имя</th>
						<th>Фамилия</th>
						<th>Email</th>
						<th></th>
					</tr>
					
					
				<?php

foreach($users as $user){ 


?>				
        <tr class="user<?=$user['id']?>">
						<td><?=$user['name']?></td>
						
						<td><?=$user['surname']?></td>
						
						<td><?=$user['email']?></td>
						
						<td align="center"><form action="/redactor/del_user" method="POST" class="form_del">
              <input type="hidden" name='id' value="<?=$user['id']?>" >
              <input type="submit" class="button" name ="delet" value=" удалить ">
            </form></td>
							
					</tr>
<?php
  
}
?>
				</table>
						
			</div>
				
		</div>
					
</div>
</div>


