<?php

namespace App\Modules\Proposals;

class ProposalRepository
{
    private const DEFAULT_ITEMS_ON_PAGE = 2;

    public function save(Proposal $proposal): void
    {
        $eloquent = new ProposalEloquent();
        $eloquent->name = $proposal->getName();
        $eloquent->title = $proposal->getTitle();
        $eloquent->description = $proposal->getDescription();
        $eloquent->save();
    }

    public function getByPage(int $page = 1, $itemsOnPage = null): array
    {
        $itemsOnPage = $itemsOnPage ?? self::DEFAULT_ITEMS_ON_PAGE;

        $proposals = [];
        $result = ProposalEloquent::query()
            ->offset($itemsOnPage * ($page - 1))
            ->limit($itemsOnPage)
            ->get();

        foreach ($result as $item) {
            $proposals[] = new Proposal($item->id, $item->name, $item->title, $item->description);
        }

        return $proposals;
    }

    public function massDelete(int $seconds): int
    {
        $time = date('U') - $seconds;
        return ProposalEloquent::where('created_at', '<=' , date('Y-m-d H:i:s', $time))->delete();
    }
}
