<section class="section">
	<div class="container">
		
		<h1>Créer un compte</h1>

		<form class="form" method="post">

			<?php if ($error = $errors['username'] ?? null): ?>
				<div class="error">
					<?=$error?>
				</div>
			<?php endif; ?>
			<input class="input" type="text" name="username" placeholder="Nom d'utilisateur..."/>

			<?php if ($error = $errors['password'] ?? null): ?>
				<div class="error">
					<?=$error?>
				</div>
			<?php endif; ?>
			<input class="input" type="password" name="password" placeholder="*******" />

			<?php if ($error = $errors['passwordConfirm'] ?? null): ?>
				<div class="error">
					<?=$error?>
				</div>
			<?php endif; ?>
			<input class="input" type="password" name="passwordConfirm" placeholder="*******" />

			<input class="button" type="submit" value="Créer mon compte" />

		</form>

	</div>
</section>