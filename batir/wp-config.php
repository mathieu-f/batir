<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur 
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'db513629807');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'dbo513629807');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'Tr0tter$batir');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'db513629807.db.1and1.com');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'uqMPG>(DB#+:!JlMU}Bg:N0AOIhV7#%Utl-P4^+NI:vwoff}!sZD~5wCk9_]]a +');
define('SECURE_AUTH_KEY',  '` e`y,#J*SUj4Gb|!$IS-MY|D)1+H~X9$$$]jUa6*Njh6jZ7Y{M6$qzmj+b+.dj6');
define('LOGGED_IN_KEY',    'qK<~OD#4~/Is$eH$jG<V>+POw(9 hqw-79D52M7nC#|%|Jbc_G?o1=U<yYzYX)}0');
define('NONCE_KEY',        ']5i>ox>~$nI -t d{*49LB-. Iyn@|dU8A1BZ~:O[un`1FAf6QU{z^&y#-kVR?3^');
define('AUTH_SALT',        '~%K2j[xB]il9Nm4YJ-5=i~##o~4|OI}~/^$3cODtVsbgzKTDCmj,B5G)xtX%*0l?');
define('SECURE_AUTH_SALT', '7:-*|J-@p&v^B?bNXqpy_X|Ht[,u+e$-MLzuf&`K-`sP;T6EeKZ+J;O/;7h<(]05');
define('LOGGED_IN_SALT',   'PYF3{u%7{l[%Sqg<8 l~tcNjqJv5[bg1+|94;:8O}ut+Iy% 7f1]E)>nC-YYBcE~');
define('NONCE_SALT',       '*(X.~@i}O9QhnJ.?%P|eIs%s1Xf)Rg9[}di|&gq{O]+DM3}vG:l `_unlHN5Wt-H');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'batir_';

/**
 * Langue de localisation de WordPress, par défaut en Anglais.
 *
 * Modifiez cette valeur pour localiser WordPress. Un fichier MO correspondant
 * au langage choisi doit être installé dans le dossier wp-content/languages.
 * Par exemple, pour mettre en place une traduction française, mettez le fichier
 * fr_FR.mo dans wp-content/languages, et réglez l'option ci-dessous à "fr_FR".
 */
define('WPLANG', 'fr_FR');

/** 
 * Pour les développeurs : le mode deboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 */ 
define('WP_DEBUG', false); 

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
