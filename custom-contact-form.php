<?php
/**
 * Plugin Name: custom-contact-form
 * Description: Custom-ontact-form
 * Version: 1.0.0
 */
function custom_contact_form(){
    ?>
    <form action=""method="post">
        <label for="name">Name:</label>
        <input type="text" id="name"name="name"required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email"name="email"required>
        <label for="message">Message:</label>
        <textarea id="message" name="message"required></textarea><br><br>
        <input type="submit"name="submit"value="submit">
</form>
<?php
}
//save From Data to Database
function save_contact_form_data(){
    if(isset($_POST['submit'])){
        $name=sanitize_text_field($_POST['name']);
        $email=sanitize_email($_POST['email']);
        $message =sanitize_textarea_field($_POST['message']);
        global $wpdb;
        $table_name = $wpdb->prefic.'contact-form-data';
        $wpdb->insert($table_name,array('name'=>$name,'email'=>$email,'message'=>$message));

    }
}
add_shortcode('custom_contact_form','custom_contact_form');
add_action('init','save_contact_form_data');

 