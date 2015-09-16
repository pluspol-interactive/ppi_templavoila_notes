<?php
/**
 * User: Andreas K.
 * Date: 16.09.15 KW: 38
 */

namespace Ppi\PpiTemplavoilaNotes\Hooks;


class TopToolbar
{
    public function render(array $params = array(), $parentObject)
    {

        $cssPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('ppi_templavoila_notes');
        $cssPath .= 'Resources/Public/Css/notes.css';
        $parentObject->doc->getPageRenderer()->addCssFile($GLOBALS['BACK_PATH'] . $cssPath);

        $content = '<div class="note-container">';

        /** @var $noteBootstrap \TYPO3\CMS\SysNote\Core\Bootstrap */
        $noteBootstrap = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\SysNote\\Core\\Bootstrap');
        $content .= $noteBootstrap->run('Note', 'list', array('pids' => $parentObject->id));
        $content .= '</div>';

        return $content;
    }

}
