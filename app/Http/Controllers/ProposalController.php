<?php

namespace App\Http\Controllers;

use App\Models\UserRequest;
use Illuminate\Http\Request;
use App\Modules\Proposals\Proposal;
use App\Modules\Proposals\ProposalEloquent;
use App\Modules\Proposals\ProposalService;
use App\Http\Requests\StoreProposalRequest;
use App\Modules\Captcha\CaptchaService;

class ProposalController extends Controller
{
    public function add(Request $request)
    {
        return view('proposal/add', [
            'captchaString' => (new CaptchaService())->generate('proposal.add')
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

		(new ProposalService())->save($entity);

        return redirect('/');
    }

    public function index()
    {
        return view('proposal/index', (new ProposalService())->getList());
    }
}
