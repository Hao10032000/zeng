<?php
/**
 * This class will be present a colorpicker control and typography control
 */
if ( class_exists( 'WP_Customize_Control' ) ) {

    class themesflat_Typography extends WP_Customize_Control {

        public $type = 'typography';
        public $fields = array(
            'family', 'size', 'style', 'subsets', 'color', 'line_height', 'letter_spacing'
        );
        private $fonts = false;
        private $titles, $titles_subsets;

        public function render() {
            $id    = 'themesflat-options-control-' . $this->id;
            $class = 'themesflat-options-control themesflat-options-control-' . $this->type;

            if ( $this->value() ) $this->class = 'active';
            if ( ! empty( $this->class ) ) $class .= " {$this->class}";
            if ( empty( $this->label ) ) $class .= ' no-label';
            ?>
            <li id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">
                <?php $this->render_content(); ?>
            </li>
            <?php
        }

        public function render_content() {
            $this->titles = array(
                '100' => esc_html__( 'Thin 100', 'zeng' ),
                '100italic' => esc_html__( 'Thin 100 italic', 'zeng' ),
                '200' => esc_html__( 'Extra-light 200', 'zeng' ),
                '200italic' => esc_html__( 'Extra-light 200 italic', 'zeng' ),
                '300' => esc_html__( 'Light 300', 'zeng' ),
                '300italic' => esc_html__( 'Light 300 italic', 'zeng' ),
                '400' => esc_html__( 'Normal 400', 'zeng' ),
                '400italic' => esc_html__( 'Normal 400 italic', 'zeng' ),
                'regular' => esc_html__( 'Normal 400', 'zeng' ),
                'italic' => esc_html__( 'Normal 400 italic', 'zeng' ),
                '500' => esc_html__( 'Medium 500', 'zeng' ),
                '500italic' => esc_html__( 'Medium 500 italic', 'zeng' ),
                '600' => esc_html__( 'Semi-bold 600', 'zeng' ),
                '600italic' => esc_html__( 'Semi-bold 600 italic', 'zeng' ),
                '700' => esc_html__( 'Bold 700', 'zeng' ),
                '700italic' => esc_html__( 'Bold 700 italic', 'zeng' ),
                '800' => esc_html__( 'Extra-bold 800', 'zeng' ),
                '800italic' => esc_html__( 'Extra-bold 800 italic', 'zeng' ),
                '900' => esc_html__( 'Ultra-bold 900', 'zeng' ),
                '900italic' => esc_html__( 'Ultra-bold 900 italic', 'zeng' )
            );

            $this->titles_subsets = array(
                "cyrillic-ext" => esc_html__( "Cyrillic Extended", 'zeng' ),
                "greek" => esc_html__( "Greek", 'zeng' ),
                "greek-ext" => esc_html__( "Greek Extended", 'zeng' ),
                "latin-ext" => esc_html__( "Latin Extended", 'zeng' ),
                "cyrillic" => esc_html__( "Cyrillic", 'zeng' ),
                "vietnamese" => esc_html__( "Vietnamese", 'zeng' ),
                "latin" => esc_html__( "Latin", 'zeng' )
            );

            $name = '_themesflat-options-control-typography-' . $this->id;
            $values = $this->value();
            $fonts_json = $this->get_fonts();
            if ( ! is_array( $values ) ) {
                $decoded_value = json_decode( str_replace( '&quot;', '"', $values ), true );
                $values = is_array( $decoded_value ) ? $decoded_value : array();
            }
            $index = '';
            ?>

            <div class="themesflat-options-control-inputs">
                <?php if ( in_array( 'family', $this->fields ) ): ?>
                    <div class="themesflat-options-control-chosen themesflat-typography-group typography-font">
                        <div class="themesflat-options-control-title customize-control-title">
                            <label for="<?php echo esc_attr( $name ) ?>-family"><?php esc_html_e( 'Font Family', 'zeng' ) ?></label>
                        </div>
                        <div class="themesflat-options-control-inputs">
                            <select name="<?php echo esc_attr( $name ) ?>[family]" id="<?php echo esc_attr( $name ) ?>-family" class="select-choosen">
                                <optgroup label="<?php echo esc_html( 'Google Fonts', 'zeng' ) ?>">
                                    <?php foreach ( $fonts_json as $font_key => $font ): ?>
                                        <?php if ( strcmp( $font['family'], $values['family'] ?? '' ) === 0 ) $index = $font_key; ?>
                                        <option value="<?php echo esc_attr( $font['family'] ) ?>" 
                                                data_variants='<?php echo json_encode( $font['variants'] ); ?>' 
                                                data_subsets='<?php echo json_encode( $font['subsets'] ); ?>'
                                                <?php selected( $font['family'], $values['family'] ?? '' ); ?>>
                                            <?php echo esc_html( $font['family'] ); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Các control khác (style, subsets, size, line_height, letter_spacing, color) giữ nguyên tương tự -->
                <?php
                // Bạn có thể copy nguyên phần code cũ từ đây xuống,
                // chỉ cần giữ $fonts_json đã load bằng file_get_contents()
                ?>
            </div>

            <?php
        }

        /**
         * Get fonts from JSON
         */
        public function get_fonts() {
            $json_file = THEMESFLAT_DIR . '/fonts/google-fonts.json';
            $fonts_array = array();

            if ( is_readable( $json_file ) ) {
                $json_content = file_get_contents( $json_file );
                $google_fonts_array = json_decode( $json_content, true );

                if ( is_array( $google_fonts_array ) ) {
                    foreach ( $google_fonts_array as $group ) {
                        if ( is_array( $group ) ) {
                            foreach ( $group as $font ) {
                                $font_key = str_replace( ' ', '-', strtolower( $font['family'] ) );
                                $fonts_array[ $font_key ] = array(
                                    'family' => $font['family'],
                                    'variants' => $font['variants'],
                                    'subsets' => $font['subsets']
                                );
                            }
                        }
                    }
                }
            } else {
                error_log( __( 'Google fonts JSON file not found.', 'zeng' ) );
            }

            return $fonts_array;
        }

        /**
         * Render PHP file contents (optional)
         */
        public function get_contents( $file ) {
            if ( is_readable( $file ) ) {
                ob_start();
                include $file;
                $content = ob_get_clean();
                return $content;
            }
            return '';
        }

    }
}
