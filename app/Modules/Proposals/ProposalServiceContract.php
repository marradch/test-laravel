<?php

namespace App\Modules\Proposals;

interface ProposalServiceContract
{
    public function save(Proposal $proposal);

    public function massDelete(int $seconds);

    public function getByPage(int $page = 1);
}
