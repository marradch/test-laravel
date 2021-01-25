<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Modules\Proposals\ProposalService;

class DeleteProposals extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'proposals:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Proposals delete';

    protected $seconds = 3600 * 24;

    /**
     * Create a new command instance.
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
     * @return int
     */
    public function handle()
    {
        $countRows = (new ProposalService())->massDelete($this->seconds);
        $this->info("Deleted $countRows proposals");
    }
}
