<div class="container searchbar-container">
	<div class="row">
			<div class="searchbar">
				<div class="search-outer">
							<a class="mk-search-trigger mk-fullscreen-trigger" href="#" id="search-button-listener">
								<div id="search-button" class="search-btn-style">
									<span class="search-text">Βρες την υπηρεσία που χρειάζεσαι... </span>
									<div class="icon-search">
										<div class="fa-outer">
											<i class="fa fa-search"></i>
										</div>
									</div>
								</div>
							</a>
						<div class="mk-fullscreen-search-overlay" id="mk-search-overlay">
							<a href="#" class="mk-fullscreen-close" id="mk-fullscreen-close-button"><i class="fa fa-times"></i></a>
								<div id="mk-fullscreen-search-wrapper">
									<form method="get" id="mk-fullscreen-searchform" action="">
										<input id="mk-fullscreen-search-input" type="text" name="inputsearch" value="" placeholder="Γράψε την εργασία που χρειάζεσαι..." onclick="search()" autocomplete="off">
										<i class="fa fa-search fullscreen-search-icon"></i>
									</form>
								</div>
								<div id="search-results"></div>
						</div>
				</div>
			</div>
	</div>
</div>