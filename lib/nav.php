<nav id="navSmarty">
  <div id="oldContent" style="display: none;">null</div>
  <div class="content" id="content">

    <?php for($i=0; $i < count($cat); $i++): //   Крутим категории     ?>
      <?php if($index_cat[$cat[$i]['term_id']][$_GET['id']]): //  ??????????   ?>

    <div class="block">

      <?php

        $cat_mama = $cat[$i]['slug']; // Название основной категории
        $cat_id = $cat[$i]['term_id']; // Идентификатор категории
        $cat_name = $cat[$i]['name']; // Название категории

      ?>

      <a href="/category/<?php print $cat_mama; ?>/" onClick="catalog('catalog_<?php print $cat_id; ?>', '/category/<?php print $cat_mama; ?>/');return false;">
        <h2><?php print $cat_name; ?></h2>
        <i class="fa fa-chevron-right" aria-hidden="true"></i>
      </a>

      <div id="catalog_<?php print $cat_id; ?>" style="display: none;">

        <?php for ($a=0; $a < count($tax); $a++): ?>
          <?php if($cat_id == $tax[$a]['parent']): ?>
            <?php for($b=0; $b < count($cat); $b++): ?>
              <?php if($tax[$a]['term_id'] == $cat[$b]['term_id']): ?>

<!--  -->

                  <!-- <div class="block">
                    <a href="/category/<?php print $cat[$b]['slug']; ?>/">
                      <h2><?php print $cat[$b]['name']; ?></h2>
                      <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </a>
                  </div> -->

                  <div class="block">

                    <?php

                      $podcat_mama = $cat[$b]['slug']; // Название основной категории
                      $podcat_id = $cat[$b]['term_id']; // Идентификатор категории
                      $podcat_name = $cat[$b]['name']; // Название категории

                    ?>

                    <a href="/category/<?php print $podcat_mama; ?>/" onClick="catalog('catalog_<?php print $podcat_id; ?>', '/category/<?php print $podcat_mama; ?>/');return false;">
                      <h2><?php print $podcat_name; ?></h2>
                      <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </a>

                    <div id="catalog_<?php print $podcat_id; ?>" style="display: none;">

                      <?php for ($a=0; $a < count($tax); $a++): ?>
                        <?php if($podcat_id == $tax[$a]['parent']): ?>
                          <?php for($x=0; $x < count($cat); $x++): ?>
                            <?php if($tax[$a]['term_id'] == $cat[$x]['term_id']): ?>

                              <?php

                                $podpodcat_mama = $cat[$x]['slug']; // Название основной категории
                                $podpodcat_id = $cat[$x]['term_id']; // Идентификатор категории
                                $podpodcat_name = $cat[$x]['name']; // Название категории

                              ?>

                              <div class="block">
                                <a href="/category/<?php print $podpodcat_mama; ?>/">
                                  <h2><?php print $podpodcat_name; ?></h2>
                                  <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                </a>
                              </div>

                            <?php endif; ?>
                          <?php endfor; ?>
                        <?php endif; ?>
                      <?php endfor; ?>

                    </div>

                  </div>


<!--  -->

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
