<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel del Trabajador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 20px;
        }
        .carrito-lateral {
            position: fixed;
            top: 0;
            right: 0;
            width: 300px;
            height: 100%;
            background-color: #f8f9fa;
            border-left: 1px solid #ccc;
            padding: 20px;
            overflow-y: auto;
        }
        .contenido-principal {
            margin-right: 320px; /* espacio para el carrito */
        }
    </style>
</head>
<body>
    <div class="container contenido-principal">
        <h1 class="mb-4">Bienvenido, <?= esc($nombre) ?></h1>
        <div class="mb-4">
            <p><strong>Rol:</strong> <?= esc($rol) ?></p>
            <p><strong>ID:</strong> <?= esc($id_usuario) ?></p>
            <p><strong>Nombre completo:</strong> <?= esc($nombre_completo) ?></p>
            <p><strong>Teléfono:</strong> <?= esc($telefono) ?></p>
            <p><strong>Dirección:</strong> <?= esc($direccion) ?></p>
        </div>

        <h2>Lista de Productos</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?= esc($producto['id_producto']) ?></td>
                        <td><?= esc($producto['nombre']) ?></td>
                        <td>S/ <?= esc($producto['precio']) ?></td>
                        <td><?= esc($producto['stock']) ?></td>
                        <td>
                            <button class="btn btn-primary btn-sm" onclick="agregarAlCarrito(<?= esc($producto['id_producto']) ?>, '<?= esc($producto['nombre']) ?>')">Agregar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Carrito lateral -->
    <div class="carrito-lateral">
        <h5>🛒 Carrito</h5>
        <ul class="list-group" id="listaCarrito">
            <li class="list-group-item text-muted">Vacío</li>
        </ul>
    </div>

    <script>
        // Inicializa el carrito al cargar la página
        document.addEventListener('DOMContentLoaded', () => {
            actualizarCarritoVisual();
        });

        function agregarAlCarrito(idProducto, nombreProducto) {
            let carrito = JSON.parse(localStorage.getItem('carrito')) || [];

            // Verifica si ya está
            if (!carrito.some(p => p.id === idProducto)) {
                carrito.push({ id: idProducto, nombre: nombreProducto });
                localStorage.setItem('carrito', JSON.stringify(carrito));
                actualizarCarritoVisual();
            } else {
                alert("El producto ya está en el carrito.");
            }
        }
3++
        function actualizarCarritoVisual() {
            let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            let lista = document.getElementById('listaCarrito');
            lista.innerHTML = '';

            if (carrito.length === 0) {
                lista.innerHTML = '<li class="list-group-item text-muted">Vacío</li>';
                return;
            }

            carrito.forEach(item => {
                const li = document.createElement('li');
                li.className = 'list-group-item d-flex justify-content-between align-items-center';
                li.innerHTML = `
                    ${item.nombre}
                    <button class="btn btn-danger btn-sm" onclick="eliminarDelCarrito(${item.id})">✕</button>
                `;
                lista.appendChild(li);
            });
        }

        function eliminarDelCarrito(idProducto) {
            let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            carrito = carrito.filter(p => p.id !== idProducto);
            localStorage.setItem('carrito', JSON.stringify(carrito));
            actualizarCarritoVisual();
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
