<?php

// Creating the widget 
class wpb_widget extends WP_Widget {
  
function __construct() {
parent::__construct(
  
// Base ID of your widget
'wpb_widget', 
  
// Widget name will appear in UI
__('Company Bio', 'wpb_widget_domain'), 
  
// Widget description
array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'wpb_widget_domain' ), ) 
);
}
  
// Creating widget front-end
  
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
$bio = apply_filters( 'widget_bio', $instance['bio'] );
  
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
  
// This is where you run the code and display the output
if ( ! empty( $bio ) )
echo "<p>" . $bio ."</p>";
echo $args['after_widget'];
}
          
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'Company Name', 'wpb_widget_domain' );
}


if ( isset( $instance[ 'bio' ] ) ) {
    $bio = $instance[ 'bio' ];
    }
    else {
    $bio = __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'wpb_widget_domain' );
    }
// Widget admin form
?>
<p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
        name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    <br>

    <label for="<?php echo $this->get_field_id( 'bio' ); ?>"><?php _e( 'Bio:' ); ?></label>
    <textarea  class="widefat" id="<?php echo $this->get_field_id( 'bio' ); ?>"
        name="<?php echo $this->get_field_name( 'bio' ); ?>" type="textarea"><?php echo $bio; ?></textarea>

</p>
<?php 
}
      
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['bio'] = ( ! empty( $new_instance['bio'] ) ) ? $new_instance['bio']  : '';
return $instance;
}
 
// Class wpb_widget ends here
} 
 