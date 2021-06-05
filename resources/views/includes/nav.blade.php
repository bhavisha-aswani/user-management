<nav class="navbar navbar-dark sticky-top bg-dark flex-wrap2 flex-md-nowrap p-0">
       
    <button class="navbar-toggler d-md-none mt-1 mr-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
    </button>
        <ul class="navbar-nav navbar-expand-md pl-2 pr-3">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class='nav-link fa fa-arrow-left' style='font-size:36px;padding-right: .5rem;padding-left:.5rem;' href=""></a>
                    </li>

                    <li class="nav-item">
                      <a class='nav-link fa fa-arrow-right' style='font-size:36px;padding-right: .5rem;padding-left:.5rem;' href=""></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link fa fa-close" style='font-size:36px;padding-right: .5rem;padding-left:.5rem;' href=""></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fa fa-arrow-up" style='font-size:36px;padding-right: .5rem;padding-left:.5rem;' href=""></a>
                    </li>
                </ul>
            </div>
        </ul>
          <form class="input-group py-1 px-2 px-md-0" action="{{url('/search')}}">
              <input class="form-control form-control-dark" type="text" placeholder="Search here..." aria-label="Search" name="term" required>
              <div class="input-group-append">
                  <button class="btn btn-outline-success" type="submit"><i class="fa fa-search"></i></button>
              </div>
        </form> 
</nav>
