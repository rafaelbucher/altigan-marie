<?php

return [
  'jr' => [
    'static_site_generator' => [
      // 👇 clé obligatoire !
      'endpoint' => 'generate-static-site',

      // dossier de sortie (relatif à la racine du projet)
      'output_folder' => __DIR__ . '/../../static',

      // URL de base (utile pour les liens internes)
      'base_url' => '/',

      // fichiers ou dossiers à ne pas supprimer à chaque build
      'preserve' => [],
    ]
  ]
];
