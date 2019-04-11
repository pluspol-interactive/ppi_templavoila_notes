<?php
defined('TYPO3_MODE') or die();

if (TYPO3_MODE === 'BE') {
    $TYPO3_CONF_VARS['SC_OPTIONS']['templavoilaplus']['BackendLayout']['renderHeaderFunctionHook'][$_EXTKEY]
        = \Ppi\PpiTemplavoilaNotes\Hooks\RenderHook::class . '->renderHeaderFunctionHook';

    $TYPO3_CONF_VARS['SC_OPTIONS']['templavoilaplus']['BackendLayout']['renderFooterFunctionHook'][$_EXTKEY]
        = \Ppi\PpiTemplavoilaNotes\Hooks\RenderHook::class . '->renderFooterFunctionHook';
}
