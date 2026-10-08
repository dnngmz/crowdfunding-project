@extends('layouts.app')

@section('content')
<div class="page-header">
    <div>
        <h1 style="font-size: 3rem; margin-bottom: 0.5rem;">Start a Campaign</h1>
        <p style="color: var(--text-muted); font-size: 1.1rem;">Tell us about your project and set your funding goal.</p>
    </div>
</div>

<div class="card" style="max-width: 600px; margin: 0 auto;">
    <form action="{{ route('campaigns.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="title">Campaign Title</label>
            <input type="text" id="title" name="title" class="form-control" required placeholder="e.g. Revolutionary Smart Watch">
            @error('title')
                <div style="color: var(--danger-color); margin-top: 0.5rem; font-size: 0.9rem;">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="goal_amount">Funding Goal ($)</label>
            <input type="number" id="goal_amount" name="goal_amount" class="form-control" required min="1" step="0.01" placeholder="10000">
            @error('goal_amount')
                <div style="color: var(--danger-color); margin-top: 0.5rem; font-size: 0.9rem;">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="description">Campaign Description</label>
            <textarea id="description" name="description" class="form-control" rows="5" required placeholder="Describe your project, why you are raising funds, and how the money will be used..."></textarea>
            @error('description')
                <div style="color: var(--danger-color); margin-top: 0.5rem; font-size: 0.9rem;">{{ $message }}</div>
            @enderror
        </div>
        
        <div style="margin-top: 2rem;">
            <button type="submit" class="btn btn-primary" style="width: 100%;">Launch Campaign</button>
        </div>
    </form>
</div>
@endsection
