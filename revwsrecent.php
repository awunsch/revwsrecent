<?php
/**
* Copyright (C) 2017-2018 Petr Hucik <petr@getdatakick.com>
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@getdatakick.com so we can send you a copy immediately.
*
* @author    Petr Hucik <petr@getdatakick.com>
* @copyright 2017-2018 Petr Hucik
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*/

class RevwsRecent extends Module
{
    public function __construct() {
        $this->name = 'revwsrecent';
        $this->tab = 'front_office_features';
        $this->version = '1.0.1';
        $this->author = 'datakick';
        $this->need_instance = 0;

        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->l('Recent reviews');
        $this->description = $this->l('Displays recent revws reviews on your homepage.');
    	$this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
        $this->tb_versions_compliancy = '> 1.0.0';
    }

    public function install() {
        if (!parent::install()) {
            return false;
        }
        $this->registerHook('displayHomeTab');
        $this->registerHook('displayHomeTabContent');
        return true;
    }

    public function hookDisplayHomeTab() {
        return $this->display(__FILE__, 'tab.tpl');
    }

    public function hookDisplayHomeTabContent() {
        return $this->display(__FILE__, 'content.tpl');
    }
}
