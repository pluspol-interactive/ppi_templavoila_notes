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

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

use Ppi\TemplaVoilaPlus\Controller\BackendLayoutController;

/**
 * Class to add sys notes to the templavoila page module
 * Uses the renderTopToolbar hook
 *
 * @author Andreas Kießling <kiessling@pluspol-interactive.de>
 */
class RenderHook
{
    /**
     * Render inside Footer
     *
     * @var array $params
     * @var BackendLayoutController $parentObject The TV+ BackendLayoutController
     */
    public function renderHeaderFunctionHook(array $params, BackendLayoutController $parentObject)
    {
        if (version_compare(TYPO3_version, '9.4.0', '>=')) {
            $controller = GeneralUtility::makeInstance(\TYPO3\CMS\SysNote\Controller\NoteController::class);
            $content = $controller->listAction($parentObject->id, \TYPO3\CMS\SysNote\Domain\Repository\SysNoteRepository::SYS_NOTE_POSITION_TOP);
        } else {
            /** @var $noteBootstrap \TYPO3\CMS\SysNote\Core\Bootstrap */
            $noteBootstrap = GeneralUtility::makeInstance(\TYPO3\CMS\SysNote\Core\Bootstrap::class);
            $content = $noteBootstrap->run('Note', 'list', ['pids' => $parentObject->id]);
        }
        if ($content) {
            $content = '<div class="note-container">' . $content . '</div>';


            $resourcePath = ExtensionManagementUtility::extPath('ppi_templavoila_notes') . 'Resources/Public/';
            $pageRenderer = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);
            $pageRenderer->addCssFile($resourcePath . 'Css/notes.css');
        }

        return $content;
    }

    /**
     * Render inside Footer
     *
     * @var array $params
     * @var BackendLayoutController $parentObject The TV+ BackendLayoutController
     */
    public function renderFooterFunctionHook(array $params, BackendLayoutController $parentObject)
    {
        // Since v9LTS sys_notes we can use them on top or bottom
        if (version_compare(TYPO3_version, '9.4.0', '>=')) {
            $controller = GeneralUtility::makeInstance(\TYPO3\CMS\SysNote\Controller\NoteController::class);
            $content =  $controller->listAction($parentObject->id, \TYPO3\CMS\SysNote\Domain\Repository\SysNoteRepository::SYS_NOTE_POSITION_BOTTOM);
        } else {
            $content =  '';
        }
        if ($content) {
            $content = '<div class="note-container-bottom">' . $content . '</div>';


            $resourcePath = ExtensionManagementUtility::extPath('ppi_templavoila_notes') . 'Resources/Public/';
            $pageRenderer = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);
            $pageRenderer->addCssFile($resourcePath . 'Css/notes.css');
        }

        return $content;
    }
}
