<?php

namespace App\Modules\Proposals;

class ProposalService implements ProposalServiceContract
{
    protected $proposalRepository;

    public function __construct(ProposalRepository $proposalRepository)
    {
        $this->proposalRepository = $proposalRepository;
    }

    public function save(Proposal $proposal): void
    {
        $this->proposalRepository->save($proposal);
    }

    public function getByPage(int $page = 1): array
    {
        return $this->proposalRepository->getByPage($page);
    }

    public function massDelete(int $seconds): int
    {
        return $this->proposalRepository->massDelete($seconds);
    }
}
