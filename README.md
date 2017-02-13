# Youtube
Package for generate IFrame with youtube-link

# Install
```
composer require "fomvasss/youtube"
```
register the service provider and aliases in config/app.php:
```
  Fomvasss\Youtube\YoutubeServiceProvider::class,
```
Then publish assets with 
```
php artisan vendor:publish --provider="Fomvasss\Youtube\YoutubeServiceProvider" --tag="config"
```
This will add the file config/youtube.php

# Config  

Edit file `config/youtube.php`, set:
- 'rel' => 0,           #show like videos after finish
- 'autoplay' => 0,      #autoplay video after open page
- 'controls' => 1,      #show control button in player
- 'showinfo' => 1,      #show info about video (title, time)
- 'width' => 640,       #width video
- 'height' => 360,      #height video
- 'frameborder' => 0,   #border on player

# Using

##Using facades `Youtube`
```
use Fomvasss\Youtube\Facades\Youtube;
```
Now example, you can use next: 
```
Youtube::iFrame('https://www.youtube.com/watch?v=Dxk47dya8_k'); //returt String iframe
```
You get next iframe:
```
<iframe width="640" height="360" src="http://www.youtube.com/embed/Dxk47dya8_k?rel=0&amp;autoplay=0&amp;controls=1&amp;showinfo=1" frameborder="0"></iframe>
```

You can set more parameters in array:
```
$link = 'https://www.youtube.com/watch?v=Dxk47dya8_k';
```
```
Youtube::iFrame($link, ['rel'=> 0, 'autoplay'=>1, 'controls'=>1, 'showinfo'=>1, 'width'=>720, 'height'=>460, 'frameborder'=>0])
```
If are you not set some parameters, it well have default values (with config youtube.php):

##Using blade directive in template`@youtube()`
```
@youtube("https://www.youtube.com/watch?v=Dxk47dya8_k")
```
```
@youtube('<iframe width="640" height="360" src="https://www.youtube.com/embed/Dxk47dya8_k?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>')
```
```
@youtube("Dxk47dya8_k")
```
Also you can set more parameters in array:
```
@youtube('https://www.youtube.com/watch?v=Dxk47dya8_k', ['width'=>720, 'height'=>460,])
```
##Using helper-function `youtube_iframe()`
youtube_iframe('https://www.youtube.com/watch?v=Dxk47dya8_k');

##Other method and API are back here:
- https://developers.google.com/youtube/player_parameters?hl=ru
- http://yournet.kz/blog/php/vstavka-video-iz-youtube-po-ssylke-php