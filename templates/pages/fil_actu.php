			<main class="content">
				<div class="container-fluid p-0">
					<h1 class="h3 mb-3 text-center">Bienvenue sur votre fil d'actualité <?= $_SESSION['pseudo'] ?></h1>

					<form action="" method="POST" class='form-group container' id="addSourceForm">

						<label for="addSource">Ajouter une source</label>
						<div class="d-flex">
							<input type="text" name="addSource" id="addSource" class="form-control" placeholder="https://www.exemple_source.com/rss/">
							<input type="submit" class="btn btn-primary" value="+">
						</div>
					</form>
				<?php if(isset($params['addSuccess']) && $params['addSuccess'] === "ok"):?>
					<div class="messageBox alert alert-success mx-auto" role="alert">
						La nouvelle source a bien été ajoutée
					</div>
					<?php endif?>
				</div>

				<?php if (isset($_SESSION)) {
					var_dump($_SESSION);
				};
				if (isset($_POST)) {
					var_dump($_POST);
				};
				if (isset($params)) {
					var_dump($params);
				};


				?>
			</main>