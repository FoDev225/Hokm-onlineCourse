<footer class="pieds text-white text-center text-lg-start">
  
  <div class="container pb-2">
    <!-- Section: Form -->
    <section class="">
      <form action="">
        <!--Grid row-->
        <div class="row d-flex justify-content-center">
          <!--Grid column-->
          <div class="col-auto">
            <p>
              <strong>S'inscrire à la newsletter</strong>
            </p>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-5 col-12">
            <!-- Email input -->
            <div class="form-outline form-white">
              <input type="email" id="form5Example2" class="form-control" placeholder="Address mail" />
            </div>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-auto">
            <!-- Submit button -->
            <button type="submit" class="btn btn-outline-light">
              S'abonner
            </button>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </form>
    </section>
    <!-- Section: Form -->
  <!-- Grid container -->
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-lg-3 col-md-12 mb-4 mb-md-0">
        <p>
          ©
          <a class="text-white" href="{{ route('index') }}">Hokma</a>
        </p>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <ul class="list-unstyled">
          @foreach($pages as $page)
            <li>
              <a class="footer" href="{{ route('page', $page->slug) }}" class="text-white">{{ $page->title }}</a>
            </li>
          @endforeach
        </ul>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
        <p>
          Des questions ou des préoccupations ?
          <a class="text-white" href="mailto:hokma@formation.com?subject=Courrier de notre site">Écrivez-nous ici.</a>
        </p>

      </div>
      <!--Grid column-->
    </div>
    <!--Grid row-->
  </div>

</footer>