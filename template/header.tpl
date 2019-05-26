    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <a class="navbar-brand" href="/index">uLogs</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mr-auto"></div>

            <form action="/search" method="POST" class="form-inline mt-2 mt-md-0">
                <input class="form-control mr-sm-2" type="text" name="search"  id="search" value="" placeholder="Rechercher...">
                    
                <button class="btn btn-primary my-2 my-sm-0" data-live-search="true" type="submit">Rechercher</button>
                
            </form>
        </div>
    </nav>