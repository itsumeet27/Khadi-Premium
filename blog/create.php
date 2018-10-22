
	<?php require_once 'includes/header.php'; 
	require_once 'classes/entry.php';

	if (isset($_POST['publishing'])) {

		$entry = new Entry();
		$entry->createNewFromPOST($_POST);

		$entry->SqlInsertEntry();
?>
	<a href="single.php?entry_id=<?php echo $entry->getId(); ?>">View Entry</a>
<?php
	}
	?>

				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2><a href="#">Magna sed adipiscing</a></h2>
										<p>Lorem ipsum dolor amet nullam consequat etiam feugiat</p>
									</div>
								</header>
								<div id="create_form">
									<form action="create.php" method="POST">

									<label for="">Title</label>
									<input type="text" name="entry_title" id="title" />

									<label for="">Author</label>
									<input type="text" name="entry_author" id="author" />

									<label for="">Excerpt</label>
									<textarea name="entry_excerpt" id="title" cols="30" rows="10"></textarea>

									<label for="">Content</label>
									<textarea name="entry_content" id="title" cols="30" rows="10"></textarea>

									<input type="hidden" name="publishing" />

									<input type="submit" name="submit" id="submit" value="Publish" />
									</form>
								</div>
								<footer>
									<ul class="stats">
										<li><a href="#">General</a></li>
										<li><a href="#" class="icon fa-heart">28</a></li>
										<li><a href="#" class="icon fa-comment">128</a></li>
									</ul>
								</footer>
							</article>

					</div>
					
	<?php require_once 'includes/footer.php'; ?>