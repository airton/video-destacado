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


Frequently Asked Questions
==========================

Como exibir no post o vídeo?
----------------------------

Inserir o seguinte códgigo dentro do loop:
<code><?php video_destacado(); ?></code>


É possível seugerir modificações e idéias para este plugin?
===========================================================

Claro que pode, para isso acesse o link htttp://www.vancindesign.com.br/contato.php


Upgrade Notice
==============

0.1
---
Exibi o vídeo destacado no post ou página.



Changelog
---------

0.1
===

Exibi o vídeo destacado no post ou página.




License
=======

GNU General Public License for more details.
<http://www.gnu.org/licenses/>.

Support
=======

* Visit <http://www.vancindesign.com.br/contatos.php>
* Visit <https://github.com/airton/video-destacado>