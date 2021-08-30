<div class="left" id="content">
<div style="color: red; font-size: 14px; padding: 15px; margin: 0 auto; display: block; width:400px;">
        <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>


<div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Регистрация</h2>

  <form class="login-container" action="" method="post">
    
    <p><input type="text" name="name" placeholder="Имя" <?php if(!empty($_POST['name'])){?> value="<?=$_POST['name']?>"<?php }?> required></p>
    <p><input type="text" name="surname" placeholder="Фамилия" <?php if(!empty($_POST['surname'])){?> value="<?=$_POST['surname']?>"<?php }?> required></p>
    <p><input type="email" name="email" placeholder="E-mail" <?php if(!empty($_POST['email'])){?> value="<?=$_POST['email']?>"<?php }?>></p>
    <p><input type="password" name="password" placeholder="Пароль" required></p>
    <p><input type="password" name="check_password" placeholder="Подтверждение пароля" required></p>
    <p><input type="submit" name="submit"  value="Зарегистрироваться" /></p>
    
  </form>
</div>   
</div>
