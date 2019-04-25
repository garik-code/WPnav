# GET STARTED

```
git clone https://github.com/garik-code/wpnav.git
```

or download: https://github.com/garik-code/wpnav/archive/dev.zip

# USE

Create nav-config.php

``` PHP

<?php

  $nav_config['db_name'] = 'table';
  $nav_config['db_host'] = 'localhost';
  $nav_config['db_user'] = 'user';
  $nav_config['db_pass'] = 'pass';

?>


```

Get id parent category:

``` PHP
<?php


    $get_the_category = get_the_category();
    $id = $get_the_category[0]->parent;

    if($id == 220){
      print file_get_contents('http://localhost/nav/?id=220');
    }


?>
```


Support: mail@garik.site
