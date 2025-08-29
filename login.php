<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amigo Secreto - Iniciar Sesión</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
        :root {
            --primary-color: #667eea;
            --secondary-color: #764ba2;
            --accent-color: #f093fb;
            --success-color: #4CAF50;
            --warning-color: #ff9800;
            --text-dark: #2c3e50;
            --text-light: #ffffff;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            --border-radius: 15px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated background particles */
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }

        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .particle:nth-child(1) {
            left: 20%;
            animation-delay: 0s;
            width: 10px;
            height: 10px;
        }

        .particle:nth-child(2) {
            left: 40%;
            animation-delay: 2s;
            width: 15px;
            height: 15px;
        }

        .particle:nth-child(3) {
            left: 60%;
            animation-delay: 4s;
            width: 8px;
            height: 8px;
        }

        .particle:nth-child(4) {
            left: 80%;
            animation-delay: 1s;
            width: 12px;
            height: 12px;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0.7;
            }

            33% {
                transform: translateY(-30px) rotate(120deg);
                opacity: 1;
            }

            66% {
                transform: translateY(30px) rotate(240deg);
                opacity: 0.7;
            }
        }

        .login-container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 450px;
            margin: 0 auto;
            padding: 20px;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 3rem 2rem;
            text-align: center;
            transition: all 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .logo-container {
            margin-bottom: 2rem;
        }

        .logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 1rem;
            background: linear-gradient(135deg, var(--accent-color), var(--primary-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .welcome-title {
            color: var(--text-dark);
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .welcome-subtitle {
            color: #6c757d;
            font-size: 1rem;
            margin-bottom: 2rem;
            font-weight: 300;
        }

        .form-floating {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: rgba(248, 249, 250, 0.8);
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
            background: white;
            transform: translateY(-2px);
        }

        .form-floating label {
            color: #6c757d;
            font-weight: 500;
        }

        .btn-login {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 12px;
            padding: 1rem 2rem;
            font-size: 1.1rem;
            font-weight: 600;
            color: white;
            width: 100%;
            margin: 1rem 0;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-help {
            background: rgba(255, 152, 0, 0.1);
            border: 2px solid var(--warning-color);
            color: var(--warning-color);
            border-radius: 10px;
            padding: 0.7rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            margin-top: 1rem;
        }

        .btn-help:hover {
            background: var(--warning-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 152, 0, 0.3);
        }

        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            font-size: 1.2rem;
            z-index: 5;
        }

        .loading-spinner {
            display: none;
        }

        .loading .loading-spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            margin-left: 10px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .login-container {
                padding: 15px;
            }

            .login-card {
                padding: 2rem 1.5rem;
            }

            .welcome-title {
                font-size: 1.5rem;
            }
        }

        /* Custom animations */
        .fade-in-up {
            animation: fadeInUp 0.8s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .shake {
            animation: shake 0.82s cubic-bezier(.36, .07, .19, .97) both;
        }

        @keyframes shake {

            10%,
            90% {
                transform: translate3d(-1px, 0, 0);
            }

            20%,
            80% {
                transform: translate3d(2px, 0, 0);
            }

            30%,
            50%,
            70% {
                transform: translate3d(-4px, 0, 0);
            }

            40%,
            60% {
                transform: translate3d(4px, 0, 0);
            }
        }
    </style>
</head>

<body>
    <!-- Animated background particles -->
    <div class="particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <div class="login-container">
        <div class="login-card fade-in-up">
            <!-- Logo and Title -->
            <div class="logo-container">
                <div class="logo">
                    <i class="bi bi-gift"></i>
                </div>
                <h1 class="welcome-title">Amigo Secreto</h1>
                <p class="welcome-subtitle">Inicia sesión para descubrir la magia</p>
            </div>

            <!-- Login Form -->
            <form id="loginForm" action="_functions.php" method="POST">
                <div class="form-floating">
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu nombre" required>
                    <label for="nombre">Nombre</label>
                    <i class="bi bi-person input-icon"></i>
                </div>

                <div class="form-floating">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
                    <label for="password">Contraseña</label>
                    <i class="bi bi-lock input-icon"></i>
                </div>

                <input type="hidden" name="accion" value="acceso_user">

                <button type="submit" class="btn btn-login" id="loginBtn">
                    <i class="bi bi-box-arrow-in-right me-2"></i>
                    Ingresar
                    <div class="loading-spinner spinner-border spinner-border-sm" role="status">
                        <span class="visually-hidden">Cargando...</span>
                    </div>
                </button>

                <a href="#" class="btn-help" onclick="showPasswordHelp()">
                    <i class="bi bi-question-circle me-2"></i>
                    ¿No sabes tu contraseña?
                </a>
            </form>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Password help function
        function showPasswordHelp() {
            Swal.fire({
                icon: 'info',
                title: '💡 Ayuda con la contraseña',
                html: `
                    <div style="text-align: left; font-size: 1.1rem; line-height: 1.6;">
                        <p><i class="bi bi-key-fill" style="color: #667eea;"></i> <strong>Tu contraseña son los primeros 4 dígitos de tu RUT</strong></p>
                        <hr>
                        <p style="color: #6c757d; font-size: 0.9rem;">
                            <i class="bi bi-info-circle"></i> Ejemplo: Si tu RUT es 12.345.678-9, tu contraseña es <code>1234</code>
                        </p>
                    </div>
                `,
                confirmButtonText: 'Entendido',
                confirmButtonColor: '#667eea',
                backdrop: `rgba(102, 126, 234, 0.1)`,
                customClass: {
                    popup: 'animate__animated animate__fadeInDown'
                }
            });
        }

        // Form submission with loading state
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const loginBtn = document.getElementById('loginBtn');
            const nombre = document.getElementById('nombre').value.trim();
            const password = document.getElementById('password').value.trim();

            if (!nombre || !password) {
                e.preventDefault();

                // Shake animation for invalid input
                document.querySelector('.login-card').classList.add('shake');
                setTimeout(() => {
                    document.querySelector('.login-card').classList.remove('shake');
                }, 820);

                Swal.fire({
                    icon: 'warning',
                    title: '¡Campos requeridos!',
                    text: 'Por favor completa todos los campos',
                    confirmButtonColor: '#ff9800',
                    timer: 3000,
                    timerProgressBar: true
                });
                return;
            }

            // Add loading state
            loginBtn.classList.add('loading');
            loginBtn.disabled = true;
            loginBtn.innerHTML = `
                <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                Ingresando...
            `;
        });

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
                    this.style.borderColor = '#4CAF50';
                } else {
                    this.style.borderColor = '#e9ecef';
                }
            });
        });

        // Add some interactive elements
        document.addEventListener('DOMContentLoaded', function() {
            // Parallax effect for particles
            document.addEventListener('mousemove', function(e) {
                const particles = document.querySelectorAll('.particle');
                const x = e.clientX / window.innerWidth;
                const y = e.clientY / window.innerHeight;

                particles.forEach((particle, index) => {
                    const speed = (index + 1) * 0.05;
                    const xMove = (x - 0.5) * speed * 50;
                    const yMove = (y - 0.5) * speed * 50;
                    particle.style.transform = `translate(${xMove}px, ${yMove}px)`;
                });
            });
        });
    </script>
</body>

</html>