# Linux Quick Reference

- [Vim Editor Commands](#vim-editor-commands)
- [Navigation](#navigation)
- [Process Management](#process-management)
- [Searching](#searching)
- [Networking](#networking)
- [Compression/Archiving](#compressionarchiving)
- [System Information](#system-information)
- [Package Management (Debian/Ubuntu)](#package-management-debianubuntu)
- [Install Software Updates and Settings](#install-software-updates-and-settings)
    - [System Settings](#system-settings)


## Vim Editor Commands

| Command | Description         |
| ------- | ------------------- |
| `i`     | Enter insert mode   |
| `Esc`   | Exit insert mode    |
| `:w`    | Save changes        |
| `:q`    | Quit editor         |
| `:wq`   | Save and quit       |
| `:q!`   | Quit without saving |



## Navigation


| Command        | Description                                               |
| -------------- | --------------------------------------------------------- |
| cd [directory] | Change directory (`~` is home, and `/` is root directory) |
| pwd            | Print working directory                                   |
| ls             | List files and directories                                |
| ls -l          | List files in long format                                 |
| ls -a          | List all files, including hidden ones                     |
| du -sh         | Get size of current directory                             |


## Process Management


| Command           | Description.                              |
| ----------------- | ----------------------------------------- |
| ps                | Display running processes                 |
| top               | Monitor system processes in real-time     |
| kill [PID]        | Terminate a process by its process ID     |
| killall [process] | Terminate all processes with a given name |


## Searching


| Command                           | Description                                     |
| --------------------------------- | ----------------------------------------------- |
| grep [pattern] [file]             | Search for a pattern in a file                  |
| grep -r [pattern] [directory]     | Recursively search for a pattern in a directory |
| find [directory] -name [filename] | Find files/directories by name                  |


## Networking


| Command           | Description                                 |
| ----------------- | ------------------------------------------- |
| ifconfig          | Display network interfaces and IP addresses |
| ip addr           | Display network interfaces and IP addresses |
| ping [host]       | Send ICMP echo requests to a host           |
| wget [URL]        | Download files from the web                 |
| ssh [user]@[host] | Connect to a remote host using SSH          |


## Compression/Archiving


| Command                                | Description                       |
| -------------------------------------- | --------------------------------- |
| tar -czvf [archive.tar.gz] [directory] | Create a gzip-compressed archive  |
| tar -xzvf [archive.tar.gz]             | Extract a gzip-compressed archive |
| unzip [file.zip]                       | Unzip a ZIP archive               |
| gzip [file]                            | Compress a file (creates file.gz) |


## System Information


| Command  | Description                |
| -------- | -------------------------- |
| uname -a | Display system information |
| df -h    | Display disk space usage   |
| free -h  | Display RAM usage          |
| uptime   | Display system uptime      |
| who      | Display logged-in users    |


## Package Management (Debian/Ubuntu)


| Command                    | Description                |
| -------------------------- | -------------------------- |
| sudo apt update            | Update package lists       |
| sudo apt upgrade           | Upgrade installed packages |
| sudo apt install [package] | Install a package          |
| sudo apt remove [package]  | Remove a package           |
| dpkg -i [package.deb]      | Install a .deb package     |



## Install Software Updates and Settings

```bash +torchlight-bash
  # Sync available packages and upgrade
  sudo apt update && sudo apt upgrade
  # remove packages that were automatically installed as dependencies and are no longer needed
  sudo apt autoremove
  # Set hostname, replace example-hostname with one of your choice.
  hostnamectl set-hostname example-hostname
  #list time zone
  timedatectl list-timezones
```

### System Settings

 | Syntax                                        | Action         |
 | :-------------------------------------------- | :------------- |
 | timedatectl                                   | list time zone |
 | timedatectl set-timezone 'Australia/Brisbane' | set timezone   |


