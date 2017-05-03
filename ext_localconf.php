<?php
defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
    $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['templavoilaplus']['mod1']['renderTopToolbar']['ppi_templavoila_notes'] = \Ppi\PpiTemplavoilaNotes\Hooks\TopToolbar::class . '->render';
}
