<?php

class ProductController
{
	public function actionView($id){
		$product = array();
		$product = Product::getProductById($id);
		//print_r($product);

  //       $latestProducts = array();
  //       $latestProducts = Product::getLatestProducts(6);

		require_once(ROOT . '/views/product/view.php');
		return true;
	}

}
?>