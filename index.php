<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<?php
require_once 'config/connect.php';

$imgs = mysqli_query($connect, "SELECT * FROM `imgs`");
$imgs = mysqli_fetch_all($imgs);
$count = count($imgs);
function find_month(int $tmp_mounth)
{
	switch ($tmp_mounth) {
		case 01:
			$tmp_str = "января";
			break;
		case 02:
			$tmp_str = "февраля";
			break;
		case 03:
			$tmp_str = "марта";
			break;
		case 04:
			$tmp_str = "апреля";
			break;
		case 05:
			$tmp_str = "мая";
			break;
		case 06:
			$tmp_str = "июня";
			break;
	}
	switch ($tmp_mounth) {
		case 07:
			$tmp_str = "июля";
			break;
		case "08":
			$tmp_str = "августа";
			break;
		case "09":
			$tmp_str = "сентября";
			break;
		case "10":
			$tmp_str = "октября";
			break;
		case "11":
			$tmp_str = "ноября";
			break;
		case "12":
			$tmp_str = "декабря";
			break;
	}
	return $tmp_str;
}
function find(int $tmp_mounth)
{
	switch ($tmp_mounth) {
		case 01:
			$tmp_str = "Январь";
			break;
		case 02:
			$tmp_str = "Февраль";
			break;
		case 03:
			$tmp_str = "Март";
			break;
		case 04:
			$tmp_str = "Апрель";
			break;
		case 05:
			$tmp_str = "Май";
			break;
		case 06:
			$tmp_str = "Июнь";
			break;
	}
	switch ($tmp_mounth) {
		case 07:
			$tmp_str = "Июль";
			break;
		case "08":
			$tmp_str = "Август";
			break;
		case "09":
			$tmp_str = "Сентябрь";
			break;
		case "10":
			$tmp_str = "Октябрь";
			break;
		case "11":
			$tmp_str = "Ноябрь";
			break;
		case "12":
			$tmp_str = "Декабрь";
			break;
	}
	return $tmp_str;
}

?>
<!DOCTYPE html>
<html lang="ru">


<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;400;500;600&display=swap" rel="stylesheet">

	<title>ПОМОГИТЕ!</title>
</head>


