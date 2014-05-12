# [Vídeo Destacado](#video-destacado) #

[![](https://p.simg.uol.com.br/out/pagseguro/i/botoes/doacoes/209x48-doar-assina.gif)](https://pagseguro.uol.com.br/checkout/v2/donation.html?currency=BRL&receiverEmail=chapolinsk@hotmail.com)

Link for page the wordpress plugin
[http://wordpress.org/plugins/video-destacado/](http://wordpress.org/plugins/video-destacado/)

# Description #

Insert a video posted to Youtube for posts, pages and custom post types.

# Installation #

1. Unzip the file to the plugins folder of the 'wp-content/plugins/' directory inside of WordPress
2. Keep the directory structure of the file, all extracted files should exist in 'wp-content/plugins/video-destacado/'

## How to use ##

**Inserir o seguinte código dentro do loop**
 
<code><?php video_destacado(); ?></code>

**Ex:**

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


## Version 1.0 ##
Add page settings

Settings > Vídeo Destacado

## Version 0.2 ##

Add <code>width</code> and <code>height</code> of the player

## Version 0.1 ##
Highlighted in the video display post, page and custom post types.


**Screenshots**

Settings page
![](http://ps.w.org/video-destacado/assets/screenshot-2.png)

As will be shown in the video featured admin
![](http://ps.w.org/video-destacado/assets/screenshot-1.png)


**License**

Vídeo Destacado is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published
by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
Nome do teu Plugin is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
You should have received a copy of the GNU General Public License along with Nome do teu Plugin. If not, see <http://www.gnu.org/licenses/>.

**Support**

- [@airtonvancin](https://twitter.com/airtonvancin)
- [Vancin Design](http://www.vancindesign.com.br/)
