# SSH, Permissions and Security

<!-- MarkdownTOC -->

- [Users and Groups](#users-and-groups)
- [Permissions](#permissions)
- [Harden Access](#harden-access)
    - [Create SSH Key](#create-ssh-key)
        - [Upload the public key to server](#upload-the-public-key-to-server)
    - [Disable Root Access and Password Access](#disable-root-access-and-password-access)
- [Setup SSH Authentication for Git Bash on Windows](#setup-ssh-authentication-for-git-bash-on-windows)
        - [Configure SSH for Git Hosting Server.](#configure-ssh-for-git-hosting-server)

<!-- /MarkdownTOC -->

<div class="code-first-col"></div>
 | Syntax                 | Action                  |
 | :--------------------- | :---------------------- |
 | source ~/.bash_aliases | reload the Bash aliases |


<a id="users-and-groups"></a>
## Users and Groups
<div class="code-first-col"></div>
 | Syntax                         | Action                                             |
 | :----------------------------- | :------------------------------------------------- |
 | adduser {name}                 | Create user (You’ll be asked to assign a password) |
 | adduser {name} sudo            | Add user to sudo group                             |
 | cat /etc/passwd                | display list of users                              |
 | cat /etc/passwd \| grep {name} | search for user                                    |

<a id="permissions"></a>
## Permissions
<div class="code-first-col"></div>
 | Syntax                           | Action                 |
 | :------------------------------- | :--------------------- |
 | chgrp new_group file             | Change group           |
 | chmod ### file                   | Change permissions     |
 | chown -R new_owner:new_group dir | Change owner and group |
 | chown new_owner dir              | Change owner           |
 | passwd                           | Change password        |


<a id="harden-access"></a>
## Harden Access

It is generally recommended to add authorized_keys to a specific user rather than the root user. Adding authorized_keys to a regular user account allows that user to log in to the server using SSH without requiring a password. This is a more secure approach because it limits the exposure of the server to potential attacks.

By contrast, giving root access to SSH is not considered good security practice as it can increase the risk of a successful attack on the server. If an attacker were to gain access to the root user account, they would have full control over the system, which could result in serious consequences.

In summary, it is best to create a regular user account with SSH access and add the SSH key to that user's authorized_keys file, rather than allowing root access via SSH.

<a id="create-ssh-key"></a>
### Create SSH Key

```bash
# Lists the files in your .ssh directory, if they exist
ls -al ~/.ssh
# generate ssh key
ssh-keygen -b 4096
# view key
cat ~/.ssh/id_rsa.pub
```

<a id="upload-the-public-key-to-server"></a>
#### Upload the public key to server

```bash
# create directory and set user permissions
mkdir -p ~/.ssh && sudo chmod -R 700 ~/.ssh/
# copy key from local computer
scp ~/.ssh/id_rsa.pub example_user@203.0.113.10:~/.ssh/authorized_keys
```
<a id="disable-root-access-and-password-access"></a>
### Disable Root Access and Password Access

```bash
# disable passwords in sshd_config
sudo nano /etc/ssh/sshd_config
# update to
PermitRootLogin no
PasswordAuthentication no
# restart ssh service
sudo service sshd restart
```

<a id="setup-ssh-authentication-for-git-bash-on-windows"></a>
## Setup SSH Authentication for Git Bash on Windows

https://gist.github.com/bsara/5c4d90db3016814a3d2fe38d314f9c23

In the `.ssh` directory, Create the following files if they do not already exist:
- .ssh/config
- .bash_profile
- .bashrc

<a id="configure-ssh-for-git-hosting-server"></a>
#### Configure SSH for Git Hosting Server.

Add the following text to `.ssh/config`

```bash
Host 114.142.160.30
    HostName 114.142.160.30
    IdentityFile ~/.ssh/id_rsa_nbw
```



