@if (count($breadcrumbs))

<section class="bb-breadcrumb">
    @foreach ($breadcrumbs as $breadcrumb)
    @if ($breadcrumb->url && !$loop->last)
    <span class="current"><a class="action-link ga-breadcrumb" data-galabel="{{'Path: '.$breadcrumb->url}}" href="{{ $breadcrumb->url }}">{!! strtoupper($breadcrumb->title) !!}</a></span> / 
    @else
    <span class="root">{!! strtoupper($breadcrumb->title) !!}</span>
    @endif

    @endforeach
</section>

@endif
