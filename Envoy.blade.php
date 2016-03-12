@servers(['ws' => 'uid111384@shellserver.websupport.sk -p 15709'])

@task('ping', ['on' => 'ws'])
echo "Hello world"
@endtask

@task('deploy-dev', ['on' => 'ws'])
cd davidlukac.com/sub/dev/
git checkout develop
git pull
drush @dev.davidlukac.com status
@endtask

@task('drush-check', ['on' => 'ws'])
HOME_START=$(pwd)
cd davidlukac.com/sub/dev/
echo "Drush commands in DEV:"
drush sa
cd ${HOME_START}
cd davidlukac.com/web
echo "Drush commands in PROD:"
drush sa
@endtask
