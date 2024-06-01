@extends('layouts.modal')
@section('title','Nuevo Registro')
@section('form')
 <form method="POST" id="productoForm" >
        @csrf
        @method('POST')
        <div class="form-group mt-2">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre_pro" class="form-control" placeholder="Nombre Producto" required>
        </div>
        <div class="form-group mt-2">
        <label class="form-label">Descripcion</label>
        <input type="text" name="descripcion_pro" class="form-control" placeholder="Descripcion Producto" required>
        </div>
        <div class="form-group mt-2">
        <label class="form-label">Precio</label>
        <input type="numeric" name="precio_pro" class="form-control" placeholder="Precio Producto" required>
        </div>
        <div class="form-group mt-2">
        <label class="form-label">Categoria</label>
        <select class="form-control" name="cat_id">
        <option value="" disabled selected>
        ----Categorias----
        </option>
        @foreach($categoria as $cat)
        <option value="{{$cat->id_cat}}">
        {{$cat->nombre_cat}}
        </option>
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

