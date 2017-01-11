<?php
/**
 * set_error_handler
 * set_exception_handler
 */

if(ENVIRONMENT === 'development'){

    if (!function_exists('exception_handler'))
    {
        /**
         * @param $exception
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
}

