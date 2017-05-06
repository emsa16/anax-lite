<?php
namespace Emsa\Cookie;

class Cookie
{
    private $expire;


    /**
     * Constructor
     * Sets $expire to 30 days. 86400 = 1 day * 30 = 30 days = 2592000
     *
     * @param string $time Time when cookie expires.
     *
     * @return void
     */
    public function __construct($time = 2592000)
    {
        $this->expire = (time() + $time);

    }


    /**
     * Check if key exists in $_COOKIE
     *
     * @param string $key The key to check for in $_COOKIE
     *
     * @return bool true if $key exists, otherwise false
     */
    public function has($key)
    {
        return array_key_exists($key, $_COOKIE);

    }


    /**
     * Sets a cookie
     *
     * @param string $name The name of the $_COOKIE
     * @param string $val  The value of the $_COOKIE
     *
     * @return void
     */
    public function set($name, $val)
    {
        setcookie($name, $val);

    }


    /**
     * Retrieve a cookie
     *
     * @param string $key     The key to get from $_COOKIE
     * @param mixed  $default optional The return value if not found
     *
     * @return string The cookie if present, else $default
     */
    public function get($key, $default = false)
    {
        return (self::has($key)) ? $_COOKIE[$key] : $default;

    }


    /**
     * Dumps the $_COOKIE
     * Good for debugging
     *
     * @return void
     */
    public function dump()
    {
        return print_r($_COOKIE, true);

    }


    /**
     * Deletes variable from $_COOKIE if exists
     *
     * @param string $key The key variable to unset from $_COOKIE
     *
     * @return void
     */
    public function delete($key)
    {
        if (self::has($key)) {
            unset($_COOKIE[$key]);
        }

    }


    /**
     * Destroys all variables from $_COOKIE if exists
     *
     * @return void
     */
    public function destroy()
    {
        foreach ($_COOKIE as $key => $value) {
            setcookie($key, $value, (time() - 3600));
        }

    }
}
