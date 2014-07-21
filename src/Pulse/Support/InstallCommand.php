<?php namespace Pulse\Support;

use Illuminate\Console\Command;
use Kameleon\Content\Content;
use Kameleon\Product\Product;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Pulse Router
 *
 * This class will register pulse specific routes
 *
 * @package  Pulse\Support
 */

class InstallCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'pulse:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Perform the initial setup of the blogging platform';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $this->info("Pulse Blog installation");
    }
}
