<?php

class custompageAllproductsModuleFrontController extends ModuleFrontController
{

  
  public function init(){
	$this->display_column_left = false;
	$this->display_column_right = false;
	parent::init();
  }
 
  /**
  * @see FrontController::initContent()
  */
  public function initContent()
  {
    parent::initContent();

    $this->setTemplate('custom_html.tpl');
  }
}
