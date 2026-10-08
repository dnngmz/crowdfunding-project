@extends('layouts.app')

@section('content')
<div class="page-header">
    <div>
        <h1 style="font-size: 3rem; margin-bottom: 0.5rem;">Discover Campaigns</h1>
        <p style="color: var(--text-muted); font-size: 1.1rem;">Fund the next big idea, or bring yours to life.</p>
    </div>
</div>

<style>
    .campaign-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 2rem;
    }
    .campaign-title {
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }
    .campaign-desc {
        color: var(--text-muted);
        margin-bottom: 1.5rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .progress-bar {
        width: 100%;
        height: 8px;
        background-color: rgba(255,255,255,0.1);
        border-radius: 4px;
        margin-bottom: 1rem;
        overflow: hidden;
    }
    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, var(--secondary-color), var(--primary-color));
        border-radius: 4px;
    }
    .stats {
        display: flex;
        justify-content: space-between;
        font-weight: 600;
        margin-bottom: 1.5rem;
    }
    .stats span {
        color: var(--primary-color);
    }
    .empty-state {
        text-align: center;
        padding: 4rem;
        background: var(--surface-color);
        border-radius: 20px;
        grid-column: 1 / -1;
    }
</style>

<div class="campaign-grid">
    @forelse($campaigns as $campaign)
        <div class="card">
            <h2 class="campaign-title">{{ $campaign->title }}</h2>
            <p class="campaign-desc">{{ $campaign->description }}</p>
            
            @php
                $percentage = $campaign->goal_amount > 0 ? min(100, ($campaign->raised_amount / $campaign->goal_amount) * 100) : 0;
            @endphp
            
            <div class="progress-bar">
                <div class="progress-fill" style="width: {{ $percentage }}%;"></div>
            </div>
            
            <div class="stats">
                <div><span>${{ number_format($campaign->raised_amount) }}</span> raised</div>
                <div style="color: var(--text-muted);">of ${{ number_format($campaign->goal_amount) }}</div>
            </div>
            
            <button class="btn btn-primary" style="width: 100%; padding: 0.6rem; margin-top: auto;">Support Now</button>
        </div>
    @empty
        <div class="empty-state">
            <h2 style="font-size: 2rem; margin-bottom: 1rem;">No campaigns yet</h2>
            <p style="color: var(--text-muted); margin-bottom: 2rem;">Be the first to create a campaign and bring your idea to life.</p>
            <a href="{{ route('campaigns.create') }}" class="btn btn-primary">Start a Campaign</a>
        </div>
    @endforelse
</div>
@endsection
