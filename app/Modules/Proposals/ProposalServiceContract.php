<?php

namespace App\Modules\Proposals;

interface ProposalServiceContract
{
    public function save(Proposal $proposal);

    public function getList();

    public function massDelete(int $seconds);
}
