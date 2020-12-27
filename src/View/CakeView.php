<?php
namespace App\View;

use Cake\View\View;
use App\Users;

class CakeView extends View
{
    public function render($view = null, $layout = null) {
        // Custom logic here.
        $this->render('CakeView/index');
    }    
}