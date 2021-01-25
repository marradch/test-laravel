<?php

namespace App\Modules\Proposals;

class ProposalRepository
{
    private static $perPage = 2;

    public function save(Proposal $proposal)
    {
        $eloquent = new ProposalEloquent();
        $eloquent->name = $proposal->getName();
        $eloquent->title = $proposal->getTitle();
        $eloquent->description = $proposal->getDescription();
        $eloquent->save();
    }

    public function getList()
    {
        $entities = [];
        $result = ProposalEloquent::paginate(self::$perPage);

        foreach ($result as $item) {
            $entities[] = new Proposal($item->id, $item->name, $item->title, $item->description);
        }

        return [
            'entities' => $entities,
            'links' => $result->links()
        ];
    }

    public function massDelete(int $seconds)
    {
        $time = date('U') - $seconds;
        return ProposalEloquent::where('created_at', '<=' , date('Y-m-d H:i:s', $time))->delete();
    }

}
