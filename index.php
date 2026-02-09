<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Helper function to check if a service is reachable
function checkConnection($host, $port = 80) {
    $connection = @fsockopen($host, $port, $errno, $errstr, 2);
    return $connection ? true : false;
}

$pod_name = gethostname();
$db_status = getenv('DB_PASSWORD') ? "✅ Secret Loaded" : "❌ Secret Missing";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ROSA App Dashboard</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f0f2f5; color: #333; margin: 0; padding: 20px; }
        .container { max-width: 800px; margin: auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .status-card { border-left: 5px solid #0066cc; background: #e7f3ff; padding: 15px; margin: 20px 0; border-radius: 4px; }
        .badge { padding: 4px 8px; border-radius: 4px; font-size: 0.8em; font-weight: bold; color: white; }
        .bg-success { background: #28a745; }
        .bg-danger { background: #dc3545; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { text-align: left; padding: 12px; border-bottom: 1px solid #ddd; }
    </style>
</head>
<body>
    <div class="container">
        <h1>ROSA PHP app with WebhoDashboard</h1>
        <p>This application is running as a containerized pod on Red Hat OpenShift.</p>

        <div class="status-card">
            <strong>Pod Identity:</strong> <code><?php echo $pod_name; ?></code><br>
            <strong>Database Config:</strong> <?php echo $db_status; ?>
        </div>

        <h3>Connectivity Probes</h3>
        <table>
            <tr><th>Target</th><th>Status</th></tr>
            <tr>
                <td>External (google.com)</td>
                <td><span class="badge <?php echo checkConnection('google.com') ? 'bg-success' : 'bg-danger'; ?>">
                    <?php echo checkConnection('google.com') ? 'REACHABLE' : 'BLOCKED'; ?></span></td>
            </tr>
            <tr>
                <td>Internal Service (DNS Check)</td>
                <td><span class="badge <?php echo checkConnection('kubernetes.default.svc', 443) ? 'bg-success' : 'bg-danger'; ?>">
                    <?php echo checkConnection('kubernetes.default.svc', 443) ? 'REACHABLE' : 'BLOCKED'; ?></span></td>
            </tr>
        </table>

        <h3>Environment Metadata</h3>
        <table>
            <?php 
            $vars = ['PHP_VERSION', 'HTTP_USER_AGENT', 'SERVER_SOFTWARE', 'REQUEST_TIME'];
            foreach ($vars as $v) {
                echo "<tr><td>$v</td><td>" . ($_SERVER[$v] ?? 'N/A') . "</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>