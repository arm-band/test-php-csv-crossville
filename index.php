<?php
date_default_timezone_set('Asia/Tokyo');
mb_language('ja');
mb_internal_encoding('UTF-8');

$common = [
    'sitename' => 'Crossville',
    'year'     => 2022,
    'author'   => 'アルム＝バンド'
];

function _h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= _h($common['sitename']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <header class="l-header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="./"><?= _h($common['sitename']); ?></a>
            </div>
        </nav>
    </header>
    <main class="container my-5">
        <?php session_start(); ?>
        <form action="./download.php" method='post' class="py-4">
            <input name="token"  type="hidden" value="<?php echo htmlspecialchars(session_id(), ENT_COMPAT, 'UTF-8'); ?>" />
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-fw fa-file-csv" aria-hidden="true"></i>csvダウンロード</button>
        </form>
    </main>
    <footer class="l-footer">
        <div class="container mt-3 mb-2 text-center">
            <small>© <?= _h($common['year']); ?> <?= _h($common['author']); ?></small>
        </div>
    </footer>
</body>
</html>