<?php

// подключение всех init.php из модулей каталога Modules
// например: app/Modules/Form/init.php

$allFiles = glob(BASE_DIR . 'app/Modules/*/init.php');

foreach ($allFiles as $file) {
    require $file;
}

# end of file
