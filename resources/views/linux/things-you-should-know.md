# Things You Should Know in Linux to Have a Fighting Chance

<p class="lead">Disclaimer: These notes are an interpretation of the concepts we are taught at university, as well as many we are not. As much as I would like to think I have everything right I can not guarantee it, so do yourself a favour and check for yourself.</p>

<!-- MarkdownTOC -->

- [What is the shell?](#what-is-the-shell)
- [How to create a new user](#how-to-create-a-new-user)
    - [How to get a list available users](#how-to-get-a-list-available-users)
    - [How to display user information and change a user password](#how-to-display-user-information-and-change-a-user-password)
    - [\(?\) What is dash check?](#-what-is-dash-check)
    - [Understanding id's](#understanding-ids)
- [Understanding permissions](#understanding-permissions)
- [What is the difference between `/etc/passwd` and `/etc/shaddow`?](#what-is-the-difference-between-etcpasswd-and-etcshaddow)

<!-- /MarkdownTOC -->

<a id="what-is-the-shell"></a>
## What is the shell?

The **shell** is the program that is run when the user logs in, and it provides an interface for the user to interact with the system. Bash is the default shell for most Linux distributions, 'zsh' and 'sh' are some other shells.

```bash
# to check your default shell run:
ps -p $$
# or
echo "$SHELL"
# to see all available shells run:
cat /etc/shells
```

The `/etc/shadow` file contains password information for each user account, such as the encrypted password and information about when the password was last changed. This file is only readable by the root user and is used to store sensitive information that should not be accessible to other users on the system.



`/bin/cat` is a program used to display a specific file

<a id="how-to-create-a-new-user"></a>
## How to create a new user

```bash
# adduser, enter password and details
sudo adduser bob
# check bob exists
cat /etc/passwd | grep bob
# output:
bob:x:1001:1001:bob,,,:/home/bob:/bin/bash
```

<question></question>
Why does the output look weird? What are The commas?
<answer></answer>
The commas are there because you were lazy and did not add any user information! Don't loose sleep
over it because these are optional felids anyway so as long as you are ok look at ugly commas it's
no big deal.

<a id="how-to-get-a-list-available-users"></a>
### How to get a list available users
The `/etc/passwd` file contains basic information about user accounts, such as the user's username, user ID, group ID, home directory, and shell. This file is readable by all users on the system and can be used to look up information about a particular user account.

<a id="how-to-display-user-information-and-change-a-user-password"></a>
### How to display user information and change a user password

`/usr/bin/id` is a program used to display the current user’s id information.

`/usr/bin/passwd` is a program used to change a normal user's password.

```bash
# default permissions
-rwxr-xr-x 1 root root 47480 Sep  5  2019 /usr/bin/id
-rwsr-xr-x 1 root root 68208 Mar 14  2022 /usr/bin/passwd
```
<question></question>

What is the difference between `/usr/bin/passwd` and `/bin/passwd`

<answer></answer>
In most modern Linux distributions, `/bin` and `/usr/bin` are merged, and both directories contain
the same set of binaries so both `/usr/bin/passwd` and `/bin/passwd` refer to the same command
which is used to change the users password.

<a id="-what-is-dash-check"></a>
### (?) What is dash check?

<a id="understanding-ids"></a>
### Understanding id's

**User IDs** are used by the system to identify users internally.

**Group IDs** are used by the system to manage groups of users.

**ruid:** is the real user ID of the user that started the process.

**euid:** is the effective user ID, it's what the system looks to when deciding what privileges the process should have. In most cases, the `euid` will be the same as the `ruid`, but when the `set-uid` bit is set is an example of a case where they differ. When the `set-uid` bit is set, the `euid` is set to the owner of the file, which allows these binaries to function.

**suid:** is the saved user ID, it's used when a privileged process (most cases running as root) needs to drop privileges to do some behavior, but needs to then come back to the privileged state.

<a id="understanding-permissions"></a>
## Understanding permissions

```bash
ls -l /bin/passwd
# output
-rwsr-xr-x 1 root root 68208 Nov 29 11:53 /bin/passwd
```

- The first character (-) indicates that this is a regular file.
- The next three characters (rws) indicate that the file has __*setuid permissions*__ (s).
- The next three characters (r-x) indicate that the owner (root) has read and execute permissions, but not write permissions.
- The final three characters (r-x) indicate that both the group and others have read and execute permissions, but not write permissions.

```bash
ls -ld /tmp
# output
d-rwx-rwx-rwt 18 root root 4096 Mar 21 18:32 /tmp
```

- The first character (d) indicates that this is a directory.
- The next three characters (rwx) indicate that the owner (root) has read, write, and execute permissions.
- The next three characters (rwx) indicate that the group has read, write, and execute permissions.
-  The final three characters (rwt) indicate that others have read, write, and execute permissions, and that the sticky bit is set.
-  The sticky bit is a special permission bit that prevents users from deleting or renaming files that they do not own in a directory that has this bit set.


<a id="what-is-the-difference-between-etcpasswd-and-etcshaddow"></a>
## What is the difference between `/etc/passwd` and `/etc/shaddow`?

Both files are related to the user account and authentication. The primary difference between these two files is that `/etc/passwd` contains user account information, while `/etc/shadow` contains password information.

```bash
# default permissions
-rw-r--r-- 1 root root 2550 Mar 22 19:18 /etc/passwd
-rw-r----- 1 root shadow 1365 Mar  7 07:33 /etc/shadow
```

```bash
cat /etc/passwd | grep user_name
# output
user_name:x:1000:1000::/home/user_name:/bin/bash
```

- `user_name:` This is the (your) username for the user account.
- `x:` The "x" here indicates that the hashed password is stored in /etc/shadow.
- `1000:` This is the user ID (UID) for the account.
- `1000:` This is the group ID (GID) for the account.
- `/home/user_name:` This is the home directory for the user account.
- `/bin/bash:` This is the user's default shell.

- `root:` This is the user who owns the file (/etc/shadow is owned by the root user).
- `shadow:` This is the group that owns the file (/etc/shadow is owned by the shadow group).

The shadow group is used to control access to sensitive password information stored in the /etc/shadow file. Only members of the shadow group (typically only the root user) are allowed to read the contents of the /etc/shadow file, which contains hashed passwords for user accounts on the system.

```bash
# change program owner
sudo chown root some_program
# update permissions to include the set-uid bit (4) to elevate permissions
sudo chmod 4755 some_program
```

