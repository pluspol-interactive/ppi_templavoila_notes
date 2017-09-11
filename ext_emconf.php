<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'TemplaVoila! Plus - Notes',
    'description' => 'Show sys_note records in TemplaVoilà Plus page module',
    'category' => 'plugin',
    'version' => '0.3.0-dev',
    'state' => 'stable',
    'uploadfolder' => '0',
    'clearCacheOnLoad' => 0,
    'author' => 'Alexander Opitz',
    'author_email' => 'alexander.opitz@pluspol-interactive.de',
    'author_company' => 'PLUSPOL interactive',
    'constraints' => [
        'depends' => [
            'php' => '5.5.0-7.2.99',
            'typo3' => '7.6.0-8.7.99',
            'sys_note' => '7.6.0-8.7.99',
            'templavoilaplus' => '7.1.2-'
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Ppi\\PpiTemplavoilaNotes\\' => 'Classes/',
        ],
    ],
];
