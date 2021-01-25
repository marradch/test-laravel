<?php

namespace App\Http\Controllers;

use App\Models\UserRequest;
use Illuminate\Http\Request;
use App\Modules\Proposals\Proposal;
use App\Modules\Proposals\ProposalServiceContract;
use App\Http\Requests\StoreProposalRequest;
use App\Modules\Captcha\CaptchaServiceContract;

class ProposalController extends Controller
{
    protected $captchaService;

    protected $proposalService;

    public function __construct(CaptchaServiceContract $captchaService, ProposalServiceContract $proposalService)
    {
        $this->captchaService = $captchaService;
        $this->proposalService = $proposalService;
    }

    public function add(Request $request)
    {
        return view('proposal/add', [
            'captchaString' => $this->captchaService->generate('proposal.add')
        ]);
    }

    public function store(StoreProposalRequest $request)
    {
        $data = $request->all();

        $entity = new Proposal(
            null,
            $data['name'],
            $data['title'],
            $data['description']
        );

        $this->proposalService->save($entity);

        return redirect('/');
    }

    public function index()
    {
        return view('proposal/index', $this->proposalService->getList());
    }
}
