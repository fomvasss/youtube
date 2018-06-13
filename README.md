# Youtube
[![Latest Version on Packagist](https://img.shields.io/packagist/v/fomvasss/youtube.svg?style=flat-square)](https://packagist.org/packages/fomvasss/youtube)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Total Downloads](https://img.shields.io/packagist/dt/fomvasss/youtube.svg?style=flat-square)](https://packagist.org/packages/fomvasss/youtube)

Package for generate IFrame with youtube-link

## Install
```bash
composer require "fomvasss/youtube"
```
**For Laravel < 5.5** register the service provider and aliases in config/app.php:
```php
  Fomvasss\Youtube\YoutubeServiceProvider::class,
```

Publish config:
```bash
php artisan vendor:publish --provider="Fomvasss\Youtube\YoutubeServiceProvider" --tag="config"
```

## Config  

Edit file `config/youtube.php`, set:
- 'rel' => 0,           #show like videos after finish
- 'autoplay' => 0,      #autoplay video after open page
- 'loop' => 0,          #if 1 - repeat video
- 'controls' => 1,      #show control button in player
- 'showinfo' => 1,      #show info about video (title, time)
- 'width' => 640,       #width video
- 'height' => 360,      #height video
- 'frameborder' => 0,   #border on player

- 'bootstrap-responsive-embed' => false,    #add bootstrap container with class "embed-responsive"
- 'bootstrap-ratio' => '16by9',             #set default ratio 1by1 | 4by3 | 16by9 | 21by9

## Using

### Using facades `Youtube`
```php
use Fomvasss\Youtube\Facades\Youtube;
```
Now example, you can use next: 
```php
Youtube::iFrame('https://www.youtube.com/watch?v=Dxk47dya8_k'); //returt String iframe
```
You get next iframe:
```html
<iframe width="640" height="360" src="http://www.youtube.com/embed/Dxk47dya8_k?rel=0&amp;autoplay=0&amp;controls=1&amp;showinfo=1" frameborder="0"></iframe>
```

You can set more parameters in array:
```php
$link = 'https://www.youtube.com/watch?v=Dxk47dya8_k';
Youtube::iFrame($link, ['rel'=> 0, 'autoplay'=>1, 'controls'=>1, 'showinfo'=>1, 'width'=>720, 'height'=>460, 'frameborder'=>0])
```

If are you not set some parameters, it well have default values (with config youtube.php):

### Using blade directive in template`@youtube()`
```php
@youtube("https://www.youtube.com/watch?v=Dxk47dya8_k")
@youtube('<iframe width="640" height="360" src="https://www.youtube.com/embed/Dxk47dya8_k?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>')
@youtube("Dxk47dya8_k")
```
Also you can set more parameters in array:
```php
@youtube('https://www.youtube.com/watch?v=Dxk47dya8_k', ['width'=>720, 'height'=>460,])
```

### Using Bootstrap responsive container
If in config/youtube.php sett `'bootstrap-responsive-embed' => true,` or array parameters is set `'bootstrap-responsive-embed' => true` then we give next:   
```html
<div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="..."></iframe>
</div>
```
Then the parameters `height` & `weight` are not using (ignoring)
You also can use `bootstrap-ratio` parameters. Available next value ratio: 1by1 | 4by3 | 16by9 | 21by9

### Using helper-function `youtube_iframe()`
```php
youtube_iframe('https://www.youtube.com/watch?v=Dxk47dya8_k');
```

## Other method and API are back here:
- https://developers.google.com/youtube/player_parameters?hl=ru
- http://yournet.kz/blog/php/vstavka-video-iz-youtube-po-ssylke-php