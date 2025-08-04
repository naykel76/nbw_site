# Rclone - Just the Basics

- [Copy single file from remote to local](#copy-single-file-from-remote-to-local)
- [Copy multiple (selected) files from remote to local (by name)](#copy-multiple-selected-files-from-remote-to-local-by-name)
    - [Additional Examples](#additional-examples)
- [Useful Commands](#useful-commands)
    - [See what's in OneDrive:](#see-whats-in-onedrive)
    - [Test before doing anything:](#test-before-doing-anything)
    - [Show progress:](#show-progress)


## Copy single file from remote to local

All examples below copy **from remote to local**. To copy the other way, just swap the paths.

```powershell +torchlight-powershell
# This copies a single file from remote to local, even though the command is 'copyto'.
rclone copyto $srcRemotePath $destLocalPath
```

> 💡 Note: `onedrive:` is the remote name configured in `rclone config`.
> If your remote is named differently, replace `onedrive:` with your own remote name.

Setting the local and remote path variables:

> Mixed slashes are fine — PowerShell and rclone handle them fine.

```powershell +torchlight-powershell
$basePath = 'Documents/Studio One/Sound Sets'
$filename = 'Studio One Musicloops.soundset'
$destLocalPath = "C:\Users\natha\OneDrive\$basePath\$filename"
$srcRemotePath = "onedrive:/$basePath/$filename"

rclone copyto $srcRemotePath $destLocalPath --progress
```

## Copy multiple (selected) files from remote to local (by name)

```powershell +torchlight-powershell
$basePath = 'Documents/Studio One/Sound Sets'
$destDir = "C:\Users\natha\OneDrive\$basePath"
$srcDir = "onedrive:/$basePath"

$filename1 = 'Studio One Musicloops.soundset'
$filename2= 'Studio One Instruments Vol 1.soundset'

# Copy multiple files by specifying their names in braces (comma-separated)
rclone copy $srcDir $destDir --include "{$filename1,$filename2}" --progress
```

### Additional Examples 

```powershell +torchlight-powershell
# Alternatively, add multiple --include flags for each file
rclone copy $srcDir $destDir --include $filename1 --include $filename2 --progress
```

```powershell +torchlight-powershell
$basePath = 'Documents/Studio One/Sound Sets'
$destDir = "C:\Users\natha\OneDrive\$basePath"
$srcDir = "onedrive:/$basePath"

$filenames = @(
    'Studio One Musicloops.soundset',
    'Studio One Instruments Vol 1.soundset',
    'Hammer of the Gods.soundset'
)

foreach ($filename in $filenames) {
    rclone copyto "$srcDir/$filename" "$destDir\$filename" --progress
}
```





## Useful Commands

### See what's in OneDrive:
```bash +torchlight-bash
rclone ls onedrive:
```

### Test before doing anything:
```bash +torchlight-bash
rclone copy C:\MyFolder\ onedrive: --dry-run
```

### Show progress:
```bash +torchlight-bash
rclone copy C:\MyFolder\ onedrive: --progress
```
