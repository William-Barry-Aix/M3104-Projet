<?php
class LoadTrad{
    public function __construct()
    {
    }
    public function loadTradsSession(){
        if (!isset($_SESSION['lang']))
            $_SESSION['lang'] = 'FR';
        $loadTrad = new TranslationManage();
        $tradList = $loadTrad->getTranslations($_SESSION['lang']);
        $_SESSION['tradList'] = $tradList;
        return $tradList;
    }
}
