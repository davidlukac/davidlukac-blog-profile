<?php
/**
 * @file
 * Drush alias file.
 */

/* $site_prod = 'sites/davidlukac.com-drush/'; */

$ws_remote_host = 'shellserver.websupport.sk';
$ws_remote_user = 'uid111384';
$ws_remote_port = '15709';

$drush_bin = '/home/.composer/vendor/drush/drush';
$dump_dir = '~/drush.dbdumps';
$hosting_root = '/home/davidlukac.com/';

$root_dev = $hosting_root . 'sub/dev/';
$site_dev = 'sites/dev.davidlukac.com/';
$files_dev = $root_dev . $site_dev . 'files/';
$uri_dev = 'dev.davidlukac.com';

$root_prod = $hosting_root . 'web/';
$site_prod = 'sites/davidlukac.com/';
$files_prod = $root_prod . $site_prod . 'files/';
$uri_prod = 'davidlukac.com';

$aliases['local'] = array(
  'parent' => '@davidlukac.dd',
  'uri' => 'davidlukac.dd:8083',
);

$aliases['dev'] = array(
  'uri' => $uri_dev,
  'root' => $root_dev,
  'path-aliases' => array(
    '%drush' => $drush_bin,
    '%site' => $site_dev,
  ),
  '%site' => $site_dev,
  '%dump-dir' => $dump_dir,
  '%files' => $files_dev,
  'remote-host' => $ws_remote_host,
  'remote-user' => $ws_remote_user,
  'ssh-options' => "-p {$ws_remote_port} -o PasswordAuthentication=no",
);

$aliases['prod'] = array(
  'uri' => $uri_prod,
  'root' => $root_prod,
  'path-aliases' => array(
    '%drush' => $drush_bin,
    '%site' => $site_prod,
  ),
  '%site' => $site_prod,
  '%dump-dir' => $dump_dir,
  '%files' => $files_prod,
  'remote-host' => $ws_remote_host,
  'remote-user' => $ws_remote_user,
  'ssh-options' => "-p {$ws_remote_port} -o PasswordAuthentication=no",
);

/**
 * Drush alias to be used directly on Websupport.
 */

/**
 * DEVELOPMENT.
 */
$aliases['ws.dev'] = array(
  'uri' => $uri_dev,
  'root' => $root_dev,
  'path-aliases' => array(
    '%drush' => $drush_bin,
    '%site' => $site_dev,
  ),
  '%site' => $site_dev,
  '%dump-dir' => $dump_dir,
  '%files' => $files_dev,
);

/**
 * PRODUCTION.
 */
$aliases['ws.prod'] = array(
  'uri' => $uri_prod,
  'root' => $root_prod,
  'path-aliases' => array(
    '%drush' => $drush_bin,
    '%site' => $site_prod,
  ),
  '%site' => $site_prod,
  '%dump-dir' => $dump_dir,
  '%files' => $files_prod,
);

$aliases['dl.local'] = array(
  'parent' => '@davidlukac.local',
  'uri' => 'davidlukac.dd:8083',
);

$aliases['dl.dev'] = array(
  'parent' => '@davidlukac.dev',
  'uri' => $uri_dev,
);

$aliases['dl.prod'] = array(
  'parent' => '@davidlukac.prod',
  'uri' => $uri_prod,
);
