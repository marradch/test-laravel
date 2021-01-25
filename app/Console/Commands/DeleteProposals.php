<?php

namespace App\Console\Commands;

use App\Modules\Proposals\ProposalServiceContract;
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
        $countRows = $this->proposalService->massDelete($this->seconds);
        $this->info("Deleted $countRows proposals");
    }
}
