<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

class SavForm extends Module
{
    public function __construct()
    {
        $this->name = 'savform';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Meme HOUEIBIB';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = ['min' => '1.6', 'max' => _PS_VERSION_];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('SAV Form');
        $this->description = $this->l('Fournit un formulaire SAV pour les clients.');

        $this->confirmUninstall = $this->l('Êtes-vous sur de vouloir désinstaller ?');
    }


    public function hookDisplayCustomerAccount($params)
    {
        $this->context->smarty->assign([
            'action_url' => $this->context->link->getModuleLink('savform', 'SubmitSavForm')
        ]);
        return $this->display(__FILE__, 'views/templates/front/mysavform.tpl');
    }

    public function hookDisplayHeader($params)
    {
        $this->context->controller->addCSS($this->_path.'views/css/savform.css', 'all');
    }

    public function hookDisplayHeader($params)
    {
        $this->context->controller->addJS($this->_path.'views/js/savform.js');
    }



    public function install()
    {
        if (!parent::install() || !$this->registerHook('displayCustomerAccount') || !$this->createSavRequestsTable()) {
            return false;
        }
        return true;
    }
    
    private function createSavRequestsTable()
    {
        $sql = file_get_contents(dirname(__FILE__).'/sql/install.sql');
        $sql = str_replace('PREFIX_', _DB_PREFIX_, $sql);
        return Db::getInstance()->execute($sql);
    }
    

    public function uninstall()
    {
        return parent::uninstall() && $this->deleteSavRequestsTable();
    }
    
    private function deleteSavRequestsTable()
    {
        $sql = "DROP TABLE IF EXISTS `"._DB_PREFIX_."sav_requests`";
        return Db::getInstance()->execute($sql);
    }
    
}
