<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Custom Page</title>
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/pages/custom.css" rel="stylesheet">
</head>
<body>
	<div class="page">
		<header class="headers">
			<?php the_content(); ?>
		</header>
		<main class="content">
			<section class="products">
				<ul class="products__list">
					<?php

						// Параметры запроса
						$args = array(
							'limit'  => -1, // Получить все
							'status' => 'publish', // Только опубликованные
							'orderby'  => 'date', // Сортировка
						);
						// Получаем массив товаров
						$products = wc_get_products( $args );

						// Выводим в цикле
						foreach ($products as $product) {
							echo '<li class="product">';
							// TODO: get_image вставляет width и height, надо избавиться от них
							echo $product->get_image($size = 'woocommerce_thumbnail', $attr = array('class'=>'product__image'), $placeholder = true);
							echo '<h3 class="product__title">' . $product->get_title() . '</h3>';
							echo '</li>';
						}

					?>	
				</ul>
			</section>
		</main>
		<footer class="footer">
			<a class="footer__link" href="/wp-admin">Консоль администратора</a>
			<a class="footer__link" href="https://github.com/d-ogarkov/woocommerce-test-task" target="_blank">Исходники</a>
		</footer>
	</div>
</body>
</html>
