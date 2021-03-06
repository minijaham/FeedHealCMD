<p align="center" style="display:flex;flex-direction: column;">
<img src="https://github.com/minijaham/FeedHealCMD/blob/master/img/Steak.png?raw=true">
</p>
<p align="center">
<a href="http://hits.dwyl.com/minijaham/FeedHealCMD"><img src="http://hits.dwyl.com/minijaham/FeedHealCMD.svg" style="margin:0 5px"></a>
<a href="https://github.com/minijaham/FeedHealCMD/blob/master/LICENSE"><img src="https://img.shields.io/github/license/minijaham/FeedHealCMD" style="margin:0 5px"></a>
<a href="https://poggit.pmmp.io/ci/minijaham/FeedHealCMD"><img src="https://img.shields.io/badge/-Download-blue" style="margin:0 5px"></a>
<a href="https://bit.ly/APEdiscord"><img src="https://img.shields.io/badge/Discord-AndromedaPE-brightgreen?logo=discord" style="margin:0 5px"></a>
</p>

## FeedHealCMD

### About

PocketMine-MP(PMMP) plugin that allows you to add /feed and /heal on your server!
Restore player's health value and starvation value, and set player's effect through UI!

### Commands

| Command | Description                   | Usage                   | Example                  | Permissions |
| ------- | ----------------------------- | ----------------------- | ------------------------ | ----------- |
| /feed    | Restore player's hunger value | /feed [player] \| /feed | /feed minijaham \| /feed | Op          |
| /heal    | Restore player's health value | /heal [player] \| /heal | /heal minijaham \| /heal | Op          |

### Install

:one: [Download](https://poggit.pmmp.io/ci/minijaham/FeedHealCMD) the .phar file(USE THE FeedHealCMD Dev build!!!! The FeedAndHeal is old version of this repo!).

:two: [Download](https://github.com/zRains/GForm) GForm Lib in order to not get an internal server error xD

:three: Upload the files that you downloaded to /plugins folder

:four: Restart your server

:five: Enjoy!

Note: Must need DevTools plugin.

Note: If there are any issues with the plugin, feel free to edit them however you want. Just please don't forget to read [LICENSE](https://github.com/minijaham/FeedHealCMD/blob/master/LICENSE).

### Config

You can customize some content through the configuration file. Please follow the configuration rules! If you have any problems, delete the configuration file and reload it, or submit issues.:smile:

#### Part of touch mode

```yaml
touch_mode:
  enable: true
  feed:
    # items(id:meta_id)
    item_id: "348:0"
  heal:
    item_id: "353:0"
  # feed & heal
  fh:
    item_id: "357:0"
```

#### Part of sounds

```yaml
# Sound effect when player executes /feed. Default: AnvilUseSound.
feedsound: AnvilUseSound
# Sound effect when player executes /heal. Default: AnvilUseSound.
healsound: AnvilUseSound
```

#### Part of particles

```yaml
# Particle effect. Default: circle.
particle:
  feed:
    type: "circle"
    # Radius of the circle
    range: 1
  heal:
    type: "circle"
    range: 1
```

### UI for player's effects

You can now use the sticky ball click player activation form to set player effects!

<div style="display:flex;">
<img src="https://github.com/minijaham/FeedHealCMD/blob/extend/img/1.jpg?raw=true" width="300px">
<img src="https://github.com/minijaham/FeedHealCMD/blob/extend/img/2.jpg?raw=true" width="300px">
<img src="https://github.com/minijaham/FeedHealCMD/blob/extend/img/3.jpg?raw=true" width="300px">
<img src="https://github.com/minijaham/FeedHealCMD/blob/extend/img/4.jpg?raw=true" width="300px">
</div>

:warning:This function has been improved, but there may be many deficiencies. We are trying to improve it.

### Help us :wave:

If you have any other suggestions, please feel free to create an issue! Thanks!

### Extra

Join my server! AndromedaPE.tk:19132

### Disclaimer

```
This software is licensed under "GNU General Public License v3.0".
This license allows you to use it and/or modify it but you are not at
all allowed to sell this plugin at any cost. If found doing so the
necessary action required would be taken. Further removal of the License and or
authors name from this software is strictly prohibited.
```
