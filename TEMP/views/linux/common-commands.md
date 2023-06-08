# Command Line Cheatsheet


<!-- MarkdownTOC -->

- [linux](#linux)
  - [Install Software Updates and Settings](#install-software-updates-and-settings)

<!-- /MarkdownTOC -->

`~` home directory <br>
`/` root directory
`-l` long listing with more information
`man` display manual


<div class="code-first-col"></div>
 | Syntax | Action                        |
 | :----- | :---------------------------- |
 | du -sh | Get size of current directory |



| Extract zip file                            | `unzip archive.zip`      |                                                    |
| Copy directory contents to another location | `cp -a /source/. /dest/` |                                                    |
| Create symlink                              | `ln -s /source /dest`    |                                                    |
| View file contents                          | `cat file.txt`           |                                                    |

<a id="linux"></a>
## linux

<a id="install-software-updates-and-settings"></a>
### Install Software Updates and Settings

```bash
  # Sync available packages and upgrade
  sudo apt update && sudo apt upgrade
  # remove packages that were automatically installed as dependencies and are no longer needed
  sudo apt autoremove
  # Set hostname, replace example-hostname with one of your choice.
  hostnamectl set-hostname example-hostname
  #list time zone
  timedatectl list-timezones
  #set timezone
  timedatectl set-timezone 'Australia/Brisbane'
```




