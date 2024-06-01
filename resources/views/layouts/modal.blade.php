<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel" name="titulo"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="borrar();" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       @yield('form')
      </div>
    </div>
  </div>
</div>
@yield('scrip')
