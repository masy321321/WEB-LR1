<?php
require_once 'config/connect.php';
$imgs = mysqli_query($connect, "SELECT * FROM `imgs`");
$imgs = mysqli_fetch_all($imgs);

?>
<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;400;500;600&display=swap" rel="stylesheet">

	<title>ПОМОГИТЕ!</title>

	<script type="text/javascript">
		if (window.FileReader) {

			var reader = new FileReader(),
				rFilter = /^(image\/jpeg|image\/png)$/i;

			reader.onload = function(oFREvent) {
				preview = document.getElementById("preview")
				preview.src = oFREvent.target.result;
				preview.style.display = "block";
				add_foto_content.style.display = "none";
				preview.style.width = "100%";
				add_foto_place.style.border="4px solid rgba(60, 185, 255, 0.98)";
			};

			function doTest() {

				if (document.getElementById("file").files.length === 0) {
					return;
				}
				var file = document.getElementById("file").files[0];
				if (!rFilter.test(file.type)) {
					alert("You must select a valid image file!");
					return;
				}
				reader.readAsDataURL(file);
			}

		} else {
			alert("FileReader object not found :( \nTry using Chrome, Firefox or WebKit");
		}
	</script>
</head>

<body>
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
							<div class="main_date">Добавление скриншота</div>
							<div class="main_button" onclick="document.location='/index.php'">
								<div class="main_button_row">
									<div class="main_button_row_png"></div>
									<div class="main_button_row_text">Назад
									</div>
								</div>
							</div>

						</div>
					</div>


					<div class="main_grid_add">
						<div class="add_foto">
						<form action="/vendor/create.php" method="post" enctype="multipart/form-data">
						
							<div class="add_foto_place" id="add_foto_place">
								<img src="" width="100" style="display:none" id="preview">

								<div class="add_foto_content" id="add_foto_content">
									<input type="file" class="a_f_i_f" name="file" id="file" onchange="doTest()">

									<div class="add_f_img">
										<img src="/img/+.png" alt="">
									</div>
									<div class="add_f_text">Загрузите фотографию</div>
									<div class="add_f_dop">(допустимый формат - jpg, максимальный размер - 3 Мб)</div>
								</div>

							</div>
						</div>

						<div class="add_text">

							<div class="add_text_content">
								<input name="add_name" type="text" placeholder="Введите название">
								<div class="area">
									<textarea name="add_about" id="" placeholder="Добавьте описание"></textarea>
								</div>

							</div>

						</div>
						<div class="add_nothing"></div>
						<div class="add_btn">
							<button class="submit" type="submit" name="submit" id="submit">Опубликовать</button>
						</div>
						</form>
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

</body>

</html>