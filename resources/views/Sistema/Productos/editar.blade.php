@if($producto->count())
@extends('layouts.modal')
@section('form')
 <form id="formEditarProducto">
      @csrf
      @method('PUT')
      <input type="hidden" name="id_pro" value="{{ $producto->id_pro }}">
      <div class="form-group">
        <label for="nombre_pro">Nombre:</label>
        <input type="text" class="form-control" id="nombre_pro" name="nombre_pro" value="{{ $producto->nombre_pro }}">
      </div>
      <div class="form-group">
        <label for="descripcion_pro">Descripción:</label>
        <input type="text" class="form-control" id="descripcion_pro" name="descripcion_pro" value="{{ $producto->descripcion_pro }}">
      </div>
      <div class="form-group">
        <label for="precio_pro">Precio:</label>
        <input type="text" class="form-control" id="precio_pro" name="precio_pro" value="{{ $producto->precio_pro }}">
      </div>
      <div class="form-group">
        <label for="cat_id">Categoría:</label>
        <select class="form-control" id="cat_id" name="cat_id">
          @foreach($categoria as $cat)
            <option value="{{ $cat->id_cat }}" {{ $producto->cat_id == $cat->id_cat ? 'selected' : '' }}>{{ $cat->nombre_cat }}</option>
          @endforeach
        </select>
      </div>
        <div class="m-2">
        <button type="button" onclick="borrar();" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        </form>
@endsection
@section('scrip')
<script>
document.querySelector('#exampleModalLabel').innerHTML = "Editar Registro";
// Manejar el envío del formulario con AJAX
$('#productoForm').on('submit', function(event) {
    event.preventDefault(); // Evitar que el formulario se envíe de forma tradicional

    // Obtener los datos del formulario y serializarlos correctamente
    var formData = $(this).serialize();

    // Realizar la solicitud AJAX
    $.ajax({
        url: "{{ route('producto.store') }}",
        type: 'POST',
        data: formData, // Enviar los datos serializados
        success: function(response) {
            $('#exampleModal').modal('hide');
            // Actualizar la tabla de productos con los datos devueltos en la respuesta JSON
            $('#tabla tbody').append(`
                <tr class="text-center">
                    <td>${response.id_pro}</td>
                    <td>${response.nombre_pro}</td>
                    <td>${response.descripcion_pro}</td>
                    <td>$${response.precio_pro}</td>
                    <td>${response.cat_id}</td>
                </tr>
            `);
             $('#productoForm')[0].reset();
    $('#exampleModal').modal('hide');
        },

        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            alert('Hubo un error al guardar el producto');
        }
    });
});

// Función para limpiar el formulario y cerrar el modal
function borrar() {
    $('#productoForm')[0].reset();
    $('#exampleModal').modal('hide');
}
</script>
@endsection
@endif
