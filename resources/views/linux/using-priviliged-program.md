# Use a privilege-lifted program to view a protected file

The objective is to read `/etc/shadow` as a normal user.

<div class="bx info-light pxy-1">TIP: It is always a good idea to check the permissions of a file or directory before you change it, that way you will understand what you are comparing too!</div>

#### Copy the 'cat' program, change owner then attempt to access `/etc/shadow`

```bash
cd ~
# copy
cp /bin/cat mycat
# change owner
sudo chown root mycat
# run mycat to access /bin/shadow
./mycat /etc/shadow
```

Expected output:

```bash
./mycat: /etc/shadow: Permission denied
# permission status:
-rwxr-xr-x 1 root seed 43416 Mar 22 20:23 mycat
```

At this point are still unable to access `/etc/shadow` because the privilege has not yet been lifted.

#### Change the permission to include `set-uid` bit

```bash
cd ~
# change program permissions bit to set-uid (4)
sudo chmod 4755 mycat
# run mycat to access /etc/shadow
./mycat /etc/shadow
# output will show the contents of /etc/shadow
```

```bash
# permission status:
-rwsr-xr-x 1 seed seed 43416 Mar 22 20:23 mycat
-rwsr-xr-x 1 root root 68208 Mar 14  2022 /usr/bin/passwd
```

In simple terms, you are making a copy of the `cat` program which has 'lifted privileges' stored
in the `bin` directory. The reason we are making the copy is because you can not change the
permissions of `/bin/cat` because it is a root program, however you can change permissions on the
copy you made.

Now that you are the owner of the `mycat` program, you can elevate your permissions using the
`set-uid` method open the `etc/passwd` file.

<div class="bx danger">I am missing something?</div>

## Lingering Questions

<question></question>
If you need to use the sudo command to change the permission regardless, don't we just increase privilege directly on `/ect/cat`? Will this not not achieve the same result?

```bash
sudo chmod 4755 /bin/cat
```

<question></question>
Why are we changing the owner to root? Is this because only root can access the `set-uid` bit?

