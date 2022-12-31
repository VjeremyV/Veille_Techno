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
					<?php

					use VeilleTechno\classes\rss\Rss;

					if (isset($params['addSuccess']) && $params['addSuccess'] === "ok") : ?>
						<div class="messageBox alert alert-success mx-auto" role="alert">
							La nouvelle source a bien été ajoutée
						</div>
					<?php elseif (isset($params['addSuccess']) && $params['addSuccess'] === "non") : ?>
						<div class="messageBox alert alert-danger mx-auto" role="alert">
							L'Url n'est pas renseignée dans le bon format ou n'est pas valide
						</div>
					<?php endif ?>
				</div>



				<div class="container">

					<div class="row">
						<?php
						$rss = new Rss;
						$items = $rss->display_rss($_SESSION['id']);
						foreach ($items as $name => $elements) :
							foreach ($elements as $flux => $content) :
						?>
						<form action="" id='<?=$name?>-form' class='settings-form'>
							<h3><?=$name?></h3>
							<i class="fa fa-gear"></i>
						</form>
								<?php
								foreach ($content as $item) :
									$start_bal_img = strstr($item->description->__toString(), '<img');
									if ($start_bal_img) {
										$src = strstr($start_bal_img, "src");
										if ($src[4] === '"') {
											$src = explode('"', $src);
										} elseif ($src[4] === "'") {
											$src = $src = explode('"', $src);
										}
									}
									if (substr($src[1], 0, 1) === '/') {
										$src[1] = $flux . $src[1];
									}
								?>
									<div class="col-md-4">
										
										<a href="<?= $item->link->__toString()?>" class="card mb-4 box-shadow">
											<img class="card-img-top" src="<?= $src[1] ?>">
											<div class="card-body">
												<h4><?= $item->title->__toString() ?></h4>
												<p class="card-text"><?= substr(strip_tags($item->description->__toString()), 0, 150) ?>(...)</p>
												<div class="d-flex justify-content-between align-items-center">
													<div class="btn-group">
														<button type="button" class="btn btn-sm btn-outline-secondary">View</button>
														<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
													</div>
													<small class="text-muted">9 mins</small>
												</div>
											</div>
										</a>
									</div>

						<?php
								endforeach;
							endforeach;
						endforeach;
						?>
			</main>