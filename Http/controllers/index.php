<?php

$_SESSION['name'] = 'raya khader'; // temporary, destroy when close the browser



// load view and each variable accessable in the views and partials
view("index.view.php", [
    'heading' => 'Home'
]);
