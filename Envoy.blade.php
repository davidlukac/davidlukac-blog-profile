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
    echo \$(pwd)
@endtask

@task('deploy-dev', ['on' => 'ws'])
    cd davidlukac.com/sub/dev/
    git checkout develop
    git pull

    CMD="drush @ws.dev status"
    echo "Running: '\${CMD}'."
    eval \${CMD}

    CMD="drush @ws.dev updb"
    echo "Running: '\${CMD}'."
    eval \${CMD}

    CMD="drush @ws.dev cc all"
    echo "Running: '\${CMD}'."
    eval \${CMD}

    CMD="drush @ws.dev cron"
    echo "Running: '\${CMD}'."
    eval \${CMD}
@endtask

@task('drush-check', ['on' => 'ws'])
    INIT_DIR=\$(pwd)
    echo "Running Drush availability check."
    echo "Starting folder is \${INIT_DIR}."

    cd \${INIT_DIR}/davidlukac.com/sub/dev/
    echo "Drush commands in DEV:"
    drush sa
    echo '================================================================================'
    CMD="drush @ws.dev status"
    echo "Running: '\${CMD}'."
    eval \${CMD}

    cd \${INIT_DIR}/davidlukac.com/web
    echo "Drush commands in PROD:"
    drush sa
    echo '================================================================================'
    CMD="drush @ws.prod status"
    echo "Running: '\${CMD}'."
    eval \${CMD}
@endtask

@task('temp', ['on' => 'ws'])
@endtask

@task('fetch-secret', ['on' => 'ws'])
    cd {{ $secret_folder }}
    echo "Fetching secret stuff in: "
    git checkout master
    git pull
@endtask
