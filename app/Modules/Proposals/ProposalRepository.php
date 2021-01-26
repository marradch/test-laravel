<?php

namespace App\Modules\Proposals;

class ProposalRepository
{
    private const DEFAULT_ITEMS_ON_PAGE = 2;

    public function save(Proposal $proposal)
    {
        $eloquent = new ProposalEloquent();
        $eloquent->name = $proposal->getName();
        $eloquent->title = $proposal->getTitle();
        $eloquent->description = $proposal->getDescription();
        $eloquent->save();
    }

    public function getByPage(int $page = 1)
    {
        $proposals = [];
        $result = ProposalEloquent::query()
            ->offset(self::DEFAULT_ITEMS_ON_PAGE * ($page - 1))
            ->limit(self::DEFAULT_ITEMS_ON_PAGE)
            ->get();

        foreach ($result as $item) {
            $proposals[] = new Proposal($item->id, $item->name, $item->title, $item->description);
        }

        return $proposals;
    }

    public function massDelete(int $seconds)
    {
        $time = date('U') - $seconds;
        return ProposalEloquent::where('created_at', '<=' , date('Y-m-d H:i:s', $time))->delete();
    }
}
