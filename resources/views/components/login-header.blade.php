@props(['title'])
<div class="cardx fat mt-5">
    <div class="card-body">
        <div>
            <div class="text-center mt-4">
                <a href="{{ route('home') }}" class="navbar-brand navbar-brand-autodark">
                    <img src="{{ rank()->getLogo() }}" alt="" height="140">
                </a>
                <h4 class="card-title">{{ htmlspecialchars_decode($title) }}</h4>
            </div>
        </div>
    </div>
</div>
