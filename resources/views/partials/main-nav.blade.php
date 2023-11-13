<div class="row justify-content-center">
    <!-- Card Contracts -->
    <div class="col-6 col-md-4 col-lg-3 mb-3">
        <div class="card text-center">
            <div class="card-body">
                <div class="card-icon mb-3">
                    <img src="{{ asset('images/btn-contract.png') }}" alt="Contracts" class="card-img-top"
                         style="width: 60px; height: 60px;">
                </div>
                <h5 class="card-title">Search</h5>
                <a href="{{ route('document.index') }}" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
    <!-- Card New -->
    <div class="col-6 col-md-4 col-lg-3 mb-3">
        <div class="card text-center">
            <div class="card-body">
                <div class="card-icon mb-3">
                    <img src="{{ asset('images/btn-add-document.png') }}" alt="New" class="card-img-top"
                         style="width: 60px; height: 60px;">
                </div>
                <h5 class="card-title">New</h5>
                <a href="{{ route('document.add') }}" class="btn btn-success">Go somewhere</a>
            </div>
        </div>
    </div>
    <!-- Card Clients -->
    <div class="col-6 col-md-4 col-lg-3 mb-3">
        <div class="card text-center">
            <div class="card-body">
                <div class="card-icon mb-3">
                    <img src="{{ asset('images/btn-customers.png') }}" alt="Clients" class="card-img-top"
                         style="width: 60px; height: 60px;">
                </div>
                <h5 class="card-title">Clients</h5>
                <a href="#" class="btn btn-info " disabled>Go somewhere</a>
            </div>
        </div>
    </div>
    <!-- Card Settings -->
    <div class="col-6 col-md-4 col-lg-3 mb-3">
        <div class="card text-center">
            <div class="card-body">
                <div class="card-icon mb-3">
                    <img src="{{ asset('images/btn-settings.png') }}" alt="Settings" class="card-img-top"
                         style="width: 60px; height: 60px;">
                </div>
                <h5 class="card-title">Settings</h5>
                <a href="{{ route('settings') }}" class="btn btn-dark">Go somewhere</a>
            </div>
        </div>
    </div>
</div>
