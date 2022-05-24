<section class="section">
	<div class="container">
		<h1>Connexion</h1>

		<form class="form" method="post">

			<?php if ($error): ?>
				<div class="error">
					<?=$error?>
				</div>
			<?php endif; ?>

			<input class="input" type="text" name="username" placeholder="Nom d'utilisateur..."/>
			<input class="input" type="password" name="password" placeholder="*******" />
			<input class="button" type="submit" value="Connexion" />
		</form>
		<p>Pas encore inscrit ? <a href="<?=BASE?>/register">Créez votre compte</a></p>
	</div>
</section>