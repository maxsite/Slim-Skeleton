<?php

// http://demo/slim2/form
$app->get('/form', \App\Modules\Form\FormShow::class);
$app->post('/form', \App\Modules\Form\FormPost::class);

# end of file
