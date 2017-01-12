<?php
/**
 * set_error_handler
 * set_exception_handler
 * Dump and die dev tool
 */

if(ENVIRONMENT === 'development'){
    if (!function_exists('myErrorHandler'))
    {

        /**
         * Default Error Handler
         *
         * @param $errno
         * @param $errstr
         * @param $errfile
         * @param $errline
         * @return bool|void
         */
        function myErrorHandler($errno, $errstr, $errfile, $errline)
        {
            if (!(error_reporting() & $errno)) {
                // This error code is not included in error_reporting
                return;
            }

            switch ($errno) {
                case E_USER_ERROR:
                    echo "<b>My ERROR</b> [$errno] $errstr<br />\n";
                    echo "  Fatal error on line $errline in file $errfile";
                    echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
                    echo "Aborting...<br />\n";
                    exit(1);
                    break;

                case E_USER_WARNING:
                    echo "<b>My WARNING</b> [$errno] $errstr<br />\n";
                    break;

                case E_USER_NOTICE:
                    echo "<b>My NOTICE</b> [$errno] $errstr<br />\n";
                    break;

                default:
                    echo "Unknown error type: [$errno] $errstr<br />\n";
                    break;
            }

            /* Don't execute PHP internal error handler */
            return true;
        }
        $old_error_handler = set_error_handler("myErrorHandler");
    }

    if (!function_exists('exception_handler'))
    {
        /**
         * Uncaught exceptions handler
         *
         * @param string $exception
         * @return string Exception message, file, line, trace
         */
        function exception_handler($exception) {
            echo '<div class="alert alert-danger">';
            echo '<b>Fatal error</b>:  Uncaught exception \'' . get_class($exception) . '\' with message ';
            echo $exception->getMessage() . '<br>';
            echo 'Stack trace:<pre>' . $exception->getTraceAsString() . '</pre>';
            echo 'thrown in <b>' . $exception->getFile() . '</b> on line <b>' . $exception->getLine() . '</b><br>';
            echo '</div>';
        }
        set_exception_handler('exception_handler');
    }

    if (!function_exists('viewdump'))
    {
        /**
         * Dump and die function
         *
         * @param string $data
         * @return void
         */
        function viewdump($data) {
            echo '<pre>';
            echo var_dump($data);
            echo '</pre>';
            exit();
        }
    }
}

