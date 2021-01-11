<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ isset($title) ? ucfirst($title) : 'fail' }}</h1>
            </div>
            @include('components.breadcrumb')
        </div>
    </div> <!-- /.container-fluid -->
</section>
