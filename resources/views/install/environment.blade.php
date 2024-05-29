<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Travian Installer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://license.viserlab.com/external/install.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
<div class="installation-section padding-bottom padding-top">
    <div class="container">
        <div class="installation-wrapper">
            <div class="install-content-area">
                <div class="installation-wrapper pt-md-5">
                    <ul class="installation-menu">
                        <li class="steps done">
                            <div class="thumb">
                                <i class="fas fa-server"></i>
                            </div>
                            <h5 class="content">Server<br>Requirements</h5>
                        </li>
                        <li class="steps running">
                            <div class="thumb">
                                <i class="fas fa-file-signature"></i>
                            </div>
                            <h5 class="content">Environment</h5>
                        </li>
                        <li class="steps">
                            <div class="thumb">
                                <i class="fas fa-database"></i>
                            </div>
                            <h5 class="content">Installation<br>Information</h5>
                        </li>
                        <li class="steps">
                            <div class="thumb">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <h5 class="content">Complete<br>Installation</h5>
                        </li>
                    </ul>
                </div>
                <div class="installation-wrapper">
                    <div class="install-content-area">
                        <div class="install-item">
                            <h3 class="bg-warning title text-center">Environment</h3>
                            <div class="box-item">
                                <div class="item">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form method="post" action="{{ route('install.environmentSave') }}" class="tabs-wrap">
                                        @csrf
                                        <div class="row">
                                            <div class="information-form-group col-sm-6">
                                                <label for="app_name">App Name</label>
                                                <input type="text" name="app_name" id="app_name" value="Travian">
                                                @if ($errors->has('app_name'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                                        {{ $errors->first('app_name') }}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="information-form-group col-sm-6">
                                                <label for="environment">Environment</label>
                                                <select class="form-control" name="environment" id="environment">
                                                    <option value="local" selected>Local</option>
                                                    <option value="production">Production</option>
                                                    <option value="testing">Testing</option>
                                                </select>
                                                @if ($errors->has('environment'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                                        {{ $errors->first('environment') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6 {{ $errors->has('app_debug') ? ' has-error ' : '' }}">
                                                <label for="app_debug">App Debug</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="app_debug" id="app_debug" value="true">
                                                    <label class="form-check-label" for="app_debug">True</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="app_debug" id="app_debug" value="false" checked>
                                                    <label class="form-check-label" for="app_debug">False</label>
                                                </div>
                                                @if ($errors->has('app_debug'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                                        {{ $errors->first('app_debug') }}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="information-form-group col-sm-6">
                                                <label for="app_log_level">Log Level</label>
                                                <select class="form-control" name="app_log_level" id="app_log_level">
                                                    <option value="alert">Alert</option>
                                                    <option value="critical">Critical</option>
                                                    <option value="debug" selected>Debug</option>
                                                    <option value="emergency">Emergency</option>
                                                    <option value="error">Error</option>
                                                    <option value="info">Info</option>
                                                    <option value="notice">Notice</option>
                                                    <option value="warning">Warning</option>
                                                </select>
                                                @if ($errors->has('app_log_level'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                                        {{ $errors->first('app_log_level') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="information-form-group col-sm-6 {{ $errors->has('app_url') ? ' has-error ' : '' }}">
                                                <label for="app_url">App URL</label>
                                                <input type="text" name="app_url" id="app_url" value="{{ url('/') }}" placeholder="App URL">
                                                @if ($errors->has('app_url'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                                        {{ $errors->first('app_url') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="information-form-group col-sm-6 {{ $errors->has('database_connection') ? ' has-error ' : '' }}">
                                                <label for="database_connection">Database</label>
                                                <a href="https://laravel.com/docs/11.x/database" target="_blank" title="More Info">
                                                    <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                                    <span class="sr-only">More Info</span>
                                                </a>
                                                <select class="form-control" name="database_connection" id="database_connection">
                                                    <option value="mariadb">MariaDB</option>
                                                    <option value="mysql" selected>MySQL</option>
                                                    <option value="pgsql">PostgreSQL</option>
                                                    <option value="sqlite">SQLite</option>
                                                    <option value="sqlsrv">SQL Server</option>
                                                </select>
                                                @if ($errors->has('database_connection'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                                        {{ $errors->first('database_connection') }}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="information-form-group col-sm-6 {{ $errors->has('database_hostname') ? ' has-error ' : '' }}">
                                                <label for="database_hostname">Database Hostname</label>
                                                <input type="text" name="database_hostname" id="database_hostname" value="127.0.0.1" placeholder="Database Hostname">
                                                @if ($errors->has('database_hostname'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                                        {{ $errors->first('database_hostname') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="information-form-group col-sm-6 {{ $errors->has('database_name') ? ' has-error ' : '' }}">
                                                <label for="database_name">Database Name</label>
                                                <input type="text" name="database_name" id="database_name" value="" placeholder="Database Name">
                                                @if ($errors->has('database_name'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                                        {{ $errors->first('database_name') }}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="information-form-group col-sm-6 {{ $errors->has('database_port') ? ' has-error ' : '' }}">
                                                <label for="database_port">Database Port</label>
                                                <input type="text" name="database_port" id="database_port" value="3306" placeholder="Database Port">
                                                @if ($errors->has('database_port'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                                        {{ $errors->first('database_port') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="information-form-group col-sm-6 {{ $errors->has('database_username') ? ' has-error ' : '' }}">
                                                <label for="database_username">Database Username</label>
                                                <input type="text" name="database_username" id="database_username" value="" placeholder="Database Username">
                                                @if ($errors->has('database_username'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                                        {{ $errors->first('database_username') }}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="information-form-group col-sm-6 {{ $errors->has('database_password') ? ' has-error ' : '' }}">
                                                <label for="database_password">Database Password</label>
                                                <input type="text" name="database_password" id="database_password" value="" placeholder="Database Password">
                                                @if ($errors->has('database_password'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                                        {{ $errors->first('database_password') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="information-form-group col-sm-6 {{ $errors->has('broadcast_driver') ? ' has-error ' : '' }}">
                                                <label for="broadcast_driver">Broadcast Driver</label>
                                                <a href="https://laravel.com/docs/11.x/broadcasting" target="_blank" title="More Info">
                                                    <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                                    <span class="sr-only">More Info</span>
                                                </a>
                                                <input type="text" name="broadcast_driver" id="broadcast_driver" value="log" placeholder="Broadcast Driver">
                                                @if ($errors->has('broadcast_driver'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                                        {{ $errors->first('broadcast_driver') }}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="information-form-group col-sm-6 {{ $errors->has('cache_driver') ? ' has-error ' : '' }}">
                                                <label for="cache_driver">Cache Driver</label>
                                                <a href="https://laravel.com/docs/11.x/cache" target="_blank" title="More Info">
                                                    <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                                    <span class="sr-only">More Info</span>
                                                </a>
                                                <input type="text" name="cache_driver" id="cache_driver" value="file" placeholder="Cache Driver">
                                                @if ($errors->has('cache_driver'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                                        {{ $errors->first('cache_driver') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="information-form-group col-sm-6 {{ $errors->has('session_driver') ? ' has-error ' : '' }}">
                                                <label for="session_driver">Session Driver</label>
                                                <a href="https://laravel.com/docs/11.x/session" target="_blank" title="More Info">
                                                    <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                                    <span class="sr-only">More Info</span>
                                                </a>
                                                <input type="text" name="session_driver" id="session_driver" value="file" placeholder="Session Driver">
                                                @if ($errors->has('session_driver'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                                        {{ $errors->first('session_driver') }}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="information-form-group col-sm-6 {{ $errors->has('queue_driver') ? ' has-error ' : '' }}">
                                                <label for="queue_driver">Queue Driver</label>
                                                <a href="https://laravel.com/docs/11.x/queues" target="_blank" title="More Info">
                                                    <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                                    <span class="sr-only">More Info</span>
                                                </a>
                                                <input type="text" name="queue_driver" id="queue_driver" value="null" placeholder="Queue Driver">
                                                @if ($errors->has('queue_driver'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                                        {{ $errors->first('queue_driver') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="information-form-group col-sm-6 {{ $errors->has('redis_hostname') ? ' has-error ' : '' }}">
                                                <label for="redis_hostname">Redis Hostname</label>
                                                <a href="https://laravel.com/docs/11.x/redis" target="_blank" title="More Info">
                                                    <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                                    <span class="sr-only">More Info</span>
                                                </a>
                                                <input type="text" name="redis_hostname" id="redis_hostname" value="127.0.0.1" placeholder="Redis Hostname">
                                                @if ($errors->has('redis_hostname'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                                        {{ $errors->first('redis_hostname') }}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="information-form-group col-sm-6 {{ $errors->has('redis_password') ? ' has-error ' : '' }}">
                                                <label for="redis_password">Redis Password</label>
                                                <input type="text" name="redis_password" id="redis_password" value="null" placeholder="Redis Password">
                                                @if ($errors->has('redis_password'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                                        {{ $errors->first('redis_password') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="information-form-group col-sm-6 {{ $errors->has('redis_port') ? ' has-error ' : '' }}">
                                                <label for="redis_port">Redis Port</label>
                                                <input type="text" name="redis_port" id="redis_port" value="6379" placeholder="Redis Port">
                                                @if ($errors->has('redis_port'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                                        {{ $errors->first('redis_port') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="information-form-group col-sm-6 {{ $errors->has('mail_driver') ? ' has-error ' : '' }}">
                                                <label for="mail_driver">Mail Driver</label>
                                                <a href="https://laravel.com/docs/11.x/mail" target="_blank" title="More Info">
                                                    <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>
                                                    <span class="sr-only">More Info</span>
                                                </a>
                                                <input type="text" name="mail_driver" id="mail_driver" value="smtp" placeholder="Mail Driver">
                                                @if ($errors->has('mail_driver'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                                        {{ $errors->first('mail_driver') }}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="information-form-group col-sm-6 {{ $errors->has('mail_host') ? ' has-error ' : '' }}">
                                                <label for="mail_host">Mail Host</label>
                                                <input type="text" name="mail_host" id="mail_host" value="smtp.mailtrap.io" placeholder="Mail Host">
                                                @if ($errors->has('mail_host'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                                        {{ $errors->first('mail_host') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="information-form-group col-sm-6 {{ $errors->has('mail_port') ? ' has-error ' : '' }}">
                                                <label for="mail_port">Mail Port</label>
                                                <input type="text" name="mail_port" id="mail_port" value="2525" placeholder="Mail Port">
                                                @if ($errors->has('mail_port'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                                        {{ $errors->first('mail_port') }}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="information-form-group col-sm-6 {{ $errors->has('mail_username') ? ' has-error ' : '' }}">
                                                <label for="mail_username">Mail Username</label>
                                                <input type="text" name="mail_username" id="mail_username" value="null" placeholder="Mail Username">
                                                @if ($errors->has('mail_username'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                                        {{ $errors->first('mail_username') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="information-form-group col-sm-6 {{ $errors->has('mail_password') ? ' has-error ' : '' }}">
                                                <label for="mail_password">Mail Password</label>
                                                <input type="text" name="mail_password" id="mail_password" value="null" placeholder="Mail Password">
                                                @if ($errors->has('mail_password'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                                        {{ $errors->first('mail_password') }}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="information-form-group col-sm-6 {{ $errors->has('mail_encryption') ? ' has-error ' : '' }}">
                                                <label for="mail_encryption">Mail Encryption</label>
                                                <input type="text" name="mail_encryption" id="mail_encryption" value="null" placeholder="Mail Encryption">
                                                @if ($errors->has('mail_encryption'))
                                                    <span class="error-block">
                                                        <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                                        {{ $errors->first('mail_encryption') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="item text-right">
                                            <button class="theme-button choto" type="submit">Setup
                                                <i class="fa fa-angle-double-right"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
