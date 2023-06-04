<!-- MarkdownTOC -->

- [Common Commands](#common-commands)
- [Copy files with `scp`](#copy-files-with-scp)
- [Renaming Multiple Files (script)](#renaming-multiple-files-script)
- [Change File Extensions (script)](#change-file-extensions-script)
- [Find Different Between File and Folders](#find-different-between-file-and-folders)

<!-- /MarkdownTOC -->

<a id="common-commands"></a>
## Common Commands
<div class="code-first-col"></div>
 | Syntax              | Action                       |
 | :------------------ | :--------------------------- |
 | cp -r source/ dest/ | Copy directory and contents  |
 | mv src dest         | Move file/folder             |
 | rm -r dir           | Remove files and directories |
 | rm fileName         | Delete file                  |
 | rmdir dir           | Remove empty directory       |

<a id="copy-files-and-folders-with-scp"></a>
## Copy files with `scp`

```bash
# copy file to server
scp C:/path/to/example.txt user@server:/path/on/server/
# copy file from server
scp user@server:/path/on/example.txt C:/path/on/local/
```

You can add `-r` recursive flag to copy the entire directory, however, the scp command can be slow and inefficient when copying large directories. In addition, it does not support resuming interrupted transfers.

**You can use the `rsync` command instead.**

```bash
# copy directory to server
scp -r C:/path/to/example.txt user@server:/path/on/server/
# copy directory from server
scp -r user@server:/path/on/example.txt C:/path/on/local/
```

The `-avz` options with rsync enable archive mode, which preserves file permissions, timestamps, and ownership, and compresses the data to speed up the transfer. The `-e` ssh option tells rsync to use SSH as the transport.

The rsync command also supports resuming interrupted transfers, which can be useful if the transfer is interrupted due to network issues or other problems.


```bash
# copy directory from server
rsync -avz -e ssh user@remote:/path/to/directory /path/to/local/directory/
# copy directory to server


rsync [OPTIONS] --exclude 'file_or_directory' source/ destination/
```

```bash
# single file from server (confirmed with message)
scp scp forge@45.79.239.101:/home/forge/staging.factsoflife.com.au/public/images/404.jpg C:/Users/nayke/Desktop/htdocs/nk_lms/public/images/content
# directory from server (?)
rsync -avz -e ssh forge@45.79.239.101:/home/forge/staging.factsoflife.com.au/public/build /mnt/c/Users/nayke/Desktop/htdocs/nk_lms/public/images/content
```

`rsync` uses a smart algorithm to only copy files that have changed, so subsequent uploads and downloads will be much faster than the initial transfer.


<a id="renaming-multiple-files-script"></a>
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

<a id="change-file-extensions-script"></a>
## Change File Extensions (script)

```bash
# add a .txt file extension to all files in your present working directory.
for i in $( ls ); do mv $i $i.txt; done
# remove a file extension from all files in your present working directory.
for i in $( ls *.txt ); do mv $i ${i%.*}; done
# change extension from .log to .txt.
for i in *.log; do mv -- "$i" "${i%.log}.txt"; done
```


## Find Different Between File and Folders

```bash
diff [OPTION]… FILES
diff options dir1 dir2
```

-q only display when different
-r to read subdirectories

what is meld?
