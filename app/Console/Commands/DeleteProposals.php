<?php

namespace App\Console\Commands;

use App\Modules\Proposals\ProposalServiceContract;
use Illuminate\Console\Command;

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

    protected $seconds = 1000;

    protected $proposalService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ProposalServiceContract $proposalService)
    {
        parent::__construct();
        $this->proposalService = $proposalService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $countRows = $this->proposalService->deleteOlderThan(new \DateInterval("PT{$this->seconds}S"));
        $this->info("Deleted $countRows proposals");
    }
}
