<?php

namespace Project\Controllers;

use \Core\Controller;
use \Project\Models\Content;

class ErrorController extends Controller{

    public function notFound(){
        $this->title = "Страница не найдена";
        $this->layout = "default";

        $_POST['content'] = (new Content)-> last_content();

        return $this->render('error/notFound');
    }
}


?>