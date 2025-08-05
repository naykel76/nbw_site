# Users, Permissions and Groups
- [Users](#users)
- [Groups](#groups)
- [Permissions](#permissions)

## Users

<code-first-col></code-first-col>
| Command                                    | Action                                 |
| :----------------------------------------- | :------------------------------------- |
| adduser <username>                         | Create a new user                      |
| cat /etc/passwd                            | View all users on the system           |
| cat /etc/passwd \| grep {name}             | search for user                        |
| chsh -s /path/to/shell <username>          | Change default shell for a user        |
| id <username>                              | View user details                      |
| passwd                                     | Change your own password               |
| passwd <username>                          | Change user password                   |
| su - <username>                            | Switch to another user                 |
| userdel -r <username>                      | Delete a user and their home directory |
| usermod -aG sudo <username>                | Add user to sudo group                 |
| usermod -l <new_username> <old_username>   | Change username                        |
| visudo (Add: <username> ALL=(ALL:ALL) ALL) | Grant sudo privileges to a user        |
| whoami                                     | View current username                  |

## Groups

<code-first-col></code-first-col>
| Command                  | Action                              |
| :----------------------- | :---------------------------------- |
| grep '^sudo:' /etc/group | Display members of the `sudo` group |
| groups <username>        | View groups a user belongs to       |


## Permissions

<code-first-col></code-first-col>
 | Command                          | Action                 |
 | :------------------------------- | :--------------------- |
 | chgrp new_group file             | Change group           |
 | chmod ### file                   | Change permissions     |
 | chown -R new_owner:new_group dir | Change owner and group |
 | chown new_owner dir              | Change owner           |



```bash +torchlight-bash
groups forge
```

If forge is listed in the sudo group, then it has sudo privileges. The output might look something like this:

```bash +torchlight-bash
forge : forge sudo www-data
```

```bash +torchlight-bash

```


```bash +torchlight-bash

```



```bash +torchlight-bash

```



```bash +torchlight-bash

```