<?php namespace ProcessWire;
// _main.php template file, called after a page’s template file	
$home = pages()->get('/'); // homepage
$siteTitle = 'Regular';	
$siteTagline = $home->summary; 
?><!DOCTYPE html>
<html lang="en">
<head id='html-head'>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title id='html-title'><?=page()->title?></title>
	<meta name="description" content="<?=page()->summary?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.30/css/uikit.min.css" />
	<link rel="stylesheet" href="<?=urls()->templates?>styles/main.css">
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.30/js/uikit.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.30/js/uikit-icons.min.js"></script>
	<?php if(page()->comments): ?> 
	<script src='<?=urls()->FieldtypeComments?>comments.min.js'></script>
	<link rel="stylesheet" href="<?=urls()->FieldtypeComments?>comments.css">
	<?php endif; ?> 
</head>
<body id='html-body'>

	<!-- MASTHEAD -->
	<header class='uk-background-muted'>
		<div id='masthead' class="uk-container">
			<h2 id='masthead-logo' class='uk-text-center uk-margin-medium-top uk-margin-small-bottom'>
				<a href='<?=urls()->root?>'>
					<img src='<?=urls()->templates?>styles/images/coffee4.svg' alt='coffee'><br />
				</a>	
				<?=$siteTitle?>
			</h2>
			<p id='masthead-tagline' class='uk-text-center uk-text-small uk-text-muted uk-margin-remove'>
				<?=$siteTagline?>
			</p>
			<nav id='masthead-navbar' class="uk-navbar-container" uk-navbar>
				<div class="uk-navbar-center uk-visible@m">
					<?=ukNavbarNav($home->and($home->children), [ 
						'dropdown' => [ 'basic-page', 'categories' ]
					])?>
				</div>
			</nav>
		</div>
	</header>	

	<!-- MAIN CONTENT -->
	<main id='main' class='uk-container uk-margin uk-margin-large-bottom'>
		<?php if(page()->parent->id > $home->id) echo ukBreadcrumb(page(), [ 'class' => 'uk-visible@m' ]); ?>
		<div class='uk-grid-large' uk-grid>
			<div id='content' class='uk-width-expand'>
				<h1 id='content-head' class='uk-margin-small-top'>
					<?=page()->get('headline|title')?>
				</h1>
				<div id='content-body'>
					<?=page()->body?>
				</div>
			</div>
			<aside id='sidebar' class='uk-width-1-3@m'>
				<?=page()->sidebar?>
			</aside>
		</div>
	</main>

	<?php if(config()->debug && user()->isSuperuser()): // display region debugging info ?>
	<section id='debug' class='uk-section uk-section-muted'>	
		<div class='uk-container'>
			<!--PW-REGION-DEBUG-->
		</div>	
	</section>	
	<?php endif; ?>

	<!-- FOOTER -->
	<footer class='uk-section uk-section-secondary'>
		<div id='footer' class='uk-container'>
			<div uk-grid>
				<div class='uk-width-1-3@m uk-flex-last@m uk-text-center'>
					<form class='uk-search uk-search-default' action='<?=pages()->get('template=search')->url?>' method='get'>
						<button type='submit' class='uk-search-toggle uk-search-icon-flip' uk-search-icon></button>
						<input type='search' id='search-query' name='q' class='uk-search-input' placeholder='Search&hellip;'>
					</form>
				</div>	
				<div class='uk-width-2-3@m uk-flex-first@m uk-text-center uk-text-left@m'>
					<h3 class='uk-margin-remove'>
						<?=$siteTitle?>
						<small class='uk-text-small uk-text-muted'><?=$siteTagline?></small>
					</h3>
					<p class='uk-margin-remove'>
						<small class='uk-text-small uk-text-muted'>&copy; <?=date('Y')?> &bull;</small>
						<a href='https://processwire.com'>Powered by ProcessWire CMS</a>
					</p>
				</div>	
			</div>	
		</div>
	</footer>
	
	<!-- OFFCANVAS NAV TOGGLE -->
	<a id='offcanvas-toggle' class='uk-hidden@m' href="#offcanvas-nav" uk-toggle>
		<?=ukIcon('menu', 1.3)?>
	</a>

	<!-- OFFCANVAS NAVIGATION -->
	<div id="offcanvas-nav" uk-offcanvas>
		<div class="uk-offcanvas-bar">
			<?=ukNav($home->and($home->children), [ 'header' => $siteTitle, 'divider' => true ])?>
		</div>
	</div>

	<?php if(page()->editable): ?>
	<!-- PAGE EDIT LINK -->
	<a id='edit-page' href='<?=page()->editUrl?>'>
		<?=ukIcon('pencil')?> Edit
	</a>
	<?php endif; ?>

</body>
</html>

