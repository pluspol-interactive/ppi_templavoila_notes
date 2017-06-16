<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'TemplaVoilà Plus - Notes',
    'description' => 'Show sys_note records in TemplaVoilà Plus page module',
    'category' => 'plugin',
    'author' => 'Alexander Opitz',
    'author_email' => 'alexander.opitz@pluspol-interactive.de',
    'author_company' => 'PLUSPOL interactive',
    'state' => 'stable',
    'internal' => '',
    'uploadfolder' => '0',
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '0.2.0-dev',
    'constraints' => [
        'depends' => [
            'typo3' => '7.6.0-8.7.99',
            'sys_note' => '7.6.0-7.6.99',
            'templavoilaplus' => '7.1.2-'
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Ppi\\PpiTemplavoilaNotes\\' => 'Classes/',
        ],
    ],
];
