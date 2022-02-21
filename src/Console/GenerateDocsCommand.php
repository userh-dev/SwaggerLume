<?php

namespace SwaggerLume\Console;

use Illuminate\Console\Command;
use SwaggerLume\Generator;

class GenerateDocsCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'swagger-lume:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Regenerate docs';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $this->info('Generating docs...');
            Generator::generateDocs();
            $this->info('Docs generated.');
        } catch (\Throwable $exception) {
            $this->error('Operation cancelled because:');
            $this->error($exception->getMessage());

            return 1;
        }
    }
}
