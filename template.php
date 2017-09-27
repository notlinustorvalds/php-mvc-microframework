<?php 
/**
 * \file        template.php
 * \breif       A class to quickly and painlessly render HTML
 * \since       27 Sep 2013
 * \details     Code adapted from http://codeangel.org/articles/simple-php-template-engine.html
 */

// ▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒
// INCLUDES AND REQUIRES
// Note creative uses ( Examples 4,5,6 ): http://www.php.net/manual/en/function.include.php
require_once    __DIR__ . DIRECTORY_SEPARATOR . 'package.php';



// ▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒
// GLOBAL CONSTANTS
//      http://www.php.net/manual/en/language.constants.predefined.php



// ▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒
// GLOBAL FUNCTIONS



// ▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒
// NAMESPACES ( php > 5.3 )
// http://www.php.net/manual/en/language.namespaces.php



// ▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒
// OBJECT DEFINITION
/// \copydoc    template.php
class  Template {

    // ▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒
    // PUBLIC STUFF

    // ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░
    // ░ ░ ░ CLASS CONSTANTS
    // ░ ░ ░    http://www.php.net/manual/en/language.oop5.constants.php
    // ░ ░ ░    http://www.php.net/manual/en/language.oop5.late-static-bindings.php


    // ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░
    // ░ ░ ░ PHP MAGIC CLASS FUNCTIONS
    // ░ ░ ░ http://www.php.net/manual/en/language.oop5.magic.php
    // ░ ░ ░    http://www.php.net/manual/en/language.oop5.decon.php
    // ░ ░ ░    http://www.php.net/manual/en/language.oop5.cloning.php
    // ░ ░ ░    http://www.php.net/manual/en/language.oop5.serialization.php

    /// CTOR: initializes non-body content member vars
    public function     __construct()    {
        
        $tz     = new DateTimezone( 'UTC' );
        $date   = new DateTime( null,  $tz );
        $this->_file_template_year   = date_format( $date, 'Y' );
    }

    // / DTOR: default
    //public function     __destruct()    {}

    // / CCTOR: default
    //public function     __clone()   {}

    // / toString: default
    //public function     __toString()    {}

    // / sleep: default
    // / \detail    `__sleep()` is executed prior to serialization done by `serialize()`
    // /            Purpose is to commit pending data or perform similar cleanup tasks
    //public function     __sleep()   {}

    // / wakeup: default
    // / \detail    `__wakeup()` is executed prior to unserialization done by `unserialize()`
    // /            Purpose is to reconstruct/re-init any resources that the object may have (e.g. sockets, DB conn, etc.)
    //public function     __wakeup()  {}


    // ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░
    // / autoload: default
    // / \detail    http://www.php.net/manual/en/language.oop5.autoload.php
    // /            Prevents the need to have umpteen includes sprinkled throughout code
    // / 
    // /            `spl_autoload()` is the default implementation of `__autoload()`
    // /            http://www.php.net/manual/en/function.spl-autoload.php
    //public function     __autoload()    {}


    // ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░
    // ░ ░ ░ CLASS FUNCTION GENERICS
    // ░ ░ ░    http://www.php.net/manual/en/language.oop5.overloading.php#language.oop5.overloading.methods
    // ░ ░ ░    DEBUGGING: http://www.php.net/manual/en/ref.classobj.php

    /// ( php > =5.3 ): calls render()
    /// \detail    Called when a script tries to call an object as a function
    public function __invoke( $var )    {
        return $this->render( $var );
    }

    /// returns the member variable array
    /// \detail    Called for classes exported by `var_export()`
    public static function  __set_state( array $propArr ) {
        $retObj = new Template();
        $retObj->_content_to_render     = $propArr['_content_to_render'];
        $retObj->_additional_js_urls    = $propArr['_additional_js_urls'];
        $retObj->_additional_css_urls   = $propArr['_additional_css_urls'];
        return  $retObj;
    }

    // / call: default
    // / \detail    Called when invoking inaccessible methods in an object context (like `__get()` for methods)
    //public function     __call( $functionName, $functionArgsArr )   {}

    // / callStatic ( php > =5.3 ): default
    // / \detail    Same as `__call()` but for static methods
    //public function     __callStatic( $functionName, $functionArgsArr ) {}


    // ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░
    // ░ ░ ░ CLASS PROPERTY GETTERS AND SETTERS
    // ░ ░ ░    http://www.php.net/manual/en/language.oop5.properties.php
    // ░ ░ ░    http://www.php.net/manual/en/language.oop5.overloading.php#language.oop5.overloading.members
    // ░ ░ ░    DEBUGGING: http://www.php.net/manual/en/ref.classobj.php

