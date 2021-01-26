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
        $captchaCode = $this->captchaService->generate('proposal.add');

        return view('proposal/add', [
            'captchaCode' => $captchaCode
        ]);
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

        $this->proposalService->save($proposal);

        return redirect('/');
    }

    public function index()
    {
        return view('proposal/index', [
            'proposals' => $this->proposalService->getByPage()
        ]);
    }

    public function indexAjax(int $page = 1)
    {
        return view('proposal/list', [
            'proposals' => $this->proposalService->getByPage($page)
        ]);
    }
}
