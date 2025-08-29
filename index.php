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
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <title>Mi Amigo Secreto</title>

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
            --gold-color: #fbbf24;
            --border-radius: 15px;
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: var(--dark-color);
            position: relative;
            overflow-x: hidden;
        }

        /* Animated background elements */
        .background-decoration {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .floating-gift {
            position: absolute;
            color: rgba(255, 255, 255, 0.1);
            font-size: 2rem;
            animation: float 8s ease-in-out infinite;
        }

        .floating-gift:nth-child(1) {
            left: 10%;
            top: 10%;
            animation-delay: 0s;
        }

        .floating-gift:nth-child(2) {
            left: 80%;
            top: 20%;
            animation-delay: 2s;
        }

        .floating-gift:nth-child(3) {
            left: 20%;
            top: 80%;
            animation-delay: 4s;
        }

        .floating-gift:nth-child(4) {
            left: 70%;
            top: 70%;
            animation-delay: 6s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            25% {
                transform: translateY(-20px) rotate(5deg);
            }

            50% {
                transform: translateY(-10px) rotate(-5deg);
            }

            75% {
                transform: translateY(-30px) rotate(3deg);
            }
        }

        /* Header */
        .header {
            position: relative;
            z-index: 1;
            padding: 2rem 0;
            text-align: center;
        }

        .header-content {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--border-radius);
            padding: 2rem;
            color: white;
            box-shadow: var(--shadow-lg);
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
            margin-bottom: 1.5rem;
        }

        .logout-btn {
            background: rgba(239, 68, 68, 0.2);
            border: 2px solid rgba(239, 68, 68, 0.5);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logout-btn:hover {
            background: rgba(239, 68, 68, 0.3);
            border-color: rgba(239, 68, 68, 0.8);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(239, 68, 68, 0.3);
            color: white;
        }

        /* Main Content */
        .main-content {
            position: relative;
            z-index: 1;
            padding: 2rem 0;
        }

        .wishes-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--border-radius);
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-lg);
            transition: all 0.3s ease;
        }

        .wishes-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .card-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .wishes-table {
            background: white;
            border-radius: var(--border-radius);
            overflow: hidden;
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
            padding: 1.2rem;
            text-align: center;
            font-size: 1.1rem;
        }

        .table-modern tbody td {
            padding: 1.2rem;
            border-color: #e5e7eb;
            vertical-align: middle;
            text-align: center;
            font-size: 1rem;
        }

        .table-modern tbody tr:hover {
            background: rgba(102, 126, 234, 0.05);
            transform: scale(1.02);
            transition: all 0.3s ease;
        }

        .wish-item {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding: 0.8rem 1rem;
            border-radius: 8px;
            font-weight: 500;
            border-left: 4px solid var(--info-color);
            margin: 0.2rem 0;
        }

        .btn-edit {
            background: linear-gradient(135deg, var(--info-color), #1e40af);
            border: none;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.4);
            color: white;
        }

        /* Secret Friend Section */
        .secret-friend-section {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--border-radius);
            padding: 3rem 2rem;
            text-align: center;
            box-shadow: var(--shadow-lg);
            position: relative;
            overflow: hidden;
        }

        .secret-friend-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 30%, rgba(251, 191, 36, 0.1) 50%, transparent 70%);
            animation: shimmer 3s ease-in-out infinite;
        }

        @keyframes shimmer {
            0% {
                transform: translateX(-100%);
            }

            100% {
                transform: translateX(100%);
            }
        }

        .mystery-icon {
            font-size: 4rem;
            color: var(--gold-color);
            margin-bottom: 1.5rem;
            animation: bounce 2s ease-in-out infinite;
            text-shadow: 0 4px 8px rgba(251, 191, 36, 0.3);
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-10px);
            }

            60% {
                transform: translateY(-5px);
            }
        }

        .secret-title {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, var(--gold-color), #f59e0b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .secret-subtitle {
            font-size: 1.1rem;
            color: #6b7280;
            margin-bottom: 2rem;
            font-style: italic;
        }

        .pending-message {
            background: linear-gradient(135deg, #fef3c7, #fed7aa);
            border: 2px dashed var(--warning-color);
            border-radius: var(--border-radius);
            padding: 2rem;
            color: #92400e;
            font-size: 1.2rem;
            font-weight: 600;
        }

        .assigned-friend {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            border: 2px solid var(--success-color);
            border-radius: var(--border-radius);
            padding: 2rem;
            color: var(--dark-color);
        }

        .friend-name {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--success-color);
        }

        .friend-wishes {
            text-align: left;
            max-width: 400px;
            margin: 0 auto;
        }

        .friend-wish {
            background: white;
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 0.8rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-left: 4px solid var(--success-color);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Edit Modal Styles */
        .modal-content {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-lg);
        }

        .modal-header {
            border-bottom: 1px solid #e5e7eb;
            border-radius: var(--border-radius) var(--border-radius) 0 0;
        }

        .modal-body {
            padding: 2rem;
        }

        .form-floating {
            margin-bottom: 1.5rem;
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
            transform: translateY(-2px);
        }

        .form-floating label {
            color: #6c757d;
            font-weight: 500;
        }

        .btn-save {
            background: linear-gradient(135deg, var(--success-color), #059669);
            border: none;
            color: white;
            padding: 0.8rem 2rem;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.4);
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header h1 {
                font-size: 2rem;
            }

            .wishes-card {
                padding: 1.5rem;
            }

            .secret-friend-section {
                padding: 2rem 1.5rem;
            }

            .secret-title {
                font-size: 1.8rem;
            }

            .table-modern thead th,
            .table-modern tbody td {
                padding: 0.8rem;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 576px) {
            .header-content {
                padding: 1.5rem;
            }

            .card-title {
                font-size: 1.5rem;
            }

            .mystery-icon {
                font-size: 3rem;
            }
        }

        /* Loading Animation */
        .loading-spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid #f3f3f3;
            border-top: 3px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Success animations */
        .pulse-success {
            animation: pulse-success 2s infinite;
        }

        @keyframes pulse-success {
            0% {
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(16, 185, 129, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0);
            }
        }
    </style>
</head>

<body>
    <!-- Background Decoration -->
    <div class="background-decoration">
        <div class="floating-gift"><i class="bi bi-gift"></i></div>
        <div class="floating-gift"><i class="bi bi-heart"></i></div>
        <div class="floating-gift"><i class="bi bi-star"></i></div>
        <div class="floating-gift"><i class="bi bi-balloon"></i></div>
    </div>

    <!-- Header -->
    <div class="header">
        <div class="container">
            <div class="header-content animate__animated animate__fadeInDown">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div></div>
                    <button class="logout-btn" onclick="logout()">
                        <i class="bi bi-box-arrow-right"></i>
                        Cerrar Sesión
                    </button>
                </div>
                <h1><i class="bi bi-person-heart me-3"></i>Mi Amigo Secreto</h1>
                <p>Descubre la magia de regalar con el corazón</p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <!-- User Wishes Section -->
            <div class="wishes-card animate__animated animate__fadeInUp">
                <h2 class="card-title">
                    <i class="bi bi-list-stars text-primary"></i>
                    Mis Deseos
                </h2>

                <div class="wishes-table">
                    <table class="table table-modern">
                        <thead>
                            <tr>
                                <th><i class="bi bi-person me-2"></i>Mi Nombre</th>
                                <th><i class="bi bi-gift me-2"></i>Deseo 1</th>
                                <th><i class="bi bi-gift me-2"></i>Deseo 2</th>
                                <th><i class="bi bi-gift me-2"></i>Deseo 3</th>
                                <th><i class="bi bi-tools me-2"></i>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample Data - Replace with PHP variable -->
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person-circle fs-4 text-primary me-2"></i>
                                        <strong>Juan Pérez</strong>
                                    </div>
                                </td>
                                <td>
                                    <div class="wish-item" id="wish1">
                                        Libro de aventuras
                                    </div>
                                </td>
                                <td>
                                    <div class="wish-item" id="wish2">
                                        Audífonos bluetooth
                                    </div>
                                </td>
                                <td>
                                    <div class="wish-item" id="wish3">
                                        Taza personalizada
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn-edit" data-bs-toggle="modal" data-bs-target="#editWishesModal">
                                        <i class="bi bi-pencil-square"></i>
                                        Editar Deseos
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Secret Friend Reveal Section -->
            <div class="secret-friend-section animate__animated animate__fadeInUp animate__delay-1s">
                <div class="mystery-icon">
                    <i class="bi bi-question-diamond"></i>
                </div>

                <h2 class="secret-title">Tu Amigo Secreto</h2>
                <p class="secret-subtitle">El momento más emocionante del intercambio</p>

                <!-- Pending State (Default) -->
                <div class="pending-message" id="pendingState">
                    <div class="mb-3">
                        <i class="bi bi-hourglass-split fs-1"></i>
                    </div>
                    <h3>¡Aún no se ha realizado el sorteo!</h3>
                    <p class="mb-0">Espera pacientemente... La magia está por comenzar</p>
                    <div class="mt-3">
                        <small class="text-muted">
                            <i class="bi bi-info-circle me-1"></i>
                            El administrador realizará el sorteo pronto
                        </small>
                    </div>
                </div>

                <!-- Assigned State (Hidden by default - shown when friend is assigned) -->
                <div class="assigned-friend d-none" id="assignedState">
                    <div class="mb-4">
                        <i class="bi bi-heart-fill fs-1 text-danger"></i>
                    </div>
                    <div class="friend-name" id="friendName">María García</div>
                    <p class="mb-4">¡Estos son sus deseos!</p>

                    <div class="friend-wishes">
                        <div class="friend-wish">
                            <i class="bi bi-1-circle-fill text-success"></i>
                            <span>Plantas suculentas</span>
                        </div>
                        <div class="friend-wish">
                            <i class="bi bi-2-circle-fill text-success"></i>
                            <span>Velas aromáticas</span>
                        </div>
                        <div class="friend-wish">
                            <i class="bi bi-3-circle-fill text-success"></i>
                            <span>Chocolate gourmet</span>
                        </div>
                    </div>

                    <div class="mt-4">
                        <small class="text-muted">
                            <i class="bi bi-lightbulb me-1"></i>
                            ¡Elige uno de estos deseos o sorpréndela con algo especial!
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Wishes Modal -->
    <div class="modal fade" id="editWishesModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">
                        <i class="bi bi-pencil-square me-2"></i>
                        Editar Mis Deseos
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <i class="bi bi-lightbulb fs-1 text-warning"></i>
                        <p class="text-muted mt-2">Comparte tus deseos para que tu amigo secreto pueda sorprenderte</p>
                    </div>

                    <form id="editWishesForm">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="deseo1" name="deseo1"
                                placeholder="Mi primer deseo" value="Libro de aventuras" required>
                            <label for="deseo1">
                                <i class="bi bi-1-circle me-1"></i>Primer Deseo
                            </label>
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control" id="deseo2" name="deseo2"
                                placeholder="Mi segundo deseo" value="Audífonos bluetooth" required>
                            <label for="deseo2">
                                <i class="bi bi-2-circle me-1"></i>Segundo Deseo
                            </label>
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control" id="deseo3" name="deseo3"
                                placeholder="Mi tercer deseo" value="Taza personalizada" required>
                            <label for="deseo3">
                                <i class="bi bi-3-circle me-1"></i>Tercer Deseo
                            </label>
                        </div>

                        <div class="mt-3">
                            <small class="text-muted">
                                <i class="bi bi-info-circle me-1"></i>
                                Sé específico para que tu amigo secreto pueda elegir el regalo perfecto
                            </small>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-1"></i>Cancelar
                    </button>
                    <button type="button" class="btn-save" onclick="saveWishes()">
                        <i class="bi bi-check-circle me-1"></i>Guardar Deseos
                        <span class="loading-spinner d-none ms-2"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Logout function
        function logout() {
            Swal.fire({
                title: '👋 ¿Cerrar sesión?',
                text: '¿Estás seguro de que quieres salir?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, cerrar sesión',
                cancelButtonText: 'Cancelar',
                backdrop: `rgba(239, 68, 68, 0.1)`,
                customClass: {
                    popup: 'animate__animated animate__zoomIn'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show loading
                    Swal.fire({
                        title: 'Cerrando sesión...',
                        text: '¡Hasta la próxima!',
                        icon: 'info',
                        timer: 2000,
                        timerProgressBar: true,
                        showConfirmButton: false,
                        willClose: () => {
                            window.location.href = 'cerrarSesion.php';
                        }
                    });
                }
            });
        }

        // Save wishes function
        function saveWishes() {
            const form = document.getElementById('editWishesForm');
            const saveBtn = document.querySelector('.btn-save');
            const spinner = saveBtn.querySelector('.loading-spinner');

            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            // Show loading state
            saveBtn.disabled = true;
            spinner.classList.remove('d-none');

            // Get form data
            const deseo1 = document.getElementById('deseo1').value;
            const deseo2 = document.getElementById('deseo2').value;
            const deseo3 = document.getElementById('deseo3').value;

            // Simulate API call
            setTimeout(() => {
                // Update the wishes in the table
                document.getElementById('wish1').textContent = deseo1;
                document.getElementById('wish2').textContent = deseo2;
                document.getElementById('wish3').textContent = deseo3;

                // Reset button state
                saveBtn.disabled = false;
                spinner.classList.add('d-none');

                // Show success message
                Swal.fire({
                    icon: 'success',
                    title: '🎉 ¡Deseos actualizados!',
                    text: 'Tus deseos han sido guardados correctamente.',
                    confirmButtonColor: '#10b981',
                    timer: 3000,
                    timerProgressBar: true
                }).then(() => {
                    // Close modal
                    const modal = bootstrap.Modal.getInstance(document.getElementById('editWishesModal'));
                    modal.hide();

                    // Add pulse effect to wishes
                    document.querySelectorAll('.wish-item').forEach(item => {
                        item.classList.add('pulse-success');
                        setTimeout(() => {
                            item.classList.remove('pulse-success');
                        }, 2000);
                    });
                });
            }, 1500);
        }

        // Form field animations
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
            });

            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });

            input.addEventListener('input', function() {
                if (this.value.length > 0) {
                    this.style.borderColor = '#10b981';
                } else {
                    this.style.borderColor = '#e9ecef';
                }
            });
        });

        // Demo function to show assigned friend (for testing)
        function showAssignedFriend() {
            document.getElementById('pendingState').classList.add('d-none');
            document.getElementById('assignedState').classList.remove('d-none');

            // Add confetti effect
            setTimeout(() => {
                Swal.fire({
                    icon: 'success',
                    title: '🎁 ¡Tu amigo secreto ha sido revelado!',
                    text: 'Revisa sus deseos y prepara un regalo especial',
                    confirmButtonColor: '#10b981',
                    timer: 4000,
                    timerProgressBar: true
                });
            }, 500);
        }

        // Add some interactivity on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Add hover effects to wish items
            document.querySelectorAll('.wish-item').forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.05)';
                    this.style.boxShadow = '0 5px 15px rgba(59, 130, 246, 0.3)';
                });

                item.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1)';
                    this.style.boxShadow = '0 2px 4px rgba(0,0,0,0.1)';
                });
            });

            // Uncomment next line to test assigned friend state
            // setTimeout(() => showAssignedFriend(), 3000);
        });

        // Parallax effect for floating gifts
        document.addEventListener('mousemove', function(e) {
            const gifts = document.querySelectorAll('.floating-gift');
            const x = e.clientX / window.innerWidth;
            const y = e.clientY / window.innerHeight;

            gifts.forEach((gift, index) => {
                const speed = (index + 1) * 0.02;
                const xMove = (x - 0.5) * speed * 30;
                const yMove = (y - 0.5) * speed * 30;
                gift.style.transform = `translate(${xMove}px, ${yMove}px)`;
            });
        });
    </script>
</body>

</html>