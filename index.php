<?php

  include 'nav-config.php'; // create !

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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
<link rel="stylesheet" href="lib/css/style.css">
<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://use.fontawesome.com/04d9a3b03f.js"></script>

<nav id="navSmarty">
  <h3>Каталог</h3>
  <div id="oldContent" style="display: none;"></div>
  <div class="content" id="content">
    <?php for($i=0; $i < count($cat); $i++): ?>
      <?php if($index_cat[$cat[$i]['term_id']]): ?>
    <div class="block">
      <?php $cat_mama = $cat[$i]['slug']; ?>
      <?php if(mb_strtoupper($cat[$i]['name']) == 'КАМИНЫ'): ?>
        <a href="http://kamin.volga-bereg.ru/" target="_blank">
          <h2>КАМИНЫ</h2> <i class="fa fa-external-link-square" aria-hidden="true"></i>
        </a>
      <?php elseif(mb_strtoupper($cat[$i]['name']) == 'МАСТЕРСКАЯ КОВКИ'): ?>
        <a href="http://masterkovki64.ru/" target="_blank">
          <h2>МАСТЕРСКАЯ КОВКИ</h2> <i class="fa fa-external-link-square" aria-hidden="true"></i>
        </a>
      <?php else: ?>
      <a href="/category/<?php print $cat[$i]['slug']; ?>/" onClick="catalog('catalog_<?php print $cat[$i]['term_id']; ?>', '/category/<?php print $cat[$i]['slug']; ?>/');return false;">
        <h2><?php print $cat[$i]['name']; ?></h2> <i class="fa fa-chevron-right" aria-hidden="true"></i>
      </a>
      <?php endif; ?>
      <div id="catalog_<?php print $cat[$i]['term_id']; ?>" style="display: none;">
        <div class="block" style="background-color: #d6d6d6;">
          <a href="/category/<?php print $cat_mama; ?>/">
            <h2>Все товары</h2>
          </a>
        </div>
        <?php for ($a=0; $a < count($tax); $a++): ?>
          <?php if($cat[$i]['term_id'] == $tax[$a]['parent']): ?>
            <?php for($b=0; $b < count($cat); $b++): ?>
              <?php if($tax[$a]['term_id'] == $cat[$b]['term_id']): ?>
        <div class="block">
          <a href="/category/<?php print $cat[$b]['slug']; ?>/">
            <h2><?php print $cat[$b]['name']; ?></h2>
          </a>
        </div>
              <?php endif; ?>
            <?php endfor; ?>
          <?php endif; ?>
        <?php endfor; ?>
      </div>
    </div>
      <?php endif; ?>
    <?php endfor; ?>
  </div>
</nav>

<script type="text/javascript">

  const catalog = (cat, url) => {
    let oldContent = $('#content').html()
    let newContent = $(`#${cat}`).html()
    let contentTest = newContent.replace(/\s+/g,' ')
    if(contentTest != ' '){
      $('#oldContent').html(oldContent)
      let btn = '<div class="block back"><a href="javascript:;" onClick="catalogIndex()"><h2><i class="fa fa-chevron-left" aria-hidden="true"></i> Назад</h2></a></div>'
      $('#content').html(btn+newContent+btn)
      document.getElementById('navSmarty').scrollIntoView()
    }else{
      location.href = url
    }
  }

  const catalogIndex = () => {
    let oldContent = $('#oldContent').html()
    $('#content').html(oldContent)
    document.getElementById('navSmarty').scrollIntoView()
  }

</script>
