<?php
\the_tags();
\wp_link_pages();
if( \is_singular() || \is_page() ) {
    \comments_template();
}
