OpenLayers Zoom (plugin for Omeka)
==================================

This plugin for the [Omeka] platform adds a zoom widget that creates zoom-able
tiles from images and presents it in a pure javascript zoom viewer (no Flash).

Tiles are automatically created when the selected image is saved.

This plugin is compatible with [IIPImage] realtime tiles server, which avoids
creation and storage of tiles.

This plugin uses the [OpenLayers] widget to display images and the base of the
code was built for [OldsMapOnline].

Tiles that are created follow the [Zoomify] standard.

Visit the [OpenLayers Zoom demo] for more info.


Installation
------------

[ImageMagick] or [GD] should be installed on the server and enabled in php.

Unzip [OpenLayers Zoom] into the plugin directory, rename the folder
"OpenLayersZoom" if needed, then install it from the settings panel.

The viewer is displayed via three mechanisms, plus the old one. So, according to
your needs, you may use the default hook or add the code below in the
`items/show.php` file of your theme or anywhere else.

* Default hook `public_items_show`
    - This hook is set by default, but an option allows to remove it.

* Helper
    - This can be used anywhere in the theme. The record can be an item or a
    file.

```
    <?php echo $this->openLayersZoom()->zoom($record); ?>
```

* Shortcode
    - Currently, only one shortcode can be added by page.
    - In a field that can be shortcoded: `[zoom]` (default is the current item
    or file).
    - Default in theme: `<?php echo $this->shortcodes('[zoom]'); ?>`
    - With all options:

```
    <?php echo $this->shortcodes('[zoom record_id=1 record_type=item]'); ?>
```

* Old hook `open_layers_zoom_display_file`
    - This hook will be removed in the next release. In the `items/show.php` of
    your theme, add:

```
    <div class="openlayerszoom-images">
        <?php
        foreach ($item->Files as $file):
            fire_plugin_hook('open_layers_zoom_display_file', array('file' => $file));
        endforeach; ?>
    </div>
```

Note that the id attribute `item-images` of the div wrapper of the previous
releases has been replaced by the class `openlayerszoom-images` to simplify
the loading of multiple zoomed files. This class is needed for the javascript
and is automatically added.

Finally, copy `views/shared/css/OpenLayersZoom.css` in your theme if you want to
modify the size/appearance of the zoom viewer.

Note: Some issues may appear on some browsers when multiple OpenLayersZoom are
displayed on the same page.


Use
---

Edit an item with an image attached to it. On the left is a zoom tab. Check the
box next to the image thumbnail and save changes. The image will now be
presented as a zoomed image in the public item page.

Currently, tiling is made without job process, so you may have to increase the
max allowed time (and the memory limit) for process in `php.ini`.

For huge images, it's recommanded to create tiles offline via a specialized
photo software, eventually with a [Zoomify] plugin, or to use a script that
calls the `ZoomifyFileProcessor.php` library, else to use [IIPImage].

To use [IIPImage], the element `Tile Server URL` should be created in the
`Item Type Metadata` set, and this field should be filled in the item form with
the query url to the image.


Warning
-------

Use it at your own risk.

It's always recommended to backup your files and database regularly so you can
roll back if needed.


Troubleshooting
---------------

See online issues on the [plugin issues] page on GitHub.


License
-------

This plugin is published under [GNU/GPL].

This program is free software; you can redistribute it and/or modify it under
the terms of the GNU General Public License as published by the Free Software
Foundation; either version 3 of the License, or (at your option) any later
version.

This program is distributed in the hope that it will be useful, but WITHOUT
ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
details.

You should have received a copy of the GNU General Public License along with
this program; if not, write to the Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.


* This plugin contains libraries with other free and open source licences. See
files inside `helpers` folder.


Contact
-------

Current maintainers:

* Daniel Berthereau (see [Daniel-KM])
* [Peter Binkley] for [University of Alberta Libraries]
* [Matt Miller]

First version of this plugin has been built by [Matt Miller].
Thanks to Nancy Moussa @ U of Michigan for bug fixes and individual unzoom feature.
It has been improved by [Peter Binkley] for [University of Alberta Libraries].
The upgrade for Omeka 2.0 has been built for [Mines ParisTech].


Copyright
---------

* @copyright Daniel Berthereau, 2013-2015
* @copyright Peter Binkley, 2012-2013
* @copyright Matt Miller, 2012

See copyrights for libraries in files inside `helpers` folder.


[Omeka]: https://omeka.org
[IIPImage]: http://iipimage.sourceforge.net
[OpenLayers]: http://www.openlayers.org
[OldsMapOnline]: http://www.oldmapsonline.org
[Zoomify]: http://www.zoomify.com
[OpenLayers Zoom demo]: http://thisismattmiller.com/zoom
[OpenLayers Zoom]: https://github.com/thisismattmiller/OpenLayers-Omeka-Zoom-Plugin
[ImageMagick]: http://www.imagemagick.org
[GD]: http://www.ligbd.org
[plugin issues]: https://github.com/thisismattmiller/OpenLayers-Omeka-Zoom-Plugin/issues
[GNU/GPL]: https://www.gnu.org/licenses/gpl-3.0.html
[Daniel-KM]: https://github.com/Daniel-KM "Daniel Berthereau"
[Peter Binkley]: https://github.com/pbinkley
[University of Alberta Libraries]: https://github.com/ualbertalib
[Matt Miller]: https://github.com/thisismattmiller
[Mines ParisTech]: http://bib.mines-paristech.fr
