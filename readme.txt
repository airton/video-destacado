=== Vídeo Destacado ===
Contributors: airtonvancin
Donate link: http://www.vancindesign.com.br/
Tags: video, destacado, destaque, post, page, post type, youtube, adicionar, add, vídeo post
Requires at least: 3.0
Tested up to: a 3.9
Stable tag: 1.0
License: GPLv2 or later
Insert a video posted to Youtube for posts, pages and custom post types


== Description ==

Insert a video posted to Youtube for posts, pages and custom post types



== Installation ==

1. Unzip the file to the plugins folder of the 'wp-content/plugins/' directory inside of WordPress
2. Keep the directory structure of the file, all extracted files should exist in 'wp-content/plugins/video-destacado/'

= 1.0 =
add page settings

Settings > Vídeo Destacado

= Version 0.2 =
Add width and height of the player

= Version 0.1 =
Highlighted in the video display post, page and custom post types.

= Enter the following code inside the loop =
<code><?php video_destacado(); ?></code>

= Ex: =
<code>
<?php

// The Query
query_posts( $args );

// The Loop
while ( have_posts() ) : the_post();

	video_destacado();

endwhile;

// Reset Query
wp_reset_query();

?>
</code>


== Screenshots ==

1. As will be shown in the video featured admin
2. Settings page



== Frequently Asked Questions ==

= How to display the video in the post? =

Inserir o seguinte código dentro do loop
<code><?php video_destacado(); ?></code>

= You can seugerir modifications and ideas for this plugin? =

Sure you can, go to this link [Featured Video] (http://www.vancindesign.com.br/contatos.php)



== Upgrade Notice ==

= 1.0 =
add page settings
Settings > Vídeo Destacado

= 0.2 =
Add width and height of the player

= 0.1 =
Highlighted in the video display post, page and custom post types.



== Changelog ==

= 1.0 =
add page settings
Settings > Vídeo Destacado

= 0.2 =
Add width and height of the player

= 0.1 =
Highlighted in the video display post, page and custom post types.




== License ==

Vídeo Destacado is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published
by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
Nome do teu Plugin is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
You should have received a copy of the GNU General Public License along with Nome do teu Plugin. If not, see <http://www.gnu.org/licenses/>.

== Support ==

* Vancin Design [Site](http://www.vancindesign.com.br/)
* Twitter [Site](https://twitter.com/airtonvancin)
* GitHub [Github](https://github.com/airton/video-destacado)
