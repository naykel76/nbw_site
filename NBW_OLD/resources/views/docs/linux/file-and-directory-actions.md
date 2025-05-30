# Linux File and Directory Actions

- [File paths](#file-paths)
- [Copy with `scp`](#copy-with-scp)
  - [Server to Local](#server-to-local)
  - [Server To Server](#server-to-server)
- [Copying with `rsync`](#copying-with-rsync)
- [Renaming Multiple Files (script)](#renaming-multiple-files-script)
- [Change File Extensions (script)](#change-file-extensions-script)
- [Counting Files and Directories](#counting-files-and-directories)
  - [Excluding Files and Directories](#excluding-files-and-directories)
  - [Excluding Hidden Files and Directories](#excluding-hidden-files-and-directories)
- [Trouble Shooting](#trouble-shooting)
  - [Add rsync to Git Bash](#add-rsync-to-git-bash)
  - [Install MSYS2 with rsync and openssh (includes scp)](#install-msys2-with-rsync-and-openssh-includes-scp)


<div class="bx warning flex va-c">
    <svg class="icon wh-4 fs0 mr-2"><use xlink:href="/svg/naykel-ui.svg#exclamation-circle"></use></svg>
    <div>Windows powershell and Git Bash require additional programs such as <code>rsnyc</code> and <code>scp</code> for many of these actions to work.</div>
</div>

<code-first-col></code-first-col>
| Command                   | Description                            |
| ------------------------- | -------------------------------------- |
| touch [file]              | Create an empty file                   |
| cp [source] [destination] | Copy files/directories                 |
| mv [source] [destination] | Move/rename files/directories          |
| rm [file]                 | Remove files                           |
| rm -r [directory]         | Remove directories (recursively)       |
| rm -rf [directory]        | Remove directories (skip confirmation) |
| cat [file]                | Concatenate and display file content   |
| head [file]               | Display the beginning of a file        |
| tail [file]               | Display the end of a file              |

## File paths

**Windows** uses backslashes `\` to separate file paths, while **Linux** uses forward slashes `/`. This means that when you are working with file paths in the command line, you need to use forward slashes even if you are using Windows.

Git bash can use either the Windows or Linux path format, but Powershell requires the Windows path format.

```bash
# Windows path
C:/Users/username/Desktop
# Linux (WSL) path
/c/Users/username/Desktop
```

## Copy with `scp`

**Syntax:** `scp [options] source destination`

**Note:** when using `scp` you can add `-r` recursive flag to copy the entire directory, however,
the scp command can be slow and inefficient when copying large directories. **You can use the
`rsync` command instead.**

### Server to Local

```bash
# Copy file from the server
scp user@45.79.239.101:/home/username/abc.txt /c/Users/username

# Copy file to the server
scp /c/Users/username user@45.79.239.101:/home/username/abc.txt
```

### Server To Server

```bash
scp user1@server1:/home/username/example.txt user2@server2:/home/username/
```

## Copying with `rsync`

**Syntax** `rsync [options] source destination`

`rsync` uses a smart algorithm to only copy files that have changed, so subsequent uploads and downloads will be much faster than the initial transfer.

https://www.youtube.com/watch?v=Pygr_TpZRpM&ab_channel=TonyTeachesTech

```bash
# copy directory from server
rsync -avz user@45.79.239.101:/home/username /c/Users/username


```

`-a` Archive mode, which preserves various attributes of the files such as permissions, ownership, timestamps, etc. <br>
`-v` Verbose mode, providing detailed information about the files being transferred. <br>
`-z` Enables compression during the transfer, reducing the amount of data sent over the network. <br>

`--delete-excluded` also delete excluded files from destination dirs <br>
`--delete` delete extraneous files from destination dirs <br>
`--dry-run` overview of what will be copied <br>
`--exclude` exclude files or directories from the transfer <br>

`--partial` keep partially transferred files <br>
`--progress` show progress during transfer <br>
`-P` is the same as `--partial --progress` <br>



## Renaming Multiple Files (script)

https://linuxconfig.org/how-to-rename-multiple-files-on-linux

```bash
# rename multiple files at once.

# append .bak to every file that begins with the pattern 'my_file'.
find . -type f -name 'my_file*' -print0 | xargs --null -I{} mv {} {}.bak

# append '_backup' to all files that end in the .txt extension.
find . -name "*.txt" -exec mv {} {}_backup \;

# We can also use xargs to do the same thing. ?? not tested
ls *.txt | xargs -I{} mv {} {}_backup

# find . -type f -maxdepth [depth] -name "[filepattern]" | while read FNAME; do mv "$FNAME" "${FNAME//search/replace}"; done

# find all named ...
find . -type f -name "my_file*" | while read FNAME; do mv "$FNAME" "${FNAME//my_file/new_name}"; done
# find all named with extention ...
find . -type f -name "my_file*.php" | while read FNAME; do mv "$FNAME" "${FNAME//my_file/new_name}"; done
# set max directory depth
find . -maxdepth 2 -type f -name "my_file*" | while read FNAME; do mv "$FNAME" "${FNAME//my_file/new_name}"; done

```


## Change File Extensions (script)

```bash
# add a .txt file extension to all files in your present working directory.
for i in $( ls ); do mv $i $i.txt; done
# remove a file extension from all files in your present working directory.
for i in $( ls *.txt ); do mv $i ${i%.*}; done
# change extension from .log to .txt.
for i in *.log; do mv -- "$i" "${i%.log}.txt"; done
```


## Counting Files and Directories

```bash
# Count the number of line in a file
wc -l file.txt
# Count the number of files in a directory
ls -1 | wc -l
# Count the number of files in a directory (including subdirectories)
find . -type f | wc -l
```

### Excluding Files and Directories

```bash
# Count the number of files in a directory (excluding files with a specific extension)
find . -type f -not -name '*.txt' | wc -l
# Count the number of files in a directory (excluding files with a specific name)
find . -type f -not -name 'file.txt' | wc -l
# Count excluding directory
find . -type d -not -path "./node_modules/*"  wc -l
# Count excluding multiple directories
find . -type d -not -path "./node_modules/*" -not -path "./.git/*" -not -path "./.vscode/*"| wc -l
```


### Excluding Hidden Files and Directories

```bash

find . -type d \( -path ./folder_to_exclude -o -path ./another_folder_to_exclude \) -prune -o -name '*.ts' -exec wc -l {} \;


# Count the number of files in a directory (excluding hidden files)
ls -1 | grep -v '^\.' | wc -l
# Count the number of directories in a directory (excluding hidden directories)
ls -1 | grep -v '^\.' | wc -l

```





Count the number of directories in a directory (including subdirectories)
```bash
find . -type d | wc -l
```

Count the number of files in a directory (including subdirectories) (excluding hidden files)
```bash
find . -type f -not -path '*/\.*' | wc -l
```

Count the number of directories in a directory (including subdirectories) (excluding hidden directories)
```bash
find . -type d -not -path '*/\.*' | wc -l
```

Count the number of files in a directory (including subdirectories) (excluding hidden files) (excluding files with a specific extension)
```bash
find . -type f -not -path '*/\.*' -not -name '*.txt' | wc -l
```

Count the number of directories in a directory (including subdirectories) (excluding hidden directories) (excluding directories with a specific name)
```bash
find . -type d -not -path '*/\.*' -not -name 'node_modules' | wc -l
```

Count the number of files in a directory (including subdirectories) (excluding hidden files) (excluding files with a specific extension) (excluding files with a specific name)
```bash

find . -type f -not -path '*/\.*' -not -name '*.txt' -not -name 'file.txt' | wc -l
```

Count the number of directories in a directory (including subdirectories) (excluding hidden directories) (excluding directories with a specific name) (excluding directories with a specific name)
```bash
find . -type d -not -path '*/\.*' -not -name 'node_modules' -not -name 'vendor' | wc -l
```


## Trouble Shooting


### Add rsync to Git Bash

1. Download *rsync* from the [MSYS2 package repository](https://repo.msys2.org/msys/x86_64/rsync-3.2.7-2-x86_64.pkg.tar.zst)


### Install MSYS2 with rsync and openssh (includes scp)




**MSYS2** is a collection of tools and libraries providing you with an easy-to-use environment for
building, installing and running native Windows software.

1. Download and Install [MSYS2](https://www.msys2.org/):
2. Open the MSYS2 shell and update the Package Database:
```bash
pacman -Syu
```
3. Install rsync and openssh (which includes `scp`):
```bash
pacman -S rsync openssh
```


