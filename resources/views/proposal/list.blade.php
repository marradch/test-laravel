@php
/**
 * @var $proposal App\Modules\Proposals\Proposal
 * @var $proposals array
 */
@endphp

@foreach($proposals as $proposal)
    <div class="card mb-3">
        <div class="card-header">
            {{ $proposal->getTitle() }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $proposal->getName() }}</h5>
            <p class="card-text">{{ $proposal->getDescription() }}</p>
        </div>
    </div>
@endforeach
