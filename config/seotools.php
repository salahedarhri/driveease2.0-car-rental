<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => 'DriveEase', // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => "Location de voitures facile et rapide, découvrez la sélection DriveEase d'automobiles pour tous vos plans : vacances, voyages d'affaires,... ", // set false to total remove
            'separator'    => ' | ',
            'keywords'     => ['location','rent','renting','voitures','agadir','driveease','casablanca','marrakech','luxe','transport','cars','car','voiture','auto','automobile'],
            'canonical'    => 'current', // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'robots'       => 'all', // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'DriveEase', // set false to total remove
            'description' => "Location de voitures facile et rapide, découvrez la sélection DriveEase d'automobiles pour tous vos plans : vacances, voyages d'affaires,... ",
            'url'         => null, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => false,
            'images'      => [
                public_path('images/composants/car-family.png'),
                public_path('images/composants/car-in-forest.png'),
                public_path('images/composants/compteur-vitesse-voiture-600x400.jpg'),
                public_path('images/composants/landing-600w.png'),
                public_path('images/composants/newsletter-600w.png'),
            ],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'DriveEase', // set false to total remove
            'description' => "Location de voitures facile et rapide, découvrez la sélection DriveEase d'automobiles pour tous vos plans : vacances, voyages d'affaires,... ",
            'url'         => 'current', // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [
                public_path('images/composants/car-family.png'),
                public_path('images/composants/car-in-forest.png'),
                public_path('images/composants/compteur-vitesse-voiture-600x400.jpg'),
                public_path('images/composants/landing-600w.png'),
                public_path('images/composants/newsletter-600w.png'),
            ],
        ],
    ],
];
