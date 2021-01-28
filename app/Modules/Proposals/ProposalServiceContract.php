<?php

namespace App\Modules\Proposals;

interface ProposalServiceContract
{
    public function save(Proposal $proposal): void;

    public function deleteOlderThan(\DateInterval $diff): int;

    public function getByPage(int $page = 1, $itemsOnPage = null): array;
}
