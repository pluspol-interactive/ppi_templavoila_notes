<?php
defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
    $TYPO3_CONF_VARS['SC_OPTIONS']['templavoilaplus']['BackendLayout']['renderHeaderFunctionHook']['ppi_templavoila_notes'] = \Ppi\PpiTemplavoilaNotes\Hooks\RenderHook::class . '->renderHeaderFunctionHook';
}
