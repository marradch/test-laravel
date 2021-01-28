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

    public function getByPage(int $page = 1, $itemsOnPage = null): array
    {
        return $this->proposalRepository->getByPage($page, $itemsOnPage);
    }

    public function deleteOlderThan(\DateInterval $diff): int
    {
        return $this->proposalRepository->deleteOlderThan($diff);
    }
}
