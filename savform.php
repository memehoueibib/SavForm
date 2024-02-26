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


    public function install()
    {
        if (!parent::install() || !$this->registerHook('displayCustomerAccount')) {
            return false;
        }
        return true;
    }

    public function uninstall()
    {
        if (!parent::uninstall()) {
            return false;
        }
        return true;
    }
}
