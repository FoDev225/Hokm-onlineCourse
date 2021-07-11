<?php

	/*
    |--------------------------------------------------------------------------
    | Titles for routes names
    |--------------------------------------------------------------------------
    |
    | Set Titles for each admin routes names
    */
   
	return [
		'categories' => [
	        'index' => 'Categories',
	        'create' => "Création d'une categorie",
	        'destroy' => [
	          'alert' => "Suppression d'une categorie",
	        ],
	    ],

		'courses' => [
	        'index' => 'Formations',
	        'create' => "Création d'une formation",
	        'destroy' => [
	          'alert' => "Suppression d'une formation",
	        ],
	    ],

	    'lessons' => [
	        'index' => 'Lessons',
	        'create' => "Création d'une leçon",
	        'destroy' => [
	          'alert' => "Suppression d'une leçon",
	        ],
	    ],
	    
	    'shop' => [
	        'edit' => 'Gestion de la l\'école',
	    ],

	    'pages' => [
	        'index' => 'Gestion des pages',
	        'edit' => 'Modification d\'une page',
	        'create' => 'Création d\'une page',
	    ],

	    'permission' => [
	        'index' => 'Gestion des permissions',
	        'edit' => 'Modification d\'une permission',
	        'create' => 'Création d\'une permission',
	    ],

	    'role' => [
	        'index' => 'Gestion des roles',
	        'edit' => 'Modification d\'une role',
	        'create' => 'Création d\'une role',
	    ],

	    'users' => [
	        'index' => 'Utilisateur',
	        'show' => 'Fiche Utilisateur',
	    ],

	    'records' => [
	        'index' => 'Formation enregistrée',
	        'show' => 'Gestion d\'une formation',
	    ],

	    'maintenance' => [
	        'edit' => 'Maintenance',
	    ],

	    'statistics' => 'Statistiques',

	    'admin' => 'Tableau de bord',
	];