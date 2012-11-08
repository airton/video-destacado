Vídeo Destacado
===============

* Contributors: airtonvancin
* Donate link: http://www.vancindesign.com.br/contato.php
* Tags: video, destacado, destaque, post, page, post type, youtube, adicionar, add, vídeo post
* Requires at least: 3.0
* Tested up to: a 3.0
* Stable tag: trunk
* License: GPLv2 or later
* Inserir um vídeo destacado do Youtube, para posts, páginas e custom post types



Description
===========

Inserir um vídeo destacado do Youtube, para posts, páginas e custom post types



Installation
===========


Version 0.1
-----------
* 1. Descompacte o arquivo para este arquivo para o 'wp-content/plugins /' diretório dentro do WordPress
* 2. Manter a estrutura de diretório do arquivo, todos os arquivos extraídos deve existir em 'wp-content/plugins/video-destacado/'


Inserir o seguinte código dentro do loop
----------------------------------------

<code><?php video_destacado(); ?></code>

Ex: 
---
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

1. Como sera exibido no admin o vídeo destacado



== Frequently Asked Questions ==

= Como exibir no post o vídeo? =
Inserir o seguinte códgigo dentro do loop:
<code><?php video_destacado(); ?></code>

= É possível seugerir modificações e idéias para este plugin? =

Claro que pode, para isso acesse o link [Vídeo Destacado](htttp://www.vancindesign.com.br/contato)




== Upgrade Notice ==

= 0.1 =
Exibi o vídeo destacado no post ou página.



== Changelog ==

= 0.1 =
Exibi o vídeo destacado no post ou página.




== License ==

Vídeo Destacado is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published
by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
Nome do teu Plugin is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
You should have received a copy of the GNU General Public License along with Nome do teu Plugin. If not, see <http://www.gnu.org/licenses/>.

== Support ==

* Visit [Site](http://www.vancindesign.com.br/contatos.php)
* Visit [Github](https://github.com/airton/video-destacado)