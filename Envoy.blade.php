{{-- === SERVERS ========================================================== --}}

@servers(['ws' => 'uid111384@shellserver.websupport.sk -p 15709'])

{{-- === SETUP ============================================================ --}}

@setup
    $secret_folder = "~/davidlukac.com/secret";
@endsetup

{{-- === MACROS =========================================================== --}}

@macro('deploy-dev')
    fetch-secret
    deploy-dev
@endmacro

{{-- === TASKS ============================================================ --}}

@task('ping-ws', ['on' => 'ws'])
    echo "Hello world from Websupport server!"
    echo $(pwd)
@endtask

@task('deploy-dev', ['on' => 'ws'])
    cd davidlukac.com/sub/dev/
    git checkout develop
    git pull
    drush @dev.davidlukac.com status
@endtask

@task('drush-check', ['on' => 'ws'])
    echo "Running Drush availability check."
    echo "Starting folder is ${INIT_DIR}."
    eval "pwd"

    cd davidlukac.com/sub/dev/
    echo "Drush commands in DEV:"
    drush sa
    echo '================================================================================'
    {{--drush @dl.dev status--}}

    cd ${INIT_DIR}
    cd davidlukac.com/web
    echo "Drush commands in PROD:"
    drush sa
    echo '================================================================================'
    local CMD="drush @dl.prod status"
    echo "Running: '${CMD}'."
    eval ${CMD}
    {{--drush @dl.prod status--}}
@endtask

@task('temp', ['on' => 'ws'])
@endtask

@task('fetch-secret', ['on' => 'ws'])
    cd {{ $secret_folder }}
    echo "Fetching secret stuff in: "
    git checkout master
    git pull
@endtask
