<?php

namespace App\Http\Controllers;

use App\Models\UserRequest;
use Illuminate\Http\Request;
use App\Modules\Proposals\Proposal;
use App\Modules\Proposals\ProposalServiceContract;
use App\Http\Requests\StoreProposalRequest;
use Illuminate\Support\Facades\Log;

class ProposalController extends Controller
{
    protected $proposalService;

    public function __construct(ProposalServiceContract $proposalService)
    {
        $this->proposalService = $proposalService;
    }

    public function add(Request $request)
    {
        return view('proposal/add');
    }

    public function store(StoreProposalRequest $request)
    {
        $data = $request->all();

        $proposal = new Proposal(
            null,
            $data['name'],
            $data['title'],
            $data['description']
        );

        try {
            $this->proposalService->save($proposal);
            throw new \Exception('Деление на ноль.');
        } catch (\Exception $e) {
            Log::critical('Proposal - save - '.$e->getMessage());
            return redirect('/')->with('error','Proposal didn\'t create successfully!');
        }

        return redirect('/')->with('success','Proposal created successfully!');
    }

    public function index()
    {
        return view('proposal/index', [
            'proposals' => $this->proposalService->getByPage(1, 3)
        ]);
    }

    public function indexAjax(int $page = 1)
    {
        return view('proposal/list', [
            'proposals' => $this->proposalService->getByPage($page, 3)
        ]);
    }
}
