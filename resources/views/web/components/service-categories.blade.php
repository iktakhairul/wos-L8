<style>

</style>
<section class="section-main" style=" padding-top: 50px; padding-bottom: 40px; background-color: #ffffff">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="container text-center">
                    <h1>Browse Job By <span class="text-success">Categories</span></h1>
                </div>

                <div class="row" style="padding-left: 7%; padding-top: 25px">
                @forelse($categories->chunk(4) as $key => $chunk)
                    <div class="col-md-3">
                        @foreach($chunk as $item)
                            <p><a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>{{ $item ? $item->name : 'Service Category Name Not Found' }}</a></p>
                        @endforeach
                    </div>
                @empty
                    <div class="col-md-3">
                            <p><a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Service Categories One</a></p>
                            <p><a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Service Categories Two</a></p>
                            <p><a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Service Categories Three</a></p>
                            <p><a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Service Categories Four</a></p>
                        </div>
                    <div class="col-md-3">
                            <p><a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Service Categories One</a></p>
                            <p><a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Service Categories Two</a></p>
                            <p><a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Service Categories Three</a></p>
                            <p><a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Service Categories Four</a></p>
                        </div>
                    <div class="col-md-3">
                            <p><a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Service Categories One</a></p>
                            <p><a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Service Categories Two</a></p>
                            <p><a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Service Categories Three</a></p>
                            <p><a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Service Categories Four</a></p>
                        </div>
                    <div class="col-md-3">
                            <p><a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Service Categories One</a></p>
                            <p><a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Service Categories Two</a></p>
                            <p><a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Service Categories Three</a></p>
                            <p><a href="#" class=""><i class="fa fa-arrow-circle-right mr-2"></i>Service Categories Four</a></p>
                        </div>
                @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
