<?php

class SavFormSubmitSavFormModuleFrontController extends ModuleFrontController
{
    public function postProcess()
    {
        if (Tools::isSubmit('submit_savform')) {
            $email = Tools::getValue('email');
            $subject = Tools::getValue('subject');
            $message = Tools::getValue('message');

            // Valider et traiter les données ici
            // Par exemple, enregistrer les données dans la base de données et envoyer un email de confirmation

            Tools::redirect('index.php?controller=order-confirmation');
        }
    }

    public function initContent()
    {
        parent::initContent();
        $this->setTemplate('module:savform/views/templates/front/mysavform.tpl');
    }
}
