<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Desarrollo Web Avanzado: POO+PDO+TryCatch+Namespaces+Autoload+Transacciones+MVC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= BASE_URL ?>/catalogo">
            <i class="bi bi-shop"></i> Tienda MVC
        </a>
        <div>
            <a class="btn btn-outline-light btn-sm me-2" href="<?= BASE_URL ?>/catalogo">
                <i class="bi bi-grid"></i> Catálogo
            </a>
            <?php if (isset($_SESSION['admin'])): ?>
                <a class="btn btn-outline-info btn-sm me-2" href="<?= BASE_URL ?>/productos">
                    <i class="bi bi-box-seam"></i> Productos
                </a>
                <a class="btn btn-outline-secondary btn-sm me-2" href="<?= BASE_URL ?>/logs">
                    <i class="bi bi-journal-text"></i> Bitácora
                </a>
                <span class="text-light me-2 d-none d-md-inline">
                    <i class="bi bi-person-circle"></i> <?= htmlspecialchars($_SESSION['admin']['nombre_completo']); ?>
                </span>
                <a class="btn btn-danger btn-sm" href="<?= BASE_URL ?>/logout">
                    <i class="bi bi-box-arrow-right"></i> Salir
                </a>
            <?php else: ?>
                <a class="btn btn-warning btn-sm" href="<?= BASE_URL ?>/login">
                    <i class="bi bi-lock"></i> Administrador
                </a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle"></i>
            <?= htmlspecialchars($_SESSION['success']); unset($_SESSION['success']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="bi bi-exclamation-triangle"></i>
            <?= htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>
