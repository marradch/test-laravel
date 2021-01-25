<?php

namespace App\Modules\Proposals;

class ProposalService
{
    public function save(Proposal $proposal)
    {
        (new ProposalRepository())->save($proposal);
    }

    public function getList()
    {
        return (new ProposalRepository())->getList();
    }

    public function massDelete(int $seconds)
    {
        return (new ProposalRepository())->massDelete($seconds);
    }
}
