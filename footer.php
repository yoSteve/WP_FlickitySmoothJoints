					<footer class="footer" role="contentinfo">
						<div id="inner-footer" class="row">
							<div class="large-12 medium-12 columns">
								<nav role="navigation">
		    						<?php joints_footer_links(); ?>
		    					</nav>
		    				</div>
							<div class="large-12 medium-12 columns">
								<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</p>
							</div>
						</div> <!-- end #inner-footer -->
					</footer> <!-- end .footer -->

					<div class="reveal" id="ghostModal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
						<img src="#" />
						<button class="close-button" data-close aria-label="Close modal" type="button">
			                <span aria-hidden="true">&times;</span>
			            </button>
					</div>

				</div>  <!-- end .main-content -->
				</div> <!-- end #smoothBody -->
			</div> <!-- end .off-canvas-wrapper-inner -->
		</div> <!-- end .off-canvas-wrapper -->
	</div> <!-- end #defactoBody -->
	</div> <!-- end #smoothBody -->
		<?php wp_footer(); ?>
	</body>
</html> <!-- end page -->
