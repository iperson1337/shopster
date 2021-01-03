<?php

namespace Shopster\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class SetupCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'shopster:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup Shopster';

    /**
     * Commands to call with their description.
     *
     * @var array
     */
    protected $calls = [
        'shopster:product' => 'Creating Product model',
        'shopster:attribute_group' => 'Creating AttributeGroup model',
        'shopster:attribute' => 'Creating Attribute model',
        'shopster:attribute_value' => 'Creating AttributeValue model'
    ];

    /**
     * Create a new command instance
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->calls as $command => $info) {
            $this->line(PHP_EOL . $info);
            $this->call($command);
        }
    }
}
