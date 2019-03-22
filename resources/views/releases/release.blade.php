<div class="col-12 col-sm-4 col-md-3 col-xl-2 my-3">
    <div class="release-card">
        <div class="first-row">
            <div class="col">
                <img src="{{ asset('img/poggit.png') }}" alt="thumbnail">
            </div>
            <div class="col">
                <p class="downloads">{{ random_int(100, 5000) }}</p>
                <p class="subtitle">Total Downloads</p>
                <p class="rating">
                    @php($stars = random_int(0, 5))
                    @for ($i = 0; $i < 5; $i++)
                        <i class="{{ $i <= $stars ? 'fas filled' : 'far' }} fa-star"></i>
                    @endfor
                </p>
            </div>
        </div>
        <div class="second-row">
            <div class="col">
                @php($faker = Faker\Factory::create())
                <h5 class="name">{{ ucfirst($faker->word) }}</h5>
                <p class="version">v{{ $faker->randomDigit }}.{{ $faker->randomDigit }}.{{ $faker->randomDigit }}</p>
                <p class="author">{{ $faker->firstName }} {{ $faker->lastName }}</p>
            </div>
            <div class="col align-self-end text-right">
                <a href="#download" class="btn btn-success"><i class="fas fa-download"></i></a>
            </div>
        </div>
    </div>
</div>
