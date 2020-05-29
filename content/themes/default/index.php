<!DOCTYPE html>
<html lang='ru'>
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Test</title>
	<link rel="icon" href="/content/themes/default/assets/logo/favicon.ico">
	<!--CSS files render-->
    <?php Asset::render('css'); ?>
</head>
<body>
    это тестовая index страница

    <?php Asset::render('js'); ?>
</body>
</html>