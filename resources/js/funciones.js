$(document).ready(function() {
    // Buscar en tiempo real
    $('#buscar').on('input', function() {
        var query = $(this).val();

        // Realizar la solicitud AJAX para obtener los productos filtrados
        $.ajax({
            url: "{{ route('producto.buscar') }}",
            type: 'GET',
            data: { query: query },
            success: function(response) {
                // Actualizar la tabla con los productos filtrados
                $('#tabla tbody').html(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Hubo un error al buscar productos');
            }
        });
    });
});
//Eliminar
$('body').on('click', '.eliminar', function () {
    var id = $(this).data("id");
    if(confirm("¿Seguro que desea eliminar este producto?")) {
        $.ajax({
            type: "DELETE",
            url: $('#form-delete-'+id).attr('action'),
            data: $('#form-delete-'+id).serialize(), // Incluir el token CSRF
            success: function (response) {
                // Manejar la respuesta del servidor
                if (response && response.message) {
                    alert(response.message); // Mostrar mensaje de éxito
                    location.reload(); // Recargar la página
                } else {
                    alert('Error al eliminar el producto');
                }
            },
            error: function (data) {
                console.log('Error:', data);
                alert('Error al eliminar el producto');
            }
        });
    }
});

    $(document).ready(function() {
        // Cargar el contenido del modal de edición mediante AJAX al hacer clic en el botón Editar
        $('.editar').click(function() {
            var productoId = $(this).data('id');
            $.ajax({
                url: '/edit/' + productoId ,
                type: 'GET',
                success: function(response) {
                    $('#editarModal').html(response);
                    $('#editarModal').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Hubo un error al cargar los datos del producto');
                }
            });
        });
    })

