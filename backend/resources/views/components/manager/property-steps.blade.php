@php($labels = ['Basic Information', 'Location', 'Ownership & Management', 'Units & Rental', 'Photos & Documents', 'Review'])
<nav class="property-step-navigation" aria-label="Add Property steps">
    @foreach($labels as $label)
        <a href="{{ route('manager.add-property-'.($loop->index + 1)) }}" @if($step === $loop->index + 1) aria-current="step" @endif><span>{{ $loop->index + 1 }}</span>{{ $label }}</a>
    @endforeach
</nav>
