<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tes DB Connection</title>
</head>
<body>
    <div>
        <?php
            use Illuminate\Support\Facades\DB;

            if (DB::connection()->getPdo()){
                echo "Berhasil konnek ke mysql, nama DB-nya " . DB::connection()->getDatabaseName();
            }
        ?>
    </div>
</body>
</html>
