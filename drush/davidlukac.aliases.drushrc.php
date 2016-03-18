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

$root_prod = $hosting_root . 'web/';
$site_prod = 'sites/davidlukac.com/';
$files_prod = $root_prod . $site_prod . 'files/';

$aliases['local'] = array(
  'parent' => '@davidlukac.dd',
  'uri' => 'davidlukac.dd:8083',
);

$aliases['dev'] = array(
  'uri' => 'dev.davidlukac.com',
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
  'uri' => 'davidlukac.com',
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
$aliases['ws.prod'] = array(
  'uri' => 'davidlukac.com',
  'root' => '/home/davidlukac.com/web',
  'path-aliases' => array(
    '%drush' => '/home/.composer/vendor/drush/drush',
    '%site' => $site_prod,
  ),
  '%site' => $site_prod,
  '%dump-dir' => '~/drush.dbdumps',
  '%files' => '/home/davidlukac.com/web/sites/davidlukac.com/files',
);

$aliases['dl.local'] = array(
  'parent' => '@davidlukac.local',
  'uri' => 'davidlukac.dd:8083',
);

$aliases['dl.dev'] = array(
  'parent' => '@davidlukac.dev',
  'uri' => 'dev.davidlukac.com',
);

$aliases['dl.prod'] = array(
  'parent' => '@davidlukac.prod',
  'uri' => 'davidlukac.dd',
);

$aliases['dl.rmt.prod'] = array(
  'parent' => '@davidlukac.rmt.prod',
);
