<?php

use \Core\Route;

return [
  
  new Route('', 'main', 'hello'),
  new Route('/feedback', 'main', 'feedback'),
  new Route('/auth', 'user', 'auth'),
  new Route('/register', 'user', 'register'),
  new Route('/exitSession', 'user', 'exitSession'),
  new Route('/articles', 'main', 'articles'),
  new Route('/article/:id/', 'main', 'article'),
  new Route('/gallery', 'main', 'gallery'),
  new Route('/thoughts', 'main', 'thoughts'),
  new Route('/redactor', 'admin', 'redactor'),
  new Route('/add_article', 'admin', 'add_article'),
  new Route('/del_article', 'admin', 'del_article'),
  new Route('/update_article', 'admin', 'update_article'),
  new Route('/redactor/del_user', 'user', 'del_user'),
  new Route('/load_foto', 'admin', 'load_foto'),
  new Route('/del_foto', 'admin', 'del_foto'),
  new Route('/load_thought', 'admin', 'load_thought'),
  new Route('/del_thought', 'admin', 'del_thought'),
  new Route('/about_me', 'admin', 'redactor_me'),
  new Route('/add_comment', 'main', 'add_comment'),
  ]

?>
