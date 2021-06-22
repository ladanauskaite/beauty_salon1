<footer class="footer text-faded text-center py-5" style="background-color: black;">
    <div class="container">
      <p class="m-0 small">Copyright &copy; Your Website 2021</p>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('user/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('user/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script defer src="https://pro.fontawesome.com/releases/v5.10.0/js/all.js" integrity="sha384-G/ZR3ntz68JZrH4pfPJyRbjW+c0+ojii5f+GYiYwldYU69A+Ejat6yIfLSxljXxD" crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
    $(document).on('click', '.nav-link',function () {
        $('.nav-link').removeClass("active");
        $(this).addClass("active");
    });
});
</script>
  @section('footer')
    @show