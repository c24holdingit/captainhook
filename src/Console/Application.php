<?php
/**
 * This file is part of HookMeUp.
 *
 * (c) Sebastian Feldmann <sf@sebastian.feldmann.info>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace HookMeUp\App\Console;

use HookMeUp\App\HMU;
use Symfony\Component\Console\Application as SymfonyApplication;

/**
 * Class Application
 *
 * @package HookMeUp
 * @author  Sebastian Feldmann <sf@sebastian-feldmann.info>
 * @link    https://github.com/sebastianfeldmann/hookmeup
 * @since   Class available since Release 0.9.0
 */
class Application extends SymfonyApplication
{
    /**
     * @var \HookMeUp\App\Config
     */
    protected $config;

    /**
     * @var string
     */
    private static $logo = '  __                      __                                            
 /\\ \\                    /\\ \\                                           
 \\ \\ \\___     ___     ___\\ \\ \\/\'\\     ___ ___      __   __  __  _____   
  \\ \\  _ `\\  / __`\\  / __`\\ \\ , <   /\' __` __`\\  /\'__`\\/\\ \\/\\ \\/\\ \'__`\\ 
   \\ \\ \\ \\ \\/\\ \\L\\ \\/\\ \\L\\ \\ \\ \\\\`\\ /\\ \\/\\ \\/\\ \\/\\  __/\\ \\ \\_\\ \\ \\ \\L\\ \\
    \\ \\_\\ \\_\\ \\____/\\ \\____/\\ \\_\\ \\_\\ \\_\\ \\_\\ \\_\\ \\____\\\\ \\____/\\ \\ ,__/
     \\/_/\\/_/\\/___/  \\/___/  \\/_/\\/_/\\/_/\\/_/\\/_/\\/____/ \\/___/  \\ \\ \\/ 
                                                                  \\ \\_\\ 
                                                                   \\/_/
';

    /**
     * @var \HookMeUp\App\Console\IO
     */
    protected $io;

    /**
     * Application constructor.
     */
    public function __construct()
    {
        if (function_exists('ini_set') && extension_loaded('xdebug')) {
            ini_set('xdebug.show_exception_trace', false);
            ini_set('xdebug.scream', false);
        }
        parent::__construct('HookMeUp', HMU::VERSION);
    }

    /**
     * Make default help message to include the logo.
     *
     * @return string
     */
    public function getHelp()
    {
        return self::$logo . parent::getHelp();
    }
}
