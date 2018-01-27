<?php

if (!isset($_SESSION['lang']))
    $_SESSION['lang'] = 'FR';
$loadTrad = new TranslationManage();
$tradList = $loadTrad->getTranslations($_SESSION['lang']);