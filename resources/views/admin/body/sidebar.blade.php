<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <hr>
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <hr>
                <a class="nav-link" href="{{ route('all.members') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Members
                </a>
                <hr>
                <a class="nav-link" href="{{ route('all.bundles') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Plan/Packages
                </a>
                <hr>
                <a class="nav-link" href="{{ route('all.trainers') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Trainer
                </a>
                <hr>
                <a class="nav-link" href="{{ route('all.equip') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Gym Equipments
                </a>
                <hr>
                <a class="nav-link" href="{{ route('all.exercise') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-weight-hanging"></i></div>
                    Exercises
                </a>
                <hr>
                <a href="{{ route('all.split') }}" class="nav-link">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-dumbbell"></i></div>
                    Splits
                </a>
                <hr>
            </div>
        </div>
    </nav>
</div>