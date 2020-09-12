<section class="hero mb-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="{{route('carinama')}}" method="post">
                            @csrf
                            <div class="hero__search__categories">
                                Search By Name
                            </div>
                            <input type="text" name="cari" placeholder="Search Product?" value="{{old('cari')}}">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>