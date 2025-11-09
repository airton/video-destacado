# Vídeo Destacado #

[👋 Donate](https://www.mercadopago.com.br/checkout/v1/redirect?pref_id=93975544-d3277b00-b729-47a7-bfa0-9a19d4e5afec)

Link for page the wordpress plugin
[http://wordpress.org/plugins/video-destacado/](http://wordpress.org/plugins/video-destacado/)

# Description #

Vídeo Destacado lets you feature a YouTube video on your posts, pages, or any public custom post type.
Simply enter the YouTube video ID in the dedicated meta box, preview the thumbnail, and set custom width and height.

Features:
* Enable on selected post types via Settings
* Thumbnail preview and real-time feedback in the editor
* Customizable player dimensions
* Secure nonce validation and input sanitization
* Properly enqueues admin scripts and styles

# Installation #

1. Visit **Plugins > Add New**.
2. Search for **Video Destacado**.
3. Install and activate the Video Destacado plugin.

= Manual installation =

1. Upload the entire `video-destacado` folder to the `/wp-content/plugins/` directory.
2. Visit **Plugins**.
3. Activate the Video Destacado plugin.

= After activation =

1. Visit the new **Settings > Video Destacado** menu.
2. Enable the individual modules you would like to use.

## How to use ##

**Insert in your template page**
 
```
<?php video_destacado(); ?>
```

**Ex:**

```
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
```
## 1.7.2 ##
* Revamped Description section in readme.txt for clarity
* Normalized readme.txt to WordPress plugin readme standard
* Removed duplicate Changelog section

## 1.7.1 ##
* Limited tags to 5 to comply with WordPress.org guidelines
* Fixed “Tested up to” field to use a valid WordPress version

## 1.7.0 ##
* Added direct-access guard (`ABSPATH`) and switched includes to `plugin_dir_path()`
* Refactored meta-box nonce, sanitization and `save_post` logic
* Changed Add/Remove controls to real submit buttons so the post form saves the meta
* Thumbnail preview now injected above the ID list, uses HTTPS and proper escaping
* Enqueued admin JS/CSS via `admin_enqueue_scripts` (replacing deprecated hooks)
* Rebuilt settings page with the Settings API and dropped legacy activation toggle
* Add Settings link in Plugins page action links
* Enable post & page by default on activation

## 1.6.0 ##
Cosmetic changes

## 1.0 ##
Add page settings

Settings > Vídeo Destacado

## 0.2 ##

Add <code>width</code> and <code>height</code> of the player

## 0.1 ##
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

- [Github Issue](https://github.com/airton/video-destacado/issues)
