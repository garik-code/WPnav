<nav id="navSmarty">
  <div id="oldContent" style="display: none;"></div>
  <div class="content" id="content">
    <?php for($i=0; $i < count($cat); $i++): ?>
      <?php if($index_cat[$cat[$i]['term_id']]): ?>


        
    <div class="block">
      <?php $cat_mama = $cat[$i]['slug']; ?>
      <a href="/category/<?php print $cat[$i]['slug']; ?>/" onClick="catalog('catalog_<?php print $cat[$i]['term_id']; ?>', '/category/<?php print $cat[$i]['slug']; ?>/');return false;">
        <h2><?php print $cat[$i]['name']; ?></h2> <i class="fa fa-chevron-right" aria-hidden="true"></i>
      </a>
      <div id="catalog_<?php print $cat[$i]['term_id']; ?>" style="display: none;">
        <div class="block" style="background-color: #d6d6d6;">
          <a href="/category/<?php print $cat_mama; ?>/">
            <h2>Все объявления</h2>
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
