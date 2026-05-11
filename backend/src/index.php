<?php
 
// Healthcheck endpoint
if (($_SERVER['REQUEST_URI'] ?? '') === '/health') {
    http_response_code(200);
    header('Content-Type: application/json');
    echo json_encode(['status' => 'ok', 'service' => 'ubb-perfeccionamiento']);
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

// Conexión a SQL Server
$dbHost     = getenv('DB_HOST')     ?: 'db';
$dbPort     = getenv('DB_PORT')     ?: '1433';
$dbName     = getenv('DB_NAME')     ?: 'ubb_perfeccionamiento';
$dbUser     = getenv('DB_USER')     ?: 'sa';
$dbPassword = getenv('DB_PASSWORD') ?: 'UBB_SqlServer2017!';

$dbStatus = 'Sin conexión';
try {
    $dsn = "sqlsrv:Server={$dbHost},{$dbPort};Database=master;Encrypt=yes;TrustServerCertificate=yes";
    $pdo = new PDO($dsn, $dbUser, $dbPassword, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $dbStatus = 'Conectado';
} catch (PDOException $e) {
    $dbStatus = 'Error: ' . htmlspecialchars($e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Perfeccionamiento Académico UBB</title>
  <style>
    body{font-family:Tahoma,Arial,sans-serif;background:#edf1f4;color:#364e62;margin:0}
    header{background:#2d6e9f;color:#fff;padding:14px 24px;font-size:18px}
    main{max-width:700px;margin:40px auto;background:#fff;border:1px solid #d5dde4;
         border-top:4px solid #5aa5d2;padding:28px}
    h1{color:#2d6e9f;font-weight:400}
    .row{display:flex;justify-content:space-between;padding:10px 0;
         border-bottom:1px solid #e8edf2;font-size:14px}
    .ok{color:#557a1a;font-weight:bold}
    .err{color:#9e3424;font-weight:bold}
  </style>
</head>
<body>
  <header>Intranet Universidad del Bío-Bío</header>
  <main>
    <h1>Módulo: Perfeccionamiento Académico</h1>
    <p>El servicio está operativo.</p>
    <div class="row"><span>Estado del servicio</span><span class="ok">Activo</span></div>
    <div class="row"><span>PHP</span><span><?= phpversion() ?></span></div>
    <div class="row"><span>Base de datos (SQL Server)</span>
      <span class="<?= str_starts_with($dbStatus,'Conectado') ? 'ok' : 'err' ?>"><?= $dbStatus ?></span>
    </div>
    <div class="row"><span>Smarty</span>
      <span class="<?= class_exists('Smarty\\Smarty') ? 'ok' : 'err' ?>">
        <?= class_exists('Smarty\\Smarty') ? 'Disponible' : 'No cargado' ?>
      </span>
    </div>
  </main>
</body>
</html>