    /// Sets the content that will be rendered on output
    /// \detail    Called when writing data to inaccessible properties.
    public function __set( $objProp, $value )   {
        if( 'view_template_file' === $objProp ) {
            throw new Exception("Cannot bind variable named 'view_template_file'");
        }

        // Year (used for copyright, etc.)
        if( '_file_template_year' === $objProp ) {
            // do nothing.
        }
        
        // CSS
        if( '_additional_css_urls' === $objProp )   {
            if( true === is_array( $value ) )   {
                //$this->_additional_css_urls = $value;   // the template file needs to sanitize!
                $this->_additional_css( $value );
            }
        }
        if( '_additional_css'  === $objProp )   {
            if( true === is_array( $value ) )   {
                reset( $value );
                while( list( $key, $url ) = each( $value ) )    {
                    if(     true === is_string( $url )
                        &&  false === in_array( $url, $this->_additional_css_urls )
                    )    {
                        array_push( $this->_additional_css_urls, $url );
                    }
                }
            }
            else    {
                if(     true === is_string( $value )
                    &&  false === in_array( $value, $this->_additional_css_urls )
                )    {
                    array_push( $this->_additional_css_urls, $value );
                }
            }
        }


        // JS
        if( '_additional_js_urls' === $objProp )    {
            if( true === is_array( $value ) )   {
                //$this->_additional_js_urls  = $value;   // the template file needs to sanitize!
                $this->_additional_js( $value );
            }
        }
        if( '_additional_js'  === $objProp )   {
            if( true === is_array( $value ) )   {
                reset( $value );
                while( list( $key, $url ) = each( $value ) )    {
                    if(     true === is_string( $url )
                        &&  false === in_array( $url, $this->_additional_js_urls )
                    )    {
                        array_push( $this->_additional_js_urls, $url );
                    }
                }
            }
            else    {
                if(     true === is_string( $value )
                    &&  false === in_array( $value, $this->_additional_js_urls )
                )    {
                    array_push( $this->_additional_js_urls, $value );
                }
            }
        }


        // Header and footer
        if(     'include_header' === $objProp 
            &&  true === is_bool( $value )
        )   {
            $this->_include_header  = $value;
        }

        if(     'include_footer' === $objProp 
            &&  true === is_bool( $value )
        )   {
            $this->_include_footer  = $value;
        }


        // body content
        if( '_content_to_render' === $objProp ) {
            if( true === is_array( $value ) )   {
                $this->_content_to_render   = $value;
            }
        }
        else    {
            $this->_content_to_render[ strtolower( "$objProp" ) ]   = $value;
        }
    }

    /// Determines if a private member var is set or not
    /// \detail    Called when by using `isset()` or `empty()` on inaccessible properties.
    public function __isset( $objProp ) {
        if( '_file_template_year' === $objProp ) {
            return  ( isset( $this->_file_template_year ) );
        }

        if(     '_additional_js_urls' === $objProp
            ||  '_additional_js' == $objProp
        )   {
            return  ( 0 === count( $this->_additional_js_urls ) )  ?  false  :  true;
        }

        if(     '_additional_css_urls' === $objProp
            ||  '_additional_css' == $objProp
        )   {
            return  ( 0 === count( $this->_additional_css_urls ) )  ?  false  :  true;
        }

        if( 'include_header' === $objProp ) {
            return  true;
        }

        if( 'include_footer' === $objProp ) {
            return true;
        }
        
        // body content
        if( '_content_to_render' === $objProp ) {
            return  ( 0 === count( $this->_content_to_render ) )  ?  false  :  true;
        }
        else    {
            // to check for a value in CSS or JS, pass in an array; e.g.: 
            //  array( 'css' => "url",
            //         'js'  => "url" )
            if( true === is_array( $objProp ) ) {
                reset( $objProp );
                while( list( $key, $value ) = each( $objProp ) )    {
                    switch( $key )  {
                        case    'js'    :
                        case    '_additional_js'    :
                            return  ( true === is_string( $value ) )
                                    ? ( in_array( $value,   $this->_additional_js_urls ) )
                                    : false ;
                            break;
                        case    'css'   :
                        case    '_additional_css'   :
                            return  ( true === is_string( $value ) )
                                    ? ( in_array( $value,   $this->_additional_css_urls ) )
                                    : false ;
                            break;
                        default :
                            return  $this->__isset( $key );
                            break;
                    }
                }
            }
            else    {
                return  ( false === array_key_exists( strtolower( "$objProp" ), $this->_content_to_render ) )
                        ?   false  :  true;
            }
        }
    }

