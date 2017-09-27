<?php
/**
 * \file            helper_functions.php
 * \brief           General utilities for use in the application
 * \since           06 Aug 2014 
 *
 * \todo            Move to directory inaccessible from the web
 */

// ▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒
// INCLUDES AND REQUIRES
// Note creative uses ( Examples 4,5,6 ): http://www.php.net/manual/en/function.include.php
require_once    __DIR__ . DIRECTORY_SEPARATOR . 'constants.php';



// ▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒
// GLOBAL CONSTANTS
//      http://www.php.net/manual/en/language.constants.predefined.php



// ▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒
// GLOBAL FUNCTIONS


/// A *server-side* utility function to test if cookies are enabled
/// Adapted from http://stackoverflow.com/a/15811258
function    areClientCookiesEnabled() {
    // Avoid overhead, if already tested, return it
    if( true === defined( 'FS_CLIENT_COOKIES_ENABLED' ) )   { 
        return FS_CLIENT_COOKIES_ENABLED; 
    }

    $bIni   = ini_get( 'session.use_cookies' ); 
    if( 1 !== $bIni )   {
        /// \todo   flag that .user.ini is missing
        ini_set( 'session.use_cookies', 1 ); 
    }

    $a  = session_id();

    $bWasStarted    = (bool)( is_string( $a ) && strlen( $a ) );
    if( true !== $bWasStarted )   {
        @session_start();
        $a = session_id();
    }
    
    // At this point, we are dead positive that we have a session going.
    // Make a copy of current session data as we are going to mess with it.
    $session_data_backup = ( true === isset( $_SESSION ) )  ?  $_SESSION : array();
   
    // Now we destroy the session HOWEVER 
    // - We've lost the data but not the session id when cookies are enabled. 
    // - We've saved off the data so we can restore it later. 
    @session_destroy(); 
    @session_start();
    $_SESSION = $session_data_backup;

    // If no cookies are enabled:
    // - The session data we just started will differ from first session start
    $b = session_id();

    // If not was started, write data to the session container to avoid data loss
    if( true !== $bWasStarted ) { 
        @session_write_close(); 
    }

    // When no cookies are enabled, $a and $b are not the same
    $b = (bool)( $a === $b );
    define( 'FS_CLIENT_COOKIES_ENABLED', $b, true );

    return $b;
}



/// Gets the name of a PHP file without an extension (used to include javascript files primarily)
/// \param  <String> $str   the path and filename of a php file; typically __FILE__
/// \return <Mixed>        
///         <String>    the name of the file *without* path or extension
///         <Boolean>   (false) You didn't pass in a string sparky
function    get_extensionless_filename( $str )  {
    return  ( true === is_string( $str ) )  
            ?   str_ireplace( '.php', '', basename( $str ) )
            :   false;
}

