<?php
require_once './app/utils/Render.php';

class ActivityController
{
 use Render;


 public function index(): void
 {
    $this->renderView('activities/index');
 }
   
}
