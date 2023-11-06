<div class="wrap">
	<h1 class="screen-reader-text"><?php esc_html_e( 'Patcher', 'porto' ); ?></h1>
</div>
<div class="wrap porto-wrap porto-patch-layout">
	<?php
		porto_get_template_part(
			'inc/admin/admin_pages/header',
			null,
			array(
				'active_item' => 'patcher',
				'title'       => esc_html__( 'Patcher', 'porto' ),
				'subtitle'    => esc_html__( 'With this, you can apply fixes to your site between Porto releases and update partially.', 'porto' ),
			)
		);
		?>
	<main style="display: block" id="main">
		<?php
		if ( false === $atts ) {
			?>
				<div class="porto-important-note note-error"><span><?php esc_html_e( 'The Porto patches server could not be reached.', 'porto' ); ?></span></div>
			<?php
		} else {
			$show_patches = ! empty( $atts ) && ( ! empty( $atts['update'] ) || ! empty( $atts['delete'] ) );
			if ( $show_patches ) {
				?>
			<table class="porto-table" id="patcher-table">
				<thead>
					<tr>
						<th><h4><?php esc_html_e( 'Patches Path', 'porto' ); ?></h4></th>
						<th><h4><?php esc_html_e( 'Patch Action', 'porto' ); ?></h4></th>
					</tr>
				</thead>
				<tbody id="patcher-tbody">
				<?php
				foreach ( $atts as $action => $patches ) {
					if ( 'update' == $action && ! empty( $patches ) ) {
						foreach ( $patches as $path => $value ) {
							?>
								<tr class="updated" data-path="update-<?php echo esc_attr( $path ); ?>">
								<td><p><?php echo esc_html( $path ); ?></p></td>
								<td><p class="update-notice"><?php esc_html_e( 'Should update', 'porto' ); ?></p></td>
								</tr>
							<?php
						}
					} elseif ( 'delete' == $action && ! empty( $patches ) ) {
						foreach ( $patches as $path => $target ) {
							?>
								<tr class="delete" data-path="delete-<?php echo esc_attr( $path ); ?>">
								<td><p><?php echo esc_html( $path ); ?></p></td>
								<td><p class="delete-notice"><?php esc_html_e( 'Should delete', 'porto' ); ?></p></td>
								</tr>
							<?php
						}
					}
				}
				?>
				</tbody>
			</table>
				<?php
			} elseif ( isset( $atts['theme_version'] ) && isset( $atts['func_version'] ) ) {
				?>
				<div class="porto-important-note"><span><?php printf( esc_html__( 'Your Theme version is %1$s and Functionality version is %2$s. Currently there are no patches available.', 'porto' ), esc_html( $atts['theme_version'] ), esc_html( $atts['func_version'] ) ); ?></span></div>
			<?php } ?>
		<div class="action-footer">
			<a href="<?php echo admin_url( 'admin.php?page=porto-patcher&action=refresh' ); ?>" class="btn btn-primary" id="patch-refresh"><?php esc_html_e( 'Refresh Patches', 'porto' ); ?></a>
			<?php if ( $show_patches ) : ?>
				<a href="#" class="btn btn-outline" id="patch-apply"><?php esc_html_e( 'Apply Patches', 'porto' ); ?></a>
			<?php endif; ?>
		</div>
		<?php } ?>
	</main>
</div>
