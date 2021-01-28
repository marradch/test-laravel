@php
/**
 * @var $proposal App\Modules\Proposals\Proposal
 * @var $proposals array
 */
@endphp

@foreach($proposals as $proposal)
    @include('proposal/one', ['proposal' => $proposal])
@endforeach
