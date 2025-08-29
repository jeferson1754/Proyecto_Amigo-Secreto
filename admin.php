<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- DataTables Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <title>Panel de Administración - Amigo Secreto</title>

    <style>
        :root {
            --primary-color: #667eea;
            --secondary-color: #764ba2;
            --accent-color: #f093fb;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --info-color: #3b82f6;
            --dark-color: #1f2937;
            --light-color: #f8fafc;
            --border-radius: 12px;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
            color: var(--dark-color);
        }

        /* Header Styles */
        .header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 2rem 0;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 20"><defs><radialGradient id="a" cx="50%" cy="0%" r="50%"><stop offset="0%" stop-color="rgba(255,255,255,.1)"/><stop offset="100%" stop-color="rgba(255,255,255,0)"/></radialGradient></defs><rect width="100" height="20" fill="url(%23a)"/></svg>');
            opacity: 0.3;
        }

        .header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header p {
            font-size: 1.1rem;
            opacity: 0.9;
            font-weight: 300;
        }

        /* Action Bar */
        .action-bar {
            background: white;
            padding: 1.5rem 0;
            box-shadow: var(--shadow);
            border-bottom: 1px solid #e5e7eb;
        }

        .btn-modern {
            padding: 0.75rem 1.5rem;
            border-radius: var(--border-radius);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            position: relative;
            overflow: hidden;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-modern::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-modern:hover::before {
            left: 100%;
        }

        .btn-modern:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-primary-modern {
            background: linear-gradient(135deg, var(--primary-color), #5a67d8);
            color: white;
        }

        .btn-success-modern {
            background: linear-gradient(135deg, var(--success-color), #059669);
            color: white;
        }

        .btn-warning-modern {
            background: linear-gradient(135deg, var(--warning-color), #d97706);
            color: white;
        }

        /* Main Content */
        .main-content {
            padding: 2rem 0;
        }

        .data-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        .data-card:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-2px);
        }

        .card-header {
            display: flex;
            justify-content: between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #e5e7eb;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark-color);
            margin: 0;
        }

        /* Enhanced Table Styles */
        .table-container {
            overflow-x: auto;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
        }

        .table-modern {
            margin: 0;
            border-collapse: separate;
            border-spacing: 0;
        }

        .table-modern thead th {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            font-weight: 600;
            border: none;
            padding: 1rem;
            text-align: center;
            vertical-align: middle;
            position: relative;
        }

        .table-modern thead th:first-child {
            border-top-left-radius: var(--border-radius);
        }

        .table-modern thead th:last-child {
            border-top-right-radius: var(--border-radius);
        }

        .table-modern tbody tr {
            transition: all 0.3s ease;
        }

        .table-modern tbody tr:hover {
            background: rgba(102, 126, 234, 0.05);
            transform: scale(1.01);
        }

        .table-modern tbody td {
            padding: 1rem;
            border-color: #e5e7eb;
            vertical-align: middle;
            text-align: center;
        }

        .table-modern tbody tr:last-child td:first-child {
            border-bottom-left-radius: var(--border-radius);
        }

        .table-modern tbody tr:last-child td:last-child {
            border-bottom-right-radius: var(--border-radius);
        }

        /* Badge Styles */
        .badge-custom {
            padding: 0.4rem 0.8rem;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge-assigned {
            background: linear-gradient(135deg, var(--success-color), #059669);
            color: white;
        }

        .badge-pending {
            background: linear-gradient(135deg, var(--warning-color), #d97706);
            color: white;
        }

        /* Roulette Section */
        .roulette-section {
            text-align: center;
            padding: 3rem 0;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            border-radius: var(--border-radius);
            margin-top: 2rem;
        }

        .roulette-icon {
            font-size: 4rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
            animation: spin 3s linear infinite;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .roulette-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .btn-roulette {
            padding: 1rem 3rem;
            font-size: 1.2rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--accent-color), var(--primary-color));
            color: white;
            border: none;
            border-radius: var(--border-radius);
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: var(--shadow-lg);
        }

        .btn-roulette:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 20px 30px rgba(240, 147, 251, 0.4);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header h1 {
                font-size: 2rem;
            }

            .data-card {
                padding: 1rem;
            }

            .btn-modern {
                padding: 0.5rem 1rem;
                font-size: 0.9rem;
            }

            .table-modern thead th,
            .table-modern tbody td {
                padding: 0.5rem;
                font-size: 0.85rem;
            }
        }

        @media (max-width: 576px) {
            .action-bar .d-flex {
                flex-direction: column;
                gap: 1rem;
            }

            .btn-modern {
                width: 100%;
                justify-content: center;
            }
        }

        /* Loading Animation */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .loading-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 4px solid #e5e7eb;
            border-top: 4px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
    </style>
</head>

<body>
    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="spinner"></div>
    </div>

    <!-- Header -->
    <div class="header">
        <div class="container">
            <div class="text-center">
                <h1 class="animate__animated animate__fadeInDown">
                    <i class="bi bi-gear-fill me-3"></i>Panel de Administración
                </h1>
                <p class="animate__animated animate__fadeInUp animate__delay-1s">
                    Gestiona el sorteo de Amigo Secreto
                </p>
            </div>
        </div>
    </div>

    <!-- Action Bar -->
    <div class="action-bar">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div class="d-flex gap-3 flex-wrap">
                    <button type="button" class="btn-modern btn-primary-modern" data-bs-toggle="modal" data-bs-target="#createModal">
                        <i class="bi bi-person-plus"></i>
                        Nuevo Integrante
                    </button>

                    <button type="button" class="btn-modern btn-success-modern" onclick="goToUser()">
                        <i class="bi bi-arrow-right-circle"></i>
                        Vista Usuario
                    </button>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-person-circle fs-4 text-muted"></i>
                    <span class="text-muted">Administrador</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <!-- Participants Table -->
            <div class="data-card animate__animated animate__fadeInUp">
                <div class="card-header">
                    <h2 class="card-title">
                        <i class="bi bi-people-fill me-2 text-primary"></i>
                        Lista de Participantes
                    </h2>
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-primary" id="participantCount">0 participantes</span>
                    </div>
                </div>

                <div class="table-container">
                    <table class="table table-modern" id="participantsTable">
                        <thead>
                            <tr>
                                <th><i class="bi bi-hash me-1"></i>ID</th>
                                <th><i class="bi bi-person me-1"></i>Nombre</th>
                                <th><i class="bi bi-card-text me-1"></i>RUT</th>
                                <th><i class="bi bi-key me-1"></i>Pass</th>
                                <th><i class="bi bi-gift me-1"></i>Deseo 1</th>
                                <th><i class="bi bi-gift me-1"></i>Deseo 2</th>
                                <th><i class="bi bi-gift me-1"></i>Deseo 3</th>
                                <th><i class="bi bi-heart me-1"></i>Amigo Secreto</th>
                                <th><i class="bi bi-tools me-1"></i>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample Data - Replace with PHP loop -->
                            <tr>
                                <td><span class="badge bg-secondary">1</span></td>
                                <td><strong>Juan Pérez</strong></td>
                                <td><code>12345678-9</code></td>
                                <td><code>1234</code></td>
                                <td>
                                    <span class="text-truncate" style="max-width: 100px; display: inline-block;" title="Libro de aventuras">
                                        Libro de aventuras
                                    </span>
                                </td>
                                <td>
                                    <span class="text-truncate" style="max-width: 100px; display: inline-block;" title="Audífonos bluetooth">
                                        Audífonos bluetooth
                                    </span>
                                </td>
                                <td>
                                    <span class="text-truncate" style="max-width: 100px; display: inline-block;" title="Taza personalizada">
                                        Taza personalizada
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-assigned">María García</span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal1" title="Editar">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-info" onclick="viewDetails(1)" title="Ver detalles">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="badge bg-secondary">2</span></td>
                                <td><strong>María García</strong></td>
                                <td><code>98765432-1</code></td>
                                <td><code>9876</code></td>
                                <td>
                                    <span class="text-truncate" style="max-width: 100px; display: inline-block;" title="Plantas suculentas">
                                        Plantas suculentas
                                    </span>
                                </td>
                                <td>
                                    <span class="text-truncate" style="max-width: 100px; display: inline-block;" title="Velas aromáticas">
                                        Velas aromáticas
                                    </span>
                                </td>
                                <td>
                                    <span class="text-truncate" style="max-width: 100px; display: inline-block;" title="Chocolate gourmet">
                                        Chocolate gourmet
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-pending">Pendiente</span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal2" title="Editar">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-info" onclick="viewDetails(2)" title="Ver detalles">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="badge bg-secondary">3</span></td>
                                <td><strong>Carlos López</strong></td>
                                <td><code>11223344-5</code></td>
                                <td><code>1122</code></td>
                                <td>
                                    <span class="text-truncate" style="max-width: 100px; display: inline-block;" title="Camiseta deportiva">
                                        Camiseta deportiva
                                    </span>
                                </td>
                                <td>
                                    <span class="text-truncate" style="max-width: 100px; display: inline-block;" title="Botella de agua">
                                        Botella de agua
                                    </span>
                                </td>
                                <td>
                                    <span class="text-truncate" style="max-width: 100px; display: inline-block;" title="Proteína en polvo">
                                        Proteína en polvo
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-pending">Pendiente</span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal3" title="Editar">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-info" onclick="viewDetails(3)" title="Ver detalles">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Roulette Section -->
            <div class="roulette-section animate__animated animate__fadeInUp animate__delay-1s">
                <div class="roulette-icon" id="rouletteIcon">
                    <i class="bi bi-arrow-repeat"></i>
                </div>
                <h2 class="roulette-title">¡Momento de la Magia!</h2>
                <p class="text-muted mb-4">Realiza el sorteo y asigna los amigos secretos</p>

                <form method="POST" action="_functions.php" id="rouletteForm">
                    <button type="submit" class="btn-roulette" id="rouletteBtn">
                        <i class="bi bi-shuffle me-2"></i>
                        Realizar Sorteo
                    </button>
                    <input type="hidden" name="accion" value="ruleta">
                </form>

                <div class="mt-3">
                    <small class="text-muted">
                        <i class="bi bi-info-circle me-1"></i>
                        Asegúrate de que todos los participantes hayan completado sus deseos antes del sorteo
                    </small>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">
                        <i class="bi bi-person-plus me-2"></i>
                        Agregar Nuevo Participante
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="createParticipantForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">
                                        <i class="bi bi-person me-1"></i>Nombre Completo
                                    </label>
                                    <input type="text" class="form-control" name="nombre" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">
                                        <i class="bi bi-card-text me-1"></i>RUT
                                    </label>
                                    <input type="text" class="form-control" name="rut" placeholder="12345678-9" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                <i class="bi bi-key me-1"></i>Contraseña
                            </label>
                            <input type="text" class="form-control" name="password" placeholder="Primeros 4 dígitos del RUT" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-1"></i>Cancelar
                    </button>
                    <button type="button" class="btn btn-primary" onclick="createParticipant()">
                        <i class="bi bi-check-circle me-1"></i>Crear Participante
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modals (Sample) -->
    <div class="modal fade" id="editModal1" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title">
                        <i class="bi bi-pencil me-2"></i>
                        Editar Participante - Juan Pérez
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Nombre</label>
                                    <input type="text" class="form-control" value="Juan Pérez">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">RUT</label>
                                    <input type="text" class="form-control" value="12345678-9">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contraseña</label>
                            <input type="text" class="form-control" value="1234">
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Deseo 1</label>
                                    <input type="text" class="form-control" value="Libro de aventuras">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Deseo 2</label>
                                    <input type="text" class="form-control" value="Audífonos bluetooth">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Deseo 3</label>
                                    <input type="text" class="form-control" value="Taza personalizada">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-warning">
                        <i class="bi bi-save me-1"></i>Guardar Cambios
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        // Initialize DataTable
        $(document).ready(function() {
            const table = $('#participantsTable').DataTable({
                responsive: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                },
                pageLength: 10,
                order: [
                    [0, 'asc']
                ],
                columnDefs: [{
                        targets: [8],
                        orderable: false
                    },
                    {
                        targets: [4, 5, 6],
                        width: '150px'
                    }
                ]
            });

            // Update participant count
            updateParticipantCount();
        });

        // Update participant count
        function updateParticipantCount() {
            const count = $('#participantsTable tbody tr').length;
            $('#participantCount').text(`${count} participantes`);
        }

        // Navigate to user view
        function goToUser() {
            showLoading();
            setTimeout(() => {
                window.location.href = 'index.php';
            }, 500);
        }

        // View participant details
        function viewDetails(id) {
            Swal.fire({
                title: '👤 Detalles del Participante',
                html: `
                    <div class="text-start">
                        <div class="row">
                            <div class="col-6"><strong>ID:</strong></div>
                            <div class="col-6">${id}</div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6"><strong>Estado del sorteo:</strong></div>
                            <div class="col-6">
                                <span class="badge ${id === 1 ? 'bg-success' : 'bg-warning'}">
                                    ${id === 1 ? 'Asignado' : 'Pendiente'}
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><strong>Deseos completados:</strong></div>
                            <div class="col-6">3/3 ✅</div>
                        </div>
                    </div>
                `,
                confirmButtonColor: '#667eea',
                customClass: {
                    popup: 'animate__animated animate__zoomIn'
                }
            });
        }

        // Create participant
        function createParticipant() {
            const form = document.getElementById('createParticipantForm');
            const formData = new FormData(form);

            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            showLoading();

            // Simulate API call
            setTimeout(() => {
                hideLoading();
                Swal.fire({
                    icon: 'success',
                    title: '¡Participante creado!',
                    text: 'El nuevo participante ha sido agregado exitosamente.',
                    confirmButtonColor: '#10b981'
                }).then(() => {
                    $('#createModal').modal('hide');
                    location.reload(); // In real app, update table dynamically
                });
            }, 1500);
        }

        // Roulette functionality
        document.getElementById('rouletteForm').addEventListener('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: '🎲 ¿Realizar el sorteo?',
                text: 'Esta acción asignará aleatoriamente los amigos secretos. ¿Estás seguro?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#667eea',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, realizar sorteo',
                cancelButtonText: 'Cancelar',
                customClass: {
                    popup: 'animate__animated animate__zoomIn'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    performRoulette();
                }
            });
        });

        function performRoulette() {
            const rouletteIcon = document.getElementById('rouletteIcon');
            const rouletteBtn = document.getElementById('rouletteBtn');

            // Start animation
            rouletteIcon.style.animation = 'spin 0.5s linear infinite';
            rouletteBtn.disabled = true;
            rouletteBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Realizando sorteo...';

            showLoading();

            // Simulate roulette process
            setTimeout(() => {
                rouletteIcon.style.animation = 'spin 3s linear infinite';

                setTimeout(() => {
                    hideLoading();
                    rouletteIcon.style.animation = '';
                    rouletteBtn.disabled = false;
                    rouletteBtn.innerHTML = '<i class="bi bi-shuffle me-2"></i>Realizar Sorteo';

                    Swal.fire({
                        icon: 'success',
                        title: '🎉 ¡Sorteo completado!',
                        text: 'Los amigos secretos han sido asignados exitosamente.',
                        confirmButtonColor: '#10b981',
                        timer: 3000,
                        timerProgressBar: true
                    }).then(() => {
                        location.reload(); // In real app, update table dynamically
                    });
                }, 3000);
            }, 1000);
        }

        // Loading functions
        function showLoading() {
            document.getElementById('loadingOverlay').classList.add('active');
        }

        function hideLoading() {
            document.getElementById('loadingOverlay').classList.remove('active');
        }

        // Smooth animations on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate__animated', 'animate__fadeInUp');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.data-card, .roulette-section').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>

</html>