<?php
namespace Ppi\PpiTemplavoilaNotes\Hooks;

/**
 *  Copyright notice
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 */

/**
 * Class to add sys notes to the templavoila page module
 * Uses the renderTopToolbar hook
 *
 * @author Andreas Kießling <kiessling@pluspol-interactive.de>
 */
class TopToolbar
{
    public function render(array $params = array(), \Extension\Templavoila\Controller\BackendLayoutController $parentObject)
    {

        $cssPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('ppi_templavoila_notes');
        $cssPath .= 'Resources/Public/Css/notes.css';

        $pageRenderer = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);
        $pageRenderer->addCssFile($GLOBALS['BACK_PATH'] . $cssPath);

        $content = '<div class="note-container">';

        /** @var $noteBootstrap \TYPO3\CMS\SysNote\Core\Bootstrap */
        $noteBootstrap = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\SysNote\\Core\\Bootstrap');
        $content .= $noteBootstrap->run('Note', 'list', array('pids' => $parentObject->id));
        $content .= '</div>';

        return $content;
    }

}
