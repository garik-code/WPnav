<?php

$pdo = new PDO('mysql:host='.$nav_config['db_host'].';dbname='.$nav_config['db_name'], $nav_config['db_user'], $nav_config['db_pass']);
$pdo->query('SET CHARSET UTF8');
$cat = $pdo->prepare('SELECT * FROM `wp_terms`');
$cat->execute();
$cat = $cat->fetchAll();
$tax = $pdo->prepare('SELECT * FROM `wp_term_taxonomy`');
$tax->execute();
$tax = $tax->fetchAll();
$pdo = null;

foreach ($cat as $key => $row) {
  $term_order[$key]  = $row['term_order'];
}
array_multisort($term_order, SORT_ASC, $cat);

foreach ($tax as $key => $value) {
  if($value['taxonomy'] == 'category' && $value['parent'] == 0){
    $index_cat[$value['term_id']] = true;
  }
}


?>