<body>
</script>
	<div class="all_body">
		<div class="content">

			<div class="header">
				<div class="container">
					<div class="row">
						<div class="logo">
							<div class="logo_img"></div>
							<div class="logo_text">Галлерея скриншотов</div>
						</div>
						<nav>
							<button class="m_btn_reg" id="main_btn_reg" onclick="m_b_r('block')">Регистрация</button>
							<button class="m_btn_auto" id="main_btn_auto" onclick="m_b_a('block')">Вход</button>
						</nav>
					</div>

				</div>
				<div class="header_line"></div>
			</div>










			<div class="main">

				<div class="main_container">

					<div class="main_menu">
						<div class="row">
							<?php $tmp_item=$imgs[0]?>
							<div class="main_date"> <?= find(date('m', strtotime($tmp_item[2]))) ?>, 20<?=date('y', strtotime($tmp_item[2]))?></div>
							<div class="main_button" onclick="document.location='/add_img.php'">
								<div class="main_button_row">
									<div class="main_button_row_png"></div>
									<div class="main_button_row_text">Добавить скриншот
									</div>
								</div>
							</div>

						</div>
					</div>
					<div class="main_grid" id="grid">
						<?php
						foreach (array_reverse($imgs, true) as $item) {
							$tmp_id=$item[0];
							$tmp_date = strtotime($item[2]);
							$tmp_day = date('d', $tmp_date);
							$tmp_mounth = date('m', $tmp_date);
							$tmp_year = date('y', $tmp_date);
							$tmp_str = find_month($tmp_mounth);
							
						?>
							<div class="main_grid_item" id="<?= $tmp_id ?>" style="background: url('/vendor/<?= $item[3] ?>')50%/cover no-repeat;" onclick="ContentPage(this.id)" value='.$id.' >
								<div class="main_grid_item_text">
									<div class="main_grid_item_text_about"><?= $item[1] ?></div>
									<div class="main_grid_item_text_date">Добавлено <?= $tmp_day ?> <?= $tmp_str ?> 20<?= $tmp_year ?>г.</div>
								</div>
								
							</div>
						<?php
						}
						?>
					</div>
					<div class="main_button_more">
						<button class="btn_more">
							<div class="main_btn_more_img"></div>
							<div class="main_btn_more_text">Показать еще</div>
						</button>
					</div>

				</div>









				
				<div id="modal" style="display: none;">
					<div class="popup">
						<div class="popup_content">
							<div class="popup_title">
								<div class="popup_title_all">
									<button id="close_popup" onclick="p_c('none')"></button>
									<div class="popup_title_head_row">

										<button id="popup_btn_reg" onclick="p_r('none')">Регистрация</button>
										<button id="popup_btn_auto" onclick="p_a('none')">Авторизация</button>
									</div>



									<div class="reg" id="popup_reg" style="display: none;">
										<div class="popup_title_reg_block">

											<div class="popup_title_reg_block_item" id="name">
												<div class="popup_title_reg_block_item_box">
													<input type="text" name="name" class="popup_item_input" required>
													<div class="item_label">Ваше имя</div>
												</div>
											</div>


											<div class="popup_title_reg_block_item">
												<div class="popup_title_reg_block_item_box">
													<input type="text" name="email1" class="popup_item_input" required>
													<div class="item_label">Email</div>
												</div>
											</div>


											<div class="popup_title_reg_block_item">
												<div class="popup_title_reg_block_item_box">
													<input type="tel" name="tel" class="popup_item_input" required>
													<div class="item_label">Мобильный телефон</div>
												</div>
											</div>


											<div class="popup_title_reg_block_item">
												<div class="popup_title_reg_block_item_box">
													<input type="password" name="pass1" class="popup_item_input" required>
													<div class="item_label">Пароль</div>
												</div>
											</div>


											<div class="popup_title_reg_block_item">
												<div class="popup_title_reg_block_item_box">
													<input type="password" name="pass2" class="popup_item_input" required>
													<div class="item_label">Повторите пароль</div>
												</div>
											</div>


										</div>
										<div class="popup_title_auto_block">
											<div class="popup_check">
												<input type="checkbox" id="checkbox_1" name="checkbox" class="check_input" required>
												<label for="checkbox_1" class="check_label">Согласен на обработку <span> персональных
														данных</span></label>
											</div>

										</div>
										<div class="popup_title_button">
											<button>Зарегистрироваться</button>
										</div>
									</div>

									<div class="auto" id="popup_auto" style="display: none;">
										<div class="popup_title_aut_block">

											<div class="popup_title_reg_block_item">
												<div class="popup_title_reg_block_item_box">
													<input type="text" name="email1" class="popup_item_input" required>
													<div class="item_label">Email</div>
												</div>
											</div>

											<div class="popup_title_reg_block_item">
												<div class="popup_title_reg_block_item_box">
													<input type="password" name="pass1" class="popup_item_input" required>
													<div class="item_label">Пароль</div>
												</div>
											</div>



										</div>
										<div class="popup_title_button">
											<button>Войти</button>
										</div>
									</div>

									<div class="popup_title_info">
										<div class="info">Все поля обязательны для заполнения</div>
									</div>





								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="footer">
				<div class="header_line"></div>
				<div class="footer_row">
					<div class="footer_row_item"><a href="mailto:masy1997@gmail.com"><img src="/img/email.png" alt=""></a></div>
					<div class="footer_row_item"><a href="https://vk.com/masy1997unium"><img src="/img/vk.png" alt=""></a></div>
					<div class="footer_row_item"><a href="https://t.me/masy321"><img src="/img/telegram.png" alt=""></a></div>
					<div class="footer_row_item"><a href="https://discord.gg/hnrX6a6Y"><img src="/img/discord.png" alt=""></a></div>

				</div>
			</div>

		</div>
	</div>

	
	<script src="/js/script.js"></script>
	<script src="/js/show-more.js"></script>
</body>


</html>