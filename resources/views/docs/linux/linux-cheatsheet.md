# Linux Command-Line Cheatsheet

<!-- TOC -->

- [Navigation](#navigation)
- [File Operations](#file-operations)
- [File Permissions](#file-permissions)
- [Process Management](#process-management)
- [Searching](#searching)
- [Networking](#networking)
- [Compression/Archiving](#compressionarchiving)
- [System Information](#system-information)
- [Package Management (Debian/Ubuntu)](#package-management-debianubuntu)
- [Install Software Updates and Settings](#install-software-updates-and-settings)
    - [System Settings](#system-settings)

<!-- /TOC -->

<a id="markdown-navigation" name="navigation"></a>

## Navigation

<code-first-col></code-first-col>
| Command        | Description                                               |
| -------------- | --------------------------------------------------------- |
| cd [directory] | Change directory (`~` is home, and `/` is root directory) |
| pwd            | Print working directory                                   |
| ls             | List files and directories                                |
| ls -l          | List files in long format                                 |
| ls -a          | List all files, including hidden ones                     |
| du -sh         | Get size of current directory                             |

<a id="markdown-file-operations" name="file-operations"></a>

## File Operations

<code-first-col></code-first-col>
| Command                   | Description                          |
| ------------------------- | ------------------------------------ |
| touch [file]              | Create an empty file                 |
| cp [source] [destination] | Copy files/directories               |
| mv [source] [destination] | Move/rename files/directories        |
| rm [file]                 | Remove files                         |
| rm -r [directory]         | Remove directories (recursively)     |
| cat [file]                | Concatenate and display file content |
| head [file]               | Display the beginning of a file      |
| tail [file]               | Display the end of a file            |


<a id="markdown-file-permissions" name="file-permissions"></a>

## File Permissions

<code-first-col></code-first-col>
| Command                    | Description                                          |
| -------------------------- | ---------------------------------------------------- |
| chmod [permissions] [file] | Change file permissions (e.g., `chmod 644 file.txt`) |
| chown [user] [file]        | Change file owner                                    |
| chgrp [group] [file]       | Change file group                                    |

<a id="markdown-process-management" name="process-management"></a>

## Process Management

<code-first-col></code-first-col>
| Command           | Description                               |
| ----------------- | ----------------------------------------- |
| ps                | Display running processes                 |
| top               | Monitor system processes in real-time     |
| kill [PID]        | Terminate a process by its process ID     |
| killall [process] | Terminate all processes with a given name |

<a id="markdown-searching" name="searching"></a>

## Searching

<code-first-col></code-first-col>
| Command                           | Description                                     |
| --------------------------------- | ----------------------------------------------- |
| grep [pattern] [file]             | Search for a pattern in a file                  |
| grep -r [pattern] [directory]     | Recursively search for a pattern in a directory |
| find [directory] -name [filename] | Find files/directories by name                  |

<a id="markdown-networking" name="networking"></a>

## Networking

<code-first-col></code-first-col>
| Command           | Description                                 |
| ----------------- | ------------------------------------------- |
| ifconfig          | Display network interfaces and IP addresses |
| ip addr           | Display network interfaces and IP addresses |
| ping [host]       | Send ICMP echo requests to a host           |
| wget [URL]        | Download files from the web                 |
| ssh [user]@[host] | Connect to a remote host using SSH          |

<a id="markdown-compressionarchiving" name="compressionarchiving"></a>

## Compression/Archiving

<code-first-col></code-first-col>
| Command                                | Description                       |
| -------------------------------------- | --------------------------------- |
| tar -czvf [archive.tar.gz] [directory] | Create a gzip-compressed archive  |
| tar -xzvf [archive.tar.gz]             | Extract a gzip-compressed archive |
| unzip [file.zip]                       | Unzip a ZIP archive               |
| gzip [file]                            | Compress a file (creates file.gz) |

<a id="markdown-system-information" name="system-information"></a>

## System Information

<code-first-col></code-first-col>
| Command  | Description                |
| -------- | -------------------------- |
| uname -a | Display system information |
| df -h    | Display disk space usage   |
| free -h  | Display RAM usage          |
| uptime   | Display system uptime      |
| who      | Display logged-in users    |

<a id="markdown-package-management-debianubuntu" name="package-management-debianubuntu"></a>

## Package Management (Debian/Ubuntu)

<code-first-col></code-first-col>
| Command                    | Description                |
| -------------------------- | -------------------------- |
| sudo apt update            | Update package lists       |
| sudo apt upgrade           | Upgrade installed packages |
| sudo apt install [package] | Install a package          |
| sudo apt remove [package]  | Remove a package           |
| dpkg -i [package.deb]      | Install a .deb package     |


<a id="markdown-install-software-updates-and-settings" name="install-software-updates-and-settings"></a>

## Install Software Updates and Settings

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

```


<a id="markdown-system-settings" name="system-settings"></a>

### System Settings
<div class="code-first-col"></div>
 | Syntax                                        | Action         |
 | :-------------------------------------------- | :------------- |
 | timedatectl                                   | list time zone |
 | timedatectl set-timezone 'Australia/Brisbane' | set timezone   |