    /// Clears private member vars
    /// \detail    Called when `unset()` is used on inaccessible properties.
    public function __unset( $objProp ) {
        if( '_file_template_year' === $objProp ) {
            // do nothing.
        }

        if(     '_additional_css_urls' === $objProp
            ||  '_additional_css' == $objProp
        )   {
            unset( $this->_additional_css_urls );
            $this->_additional_css_urls = array();
        }

        if(     '_additional_js_urls' === $objProp
            ||  '_additional_js' === $objProp
        )   {
            unset( $this->_additional_js_urls );
            $this->_additional_js_urls = array();
        }

        // reset include header/footer to default state
        if( 'include_header' === $objProp ) {
            $this->_include_header  = true;
        }

        if( 'include_footer' === $objProp ) {
            $this->_include_footer  = true;
        }

        if( '_content_to_render' === $objProp ) {
            unset( $this->_content_to_render );
            $this->_content_to_render   = array();
        }
        else    {
            // to kill a value in CSS or JS, pass in an array; e.g.: 
            //  array( 'css' => "url",
            //         'js'  => "url" )
            if( true === is_array( $objProp ) )  {
                reset( $objProp );
                while( list( $key, $value ) = each( $objProp ) )    {
                    switch( $key )  {
                        case    'js'    :
                        case    '_additional_js'    :
                            if( true === is_string( $value ) )  {
                                $idx    = array_search( $value, $this->_additional_js_urls );
                                if( false !== $idx )    {
                                    unset( $this->_additional_js_urls[$idx] );
                                }
                            }
                            break;
                        case    'css'   :
                        case    '_additional_css'   :
                            if( true === is_string( $value ) )  {
                                $idx    = array_search( $value, $this->_additional_css_urls );
                                if( false !== $idx )    {
                                    unset( $this->_additional_css_urls[$idx] );
                                }
                            }
                            break;
                        default :
                            return  $this->__unset( $key );
                            break;
                    }
                }
            }
            else    {
                if( true === $this->__isset( $objProp ) )   {
                    unset( $this->_content_to_render["$objProp"] );
                }
            }
        }
    }

    /// Returns content to render
    /// \detail    Called when reading data from inaccessible properties.
    public function __get( $objProp )   {
        
        if( 'include_header' === $objProp ) {
            return  (bool)$this->_include_header;
        }

        if( 'include_footer' === $objProp ) {
            return  (bool)$this->_include_footer;
        }

        if( '_file_template_year' === $objProp ) {
            return  $this->_file_template_year;
        }

        if( '_additional_css_urls' === $objProp ) {
            return  $this->_additional_css_urls;
        }

        if( '_additional_js_urls' === $objProp ) {
            return  $this->_additional_js_urls;
        }
        
        if( '_content_to_render' === $objProp ) {
            return  $this->_content_to_render;
        }

        return  ( false === array_key_exists( strtolower( "$objProp" ), $this->_content_to_render ) )
                ?   false  : $this->_content_to_render[ strtolower( "$objProp" ) ];
    }

    
    // ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░
    // ░ ░ ░ INHERITED AND OVERRIDDEN PUBLIC CLASS FUNCTIONS  (list static functions first!!)


    // ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░
    // ░ ░ ░ OTHER PUBLIC CLASS FUNCTIONS (list static functions first!!)
    
    /// Returns HTML output
    public function render( $view_template_file )   {
        if( true === array_key_exists( 'view_template_file', $this->_content_to_render ) )   {
            throw new Exception( "Cannot bind variable called 'view_template_file'" );
        }
        extract( $this->_content_to_render );
        ob_start();
        include( $view_template_file );
        return ob_get_clean();
    }

    

    // ▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒
    // PROTECTED STUFF

    // ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░
    // ░ ░ ░ INHERITED AND OVERRIDDEN PRIVATE CLASS FUNCTIONS  (list static functions first!!)


    // ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░
    // ░ ░ ░ OTHER PROTECTED CLASS FUNCTIONS (list static functions first!!)



    // ▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒
    // PRIVATE STUFF

    // ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░
    // ░ ░ ░ MEMBER VARIABLES/PROPERTIES  (list static vars first!!)
    // ░ ░ ░ http://www.php.net/manual/en/language.oop5.properties.php
    private $_file_template_year    = '476';    ///< Year used for copyright statements, etc.
    private $_additional_css_urls   = array();  ///< additional URL's to use in CSS statements
    private $_additional_js_urls    = array();  ///< additional URL's to use in JS statements
    private $_content_to_render     = array();  ///< The HTML body content that will be rendered on output
    private $_include_header        = true;     ///< Flag to include the page header in the rendered HTML
    private $_include_footer        = true;     ///< Flag to include the page footer in the rendered HTML



    // ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░
    // ░ ░ ░ FUNCTIONS USED BY `__set( $var, $value )` and `__get( $var )` 
    // ░ ░ ░ (list static functions first!!)


    // ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░ ░
    // ░ ░ ░ OTHER PRIVATE CLASS FUNCTIONS (list static functions first!!)
    

    // ▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒
    // END OBJECT DEFINITION
    // ▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒
}

