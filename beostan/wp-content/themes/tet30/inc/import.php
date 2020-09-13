<?php 
// add_filter( 'pt-ocdi/importer_options', function($options) {
//   $options['fetch_attachments'] = false;
//   return $options;
// });
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );

function tet30_import_files() {
  $path = trailingslashit( get_template_directory() . '/sample/') ;
  return array(
    array(
      'import_file_name'           => 'Full Demo',
      'local_import_file'            => $path .'content.full.xml',
      'local_import_widget_file'     => $path .'widgets.wie',
      'local_import_redux'               => array(
        array(
          'file_path'    => $path .'plugin.json',
          'option_name' => 'c4d_plugin_manager',
        ),
        array(
          'file_path'    => $path .'theme.json',
          'option_name' => 'tet30',
        ),
      ),
      'import_preview_image_url'   => trailingslashit( get_template_directory_uri() ) .'screenshot.png',
      'import_notice'              => __( 'After you import this demo, you will have to setup the slider separately.', 'tet30' ),
      'preview_url'                => 'http://30tet.coffee4dev.com',
    )

    // array(
    //   'import_file_name'           => 'Pages Only',
    //   'local_import_file'            => $path .'content.pages.only.xml',
    //   'import_preview_image_url'   => trailingslashit( get_template_directory_uri() ) .'screenshot.png',
    //   'import_notice'              => __( 'After you import this demo, you will have to setup the slider separately.', 'tet30' ),
    // ),

    // array(
    //   'import_file_name'           => 'Widget Only',
    //   'local_import_file' => NULL,
    //   'local_import_widget_file'     => $path .'widgets.json',
    //   'import_preview_image_url'   => trailingslashit( get_template_directory_uri() ) .'screenshot.png',
    //   'import_notice'              => __( 'After you import this demo, you will have to setup the slider separately.', 'tet30' ),
    // ),

    // array(
    //   'import_file_name'           => 'Theme Options Only',
    //   'local_import_file' => NULL,
    //   'local_import_redux'               => array(
    //     array(
    //       'file_path'    => $path .'redux.json',
    //       'option_name' => 'tet30',
    //     ),
    //   ),
    //   'import_preview_image_url'   => trailingslashit( get_template_directory_uri() ) .'screenshot.png',
    //   'import_notice'              => __( 'After you import this demo, you will have to setup the slider separately.', 'tet30' ),
    // )
  );
}

add_filter( 'pt-ocdi/import_files', 'tet30_import_files' );

