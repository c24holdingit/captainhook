<?php
/**
 * This file is part of HookMeUp.
 *
 * (c) Sebastian Feldmann <sf@sebastian.feldmann.info>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace HookMeUp\App;

use HookMeUp\App\Console\IO;
use HookMeUp\App\Git\Repository;

/**
 * Class Runner
 *
 * @package HookMeUp
 * @author  Sebastian Feldmann <sf@sebastian-feldmann.info>
 * @link    https://github.com/sebastianfeldmann/hookmeup
 * @since   Class available since Release 0.9.0
 */
abstract class Runner
{
    /**
     * @var \HookMeUp\App\Console\IO|\HookMeUp\App\IO
     */
    protected $io;

    /**
     * @var \HookMeUp\App\Config
     */
    protected $config;

    /**
     * @var \HookMeUp\App\Git\Repository
     */
    protected $repository;

    /**
     * Installer constructor.
     *
     * @param \HookMeUp\App\Console\IO     $io
     * @param \HookMeUp\App\Config         $config
     * @param \HookMeUp\App\Git\Repository $repository
     */
    public function __construct(IO $io, Config $config, Repository $repository)
    {
        $this->io         = $io;
        $this->config     = $config;
        $this->repository = $repository;
    }

    /**
     * Executes the Runner.
     */
    abstract public function run();
}
