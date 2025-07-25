<?php
/**
 * This class will be present an social icons control
 */
if (class_exists('WP_Customize_Control')) {

	class themesflat_SocialIcons extends WP_Customize_Control {
		/**
		 * The control type
		 * 
		 * @var  string
		 */
		public $type = 'social-icons';
		public function render() {
			$id    = 'themesflat-options-control-' . $this->id;
			$class = 'themesflat-options-control themesflat-options-control-' . $this->type;

			if ( $this->value() )
				$this->class = 'active';

			if ( ! empty( $this->class ) )
				$class .= " {$this->class}";

			if ( empty( $this->label ) )
				$class .= ' no-label';

			?><li id="<?php  echo esc_attr( $id ); ?>" class="<?php  echo esc_attr( $class ) ?>">
				<?php $this->render_content(); ?>
			</li><?php
		}

		public function render_content() {
			$name = '_options-social-icons-' . $this->id;
			$icons = themesflat_available_social_icons();

			$value = $this->value();
			$order = $icons['__ordering__'];

			if ( ! is_array( $value ) ) {
				$decoded_value = json_decode(str_replace('&quot;', '"', $value), true );
				$value = is_array( $decoded_value ) ? $decoded_value : array();
			}

			if ( isset( $value['__ordering__'] ) && is_array( $value['__ordering__'] ) ) {
				$order = $value['__ordering__'];
			}

			?>
			<label class="customize-control-title"><?php echo esc_html( $this->label ); ?></label>
			<ul class="themesflat_icons">
				<li class="item-properties">
					<label>
						<span class="input-title"></span>
						<input type="text" class="input-field" />
					</label>
					<button type="button" class="button button-primary confirm"><?php esc_html_e('Add', 'zeng'); ?></button>
				</li>

				<?php foreach ( $order as $id ):
					$params = $icons[$id];
					$link = isset( $value[$id] ) ? sprintf( 'data-link="%s"', esc_attr( $value[$id] ) ) : '';
					?>
					<li class="item flat-<?php  echo esc_attr( $id ) ?>" data-id="<?php  echo esc_attr( $id ) ?>" <?php  echo esc_attr($link) ?> data-title="<?php  echo esc_attr( $params['title'] ) ?>">
						<i class="fab <?php  echo esc_attr( $params['iclass'] ) ?>"></i>
					</li>
				<?php endforeach ?>
			</ul>
			<input type="hidden" id="typography-value"  name="<?php  echo esc_attr($name);?>" <?php $this->link();?>  value="<?php  echo esc_attr( json_encode( $this->value() ) ) ?>" />
			<?php
		}
	}
}